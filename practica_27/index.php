<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Practica 27 — PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Practica 27</h1>
  <h2>Prácticas 21–26 con <span>PHP</span></h2>
</header>

<main>

<?php
$practicas = [
  21 => ["titulo" => "Operaciones con Formulario", "desc" => "Suma, resta, división y exponenciación desde el servidor.", "archivo" => "practica21.php"],
  22 => ["titulo" => "Fórmula General",             "desc" => "Raíces de ecuación cuadrática calculadas en PHP.",       "archivo" => "practica22.php"],
  23 => ["titulo" => "Cálculo de IMC",               "desc" => "Índice de masa corporal con clasificación en PHP.",      "archivo" => "practica23.php"],
  24 => ["titulo" => "Fecha Actual con switch",      "desc" => "Nombre del día y mes usando switch en PHP.",             "archivo" => "practica24.php"],
  25 => ["titulo" => "Tablas del 1 al 10",           "desc" => "Tablas de multiplicar generadas con bucles PHP.",        "archivo" => "practica25.php"],
  26 => ["titulo" => "Tablas Personalizadas",        "desc" => "Tablas hasta el número que el usuario elija.",           "archivo" => "practica26.php"],
];

foreach ($practicas as $num => $p):
?>
  <section class="practica">
    <div class="num"><?= $num ?></div>
    <div class="info">
      <h3><?= htmlspecialchars($p["titulo"]) ?></h3>
      <p><?= htmlspecialchars($p["desc"]) ?></p>
    </div>
    <a href="<?= $p["archivo"] ?>" class="btn">Ver práctica →</a>
  </section>
<?php endforeach; ?>

</main>

<footer>
  <p>Gerardo Miguel Vazquez Navarro &nbsp;·&nbsp; Practica 27 PHP</p>
</footer>

</body>
</html>