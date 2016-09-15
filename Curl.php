<?php
namespace Repositories;


trait Curl
{

  public function post($url, $data, $ip="", $ref="", $ua="") {

    try{
      //initiate cURL
      $ch=curl_init($url);
      //set referer only if stated by user
      if ($ref!="")
        curl_setopt($ch, CURLOPT_REFERER, $ref);
      //set IP interface if needed (for multi-IP server)
      if ($ip!="")
        curl_setopt($ch, CURLOPT_INTERFACE, $ip);
      //set user agent if stated by user
      if ($ua!="")
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
        
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

      $response=curl_exec($ch);

      return $response;

    }catch(\Exception $e){

      die('Conexion not stablish Repositories\Curl.php'.' error message: '.$e->getMessage());
      
    }

  }


}
