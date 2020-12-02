<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locales hostelería</title>
</head>

<body>
    <header>
    </header>
    <main class="container-fluid">
        <div class="row">
            <div class="col-sm-5">
            </div>
            <div id="form_container" class="col-sm-7">

                <form class="form container-flex" name="new_local" action="./resolution.php" enctype="multipart/form-data" method="post">
                    <header>
                        <h6>Únete a hostelería de Pontevedra:</h6>
                    </header>
                    <div class="form-row">
                        <div class="form-group form-group-sm col-sm-6">
                            <label id="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control form-control-sm input-sm" />
                        </div>
                        <div class="form-group form-group-sm col-sm-6">
                            <label id="address">Dirección</label>
                            <input type="text" name="address" id="address" class="form-control form-control-sm input-sm" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group form-group-sm col-sm-4">
                            <label>Teléfono 1</label>
                            <input type="tel" pattern="((\+34|0034|34)?[ -]?(6|7)[ -]?([0-9][ -]?){8})|((\+34|0034|34)?[
-]?(8|9)[ -]?([0-9][ -]?){8})" name="phone" id="phone" class="form-control form-control-sm input-sm" />
                        </div>
                        <div class="form-group form-group-sm col-sm-4">
                            <label id="phone2">Teléfono 2</label>
                            <input type="tel" pattern="((\+34|0034|34)?[ -]?(6|7)[ -]?([0-9][ -]?){8})|((\+34|0034|34)?[
-]?(8|9)[ -]?([0-9][ -]?){8})" name="phone2" id="phone2" class="form-control form-control-sm input-sm" />
                        </div>
                        <div class="form-group form-group-sm col-sm-4">
                            <label id="whatsapp">Whatsapp</label>
                            <input type="tel" pattern="((\+34|0034|34)?[ -]?(6|7)[ -]?([0-9][ -]?){8})|((\+34|0034|34)?[
-]?(8|9)[ -]?([0-9][ -]?){8})" name="whatsapp" id="whatsapp" class="form-control form-control-sm input-sm" />
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label id="opening-hours">Horario</label>
                        <input type="text" name="opening-hours" id="opening-hours" class="form-control form-control-sm" />
                    </div>
                    <div class="form-group">

                    </div>
                    <div class="form-group form-group-sm">
                        <label id="">Carta</label>
                        <input type="url" name="restaurant_menu" id="restaurant_menu" class="form-control form-control-sm" />
                    </div>
                    <div class="form-row">
                        <div class="form-group form-group-sm col-sm-6">
                            <label id="web">Web</label>
                            <input type="url" name="web" id="web" class="form-control form-control-sm input-sm" />
                        </div>
                        <div class="form-group form-group-sm col-sm-6">
                            <label id="email">Email </label>
                            <input type="email" name="email" id="email" class="form-control form-control-sm" />
                        </div>
                    </div>
                    <div class="form-group form-group-sm row">
                        <span class="col col-6">
                            <span class="form-check form-check-inline">
                                <label id="take_away" class="form-check-label">Recollida en local: </label>
                                <input type="checkbox" name="take_away" id="take_away" class="form-check-input" />
                            </span>
                            <span class="form-check form-check-inline">
                                <label id="delivery" class="form-check-label">Envio:</label>
                                <input type="checkbox" name="delivery" id="delivery" class="form-check-input" />
                            </span>
                        </span>
                        <span class="form-group form-group-sm col-6">
                            <select aria-placeholder="Seleccione una categoría" class="form-control form-control-sm" name="category" id="category" required>
                                <option disabled selected value="">Seleccione una categoría</option>
                                <option value="restaurante">Restaurante</option>
                                <option value="bar">Bar</option>
                                <option value="hotel">Hotel</option>
                                <option value="asador">Asador</option>
                            </select>
                        </span>
                    </div>
                    <div id="file" class="custom-file">
                        <label for="fileUpload" class="custom-file-label">Subir ficheiro</label>
                        <input type="file" id="fileUpload" name="fileToUpload" class="custom-file-input" required aria-required="Foto del local obligatoria" />
                    </div>
                    <div class="form-group form-group-sm">
                        <button class="btn btn-white btn-block" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url('./img/peregrinagrande.jpg');
            background-repeat: no-repeat;
            background-size: cover;

        }

        html,
        body,
        main,
        main>div {
            height: 100%;
            margin: 0;
        }

        form {
            height: 100%;
            background-color: lightslategray;
            color: white;
        }

        #cont_form {
            height: 100%;
        }

        form {
            padding: 20px 20px;

        }

        #form_container {
            margin-right: 0px;
            padding: 0px;
        }

        #file {
            margin-bottom: 10px;
        }
    </style>
</body>

</html>