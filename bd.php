<?php

require_once 'local.php';

    $host="localhost";
    $user="marcos";
    $passwd ="abc123";
    $bd ="locales";

    $mysqli = new mysqli($host, $user, $passwd, $bd) or die;
    $locales = [];

  

    function obtenerLocales(){
        $res=$GLOBALS['mysqli']->query("SELECT * FROM `locales` L INNER JOIN `phones` P ON L.name=P.name");
        if($res){
              while($row=$result->fetch_assoc()){
                  $local = new Local();
              }
        }else{
            
        }
    }


