// Mis datos personales
var nombre = "Tu Nombre";
var edad = 20;
var carrera = "Ingenieria en Sistemas";
var semestre = 3;
var correo = "tu@correo.com";

// innerHTML - muestra mis datos en la tarjeta
document.getElementById("val-inner").innerHTML = nombre + " · Sem. " + semestre;

// console.log - imprime en consola
console.log("Nombre: " + nombre);
console.log("Edad: " + edad);
console.log("Carrera: " + carrera);
console.log("Correo: " + correo);

// alert - se activa con el boton
function mostrarAlert() {
    window.alert("Nombre: " + nombre + "\nEdad: " + edad + "\nCarrera: " + carrera);
}

// document.write simulado para no borrar la pagina
function mostrarWrite() {
    document.getElementById("salida-write").innerHTML =
        "Nombre: " + nombre + " | Carrera: " + carrera + " | Semestre: " + semestre;
}