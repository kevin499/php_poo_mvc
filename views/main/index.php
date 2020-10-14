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
<div class="main">
    <div class="main-text s-12 m-6">
        <h1 class='center'>Bievenido ;)</h1>
        <p class='center'>¿Qué deseas hacer?</p>
        <div class='center'>
            <a href="destino" class="waves-effect waves-light btn-large yellow darken-2"><i class="material-icons left">map</i> Ver destinos</a>
            <a href="viaje" class="waves-effect waves-light btn-large orange darken-4"><i class="material-icons left">airplanemode_active</i>Ver viajes</a>
        </div>
    </div>
    <figure>
        <img class="main-image hide-on-small-only" src="<?= constant('URL') ?>public/images/Aare.png" alt="background">
    </figure>
</div>



<?php include 'views/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>