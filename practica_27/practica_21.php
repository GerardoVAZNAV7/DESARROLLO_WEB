<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Practica 21 — PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Practica 27</h1>
  <h2>Prácticas 21–26 con <span>PHP</span></h2>
</header>

<div class="page">
  <h1>Operaciones con <span>Formulario</span></h1>
  <p class="sub">Suma, resta, división y exponenciación — lado del servidor</p>

  <div class="card">
    <form method="post" action="">

      <label for="a">Variable A</label>
      <input type="number" id="a" name="a" step="any"
             value="<?= isset($_POST['a']) ? htmlspecialchars($_POST['a']) : '' ?>" placeholder="Ej. 12">

      <label for="b">Variable B</label>
      <input type="number" id="b" name="b" step="any"
             value="<?= isset($_POST['b']) ? htmlspecialchars($_POST['b']) : '' ?>" placeholder="Ej. 4">

      <label for="op">Operación</label>
      <select name="op" id="op">
        <?php
        $ops = ["suma" => "Suma (+)", "resta" => "Resta (−)", "division" => "División (÷)", "exponenciacion" => "Exponenciación (^)"];
        foreach ($ops as $val => $lbl):
          $sel = (isset($_POST['op']) && $_POST['op'] === $val) ? "selected" : "";
        ?>
          <option value="<?= $val ?>" <?= $sel ?>><?= $lbl ?></option>
        <?php endforeach; ?>
      </select>

      <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $a  = $_POST['a'];
      $b  = $_POST['b'];
      $op = $_POST['op'];

      if (!is_numeric($a) || !is_numeric($b)) {
        echo '<p class="error-msg">Ingresa valores numéricos válidos.</p>';
      } else {
        $a = floatval($a);
        $b = floatval($b);
        $resultado = null;
        $etiqueta  = "";
        $error     = "";

        switch ($op) {
          case "suma":
            $resultado = $a + $b;
            $etiqueta  = "$a + $b =";
            break;
          case "resta":
            $resultado = $a - $b;
            $etiqueta  = "$a − $b =";
            break;
          case "division":
            if ($b == 0) { $error = "No se puede dividir entre 0."; }
            else { $resultado = round($a / $b, 4); $etiqueta = "$a ÷ $b ="; }
            break;
          case "exponenciacion":
            $resultado = $a ** $b;
            $etiqueta  = "$a ^ $b =";
            break;
        }

        if ($error) {
          echo '<p class="error-msg">' . htmlspecialchars($error) . '</p>';
        } else {
          echo '<div class="resultado">';
          echo '  <p class="lbl">' . htmlspecialchars($etiqueta) . '</p>';
          echo '  <p class="val">' . htmlspecialchars($resultado) . '</p>';
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