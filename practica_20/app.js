// Declaro las dos variables
var a = 8;
var b = 3;

// Muestro las variables en la pagina
document.getElementById("va").textContent = a;
document.getElementById("vb").textContent = b;

// Imprimo cada operacion
document.getElementById("suma").textContent     = a + b;
document.getElementById("resta").textContent    = a - b;
document.getElementById("division").textContent = (a / b).toFixed(2);
document.getElementById("expo").textContent     = a ** b;