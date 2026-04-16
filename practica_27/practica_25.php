<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Practica 25 — PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Practica 27</h1>
  <h2>Prácticas 21–26 con <span>PHP</span></h2>
</header>

<div class="page" style="max-width:620px">
  <h1>Tablas <span>1 al 10</span></h1>
  <p class="sub">Generadas con bucles for en PHP — lado del servidor</p>

  <div class="card">
    <form method="post" action="">
      <button type="submit">Generar tablas</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo '<div style="margin-top:1.2rem; display:grid; grid-template-columns:1fr 1fr; gap:1rem;">';
      for ($i = 1; $i <= 10; $i++) {
        echo '<div class="tabla-bloque">';
        echo '<h3>Tabla del ' . $i . '</h3>';
        echo '<p>';
        for ($j = 1; $j <= 10; $j++) {
          echo $i . ' × ' . $j . ' = ' . ($i * $j) . '<br>';
        }
        echo '</p></div>';
      }
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