<?php
require_once 'administrador.php';
class AlumnoDAO{
    private $pdo;
    public function __construct(){
        require_once 'conexion.php';
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
        require_once 'conexion.php';
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
            echo "<td><a class='boton_personalizado2' href='zona.admin.php?id_alumno=$id_alumno'>Eliminar</a><a class='boton_personalizado3' href='actualizar.php?id_alumnomodi=$id_alumno'>Actualizar</a></td>";
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
            echo "<td><a class='boton_personalizado2' href='zona.admin.php?id_alumno=$id_alumno'>Eliminar</a><a class='boton_personalizado3' href='actualizar.php?id_alumnomodi=$id_alumno'>Actualizar</a></td>";
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
            
            $this->pdo->beginTransaction(); 
        
            $id=$_GET['id_alumno'];

            $query2="DELETE FROM tbl_nota WHERE id_alumno = ? ";
            $sentencia2=$this->pdo->prepare($query2);
            $sentencia2->bindParam(1,$id);
            $sentencia2->execute();
        
            $query1="DELETE FROM tbl_alumnos WHERE id_alumno = ? ";
            $sentencia1=$this->pdo->prepare($query1);
            $sentencia1->bindParam(1,$id);
            $sentencia1->execute();
        
            $this->pdo->commit();
            header('Location: zona.admin.php');
        } catch (Exception $ex) {
            /* Reconocer un error y no hacer los cambios */
            $this->pdo->rollback();
            echo $ex->getMessage();
           
        }
    }

    public function crearAlumnos(){
        try {
            $this->pdo->beginTransaction(); 
            $name=$_POST['name'];
            $first_surname=$_POST['first_surname'];
            $sec_surname=$_POST['sec_surname'];
            $group=$_POST['group'];
            $email=$_POST['email'];
            $psswd=$_POST['psswd'];
            $query="INSERT INTO `tbl_alumnos` (`id_alumno`, `nombre_alumno`, `apellidoprin_alumno`, `apellidosec_alumno`, `grupo_alumno`, `email_alumno`, `passwd_alumno`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
            $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$name);
                $sentencia->bindParam(2,$first_surname);
                $sentencia->bindParam(3,$sec_surname);
                $sentencia->bindParam(4,$group);
                $sentencia->bindParam(5,$email);
                $sentencia->bindParam(6,$psswd);
                $sentencia->execute();
                $id_persona = $this->pdo->lastInsertId();
            $mates="Mates";
            $fisica="Fisica";
            $programacion="Programacion";
            $nota="0";
            $query2="INSERT INTO `tbl_nota` (`id_nota`, `Nombre_asignatura`, `id_alumno`, `Nota_alumno`) VALUES (NULL, ?, ?, ?)";
            $sentencia2=$this->pdo->prepare($query2);
                $sentencia2->bindParam(1, $mates);
                $sentencia2->bindParam(2, $id_persona);
                $sentencia2->bindParam(3, $nota);
                $sentencia2->execute();
            $query3="INSERT INTO `tbl_nota` (`id_nota`, `Nombre_asignatura`, `id_alumno`, `Nota_alumno`) VALUES (NULL, ?, ?, ?)";
            $sentencia3=$this->pdo->prepare($query3);
                $sentencia3->bindParam(1, $fisica);
                $sentencia3->bindParam(2, $id_persona);
                $sentencia3->bindParam(3, $nota);
                $sentencia3->execute();
            $query4="INSERT INTO `tbl_nota` (`id_nota`, `Nombre_asignatura`, `id_alumno`, `Nota_alumno`) VALUES (NULL, ?, ?, ?)";
             $sentencia4=$this->pdo->prepare($query4);
                $sentencia4->bindParam(1, $programacion);
                $sentencia4->bindParam(2,$id_persona);
                $sentencia4->bindParam(3, $nota);
                $sentencia4->execute();
                $this->pdo->commit();
                header('Location: zona.admin.php');
            
        } catch (Exception $ex) {
            /* Reconocer un error y no hacer los cambios */
            $this->pdo->rollback();
            echo $ex->getMessage();
           
        }
    }

}

?>  