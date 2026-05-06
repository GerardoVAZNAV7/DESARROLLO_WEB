<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Practica 34 — PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Practica 34</h1>
  <h2>Prácticas 33–35 con <span>PHP</span></h2>
</header>

<div class="page">
  <h1>Cambio de <span>Divisas</span></h1>
  <p class="sub">Calcula el tipo de cambio — lado del servidor</p>

  <div class="card">
    <form method="post" action="">

      <label for="cantidad">Cantidad</label>
      <input type="number" id="cantidad" name="cantidad" step="any" min="0"
             value="<?= isset($_POST['cantidad']) ? htmlspecialchars($_POST['cantidad']) : '' ?>"
             placeholder="Ej. 100">

      <label for="tasa">Tipo de cambio</label>
      <input type="number" id="tasa" name="tasa" step="any" min="0"
             value="<?= isset($_POST['tasa']) ? htmlspecialchars($_POST['tasa']) : '' ?>"
             placeholder="Ej. 0.85">

      <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $cantidad = $_POST['cantidad'];
      $tasa     = $_POST['tasa'];

      if (!is_numeric($cantidad) || !is_numeric($tasa)) {
        echo '<p class="error-msg">Ingresa valores numéricos válidos.</p>';
      } elseif (floatval($cantidad) < 0 || floatval($tasa) < 0) {
        echo '<p class="error-msg">Los valores deben ser positivos.</p>';
      } else {
        $cantidad  = floatval($cantidad);
        $tasa      = floatval($tasa);
        $resultado = $cantidad * $tasa;

        echo '<div class="resultado" style="margin-top:1.3rem;">';
        echo '  <p class="lbl">Resultado</p>';
        echo '  <p class="val">'. number_format($resultado, 2) .'</p>';
        echo '  <p style="margin-top:.4rem; color:var(--muted); font-size:.82rem; font-weight:700;">';
        echo     'El resultado es <strong style="color:var(--yellow)">' . number_format($resultado, 2) . '</strong>';
        echo '  </p>';
        echo '</div>';

        echo '<div class="resultado" style="margin-top:.8rem;">';
        echo '  <p class="lbl">Fórmula aplicada</p>';
        echo '  <p style="font-family:\'Fredoka One\',cursive; color:var(--muted); font-size:1rem; margin-top:.3rem;">';
        echo    $cantidad . ' × ' . $tasa . ' = <span style="color:var(--yellow)">' . number_format($resultado, 2) . '</span>';
        echo '  </p>';
        echo '</div>';
      }
    }
    ?>
  </div>

  <a href="index.php" class="volver">← Volver al menú</a>
</div>

<footer>
  <p>Gerardo Miguel Vazquez Navarro &nbsp;·&nbsp; Practica 34 PHP</p>
</footer>

</body>
</html>
