<?php 
 $string=file_get_contents("resources/city.list.json");
 $json_cities=json_decode($string,true);
//print_r( $json_cities);

function filtercity($json_cities)
{
$i=0;
  
    foreach($json_cities as $key=>$value)
    { $i++;
        foreach($value as $item=>$element)
        {

            if(strcmp($item,"country")==0)
            {

                if(strcmp($element,"EG")==0)
                { //echo $element."\n";
                  // print_r($json_cities[$i]["name"]);
                  $cities[]=$json_cities[$i]["name"];
                }

            }
          //  echo($item)."<br>";
        }
    }
    //print_r($cities);
}

        foreach($json_cities as $item)
        {
           if( strcmp($item["country"],"EG")==0)
           {
            $cities[]=$item["name"];
           }
        }
        print_r($cities);
//filtercity($json_cities);
?>