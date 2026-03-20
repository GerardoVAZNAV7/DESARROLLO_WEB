function calcularIMC() {
    var peso  = parseFloat(document.getElementById("peso").value);
    var talla = parseFloat(document.getElementById("talla").value);
    var errorEl = document.getElementById("error");

    errorEl.textContent = "";

    if (isNaN(peso) || isNaN(talla)) {
        errorEl.textContent = "Ingresa el peso y la talla.";
        return;
    }
    if (talla < 1 || talla > 2.5) {
        errorEl.textContent = "La talla debe estar entre 1.00 y 2.50 metros.";
        return;
    }
    if (peso < 20 || peso > 300) {
        errorEl.textContent = "El peso debe estar entre 20 y 300 kg.";
        return;
    }

    var imc = peso / (talla * talla);
    imc = parseFloat(imc.toFixed(2));

    // Determino la clasificacion
    var clasificacion, color, fondo;

    if (imc < 18.5) {
        clasificacion = "Bajo peso";    color = "#60a5fa"; fondo = "rgba(96,165,250,.2)";
    } else if (imc < 25) {
        clasificacion = "Peso normal";  color = "#5BBCB8"; fondo = "rgba(91,188,184,.2)";
    } else if (imc < 30) {
        clasificacion = "Sobrepeso";    color = "#F5C842"; fondo = "rgba(245,200,66,.2)";
    } else if (imc < 35) {
        clasificacion = "Obesidad I";   color = "#f97316"; fondo = "rgba(249,115,22,.2)";
    } else if (imc < 40) {
        clasificacion = "Obesidad II";  color = "#ef4444"; fondo = "rgba(239,68,68,.2)";
    } else {
        clasificacion = "Obesidad III"; color = "#b91c1c"; fondo = "rgba(185,28,28,.2)";
    }

    // Muestro los resultados
    document.getElementById("resultado").style.display = "block";

    document.getElementById("imc-numero").textContent = imc;
    document.getElementById("imc-numero").style.color = color;

    var badge = document.getElementById("badge");
    badge.textContent      = clasificacion;
    badge.style.background = fondo;
    badge.style.color      = color;
    badge.style.border     = "1.5px solid " + color;

    // Resalto la fila activa en la tabla
    var filas = document.querySelectorAll("#tabla tr");
    for (var i = 0; i < filas.length; i++) {
        var min = parseFloat(filas[i].dataset.min);
        var max = parseFloat(filas[i].dataset.max);
        if (imc >= min && imc <= max) {
            filas[i].classList.add("activa");
        } else {
            filas[i].classList.remove("activa");
        }
    }

    alert("IMC: " + imc + " kg/m2\nClasificacion: " + clasificacion);
}