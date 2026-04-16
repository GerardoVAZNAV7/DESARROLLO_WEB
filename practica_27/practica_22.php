<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Practica 22 — PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Practica 27</h1>
  <h2>Prácticas 21–26 con <span>PHP</span></h2>
</header>

<div class="page">
  <h1>Fórmula <span>General</span></h1>
  <p class="sub">x = (−b ± √(b²−4ac)) / 2a — lado del servidor</p>

  <div class="card">
    <form method="post" action="">
      <?php
      $campos = ["a" => "Coeficiente a", "b" => "Coeficiente b", "c" => "Coeficiente c"];
      foreach ($campos as $id => $etiq):
        $val = isset($_POST[$id]) ? htmlspecialchars($_POST[$id]) : ($id == "a" ? "1" : ($id == "b" ? "-5" : "6"));
      ?>
        <label for="<?= $id ?>"><?= $etiq ?></label>
        <input type="number" id="<?= $id ?>" name="<?= $id ?>" step="any" value="<?= $val ?>">
      <?php endforeach; ?>

      <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $a = $_POST['a']; $b = $_POST['b']; $c = $_POST['c'];

      if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
        echo '<p class="error-msg">Ingresa valores válidos para a, b y c.</p>';
      } elseif (floatval($a) == 0) {
        echo '<p class="error-msg">El coeficiente "a" no puede ser 0.</p>';
      } else {
        $a = floatval($a); $b = floatval($b); $c = floatval($c);
        $discriminante = ($b * $b) - (4 * $a * $c);

        echo '<div class="resultado">';
        echo '  <p class="lbl">Discriminante</p>';
        echo '  <p class="val sm">' . round($discriminante, 4) . '</p>';
        echo '</div>';

        if ($discriminante < 0) {
          $parteReal = round(-$b / (2 * $a), 4);
          $parteImg  = round(sqrt(abs($discriminante)) / (2 * $a), 4);
          echo '<p class="error-msg" style="margin-top:.7rem">Raíces complejas (discriminante negativo)</p>';
          echo '<div class="resultado" style="margin-top:.7rem">';
          echo '  <p class="lbl">X1</p><p class="val sm">' . $parteReal . ' + ' . $parteImg . 'i</p>';
          echo '</div>';
          echo '<div class="resultado" style="margin-top:.6rem">';
          echo '  <p class="lbl">X2</p><p class="val sm">' . $parteReal . ' − ' . $parteImg . 'i</p>';
          echo '</div>';
        } else {
          $x1 = round((-$b + sqrt($discriminante)) / (2 * $a), 4);
          $x2 = round((-$b - sqrt($discriminante)) / (2 * $a), 4);
          echo '<div class="resultado" style="margin-top:.7rem">';
          echo '  <p class="lbl">X1</p><p class="val">' . $x1 . '</p>';
          echo '</div>';
          echo '<div class="resultado" style="margin-top:.6rem">';
          echo '  <p class="lbl">X2</p><p class="val">' . $x2 . '</p>';
          echo '</div>';
        }
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