<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Weather
 *
 * @author webre
 */
class Weather implements Weather_Interface {

    //put your code here
    private $url;
    private $key; 
    public function __construct() {
       
        //$this->key=$apikey;
        $ch=curl_init();

        return $ch;
       
    }

    public function get_cities() {
        $string=file_get_contents("resources/city.list.json");
        $json_cities=json_decode($string,true);
        foreach($json_cities as $item)
        {
           if( strcmp($item["country"],"EG")==0)
           {
            $cities[]=$item;
           }
        }
           return $cities;
   
    }

    public function get_weather($cityid,$ch) {
        $this->url="https://api.openweathermap.org/data/2.5/weather?id=".$cityid."&appid=7fc320b3e8e00610185630bf41cb1dda";
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_URL,$this->url);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,$this->url);

        $response=curl_exec($ch);
        curl_close($ch);
        $data=$json_decode($response);
        return $data;
   
    }


    public function get_current_time() {
        return time();
        
    }

}
