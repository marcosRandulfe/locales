<?php
if (isset($_POST['value'])) {
    require_once __DIR__ . '/../includes/bd.php';
    $bd = new BD();
    $bd->validateLocal($_POST['value']);
}
?>
<html>
<!-- Encabezado -->
<?php
        readfile(__DIR__.'/../includes/cabecera.html');
?>
    <!-- Encabezado -->
    <?php
         readfile(__DIR__.'/../includes/nav.html');
    ?>
<main class="container-fluid">

        <form name="form" action="#" method="post">
            <ul class="list-group">
                <?php
                require_once(__DIR__ . '/../includes/bd.php');
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
    <?php
        readfile(__DIR__.'/../includes/estilos.html');
    ?>
</body>

</html>