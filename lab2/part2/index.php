<?php
require_once("vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as Capsule;

$Capsule = new Capsule();
        $Capsule->addConnection([
            "driver" => _driver_,
            "host" => _host_,
            "database" => _database_,
            "username" => _username_,
            "password" => _password_,
        ]);
        $Capsule->setAsGlobal();
        $Capsule->bootEloquent();
        

  
  
    
  $api=new API($Capsule);
 
  if($api->get_method()=="get")
  {
    
    $data=$Capsule::table('items')->get();
    //var_dump($data);
   // echo "in if"; 
  $api->get($data);
  }


?>

