<?php

class API
{

    private $method;
    private $resource;
    private $resource_id;
    private $body_resorce;
    private $url;
    

    public function __construct($capsule)
    {
     $this->method=$this->get_method();
     
     
     $this->read_resource();
     if($this->read_resource()===""|| $this->resource_id===-1)
     {
         $this->output(array("error"=>"resource or resource id not found"),404);
     }
    }
    public function output($data,$response_code=200)
    {
        http_response_code($response_code);
            $count=$this->resource_id;
      
    print_r($data["data"][$this->resource_id]);
        exit();
    }
   public function get_method()
   {
      $allowed=array("get","post","put","delete");
     if(in_array(strtolower($_SERVER["REQUEST_METHOD"]),$allowed))
       { return strtolower($_SERVER["REQUEST_METHOD"]);}
    else
    {
       $this->output(array("error"=>"not supported method"),405);
     
    }

   }
   private function read_resource()
   {
    $this->url=$_SERVER["REQUEST_URI"];
    $piecies=explode("/",$this->url);
    //var_dump($url);
    $allowed=array("items","users","employees");
    $this->resource=in_array($piecies[6],$allowed)?$piecies[6]:"";
    if(isset($piecies[7])){
    $this->resource_id=is_numeric($piecies[7])?$piecies[7]:-1;
    }

   }
   public function get($data)
   {
      $this->output(array("data"=>$data),200);
   }


    


}


?>