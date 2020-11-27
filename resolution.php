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

function insertarTelefonos($bd,$nombre,$telefonos){
    foreach ($telefonos as $tel) {
        $sql =sprintf("INSERT INTO phones VALUES ('%s','%d');",$nombre,$tel);
        $bd->query($sql);
        if($bd->errno){
            error_log($bd->error);
        }
    }
}

function uploadFichero($nombreInput){
    $target_dir = "uploads/";
    //$foto_subida=$_FILES["fileToUpload"]["name"];
    $nombre_base = basename($_FILES[$nombreInput]["name"]);
    //$imageFileType = strtolower(pathinfo($nombre_base, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES[$nombreInput]["tmp_name"]);
    if ($check !== false) {
        error_log("File is an image - " . $check["mime"] . ".");
        $uploadOk = 1;
    } else {
        error_log("El archivo $nombre_base no es una imágen.");
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES[$nombreInput]["size"] > 500000) {
            error_log("Tu foto es muy grande");
            $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        error_log("No se ha podido subir la foto $nombre_base.");
    // if everything is ok, try to upload file
    } else {
        $url_foto = $target_dir.$nombre_base;
        if (move_uploaded_file($_FILES[$nombreInput]["tmp_name"], $url_foto)) {
            error_log("The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.");
        } else {
            error_log("Sorry, there was an error uploading your file.");
        }
    }
    $directorio=$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/".$url_foto;
    return $directorio;
}




if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone'])&& isset($_POST['category'])){
    if(!validatePhone($_POST['phone'])){
        echo "<p>Telefono Invalido</p>";
    }
    $host="localhost";
    $user="locales";
    $passwd ="db.Locales2020";
    $bd ="admin_locales";

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
    $url_foto = uploadFichero("fileToUpload");
    /*Falta añadir la validación de la categoria */
    $categoria =$_POST['category'];
    $sql = sprintf("INSERT INTO locales VALUES('%s','%s','%s','%b','%b','%s','%s','%s','%s','".$url_foto."','%d','%s')",
            $nome,
            $direccion,
            $opening_hours,
            $take_away,
            $deliverys,
            $restaurant_menu,
            $whatsapp,
            $web,
            $email,
            false,
            $categoria
            );
            $mysqli->query($sql);
            if($mysqli->errno){
                error_log("SQL: ".$sql);
                error_log($mysqli->error);
            }
            
            insertarTelefonos($mysqli,$nome,[$phone,$phone2]);
}



/*configuracion apache

<Directory "/httpdocs/contratos">
    Require all denied
</Directory>
*/