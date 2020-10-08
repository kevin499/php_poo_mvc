<table class="big-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Destino</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($this->destinos)){
        foreach ($this->destinos as $destino){
            ?>
            <tr>
                <td><?= $destino["id"]?></td>
                <td><?= $destino["nombre"]?></td>
                <td><?= $destino["descripcion"]?></td>
                <td><img class="tabla-imagen" src="<?=$destino["imagen"]?>" alt="Imagen destino"></td>
                <td class="tabla-botones">
                    <a data-id="<?= $destino["id"]?>" class="modificarDestinoButton waves-effect waves-light btn-small amber">Modificar</a>
                    <a data-id="<?= $destino["id"]?>" class="eliminarDestinoButton waves-effect waves-light btn-small red">Eliminar</a>
                </td>
            </tr>
            <?php
        }        }
    ?>
    </tbody>
</table>