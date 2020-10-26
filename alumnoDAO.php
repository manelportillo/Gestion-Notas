<?php
require_once 'administrador.php';
class AlumnoDAO{
    private $pdo;
    public function __construct(){
        include 'conexion.php';
        $this->pdo=$pdo;
    }
        /**
     * Get the value of pdo
     */ 
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @return  self
     */ 
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }


    public function mostrarAlumnos(){
        $query = "SELECT * FROM tbl_alumnos";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $alumnos=$sentencia->fetchALL(PDO::FETCH_ASSOC);
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>Acciones</th>";      
        echo "<th scope='col'>Nombre</th>";
        echo "<th scope='col'>Primer Apellido</th>";
        echo "<th scope='col'>Segundo Apellido</th>";    
        echo "</tr>";
       
        foreach ($alumnos as $alumno) {
            $id_alumno=$alumno['id_alumno'];
            echo "<tr>";
            echo "<td><a class='boton_personalizado2' href='zona.admin.php?id_alumno=$id_alumno'>Eliminar</a><a class='boton_personalizado3' href='zona.admin.php?id_alumno=$id_alumno'>Actualizar</a></td>";
            echo "<td> {$alumno['nombre_alumno']}</td>";
            echo "<td> {$alumno['apellidoprin_alumno']}</td>";
            echo "<td> {$alumno['apellidosec_alumno']}</td>"; 
            echo "</tr>"; 
            echo "</thead>";      
        }
        echo "</table>";
    }

    public function filtrarAlumnos(){
        $name=$_POST['name_alumno'];
        $surname=$_POST['surname_alumno'];
        $query = "SELECT * FROM tbl_alumnos WHERE nombre_alumno LIKE '%$name%' AND apellidoprin_alumno LIKE '%$surname%' ";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $alumnos=$sentencia->fetchALL(PDO::FETCH_ASSOC);
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>Acciones</th>";      
        echo "<th scope='col'>Nombre</th>";
        echo "<th scope='col'>Primer Apellido</th>";
        echo "<th scope='col'>Segundo Apellido</th>";    
        echo "</tr>";
       
        foreach ($alumnos as $alumno) {
            $id_alumno=$alumno['id_alumno'];
            echo "<tr>";
            echo "<td><a class='boton_personalizado2' href='zona.admin.php?id_alumno=$id_alumno'>Eliminar</a><a class='boton_personalizado3' href='zona.admin.php?id_alumno=$id_alumno'>Actualizar</a></td>";
            echo "<td> {$alumno['nombre_alumno']}</td>";
            echo "<td> {$alumno['apellidoprin_alumno']}</td>";
            echo "<td> {$alumno['apellidosec_alumno']}</td>"; 
            echo "</tr>"; 
            echo "</thead>";      
        }
        echo "</table>";
    }

    public function eliminarAlumnos() {
        try {
            
            $pdo->beginTransaction(); 
        
            $id=$_GET['id_alumno'];
        
            $query1="DELETE FROM tbl_alumnos WHERE id_alumno = ? ";
            $sentencia1=$pdo->prepare($query1);
            $sentencia1->bindParam(1,$id);
            $sentencia1->execute();
        
            $query2="DELETE FROM tbl_nota WHERE id_alumno = ? ";
            $sentencia2=$pdo->prepare($query2);
            $sentencia2->bindParam(1,$id);
            $sentencia2->execute();
        
            $pdo->commit();
            header('Location: zona.admin.php');
        } catch (Exception $ex) {
            /* Reconocer un error y no hacer los cambios */
            $pdo->rollback();
            echo $ex->getMessage();
           
        }
    }
}

?>  