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
            $id=$_POST['idalu'];
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

}
?>