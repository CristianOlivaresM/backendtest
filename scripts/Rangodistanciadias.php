<?php
    $rangos = array();
    $dias = 0;
    $limit =2000;
    $km =100;
    for ($i = 1; $i <= ($limit/$km) ; $i++) {
        $arrayRango = array();
        if($i == 1){
            $arrayRango = array(
            'Rango' => $i,
            'KM' => $km*($i),
            'Dias' => $dias
            );
            array_push($rangos,$arrayRango);
        }
        else if ($i == 2){
            $arrayRango = array(
            'Rango' => $i,
            'KM' => $km*($i),
            'Dias' => $dias+1
            );
            array_push($rangos,$arrayRango);
        }else{
            $arrayRango = array(
            'Rango' => $i,
            'KM' => $km*($i),
            'Dias' => $rangos[$i-2]['Dias'] + $rangos[$i-3]['Dias']
            );
            array_push($rangos,$arrayRango);
        }
    }
    foreach($rangos as $rango){
        echo ("Id Rango = ".$rango['Rango']." | Extensión Rango = menos de ".$rango['KM']." Kms | Dias de Despacho =  ".$rango['Dias']." días"."\n");
    }
    die;
?>