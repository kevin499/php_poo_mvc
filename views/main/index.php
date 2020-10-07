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

    <h1 class='center'>Bievenido</h1>

    <p class='center'>¿Qué deseas hacer?</p>
    <div class='center'>
        <a href="destino" class="waves-effect waves-light btn-large"><i class="material-icons left">map</i> Ver destinos</a>
        <a href="viaje" class="waves-effect waves-light btn-large"><i class="material-icons left">airplanemode_active</i>Ver viajes</a>
    </div>


    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include 'views/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>