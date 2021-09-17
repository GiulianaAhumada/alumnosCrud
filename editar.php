<?php
    include("con_db.php");

    if(isset($_GET['editar'])){
        $editar_id = $_GET['editar'];

        $consulta = "SELECT * FROM datosAlumnos WHERE idAlumno='$editar_id'";
        $ejecutar = mysqli_query($conex,$consulta);

        $fila = mysqli_fetch_array($ejecutar);

        $id = $fila['idAlumno'];
        $nombre = $fila['nombreAlumno'];
        $apellido = $fila['apellidoAlumno'];
        $dni = $fila['dniAlumno'];
        $curso = $fila['curso'];
        $asignatura = $fila['asignatura'];
    }
?>
</br>
<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $id?>">

    <input type="text" name="nombre" value="<?php echo $nombre?>" required></br>

    <input type="text" name="apellido" value="<?php echo $apellido?>" required></br>

    <input type="number" name="dni" value="<?php echo $dni?>" required></br>

    <select name=curso required>
        <option value="1º"<?php if($curso=="1º"){echo "selected";} ?>>1º Año</option>
        <option value="2º"<?php if($curso=="2º"){echo "selected";} ?>>2º Año</option>
        <option value="3º"<?php if($curso=="3º"){echo "selected";} ?>>3º Año</option>
        <option value="4º"<?php if($curso=="4º"){echo "selected";} ?>>4º Año</option>
        <option value="5º"<?php if($curso=="5º"){echo "selected";} ?>>5º Año</option>
        <option value="6º"<?php if($curso=="6º"){echo "selected";} ?>>6º Año</option>
        <option value="7º"<?php if($curso=="7º"){echo "selected";} ?>>7º Año</option>
    </select></br>

    <select name=asignatura required>
        <option value="Programacion"<?php if($asignatura=="Programacion"){echo "selected";} ?>>Programacion</option>
        <option value="I.P.P."<?php if($asignatura=="I.P.P."){echo "selected";} ?>>I.P.P.</option>
        <option value="A.D.O."<?php if($asignatura=="A.D.O."){echo "selected";} ?>>A.D.O.</option>
    </select></br>

    <input type="file" name="foto" accept="image/*"/>

    <input type="submit" name="actualizar" value="Actualizar datos">
</form>

<?php
    if(isset($_POST['actualizar'])){
        $actualizar_nombre = $_POST['nombre'];
        $actualizar_apellido = $_POST['apellido'];
        $actualizar_dni = $_POST['dni'];
        $actualizar_curso = $_POST['curso'];
        $actualizar_asignatura = $_POST['asignatura'];
        $actualizar_archivo = $_POST['foto'];

        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $actualizar_archivo = $_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'], 'imagenes/'.$archivo);
		}

        $actualizar = "UPDATE datosAlumnos SET nombreAlumno='$actualizar_nombre', apellidoAlumno='$actualizar_apellido', dniAlumno='$actualizar_dni', curso='$actualizar_curso', asignatura='$actualizar_asignatura', foto='$actualizar_archivo' WHERE idAlumno='$editar_id'";

        $ejecutar = mysqli_query($conex,$actualizar);

    }
?>