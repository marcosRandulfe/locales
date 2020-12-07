<!DOCTYPE html>
<html lang="es">
<?php
if(isset($_POST[''])){}
readfile(__DIR__ . '/../includes/cabecera.html');
?>

<body>
    <main class="container">
        <?php
        readfile(__DIR__ . '/../includes/nav.html');
        ?>
        <div  class="categorias">
            <h6>Categorias:</h6>
            <div id="category_container">
            <?php
            require_once(__DIR__ . '/../includes/bd.php');
            $bd = new Bd();
            $categories = $bd->getCategories();
            if (!empty($categories)) {
                echo '<ul id="ul_categories" class="list-group list-group-horizontal-sm padre-lista">';
                foreach ($categories as $value) {
                    echo '<li class="lista" data-category="' . $value . '">' . ucfirst($value) .
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></li>';
                }
                echo '</ul>';
            } else {
                echo '<div id="advert" class="alert alert-warning" role="alert">
                    <a href="#" class="alert-link">Advertencia: </a>.Debe de insertar categorias para el correcto funcionamiento del sistema
                  </div>';
            }
            ?>
            </li>
            </ul>
        </div>
        </div>
        <form class="form formulario" method="post" action="#">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label for="new_category" class="input-group-text">Nueva categoría:</label>
                    </div>
                    <input type="text" class="form-control" placeholder="Nueva categoría" aria-label="Nueva categoria:" aria-describedby="basic-addon2" id="new_category">
                    <div class="input-group-append">
                        <button id="put_button" class="btn btn-outline-secondary" aria-label="Añadir" type="button">Añadir</button>
                    </div>
                </div>
            <button class="btn btn-primary btn-block" id="save" type="button" name="guardar_cambios">Guardar cambios</button>
        </form>
    </main>
    <?php
    readfile(__DIR__ . '/../includes/estilos.html');
    ?>
    <style>
        ul:nth-child(2) {
            border-top-right-radius: .25rem;
            border-bottom-left-radius: 0;
        }

        .list-group-horizontal-sm>.list-group-item:last-child {
            border-top-right-radius: 0;
        }

        .categorias {
            width: 75%;
            margin: 0 auto;
            margin-bottom: 100px;
        }

        .categorias ul {
            flex-wrap: wrap;
        }

        .lista {
            padding: 4px;
            list-style: none;
            min-width: 50%;
            width: 50%;
            text-align: center;
            border-style: solid;
            border-width: 0.5px;
            border-collapse: collapse;
            border-color: lightgray;

        }

        .lista>button {
            margin: 2px;
        }
        .category_container{
            border-width: 0.5px;
            border-color: lightgray;
        }

        .formulario {
            width: 75%;
            margin: 0 auto;
        }

        .boton-put>button {
            bottom: 20px;
        }

        .category_container{
            margin-bottom: 50px;
        }
    </style>
    <script>
        $(function(){

            function borrar(){
                console.log('borrar');
            }

            String.prototype.capitalize = function() {
                return this.charAt(0).toUpperCase() + this.slice(1);
            }


            function addCategory(){
                var new_category=$('#new_category').val();
                console.log(new_category);
                console.log("Nueva categoria: ".new_category);
                if(new_category!=null && new_category!=''){
                    if($('#advert').length){
                        $('#advert').remove();
                    }
                    if(!$('#ul_categories').length){
                        $('#category_container').append('<ul id="ul_categories" class="list-group list-group-horizontal-sm padre-lista"></ul>');
                    }
                    $('#ul_categories').append('<li class="lista" data-category="'
                        +new_category+'">'+new_category.capitalize()+
                        '<button type="button" onclick="this.parentNode.remove()" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></li>');
                }
            }
            $('.close').click((e)=>{
                console.log("FFFF");
            })


            $('#put_button').click((e)=>{
                console.log('Evento click');
                addCategory();
            });

            $('#new_category').keyup((e)=>{
                if(e.keyCode ==13){
                    addCategory();
                }
            });

            $('#save').click((e)=>{
                var categorias = $('category_container ul li');
                if($($(categorias).length)){
                    var valores = [];
                    $(categorias).each((e)=>{
                       var categoria= $(e).attr('data-category');
                       valores.push(categoria);
                       $.post('#',{'values[]' : valores});
                    });
                }else{
                    alert("Debe de introducir una categoría por lo menos");
                }
            });
        });
    </script>
</body>

</html>