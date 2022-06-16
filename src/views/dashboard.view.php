<?php require('layout/header.php');?>


<?php
if($user[4] == 2){
    echo "Eres Profe";
}
if($user[4] == 3){
    echo "Eres Admin";
}
?>
<form style="height:100px" method="POST" action="<?= root(); ?>dashboard/createList">
    Añadir Lista
    <input type="submit" placeholder="enviar"/>
</form>
<div id="lista">
<form method="POST" action="<?= root(); ?>dashboard/newTask">

    <select name="numberlist">
        <?php
    foreach($fila as $row){
        echo "<option>$row[0]</option>";
    }
    ?>
    </select>

    <input type="text" name="tarea" placeholder="tarea"/>
    <input type="submit" placeholder="enviar"/>
</form>
<form method="POST" action="<?= root(); ?>dashboard/getLista">

    <select name="numberlist">
        <?php
    foreach($fila as $row){
        echo "<option>$row[0]</option>";
    }
    ?>
    </select>

    Traer Tarea
    <input type="submit" placeholder="enviar"></input>
</form>
<form>
    <?php
    foreach($task as $tarea){
        echo "<p>$tarea[0]-$tarea[description]</p>";
    }   
    ?>
</form>
</div>


<?php require('layout/footer.php');?>