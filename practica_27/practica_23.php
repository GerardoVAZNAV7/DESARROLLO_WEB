<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Practica 23 — PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Practica 27</h1>
  <h2>Prácticas 21–26 con <span>PHP</span></h2>
</header>

<div class="page">
  <h1>Cálculo de <span>IMC</span></h1>
  <p class="sub">Índice de Masa Corporal — lado del servidor</p>

  <div class="card">
    <form method="post" action="">

      <label for="peso">Peso (kg)</label>
      <input type="number" id="peso" name="peso" step="0.1" min="20" max="300"
             value="<?= isset($_POST['peso']) ? htmlspecialchars($_POST['peso']) : '' ?>" placeholder="Ej. 65">

      <label for="talla">Talla (m)</label>
      <input type="number" id="talla" name="talla" step="0.01" min="1" max="2.5"
             value="<?= isset($_POST['talla']) ? htmlspecialchars($_POST['talla']) : '' ?>" placeholder="Ej. 1.68">

      <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $peso  = $_POST['peso'];
      $talla = $_POST['talla'];

      if (!is_numeric($peso) || !is_numeric($talla)) {
        echo '<p class="error-msg">Ingresa el peso y la talla.</p>';
      } elseif (floatval($talla) < 1 || floatval($talla) > 2.5) {
        echo '<p class="error-msg">La talla debe estar entre 1.00 y 2.50 m.</p>';
      } elseif (floatval($peso) < 20 || floatval($peso) > 300) {
        echo '<p class="error-msg">El peso debe estar entre 20 y 300 kg.</p>';
      } else {
        $peso  = floatval($peso);
        $talla = floatval($talla);
        $imc   = round($peso / ($talla * $talla), 2);

        if ($imc < 18.5)      { $clase = "Bajo peso";    $color = "#60a5fa"; }
        elseif ($imc < 25)    { $clase = "Peso normal";  $color = "#5BBCB8"; }
        elseif ($imc < 30)    { $clase = "Sobrepeso";    $color = "#F5C842"; }
        elseif ($imc < 35)    { $clase = "Obesidad I";   $color = "#f97316"; }
        elseif ($imc < 40)    { $clase = "Obesidad II";  $color = "#ef4444"; }
        else                  { $clase = "Obesidad III"; $color = "#b91c1c"; }

        echo '<div class="resultado" style="margin-top:1rem; text-align:center;">';
        echo '  <p class="lbl">Tu IMC</p>';
        echo '  <p class="val" style="color:' . $color . '">' . $imc . ' kg/m²</p>';
        echo '  <p style="margin-top:.5rem; font-weight:800; color:' . $color . '">' . $clase . '</p>';
        echo '</div>';

        $filas = [
          ["Bajo peso",    "menos de 18.5", 0,    18.49],
          ["Peso normal",  "18.5 a 24.9",   18.5, 24.99],
          ["Sobrepeso",    "25.0 a 29.9",   25,   29.99],
          ["Obesidad I",   "30.0 a 34.9",   30,   34.99],
          ["Obesidad II",  "35.0 a 39.9",   35,   39.99],
          ["Obesidad III", "40.0 o más",    40,   999  ],
        ];

        echo '<table style="margin-top:1rem">';
        echo '<thead><tr><th>Clasificación</th><th>IMC</th></tr></thead><tbody>';
        foreach ($filas as $f) {
          $activa = ($imc >= $f[2] && $imc <= $f[3]) ? ' class="activa"' : '';
          echo '<tr' . $activa . '><td>' . $f[0] . '</td><td>' . $f[1] . '</td></tr>';
        }
        echo '</tbody></table>';
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