<?php
require("autoload.php");
ini_set('memory_limit', '-1');
$weather = new Weather();
$egyption_cities = $weather->get_cities();
if (isset($_POST["submit"])) {
  $cityId=$_POST["city"];
  $data=$Weather->get_weather($cityId,$weather);
  $currentTime=$weather->get_current_time();
  echo $data;
  echo $currentTime;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
     <form method="post">
         <select>
             <?php foreach($egyption_cities as $city)
                {
                      echo "<option value=".$city["id"].">".$city["name"]."</option>";
                }
                ?>
                <input type="submit" value="submit"name="send"/>
         </select>

</form>

    </body>
</html>
