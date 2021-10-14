<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilo.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&family=Quicksand:wght@300&display=swap"
        rel="stylesheet">
    <title>CRUD Alumnos</title>
</head>

<body>
    <div class="content">
        <form method="post" class="formulario" enctype="multipart/form-data">
            <h1>CRUD Alumnos</h1>
            <p>Nombre</p><input type="text" name="nombreAlumno" required>
            <p>Apellido</p><input type="text" name="apellidoAlumno" required>
            <p>Dni</p><input type="number" name="dniAlumno" required>


            <p>Curso</p>
            <select name=curso class="curso">
                <option value="1º">1º Año</option>
                <option value="2º">2º Año</option>
                <option value="3º">3º Año</option>
                <option value="4º">4º Año</option>
                <option value="5º">5º Año</option>
                <option value="6º">6º Año</option>
                <option value="7º">7º Año</option>
            </select>

            <p>Asignatura:</p>
            <select name=asignatura class="asignatura">
                <option value="Programacion">Programacion</option>
                <option value="I.P.P.">I.P.P.</option>
                <option value="A.D.O.">A.D.O.</option>
            </select>

            <p>Foto: </p><input type="file" name="foto" accept="image/*"/>
            <input type="submit" name="register" class="enviar">
        </form>

        <?php
        include("registrar.php");
        ?>

        <div class="crud">

        <?php
            if (isset($_GET['editar'])) {
                include("editar.php");
            }

            if (isset($_GET['borrar'])) {
                $borrar_id = $_GET ['borrar'];
                
                $borrar = "DELETE FROM datosAlumnos WHERE idAlumno='$borrar_id'";
                $ejecutar = mysqli_query ($conex, $borrar);
            } 
        ?>

            <table class="tabla">
                <tr>
                    <th> Nombre </th>
                    <th> Apellido </th>
                    <th> DNI </th>
                    <th> Curso </th>
                    <th> Asignatura </th>
                    <th> Foto</th>
                    <th> Editar </th>
                    <th> Eliminar </th>
                </tr>

                <?php
                include("con_db.php");

                $consulta = "SELECT * FROM datosAlumnos ";
                $resultado = mysqli_query($conex, $consulta);

                if ($resultado) {
                    while ($row = $resultado->fetch_array()) {
                        $idAlumno = $row['idAlumno'];
                        $nombreAlumno = $row['nombreAlumno'];
                        $apellidoAlumno = $row['apellidoAlumno'];
                        $dniAlumno = $row['dniAlumno'];
                        $curso = $row['curso'];
                        $asignatura = $row['asignatura'];
                        $archivo = $row['foto'];
                ?>

                <tr>
                    <td> <?php echo $nombreAlumno; ?> </td>
                    <td> <?php echo $apellidoAlumno; ?> </td>
                    <td> <?php echo $dniAlumno; ?> </td>
                    <td> <?php echo $curso; ?> Año </td>
                    <td> <?php echo $asignatura; ?> </td>
                    <td> <img src="imagenes/<?php echo $archivo ?>" alt=""/> </td>
                    <td> <a text-decoration="none" href="index.php?editar=<?php echo $idAlumno; ?>">Editar</a></td>
                    <td> <a href="index.php?borrar=<?php echo $idAlumno; ?>">Eliminar</a> </td>
                </tr>

                <?php }
                } ?>

            </table>
        </div>

    </div>
</body>

</html>