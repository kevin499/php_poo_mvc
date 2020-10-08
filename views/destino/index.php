<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= constant('URL') ?>public/css/default.css" rel="stylesheet">


</head>
<body>
<?php include 'views/navbar.php'; ?>

<h1 class='center'>Lista de destinos
    <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#registrarDestinoModal"><i class="material-icons">add</i></a>
</h1>

<div id="tablaDestino" class="big-table-container">

</div>



<div id="registrarDestinoModal" class="modal">
    <div class="modal-content">
        <h4>Registrar nuevo destino</h4>
        <div class="row">
            <form class="col s12" id="registrarDestinoForm">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="nombre" name="nombre" type="text" class="validate">
                        <label for="nombre">Nombre del destino</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="descripcion" name="descripcion" class="materialize-textarea"></textarea>
                        <label for="descripcion">Descripción</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="imagen" name="imagen" type="text" class="validate">
                        <label for="imagen">URL de la imagen</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="submit waves-effect waves-light btn-small amber">Registrar nuevo destino</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modificarDestinoModal" class="modal">
    <div class="modal-content">
        <h4>Modificar destino</h4>
        <div class="row">
            <form class="col s12" id="modificarDestinoForm">
                <input name="id_modificar" type="hidden">

                <div class="row">
                    <div class="input-field col s12">
                        <input id="nombreModif" name="nombre" type="text" class="validate">
                        <label for="nombreModif">Nombre del destino</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="descripcionModif" name="descripcion" class="materialize-textarea"></textarea>
                        <label for="descripcionModif">Descripción</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="imagenModif" name="imagen" type="text" class="validate">
                        <label for="imagenModif">URL de la imagen</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="submit waves-effect waves-light btn-small amber">Modificar destino</button>
                </div>
            </form>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include 'views/footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?= constant('URL') ?>public/js/default.js"></script>
</body>
</html>