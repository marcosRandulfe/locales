<!DOCTYPE html>
<html lang="en">
<?php
    readfile(__DIR__ . '/../includes/cabecera.html');
?>
<body>
    <?php
        readfile(__DIR__ . '/../includes/nav.html');
    ?>
    <main class="container">
    <?php
        require_once __DIR__.'/../includes/bd.php';
        $bd = new Bd();
        $locales=$bd->obtenerLocales();

?>
<?php if(count($locales)>0):?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Web</th>
                </tr>
            </thead>
            <tbody>
            <?php

                    foreach ($locales as $local) {
                        echo <<<EOF
                        <tr>
                            <td>{$local->getName()}</td>
                            <td>{$local->getAddress()}</td>
                            <td><a href="{$local->getWeb()}">{$local->getWeb()}</a></td>
                        </tr>
EOF;
                    }
            ?>
       </tbody>
        </table>
                <?php else:?>
                    <div class="centrar">
                        <div class="alert alert-primary" role="alert">
                        Todavía no hay locales
                    </div>
                    </div>

                <?php endif ?>
    </main>
<?php
    readfile(__DIR__ . '/../includes/estilos.html');
?>
    <style>
        .centrar{
            margin: 20px 100px;
        }
    </style>
</body>
</html>
