<?php 
include 'persona.php';
class Administrador extends Persona {
    function __construct($id,$email,$passwd){
        parent::__construct($id,$email,$passwd);
    }
}
?>