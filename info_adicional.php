<html lang="en">
<head>
<title>Gestión de notas</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="estilos//style.css">
</head>
<body>
<a class="boton_personalizado"  href="zona.admin.php">Inicio</a><br><br>
<?php
require_once 'sessioncontroller.php';
require_once 'notaDAO.php';
?>
<?php
    $mostrar_notas_medias=new notaDAO;
    echo $mostrar_notas_medias->nota_media();
    echo "<h2 style='text-align:center;'>Notas medias</h2>";
    echo $mostrar_notas_medias->mayor_nota_media();
    echo "<h2 style='text-align:center;'>Asginatura con mayor nota media</h2>";
    echo $mostrar_notas_medias->alumnoConMayorNota();  
    echo "<h2 style='text-align:center;'>Alumnos con mayor nota media por cada asignatura</h2>";
?>

</body>

</html>