function resolver() {
    var a = parseFloat(document.getElementById("a").value);
    var b = parseFloat(document.getElementById("b").value);
    var c = parseFloat(document.getElementById("c").value);

    var errorEl = document.getElementById("error");
    var discEl  = document.getElementById("disc");
    var x1El    = document.getElementById("x1");
    var x2El    = document.getElementById("x2");

    errorEl.textContent = discEl.textContent = "";
    x1El.textContent = x2El.textContent = "—";

    if (isNaN(a) || isNaN(b) || isNaN(c)) {
        errorEl.textContent = "Ingresa valores validos para a, b y c.";
        return;
    }
    if (a == 0) {
        errorEl.textContent = "El coeficiente 'a' no puede ser 0.";
        return;
    }

    var discriminante = (b * b) - (4 * a * c);
    discEl.textContent = "Discriminante = " + discriminante.toFixed(4);

    if (discriminante < 0) {
        errorEl.textContent = "El discriminante es negativo, las raices son complejas.";
        var parteReal = (-b / (2 * a)).toFixed(4);
        var parteImg  = (Math.sqrt(Math.abs(discriminante)) / (2 * a)).toFixed(4);
        x1El.textContent = parteReal + " + " + parteImg + "i";
        x2El.textContent = parteReal + " - " + parteImg + "i";
        return;
    }

    var x1 = (-b + Math.sqrt(discriminante)) / (2 * a);
    var x2 = (-b - Math.sqrt(discriminante)) / (2 * a);

    x1El.textContent = parseFloat(x1.toFixed(4));
    x2El.textContent = parseFloat(x2.toFixed(4));

    alert("X1 = " + x1.toFixed(4) + "\nX2 = " + x2.toFixed(4));
}