function calcular(operacion) {
    var a = parseFloat(document.getElementById("a").value);
    var b = parseFloat(document.getElementById("b").value);

    var errorEl    = document.getElementById("error");
    var etiquetaEl = document.getElementById("etiqueta");
    var resultadoEl = document.getElementById("resultado");

    errorEl.textContent = "";

    if (isNaN(a) || isNaN(b)) {
        errorEl.textContent = "Ingresa valores numericos validos.";
        return;
    }

    var resultado;
    var etiqueta;

    if (operacion == "suma") {
        resultado = a + b;
        etiqueta  = a + " + " + b + " =";
    } else if (operacion == "resta") {
        resultado = a - b;
        etiqueta  = a + " - " + b + " =";
    } else if (operacion == "division") {
        if (b == 0) { errorEl.textContent = "No se puede dividir entre 0."; return; }
        resultado = (a / b).toFixed(4);
        etiqueta  = a + " / " + b + " =";
    } else if (operacion == "exponenciacion") {
        resultado = Math.pow(a, b);
        etiqueta  = a + " ^ " + b + " =";
    }

    etiquetaEl.textContent  = etiqueta;
    resultadoEl.textContent = resultado;
}