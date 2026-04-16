<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Practica 26 — PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Practica 27</h1>
  <h2>Prácticas 21–26 con <span>PHP</span></h2>
</header>

<div class="page" style="max-width:620px">
  <h1>Tablas <span>Personalizadas</span></h1>
  <p class="sub">Hasta el número que elijas — lado del servidor</p>

  <div class="card">
    <form method="post" action="">
      <label for="numero">Ingresa un número</label>
      <input type="number" id="numero" name="numero" min="1"
             value="<?= isset($_POST['numero']) ? (int)$_POST['numero'] : '' ?>"
             placeholder="Ej. 5">
      <button type="submit">Generar tablas</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $num = $_POST['numero'];

      if (!is_numeric($num) || (int)$num <= 0) {
        echo '<p class="error-msg">Ingresa un número entero positivo.</p>';
      } else {
        $num = (int)$num;
        $cols = $num <= 4 ? 1 : 2;
        echo '<div style="margin-top:1.2rem; display:grid; grid-template-columns:repeat(' . $cols . ',1fr); gap:1rem;">';
        for ($i = 1; $i <= $num; $i++) {
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