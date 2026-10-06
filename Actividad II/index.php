<?php
define("IVA", 0.12);          
define("DESCUENTO", 0.15);    
define("TOPE_DESCUENTO", 150); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descripcion = $_POST['descripcion'];
    $cantidad    = $_POST['cantidad'];
    $precio      = $_POST['precio'];

    
    $subtotal      = $cantidad * $precio;
    $monto_iva     = $subtotal * IVA;
    $total_con_iva = $subtotal + $monto_iva;

    
    if ($total_con_iva > TOPE_DESCUENTO) {
        $monto_descuento = $total_con_iva * DESCUENTO;
        $aplica = true;
    } else {
        $monto_descuento = 0;
        $aplica = false;
    }

    $total_neto = $total_con_iva - $monto_descuento;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura de Compra</title>
</head>
<body>

<h2>Emisión de Factura</h2>

<form method="POST">
    Descripción del artículo: <input type="text" name="descripcion" required><br><br>
    Cantidad: <input type="number" name="cantidad" min="1" required><br><br>
    Precio unitario ($): <input type="number" step="0.01" name="precio" min="0" required><br><br>
    <button type="submit">Emitir Factura</button>
</form>

<?php if (isset($subtotal)): ?>
    <hr>
    <h3>Factura</h3>
    <p><strong>Artículo:</strong> <?php echo $descripcion; ?></p>
    <p><strong>Cantidad:</strong> <?php echo $cantidad; ?></p>
    <p><strong>Precio unitario:</strong> <?php echo number_format($precio, 2); ?> $</p>
    <hr>
    <p><strong>Subtotal:</strong> <?php echo number_format($subtotal, 2); ?> $</p>
    <p><strong>IVA (12%):</strong> <?php echo number_format($monto_iva, 2); ?> $</p>
    <p><strong>Total con IVA:</strong> <?php echo number_format($total_con_iva, 2); ?> $</p>

    <?php if ($aplica): ?>
        <p><strong>Descuento aplicado (15%):</strong> -<?php echo number_format($monto_descuento, 2); ?> $</p>
    <?php else: ?>
        <p><strong>Descuento:</strong> No aplica (el total no supera los 150 $)</p>
    <?php endif; ?>

    <hr>
    <p><strong>Total Neto a Pagar:</strong> <?php echo number_format($total_neto, 2); ?> $</p>
<?php endif; ?>

</body>
</html>