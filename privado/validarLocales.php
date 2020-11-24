<?php
if(isset($_POST['value'])){
    require_once __DIR__.'/../includes/bd.php';
    $bd = new BD();
    $bd->validateLocal($_POST['value']);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hostelería Pontevedra</title>
    </head>
    <body>
        <header>
            <h1>Hostelería Pontevedra</h1>
        </header>
        <main class="container-fluid">
            <form name="form" action="#" method="post">
            <ul class="list-group">
            <?php
                require_once(__DIR__.'/../includes/bd.php');
                $bd = new Bd();
                $locales = $bd->getLocalesToValidate();
                //var_dump($locales);
                foreach ($locales as $valor) {
                    echo <<<EOF
                        <li class="list-group-item">
                            <div><p>Nombre: {$valor->getName()}<p></div>
                            <div><p>Teléfono: {$valor->getAddress()}</p></div> 
                            <button type="submit" name="value" class="btn btn-secondary float-right" value="{$valor->getName()}">Añadir</button>
                        </li>
EOF;
                }
            ?>
            </ul>
            </form>
        </main>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>

