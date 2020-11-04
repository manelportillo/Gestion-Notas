<?php
require_once 'nota.php';
class NotaDao{
    private $pdo;

    public function __construct(){
        require_once 'conexion.php';
        $this->pdo=$pdo;
    }

    public function notas(){
        $id=$_GET['id_alumnomodi'];
        $query = "SELECT * FROM tbl_nota WHERE id_alumno=?";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);

    }

    public function lecturamodi($id){
        $query = "SELECT * FROM tbl_alumnos WHERE id_alumno=?";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->execute();
        $alumno=$sentencia->fetch(PDO::FETCH_ASSOC);
        return $alumno;
    }

    public function cambioNotas(){
        try {
            $this->pdo->beginTransaction(); 
            $nota1=$_POST['nota0'];
            $nota2=$_POST['nota1'];
            $nota3=$_POST['nota2'];
            $query="UPDATE tbl_nota SET Nota_alumno = ? WHERE id_alumno LIKE ? AND nombre_asignatura LIKE 'Mates'";
            $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$nota1);
                $sentencia->bindParam(2,$id);
                $sentencia->execute();
            $query2="UPDATE tbl_nota SET Nota_alumno = ? WHERE id_alumno LIKE ? AND nombre_asignatura LIKE 'Fisica'";
            $sentencia2=$this->pdo->prepare($query2);
                $sentencia2->bindParam(1,$nota2);
                $sentencia2->bindParam(2,$id);
                $sentencia2->execute();
            $query3="UPDATE tbl_nota SET Nota_alumno = ? WHERE id_alumno LIKE ? AND nombre_asignatura lIKE 'Programacion'";
            $sentencia3=$this->pdo->prepare($query3);
                $sentencia3->bindParam(1,$nota3);
                $sentencia3->bindParam(2,$id);
                $sentencia3->execute();
            $this->pdo->commit();
            header('Location: zona.admin.php');
        }catch (Exception $ex) {
            /* Reconocer un error y no hacer los cambios */
            $this->pdo->rollback();
            echo $ex->getMessage();
           
        }
    }

    public function nota_media(){
        $query= "SELECT AVG(Nota_alumno), Nombre_asignatura FROM tbl_nota GROUP BY Nombre_asignatura";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $notas_medias=$sentencia->fetchALL(PDO::FETCH_ASSOC);
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>Asignatura</th>";      
        echo "<th scope='col'>Nota media</th>";

        echo "</tr>";
        foreach ($notas_medias as $nota_media){
            echo "<tr>";
            echo "<td> {$nota_media['Nombre_asignatura']}</td>";
            echo "<td> {$nota_media['AVG(Nota_alumno)']}</td>";
            echo "</tr>";

        }
    }

    public function mayor_nota_media(){
        $query="SELECT AVG(Nota_alumno), Nombre_asignatura FROM tbl_nota GROUP BY Nombre_asignatura ORDER BY AVG(Nota_alumno) DESC LIMIT 1";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $mayores_notas_medias=$sentencia->fetchALL(PDO::FETCH_ASSOC);
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>Asignatura </th>";      
        echo "<th scope='col'>Nota media</th>";

        echo "</tr>";
        foreach ($mayores_notas_medias as $mayor_nota_media){
            echo "<tr>";
            echo "<td> {$mayor_nota_media['Nombre_asignatura']} </td>";
            echo "<td> {$mayor_nota_media['AVG(Nota_alumno)']}</td>";
            echo "</tr>";

        }
    }

    public function alumnoConMayorNota(){
        //QUERY HECHA JUNTO A AGNÈS
        $query="SELECT qry_nota_max.nombre_asignatura, qry_nota_max.nota_max, MAX(tbl_alumnos.nombre_alumno) AS alumno FROM (SELECT tbl_nota.nombre_asignatura, MAX(tbl_nota.nota_alumno) AS nota_max FROM tbl_nota GROUP BY tbl_nota.nombre_asignatura) AS qry_nota_max INNER JOIN tbl_nota ON tbl_nota.nombre_asignatura = qry_nota_max.nombre_asignatura AND tbl_nota.nota_alumno = qry_nota_max.nota_max INNER JOIN tbl_alumnos ON tbl_nota.id_alumno = tbl_alumnos.id_alumno GROUP BY tbl_nota.nombre_asignatura ORDER BY tbl_alumnos.nombre_alumno DESC";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $mayores_notas=$sentencia->fetchALL(PDO::FETCH_ASSOC);
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>Asignatura</th>";      
        echo "<th scope='col'>Alumno </th>";
        echo "<th scope='col'>Nota </th>";

        echo "</tr>";
        foreach ($mayores_notas as $mayor_nota){
            echo "<tr>";
            echo "<td> {$mayor_nota['nombre_asignatura']} </td>";
            echo "<td> {$mayor_nota['alumno']}</td>";
            echo "<td> {$mayor_nota['nota_max']}</td>";
            echo "</tr>";

        }
    }

}
?>