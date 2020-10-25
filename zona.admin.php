<html lang="en">
<head>
<title>Gestión de notas</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="estilos//style.css">
</head>
<body>

<?php
require_once 'sessioncontroller.php';
require_once 'alumnoDAO.php';
?>

  <a class="boton_personalizado"  href="insertar_alumno.php">Crear alumnos</a><br><br>
  <form action="zona.admin.php" method="POST">
    <label for="name"> Nombre:<label><br>
    <input type="text" id="name_alumno" name="name_alumno" placeholder="Nombre"><br> 
    <label for="surname1">Primer apellido:</label><br>
    <input type="text" id="surname_alumno" name="surname_alumno" placeholder="Primer apellido"><br> 
    <input type="submit" value="Buscar" name="buscar">
  </form>

<?php
  if (empty($_POST['buscar'])){
    $mostrar_alumnos=new AlumnoDAO;
    echo $mostrar_alumnos->mostrarAlumnos();
  } else if (empty($_POST['name_alumno']) && empty($_POST['surname_alumno'])) {
    $mostrar_alumnos=new AlumnoDAO;
    echo $mostrar_alumnos->mostrarAlumnos();
  } else if (isset($_POST['name_alumno']) || isset($_POST['surname_alumno'])){
    $filtrarAlumnos=new AlumnoDAO;
    $filtrarAlumnos->filtrarAlumnos();
  }
?>

</body>
</html>