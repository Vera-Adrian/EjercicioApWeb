<?php
define("DIURNA", 675);
define("VESPERTINA", 700);
define("NOCTURNA", 956.23);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre   = $_POST['nombre'];
    $cedula   = $_POST['cedula'];
    $h_diurna = $_POST['h_diurna'];
    $h_vesp   = $_POST['h_vesp'];
    $h_noct   = $_POST['h_noct'];

    $s_diurna = $h_diurna * DIURNA;
    $s_vesp   = $h_vesp * VESPERTINA;
    $s_noct   = $h_noct * NOCTURNA;

    $bruto = $s_diurna + $s_vesp + $s_noct;

    if ($bruto < 85000) {
        $p_ahorro = 0.1;
        $p_seguro = 0.15;
    } elseif ($bruto <= 150000) {
        $p_ahorro = 0.15;
        $p_seguro = 0.2;
    } else {
        $p_ahorro = 0.3;
        $p_seguro = 0.25;
    }

    $d_ahorro = $bruto * $p_ahorro / 100;
    $d_seguro = $bruto * $p_seguro / 100;
    $neto = $bruto - $d_ahorro - $d_seguro;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sueldo Quincenal</title>
</head>
<body>

<h2>Cálculo de Sueldo Quincenal</h2>

<form method="POST">
    Nombre: <input type="text" name="nombre" required><br><br>
    Cédula: <input type="text" name="cedula" required><br><br>
    
    Horas Diurnas (675 Bs.): <input type="number" step="0.01" name="h_diurna" required><br><br>
    Horas Vespertinas (700 Bs.): <input type="number" step="0.01" name="h_vesp" required><br><br>
    Horas Nocturnas (956.23 Bs.): <input type="number" step="0.01" name="h_noct" required><br><br>
    
    <button type="submit">Calcular</button>
</form>

<?php if (isset($bruto)): ?>
    <hr>
    <h3>Resultados</h3>
    <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
    <p><strong>Cédula:</strong> <?php echo $cedula; ?></p>
    
    <p><strong>Sueldo Bruto:</strong> <?php echo number_format($bruto, 2); ?> Bs.</p>
    <p><strong>Ahorro Habitacional (<?php echo $p_ahorro; ?>%):</strong> -<?php echo number_format($d_ahorro, 2); ?> Bs.</p>
    <p><strong>Seguro Social (<?php echo $p_seguro; ?>%):</strong> -<?php echo number_format($d_seguro, 2); ?> Bs.</p>
    <p><strong>Sueldo Neto:</strong> <?php echo number_format($neto, 2); ?> Bs.</p>
<?php endif; ?>

</body>
</html>