<?php
if (isset($_GET['editar'])) {
    $editar_dni = $_GET['editar'];

    $consulta = "SELECT * FROM datosAlumno WHERE dniAlumno='$editar_dni'";
    $ejecutar = mysqli_query($conex, $consulta);

    $fila = mysqli_fetch_array($ejecutar);

    $nombreAlumno = $fila['nombreAlumno'];
    $apellidoAlumno = $fila['apellidoAlumno'];
    $curso = $fila['curso'];
    $asignatura = $fila['asignatura'];
}
?>
<br />
<form method="POST" action="">
    <input type="text" name="nombre" value="<?php echo $nombreAlumno ?>">
    <input type="text" name="apellido" value="<?php echo $apellidoAlumno ?>">
    <input type="text" name="curso" value="<?php echo $curso ?>">
    <input type="text" name="asignatura" value="<?php echo $asignatura ?>">
    <input type="submit" name="actualizar" value="Actualizar datos">
</form>

<?php
if (isset($_POST['actualizar'])) {
    $actualizar_nombreAlumno = $_POST['nombre'];
    $actualizar_apellidoAlumno = $_POST['apellido'];
    $actualizar_curso = $_POST['curso'];
    $actualizar_asignatura = $_POST['asignatura'];

    $actualizar = "UPDATE datosAlumno SET nombreAlumno='$actualizar_nombreAlumno', apellidoAlummo='$actualizar_apellidoAlumno', curso='$actualizar_curso',asignatura'$actualizar_asignatura' WHERE dni='$editar_dni' ";

    $ejecutar = mysqli_query($conex, $actualizar);

    if ($ejecutar) {
        echo "<script>alert('datos actualizados')</script>";
        echo "<script>window.open('formulario.php','self_')</script>";
    }
}

?>