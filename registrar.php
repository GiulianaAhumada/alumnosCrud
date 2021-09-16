<?php 

	include("con_db.php");

	if (isset($_POST['register'])) {
    
	    $nombreAlumno = trim($_POST['nombreAlumno']);
	    $apellidoAlumno = trim($_POST['apellidoAlumno']);
		$dniAlumno = trim($_POST['dniAlumno']);
	    $curso = trim($_POST['curso']);
		$asignatura = trim($_POST['asignatura']);
	    
	    $consulta = "INSERT INTO datosAlumnos(nombreAlumno, apellidoAlumno, dniAlumno, curso, asignatura) VALUES ('$nombreAlumno', '$apellidoAlumno', '$dniAlumno', '$curso', '$asignatura')";
	    $resultado = mysqli_query($conex,$consulta);

	}
?>