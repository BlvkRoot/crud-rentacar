<?= require("header.php");?>
<h1>Actualizar Carros</h1>
<?php
    foreach($params as $carInfo)
    {
?>
    <form action="create" method="POST">
        <input type="hidden" name="id" value="<?= $carInfo['id']?>" style='width: 50%; padding: 10px;'>
        <input type="text" name="plateNumber" placeholder="Placa" id="plateNumber" value="<?= $carInfo['plateNumber']?>"  style='width: 50%; padding: 10px;'><br>
        <input type="text" name="name" placeholder="Nome" id="name" value="<?= $carInfo['name'] ?>"  style='width: 50%; padding: 10px;'><br>
        <input type="text" name="color" placeholder="Cor" id="color" value="<?= $carInfo['color'] ?>"  style='width: 50%; padding: 10px;'><br>
        <input type="text" name="status" placeholder="Disponibilidade" value="<?= $carInfo['status'] ?>"  id="status" style='width: 50%; padding: 10px;'><br>
        <button type="submit" name='update'>Actualizar</button>
        <a href="store">Voltar</a>
    </form>
<?php
    }
?>
