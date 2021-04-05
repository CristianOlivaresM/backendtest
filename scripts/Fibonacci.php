<?php
$fibonacci = array(0,1);
$divisores = 0;
while ($divisores < 1000) {
    $lastindex = count($fibonacci);
    $arrayPrimos= array();
    $newfibonacci = $fibonacci[$lastindex-1] + $fibonacci[$lastindex -2];
    array_push($fibonacci,$newfibonacci);
    for ($i=2; $i <= $newfibonacci; $i++) {
        while($newfibonacci%$i == 0){
            array_push($arrayPrimos,$i);
            $newfibonacci = $newfibonacci/$i;
        }
    }
    $potenciasPrimos = array_count_values($arrayPrimos);
    $divisores = 1;
    foreach($potenciasPrimos as $potencia){
        $factor = $potencia + 1;
        $divisores = $divisores * $factor;
    }
}
echo($fibonacci[count($fibonacci)-1]);
die;
?>