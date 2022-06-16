<?php require('layout/header.php');?>


<div id="lista">
<form id='cursoform' method="POST" action="<?= root(); ?>cursos/matricularse">
Matricularse
    <select name="cursoopcion">
    <?php
    foreach($cursos as $curso){
        echo "<option value='$curso[0]'>$curso[tema]</option>";
    }   
    ?> 
    </select>

    <input type="submit"/>
</form>
<form method="POST">
    Matriculado
    <?php
    foreach($matriculado as $matri){
        print($matri);
    }   

    ?>
</form>

<form id='cursoform' method="POST" action="<?= root(); ?>cursos/borrarAsignatura">
    Borrar Asignatura (Admin)
    <select name="cursoopcion">
    <?php
    if($user[4] == 3){
        foreach($cursos as $curso){
            echo "<option value='$curso[0]'>$curso[tema]</option>";
        } 
    }
  
    ?> 
    </select>
    <input type="submit"/>
</form>
<?php
if($user[4] == 3){
    echo "
<form id='cursoform' method='POST' action='<?= root(); ?>cursos/addAsignatura'>
    Borrar Asignatura (Admin)


    <input type='text' name='cursoopcion' placeholder='Curso tema'/>
    <input type='number' name='idprofe' placeholder='idprofe'/>
    <input type='submit'/>

    

</form>
";
}
?>
</div>


<?php require('layout/footer.php');?>