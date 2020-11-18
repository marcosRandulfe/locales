<?php

/*var_dump($_SERVER);
echo "<p>Request</p>";
var_dump($_REQUEST);
echo "<p>Post</p>";
var_dump($_POST);
echo "<p>GET</p>";
var_dump();
Hay que hacerlo con sesiones
*/

/*
 Function to clean the data from xss malicios code and validate de data
*/

//$patron_telefonos_españoles="((\+34|0034|34)?[ -]?(6|7)[ -]?([0-9][ -]?){8})|((\+34|0034|34)?[ -]?(8|9)[ -]?([0-9][ -]?){8})";


function validatePhone($phone){
    $patterphones="/((\+34|0034|34)?[ -]?(6|7)[ -]?([0-9][ -]?){8})|((\+34|0034|34)?[ -]?(8|9)[ -]?([0-9][ -]?){8})/";
    if(preg_match($patterphones,$phone)){
        return $phone;
    }
    return false;
}




if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone'])){
    if(!validatePhone($_POST['phone'])){
        echo "<p>Telefono Invalido</p>";
    }
    $host="localhost";
    $user="marcos";
    $passwd ="abc123";
    $bd ="locales";

    $mysqli = new mysqli($host, $user, $passwd, $bd) or die;


    function sanitice($datos,$constante=FILTER_DEFAULT){
        if(isset($datos)){
            $datos = strip_tags($datos);
            $datos = mysqli_real_escape_string($GLOBALS['mysqli'],$datos);
            return filter_var($datos,$constante);
        }
        return "";
    }
    
    if ($mysqli->connect_errno) {
        error_log("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
        
    }
    $nome= sanitice($_POST['name'],FILTER_SANITIZE_STRING);
    $direccion = sanitice($_POST['address'],FILTER_SANITIZE_STRING);
    $opening_hours = sanitice($_POST['opening-hours'],FILTER_SANITIZE_STRING);
    $take_away = sanitice($_POST['take_away'],FILTER_VALIDATE_BOOLEAN); 
    $deliverys = sanitice($_POST['delivery'],FILTER_VALIDATE_BOOLEAN);
    $restaurant_menu =sanitice($_POST['restaurant_menu'],FILTER_SANITIZE_STRING);
    $whatsapp= (validatePhone($_POST['whatsapp']))?$_POST['whatsapp']:"";
    $web = sanitice($_POST['web'],FILTER_VALIDATE_URL);
    $email = sanitice($_POST['email'],FILTER_VALIDATE_EMAIL);
    $phone= (validatePhone($_POST['phone']))?$_POST['phone']:"";
    $phone2= (validatePhone($_POST['phone2']))?$_POST['phone2']:"";
    
    
    $sql = sprintf("INSERT INTO locales VALUES('%s','%s','%s','%b','%b','%s','%s','%s','%s')",
            $nome,
            $direccion,
            $opening_hours,
            $take_away,
            $deliverys,
            $restaurant_menu,
            $whatsapp,
            $web,
            $email);
            $mysqli->query($sql);
}



/*configuracion apache

<Directory "/httpdocs/contratos">
    Require all denied
</Directory>
*/