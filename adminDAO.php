<?php
require_once 'administrador.php';
class AdminDao{
    private $pdo;
    public function __construct(){
        include 'conexion.php';
        $this->pdo=$pdo;
    }
    public function login($admin){
        $query = "SELECT * FROM tbl_administrador WHERE email_administrador=? AND passwd_administrador=?";
        $sentencia=$this->pdo->prepare($query);
        $email=$admin->getEmail();
        $passwd=$admin->getPasswd();
        $sentencia->bindParam(1,$email);
        $sentencia->bindParam(2,$passwd);
        $sentencia->execute();
        // $result=$sentencia->fetch(PDO::FETCH_ASSOC);
        $numRow=$sentencia->rowCount();
        if($numRow==1){
            session_start();
            $_SESSION['admin']=$admin;
            return true;
        }else {
            return false;
        }
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
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
}

?>  