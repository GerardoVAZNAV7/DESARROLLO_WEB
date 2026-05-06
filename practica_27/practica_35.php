<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Practica 35 — PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Practica 35</h1>
  <h2>Prácticas 33–35 con <span>PHP</span></h2>
</header>

<div class="page">
  <h1>Convertidor de <span>Tiempo</span></h1>
  <p class="sub">Convierte segundos en horas, minutos y segundos — lado del servidor</p>

  <div class="card">
    <form method="post" action="">

      <label for="segundos">Total de segundos</label>
      <input type="number" id="segundos" name="segundos" step="1" min="0"
             value="<?= isset($_POST['segundos']) ? htmlspecialchars($_POST['segundos']) : '' ?>"
             placeholder="Ej. 3661">

      <button type="submit">Convertir</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $total = $_POST['segundos'];

      if (!is_numeric($total) || intval($total) < 0) {
        echo '<p class="error-msg">Ingresa un número entero de segundos mayor o igual a 0.</p>';
      } else {
        $total   = intval($total);
        $horas   = intdiv($total, 3600);
        $resto   = $total % 3600;
        $minutos = intdiv($resto, 60);
        $segs    = $resto % 60;

        echo '<div class="resultado" style="margin-top:1.3rem; text-align:center;">';
        echo '  <p class="lbl">Resultado</p>';
        echo '  <p style="font-family:\'Fredoka One\',cursive; font-size:1.5rem; color:var(--yellow); margin-top:.5rem; line-height:1.6;">';
        echo    $total . ' segundos corresponden a';
        echo '  </p>';
        echo '  <p style="font-family:\'Fredoka One\',cursive; font-size:2rem; color:var(--teal); margin-top:.3rem;">';
        echo    $horas . 'h, ' . $minutos . 'm y ' . $segs . 's';
        echo '  </p>';
        echo '</div>';

        // Desglose visual
        echo '<div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:.7rem; margin-top:.8rem;">';

        $unidades = [
          ['Horas',    $horas,   '÷ 3600'],
          ['Minutos',  $minutos, 'resto ÷ 60'],
          ['Segundos', $segs,    'resto'],
        ];

        foreach ($unidades as $u) {
          echo '<div class="resultado" style="text-align:center; padding:.9rem .5rem;">';
          echo '  <p class="lbl">' . $u[0] . '</p>';
          echo '  <p style="font-family:\'Fredoka One\',cursive; font-size:2rem; color:var(--yellow);">' . $u[1] . '</p>';
          echo '  <p style="font-size:.65rem; color:var(--muted); margin-top:.2rem; font-weight:700;">' . $u[2] . '</p>';
          echo '</div>';
        }
        echo '</div>';
      }
    }
    ?>
  </div>

  <a href="index.php" class="volver">← Volver al menú</a>
</div>

<footer>
  <p>Gerardo Miguel Vazquez Navarro &nbsp;·&nbsp; Practica 35 PHP</p>
</footer>

</body>
</html>
