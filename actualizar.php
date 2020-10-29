<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <link href="../css/fontawesome-free-5.15.0-web/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="estilos//style.css">
  <script  src="../js/code.js"></script>
</head>
<a class="boton_personalizado"  href="zona.admin.php">Inicio</a><br><br>
<body>
    <?php
    
    require_once "notaDAO.php"; 

    if (isset ($_POST['nota0'])) {
        $cambioNotas = new notaDAO();
        $nota = $cambioNotas->cambioNotas();
    }else {
        $notaDAO = new notaDAO();
        $alumno = $notaDAO->lecturamodi($_GET['id_alumnomodi']);
        $notas = $notaDAO->notas();
    }
    ?>
<h2 style="text-align: center;">Actualizar alumno</h2>
<div class="row">
    <div class="form">
      <form action="actualizar.php" method="POST" onsubmit="return validacionForm1()">
        <input id="idalu" name="idalu" style="display=none;"type="hidden" value=<?php echo $alumno['id_alumno']?>>
        <label>Nombre:</label><br>
        <input type="text" name="name" id="name" value="<?php echo $alumno['nombre_alumno'];?>" disabled><br>
        <label>1r apellido:</label><br>
        <input type="text" name="first_surname" id="first_surname" value="<?php echo $alumno['apellidoprin_alumno'];?>" disabled><br>
        <label>2nd apellido:</label><br>
        <input type="text" name="second_surname" id="second_surname" value="<?php echo $alumno['apellidosec_alumno'];?>" disabled><br>
        <label>Grupo:</label><br>
        <input type="text" name="group" id="group" value="<?php echo $alumno['grupo_alumno'];?>" disabled><br>
        <label>Email:</label><br>
        <input type="email" name="email" id="email" value="<?php echo $alumno['email_alumno'];?>" disabled><br>
        <?php
        $i=0;
        foreach ($notas as $nota) {
          echo "<label>".$nota['Nombre_asignatura']."</label><br>";
          echo "<input type='text' name='nota".$i."' id='nota' value='".$nota['Nota_alumno']."' required><br>";
          $i++;
        }
         ?>
        <input type="submit" value="Actualizar">
      </form> 
    </div>
</div>

</body>
</html>