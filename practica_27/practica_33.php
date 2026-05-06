<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Practica 33 — PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Practica 33</h1>
  <h2>Prácticas 33–35 con <span>PHP</span></h2>
</header>

<div class="page">
  <h1>Verificación de <span>Anagramas</span></h1>
  <p class="sub">Comprueba si dos palabras son anagramas — lado del servidor</p>

  <div class="card">
    <form method="post" action="">

      <label for="palabra1">Primera palabra</label>
      <input type="text" id="palabra1" name="palabra1"
             value="<?= isset($_POST['palabra1']) ? htmlspecialchars($_POST['palabra1']) : '' ?>"
             placeholder="Ej. listen">

      <label for="palabra2">Segunda palabra</label>
      <input type="text" id="palabra2" name="palabra2"
             value="<?= isset($_POST['palabra2']) ? htmlspecialchars($_POST['palabra2']) : '' ?>"
             placeholder="Ej. silent">

      <button type="submit">Verificar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $p1 = trim($_POST['palabra1']);
      $p2 = trim($_POST['palabra2']);

      if ($p1 === '' || $p2 === '') {
        echo '<p class="error-msg">Ingresa ambas palabras.</p>';
      } elseif (!ctype_alpha(str_replace(' ', '', $p1)) || !ctype_alpha(str_replace(' ', '', $p2))) {
        echo '<p class="error-msg">Solo se permiten letras en las palabras.</p>';
      } else {
        $norm1 = str_split(strtolower($p1));
        $norm2 = str_split(strtolower($p2));
        sort($norm1);
        sort($norm2);
        $esAnagrama = ($norm1 === $norm2);

        $color  = $esAnagrama ? '#5BBCB8' : '#f87171';
        $icono  = $esAnagrama ? '✓' : '✗';
        $texto  = $esAnagrama ? 'Sí' : 'No';
        $detalle = $esAnagrama
          ? '"' . htmlspecialchars(strtolower($p1)) . '" y "' . htmlspecialchars(strtolower($p2)) . '" son anagramas.'
          : '"' . htmlspecialchars(strtolower($p1)) . '" y "' . htmlspecialchars(strtolower($p2)) . '" NO son anagramas.';

        echo '<div class="resultado" style="margin-top:1.3rem; text-align:center;">';
        echo '  <p class="lbl">Resultado</p>';
        echo '  <p class="val" style="color:' . $color . '; font-size:3rem;">' . $icono . ' ' . $texto . '</p>';
        echo '  <p style="margin-top:.6rem; color:' . $color . '; font-weight:700; font-size:.9rem;">' . $detalle . '</p>';
        echo '</div>';

        // Mostrar letras ordenadas
        echo '<div class="resultado" style="margin-top:.8rem;">';
        echo '  <p class="lbl">Letras ordenadas</p>';
        echo '  <p style="font-family:\'Fredoka One\',cursive; color:var(--muted); font-size:1rem; margin-top:.3rem;">';
        echo    htmlspecialchars(strtolower($p1)) . ' → <span style="color:var(--yellow)">' . implode('', $norm1) . '</span>';
        echo '  </p>';
        echo '  <p style="font-family:\'Fredoka One\',cursive; color:var(--muted); font-size:1rem; margin-top:.2rem;">';
        echo    htmlspecialchars(strtolower($p2)) . ' → <span style="color:var(--yellow)">' . implode('', $norm2) . '</span>';
        echo '  </p>';
        echo '</div>';
      }
    }
    ?>
  </div>

  <a href="index.php" class="volver">← Volver al menú</a>
</div>

<footer>
  <p>Gerardo Miguel Vazquez Navarro &nbsp;·&nbsp; Practica 33 PHP</p>
</footer>

</body>
</html>
