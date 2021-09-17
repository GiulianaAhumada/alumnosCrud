<?php 

	include("con_db.php");

	if (isset($_POST['register'])) {
    
	    $nombreAlumno = trim($_POST['nombreAlumno']);
	    $apellidoAlumno = trim($_POST['apellidoAlumno']);
		$dniAlumno = trim($_POST['dniAlumno']);
	    $curso = trim($_POST['curso']);
		$asignatura = trim($_POST['asignatura']);

		if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $archivo = $_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'], 'imagenes/'.$archivo);
		}

	    $consulta = "INSERT INTO datosAlumnos(nombreAlumno, apellidoAlumno, dniAlumno, curso, asignatura, foto) VALUES ('$nombreAlumno', '$apellidoAlumno', '$dniAlumno', '$curso', '$asignatura', '$archivo')";
	    $resultado = mysqli_query($conex,$consulta);

	}
?>