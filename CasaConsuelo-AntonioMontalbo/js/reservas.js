/* VARIABLES */

let calendario = document.getElementById("calendario");
let entrada = document.getElementById("f_entrada");
let salida = document.getElementById("f_salida");
let personas = document.getElementById("personas");
let precio = document.getElementById("precio");
let precioOculto = document.getElementById("precioOculto");
let textoFechas = document.getElementById("textoFechas");
let fechaEntrada = "";
let fechaSalida = "";
let hoy = new Date();
let mesActual = hoy.getMonth();
let añoActual = hoy.getFullYear();
let reservas = [];

/* CARGAR RESERVAS */

fetch("php/obtener_reservas.php").then(respuesta => respuesta.json()).then(datos => {
    reservas = datos;
    crearCalendario(mesActual, añoActual);
});

/* CREAR CALENDARIO */

function crearCalendario(mes, año){

    calendario.innerHTML = "";
    let meses = [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre"
    ];

    /* CABECERA */

    let cabecera = document.createElement("div");
    cabecera.classList.add("cabecera-calendario");

    /* BOTÓN ANTERIOR */

    let anterior = document.createElement("button");
    anterior.innerHTML = "<";
    anterior.classList.add("flecha-calendario");

    anterior.addEventListener("click", function(){
        mesActual--;
        if(mesActual < 0){
            mesActual = 11;
            añoActual--;
        }
        crearCalendario(mesActual, añoActual);
    });


    /* TÍTULO */

    let titulo = document.createElement("h2");
    titulo.innerHTML = meses[mes] + " " + año;

    /* BOTÓN SIGUIENTE */

    let siguiente = document.createElement("button");
    siguiente.innerHTML = ">";
    siguiente.classList.add("flecha-calendario");
    
    siguiente.addEventListener("click", function(){
        mesActual++;
        if(mesActual > 11){
            mesActual = 0;
            añoActual++;
        }
        crearCalendario(mesActual, añoActual);
    });


    /* AÑADIR CABECERA */

    cabecera.appendChild(anterior);
    cabecera.appendChild(titulo);
    cabecera.appendChild(siguiente);
    calendario.appendChild(cabecera);


    /* CONTENEDOR DÍAS */

    let contenedor = document.createElement("div");
    contenedor.classList.add("contenedor-dias");


    /* DÍAS SEMANA */

    let semana = ["L","M","X","J","V","S","D"];

    for(let i = 0; i < semana.length; i++){
        let nombre = document.createElement("div");
        nombre.classList.add("nombre-dia");
        nombre.innerHTML = semana[i];
        contenedor.appendChild(nombre);
    }


    /* PRIMER DÍA */

    let primerDia = new Date(año, mes, 1).getDay();
    if(primerDia == 0){
        primerDia = 7;
    }

    /* HUECOS */

    for(let i = 1; i < primerDia; i++){
        let hueco = document.createElement("div");
        contenedor.appendChild(hueco);
    }

    /* TOTAL DÍAS */

    let totalDias = new Date(año, mes + 1, 0).getDate();

    /* CREAR DÍAS */

    for(let dia = 1; dia <= totalDias; dia++){
        let cuadro = document.createElement("div");
        cuadro.classList.add("dia");
        cuadro.innerHTML = dia;

        let fecha = año + "-" +

        String(mes + 1).padStart(2, "0") + "-" +
        String(dia).padStart(2, "0");

        /* FECHAS OCUPADAS */

        if(fechaOcupada(fecha)){
            cuadro.classList.add("ocupado");
        }

        /* CLICK */

        cuadro.addEventListener("click", function(){
            seleccionarFecha(fecha, cuadro);
        });

        contenedor.appendChild(cuadro);
    }
    calendario.appendChild(contenedor);
}

/* FECHAS OCUPADAS */

function fechaOcupada(fecha){

    for(let i = 0; i < reservas.length; i++){
        let entradaReserva = new Date(reservas[i].f_entrada);
        let salidaReserva = new Date(reservas[i].f_salida);
        let actual = new Date(fecha);

        if(actual >= entradaReserva && actual < salidaReserva){
            return true;
        }
    }
    return false;
}

/* SELECCIONAR FECHAS */

function seleccionarFecha(fecha, elemento){
    if(elemento.classList.contains("ocupado")){
        alert("Fecha ocupada");
        return;
    }

    /* FECHA ENTRADA */

    if(fechaEntrada == ""){
        fechaEntrada = fecha;
        entrada.value = fecha;
        elemento.classList.add("seleccionado");

        textoFechas.innerHTML =

        "Entrada: " + fechaEntrada;
    }

    /* FECHA SALIDA */

    else if(fechaSalida == ""){
        let entradaDate = new Date(fechaEntrada);
        let salidaDate = new Date(fecha);

        if(salidaDate <= entradaDate){
            alert("La salida debe ser posterior");
            return;
        }

        fechaSalida = fecha;
        salida.value = fecha;
        elemento.classList.add("seleccionado");

        textoFechas.innerHTML = "Entrada: " + fechaEntrada + " | Salida: " + fechaSalida;

        calcularPrecio();
    }

    /* REINICIAR */

    else{
        fechaEntrada = fecha;
        fechaSalida = "";

        entrada.value = fecha;
        salida.value = "";

        let dias = document.querySelectorAll(".dia");

        for(let i = 0; i < dias.length; i++){
            dias[i].classList.remove("seleccionado");
        }

        elemento.classList.add("seleccionado");
        textoFechas.innerHTML = "Entrada: " + fechaEntrada;

        calcularPrecio();
    }
}

/* CALCULAR PRECIO */

function calcularPrecio(){

    let numPersonas = parseInt(personas.value);

    if(fechaEntrada != "" && fechaSalida != ""){

        let fecha1 = new Date(fechaEntrada);
        let fecha2 = new Date(fechaSalida);
        let diferencia = fecha2 - fecha1;
        let noches = diferencia / (1000 * 60 * 60 * 24);
        let precioNoche = numPersonas * 25;

        if(precioNoche < 125){
            precioNoche = 125;
        }

        let total = noches * precioNoche;

        precio.innerHTML = "Precio total: " + total + "€";

        precioOculto.value = total;
    }

    else{
        precio.innerHTML = "Precio total: 0€";
    }

}

/* CAMBIO PERSONAS */
personas.addEventListener("change", calcularPrecio);