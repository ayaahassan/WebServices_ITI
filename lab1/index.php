<?php
require("autoload.php");
$weather = new Weather();
$egyption_cities = $weather->get_cities();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
     <form method="post"action="result.php">
         <select name="city">
             <?php foreach($egyption_cities as $city)
                {
                      echo "<option  name='city'value=".$city["id"].">".$city["name"]."</option>";
                }
                ?>
                <input type="submit" value="get"name="submit"/>
         </select>

</form>

    </body>
</html>
