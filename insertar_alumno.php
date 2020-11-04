<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos//style.css">
    <title>Insertar alumno</title>
</head>
<body>
<?php
require_once 'sessioncontroller.php';
require_once 'alumnoDAO.php';
?>
<div>
  <a class="boton_personalizado"  href="zona.admin.php">Inicio</a><br><br>
  
  <form action="insertar_alumno.php" method="POST">
    <label for="name">Nombre</label>
    <input type="text" id="name" name="name" placeholder="Nombre del alumno..." required>

    <label for="first_surname">Primer apellido</label>
    <input type="text" id="first_surname" name="first_surname" placeholder="Primer apellido..." required>

    <label for="sec_surname">Segundo apellido</label>
    <input type="text" id="sec_surname" name="sec_surname" placeholder="Segundo apellido..." required>

    <label for="group">Grupo alumno</label>
    <input type="text" id="group" name="group" placeholder="Grupo...">

    <label for="email">Email alumno</label>
    <input type="email" id="email" name="email" placeholder="Email..." required>

    <label for="psswd">Contraseña alumno</label>
    <input type="password" id="psswd" name="psswd" placeholder="Contraseña..." required>

    <input type="submit" value="Introducir">
  </form>
</div>
<?php
  if (isset ($_POST['name'])){
    $crearAlumnos = new AlumnoDAO;
    $crearAlumnos -> crearAlumnos();
  }
?>

</body>
</html>