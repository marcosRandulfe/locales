<?php

use Symfony\Component\HttpKernel\DependencyInjection\RegisterLocaleAwareServicesPass;

require_once 'local.php';

    $host="localhost";
    $user="marcos";
    $passwd ="abc123";
    $bd ="locales";

    $mysqli = new mysqli($host, $user, $passwd, $bd) or die;
   

  

    function obtenerLocales(){
        $locales = [];
        $res=$GLOBALS['mysqli']->query("SELECT * FROM `locales` L INNER JOIN `phones` P ON L.name=P.name");
        if($res){
              while($row=$res->fetch_assoc()){
                  /*@var local Local */
                  $local = new Local(
                      $row['name'],
                      $row['address'],
                      $row['opening_hours'],
                      $row['take_away'],
                      $row['deliverys'],
                      $row['restaurant_menu'],
                      $row['whatsapp'],
                      [$row['phone']],
                      $row['web'],
                      $row['email'],
                      $row['url_foto'],
                      $row['validado']
                  );
                  if(isset($locales[$local->getName()])){
                    $locales[$local->getName()]->addPhone($row['phone']);
                  }else{
                    $locales[$local->getName()]=$local;
                  }
              } 
        }
        return $locales;
    }


