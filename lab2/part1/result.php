<?php
require_once("vendor/autoload.php");

ini_set('memory_limit', '-1');
$weather = new Weather();
$egyption_cities = $weather->get_cities();
if (isset($_POST["submit"])) {
    //echo $_POST["city"];
    $cityId=$_POST["city"];
    $data=$weather->get_weather($cityId);
    $currentTime=$weather->get_current_time();
    /*highlight_string('<?php'.var_export($data,true).';?>');*/
    echo "<strong>".$data["name"]." weather status"."</strong>"."<br>";
    echo "speed: ". $data["wind"]["speed"]."Km/h<br>";
    echo "Humidity: ". $data["main"]["humidity"]."%<br>";
    $icon="https://openweathermap.org/img/w/" .$data['weather'][0]['icon'].".png";
    echo "<img src=\"$icon\"/>";
    echo $data["main"]["temp_min"]."C ";
    echo $data["main"]["temp_max"]."C<br>";
    echo "weather: ".$data["weather"][0]["description"]."<br>";
    echo $currentTime[0]."<br>";
    echo $currentTime[1];
}