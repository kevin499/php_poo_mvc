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

</head>
<body>
<?php include 'libs/navbar.php'; ?>

<h1 class='center'>Lista de destinos</h1>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Item Name</th>
        <th>Item Price</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach ($this->destinos as $destino){
    ?>
    <tr>
        <td><?= $destino["id"]?></td>
        <td><?= $destino["nombre"]?></td>
        <td><?= $destino["descripcion"]?></td>
        <td><?= $destino["imagen"]?></td>
        <td>Modificar</td>
        <td>Eliminar</td>

    </tr>
    <?php
    }
    ?>
    </tbody>
</table>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include 'libs/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>