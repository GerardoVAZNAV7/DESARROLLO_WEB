function generarTablas() {
    var resultado = "";

    for (var i = 1; i <= 10; i++) {
        resultado += "<h3>Tabla del " + i + "</h3>";

        for (var j = 1; j <= 10; j++) {
            resultado += i + " x " + j + " = " + (i*j) + "<br>";
        }
    }

    document.getElementById("resultado").innerHTML = resultado;
}