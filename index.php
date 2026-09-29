<?php
//Ej. 2.
$a = 5;
$b = 4;

$resultado = pow(($a + $b), 2) / 3;
echo "Ej. 2.<br>";
echo "Para A= $a y B $b:<br>";
echo "Para el resultado de ($a + $b)^2/3 =". $resultado;
echo "<br>";
echo "<br>";
?>

<?php
//Ej. 5.
$base = 9;
$altura = 12;

$superficie = ($base * $altura);
$perimetro = (2*($base + $altura));

echo "Ej. 5<br>";
echo "Para Base= $base y Altura= $altura:<br>";
echo "El resultado de la superficie es :".$superficie;
echo "<br>";
echo "El resultado del perimetro es :".$perimetro;
echo "<br>";
echo "<br>";
?>

<?php
//Ej. 7.
$tbase = 6;
$taltura = 8;

$tsuperficie = (($tbase * $taltura)/2);

echo "Ej. 7<br>";
echo "Para Base= $tbase y Altura= $taltura:<br>";
echo "El resultado de la superficie del triangulo es :".$tsuperficie;
echo "<br>";
echo "<br>";
?>

<?php
//Ej. 9.
$galonessurtidos = 10;
$litrosgalon = 3.785;
$preciolitro = 4.50;

$totallitros = ($galonessurtidos * $litrosgalon);
$total = ($totallitros * $preciolitro);

echo "Ej. 9<br>";
echo "Para una cantidad de: $galonessurtidos galones, con un precio de: $preciolitro $.<br>";
echo "Cantidad surtida $galonessurtidos galones<br>";
echo "Total en litros: $totallitros litros <br>";
echo "Total a cobrar: $total $<br>";
?>


