<?php
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
echo("las cadenas palindromos son:"."\n");
foreach($arrayPalindrome as $palindrome){
    echo($palindrome."\n");
}
die;
?>