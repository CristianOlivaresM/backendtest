<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class PreguntaController extends Controller
{
    public function palindromo(){
        $text = "afoolishconsistencyisthehobgoblinoflittlemindsadoredbylittlestatesmenandphilosophersanddivineswithconsistencyagreatsoulhassimplynothingtodohemayaswellconcernhimselfwithhisshadowonthewallspeakwhatyouthinknowinhardwordsandtomorrowspeakwhattomorrowthinksinhardwordsagainthoughitcontradicteverythingyousaidtodayahsoyoushallbesuretobemisunderstoodisitsobadthentobemisunderstoodpythagoraswasmisunderstoodandsocratesandjesusandlutherandcopernicusandgalileoandnewtonandeverypureandwisespiritthatevertookfleshtobegreatistobemisunderstood";
        $numbercharts = strlen($text);
        $arrayPalindrome = array();
        for ($i=0; $i < $numbercharts; $i++) {
            $e=2;
            for($e = 2;$e <= $numbercharts - $i; $e++){
            $newString = substr($text,$i,$e);
                if(strlen($newString) > 2){
                    if($newString == strrev($newString)){
                        if(!in_array($newString,$arrayPalindrome)){
                            array_push($arrayPalindrome,$newString);
                        }
                    }
                }
            }
        }
        echo("las cadenas que son palindromos son:"."\n");
        foreach($arrayPalindrome as $palindrome){
            echo($palindrome."\n");
        }
        die;
    }

    public function fibonacci (){
        $fibonacci = array(0,1);
        $divisores = 0;
        while ($divisores < 15) {
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
    }

    public function rangodistanciadias($nkm){
        $rangos = array();
        $dias = 0;
        $limit =2000;
        $km =100;
        if($nkm > 2000){
            echo("Rango de kilometros excede lo permitido");
            die;
        }else if ($nkm == $limit){
            echo ("Id Rango = 20 | Extensión Rango = 2000 Kms | Dias de Despacho = 4181");
            die;
        }
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
            if($nkm < $rango['KM']){
                echo ("Id Rango = ".$rango['Rango']." | Extensión Rango = menos de ".$rango['KM']." Kms | Dias de Despacho =  ".$rango['Dias']." días");
                break;
            }
        }
        die;
    }





}
