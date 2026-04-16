<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Practica 24 — PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Practica 27</h1>
  <h2>Prácticas 21–26 con <span>PHP</span></h2>
</header>

<div class="page">
  <h1>Fecha <span>Actual</span></h1>
  <p class="sub">Uso de switch en PHP — lado del servidor</p>

  <div class="card">

    <form method="post" action="">
      <button type="submit">Mostrar fecha</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      // Obtenemos los valores numéricos del día y mes
      $diaSemana = (int) date('w'); // 0=domingo ... 6=sábado
      $diaMes    = (int) date('j');
      $mes       = (int) date('n') - 1; // 0-indexado igual que JS
      $anio      = (int) date('Y');

      // Nombre del día con switch
      switch ($diaSemana) {
        case 0: $nombreDia = "domingo";    break;
        case 1: $nombreDia = "lunes";      break;
        case 2: $nombreDia = "martes";     break;
        case 3: $nombreDia = "miércoles";  break;
        case 4: $nombreDia = "jueves";     break;
        case 5: $nombreDia = "viernes";    break;
        case 6: $nombreDia = "sábado";     break;
      }

      // Nombre del mes con switch
      switch ($mes) {
        case 0:  $nombreMes = "enero";      break;
        case 1:  $nombreMes = "febrero";    break;
        case 2:  $nombreMes = "marzo";      break;
        case 3:  $nombreMes = "abril";      break;
        case 4:  $nombreMes = "mayo";       break;
        case 5:  $nombreMes = "junio";      break;
        case 6:  $nombreMes = "julio";      break;
        case 7:  $nombreMes = "agosto";     break;
        case 8:  $nombreMes = "septiembre"; break;
        case 9:  $nombreMes = "octubre";    break;
        case 10: $nombreMes = "noviembre";  break;
        case 11: $nombreMes = "diciembre";  break;
      }

      echo '<div class="fecha-grande">';
      echo "Hoy es $nombreDia $diaMes de $nombreMes del año $anio";
      echo '</div>';
    }
    ?>
  </div>

  <a href="index.php" class="volver">← Volver al menú</a>
</div>

<footer>
  <p>Gerardo Miguel Vazquez Navarro &nbsp;·&nbsp; Practica 27 PHP</p>
</footer>

</body>
</html>