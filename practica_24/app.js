function mostrarFecha() {
    var fecha = new Date();

    var dia = fecha.getDay();
    var diaMes = fecha.getDate();
    var mes = fecha.getMonth();
    var anio = fecha.getFullYear();

    var nombreDia;
    var nombreMes;

    // Día
    switch (dia) {
        case 0: nombreDia = "domingo"; break;
        case 1: nombreDia = "lunes"; break;
        case 2: nombreDia = "martes"; break;
        case 3: nombreDia = "miércoles"; break;
        case 4: nombreDia = "jueves"; break;
        case 5: nombreDia = "viernes"; break;
        case 6: nombreDia = "sábado"; break;
    }

    // Mes
    switch (mes) {
        case 0: nombreMes = "enero"; break;
        case 1: nombreMes = "febrero"; break;
        case 2: nombreMes = "marzo"; break;
        case 3: nombreMes = "abril"; break;
        case 4: nombreMes = "mayo"; break;
        case 5: nombreMes = "junio"; break;
        case 6: nombreMes = "julio"; break;
        case 7: nombreMes = "agosto"; break;
        case 8: nombreMes = "septiembre"; break;
        case 9: nombreMes = "octubre"; break;
        case 10: nombreMes = "noviembre"; break;
        case 11: nombreMes = "diciembre"; break;
    }

    document.getElementById("fecha").textContent =
        "Hoy es " + nombreDia + " " + diaMes + " de " + nombreMes + " del año " + anio;
}