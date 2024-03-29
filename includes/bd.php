<?php

require_once 'local.php';

class Bd{
    private $host="localhost:3306";
    private $user="locales";
    private $passwd ="db.Locales2020";
    private $bd ="admin_locales";

    private $mysqli;
    //= new mysqli($host, $user, $passwd, $bd) or die;

    function __construct() {
        $this->mysqli= new mysqli($this->host, $this->user, $this->passwd, $this->bd) or die;
    }

    function limpiarStrings($lista){
        $strings=[];
        foreach($lista as $item){
            $strings[]=mysqli_real_escape_string($this->mysqli,$item);
        }
        return $strings;
    }

    /**
     * Lista todos los locales en funcion asi como estan
     * @return ArrayObject
     */
    function obtenerLocales(){
        $locales = [];
        $res=$this->mysqli->query("SELECT * FROM `locales` L LEFT JOIN `phones` P ON L.name=P.name;");
        if($res){
              while($row=$res->fetch_assoc()){
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
                      $row['validated']
                  );
                  if(isset($locales[$local->getName()])){
                    $locales[$local->getName()]->addPhone($row['phone']);
                  }else{
                    $locales[$local->getName()]=$local;
                  }
              }
        }
        return array_values($locales);
    }

        function getLocalesToValidate(){
        $locales = [];
        $res=$this->mysqli->query("SELECT * FROM `locales` L INNER JOIN `phones` P ON L.name=P.name WHERE L.validated=false");
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
                      $row['validated']
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

    function validateLocal($name){
        $name= mysqli_real_escape_string($this->mysqli, $name);
        $sql = sprintf("UPDATE locales SET validated='1' WHERE name='%s';",$name);
        $this->mysqli->query($sql);
    }

    function getCategories(){
        $categories= [];
        $sql = "SELECT * FROM categories;";
        $resultado=$this->mysqli->query($sql);
        if($resultado){
            while($row=$resultado->fetch_assoc()){
                $categories[]=$row['name'];
            }
        }
        return $categories;
    }

    function setCategories($categories){
        error_log("setCategories");
        if($categories!=null && count($categories)>0){
            $categories= $this->limpiarStrings($categories);
            $categoriasLimpias=[];
            foreach ($categories as $valor) {
                if($valor!='general'){
                    $categoriasLimpias[]=$valor;
                };
            }
            $categories=$categoriasLimpias;
            $sql = "DELETE FROM categories;";
            $this->mysqli->query($sql);
            if($this->mysqli->errno){
                error_log("Locales: Error deleting old categories");
                error_log("Locales: ".$this->mysqli->error);
            }
            
            $categories = array_diff($categories, array('general'));
            
            error_log("Deleting old categories");
            $sql="INSERT INTO categories VALUES ('{$categories[0]}')";
            if(count($categories)>1){
                for ($i=1; $i < count($categories); $i++) {
                    $sql.=",('{$categories[$i]}')";
                }
            }
            $sql.=';';
            error_log($sql);
            $this->mysqli->query($sql);
            if($this->mysqli->errno){
                error_log("Locales: Error updating locals categories");
                error_log($this->mysqli->error);
            }
        }
        return new Exception("The list is empty");
    }
}
