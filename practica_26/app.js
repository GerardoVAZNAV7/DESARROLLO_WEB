function generarTablas() {
    var num = parseInt(document.getElementById("numero").value);
    var error = document.getElementById("error");
    var resultado = "";

    error.textContent = "";

    if (isNaN(num) || num <= 0) {
        error.textContent = "Ingresa un número entero positivo";
        return;
    }

    for (var i = 1; i <= num; i++) {
        resultado += "<h3>Tabla del " + i + "</h3>";

        for (var j = 1; j <= 10; j++) {
            resultado += i + " x " + j + " = " + (i*j) + "<br>";
        }
    }

    document.getElementById("resultado").innerHTML = resultado;
}