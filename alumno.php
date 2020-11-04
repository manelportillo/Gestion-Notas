<?php
  include 'persona.php';
  class Alumno extends Persona{
      private $nombre_alumno;
      private $apellidoprin_alumno;
      private $apellidosec_alumno;
      private $grupo_alumno;
      
      function __construct($id,$email,$passwd,$nombre_alumno,$apellidoprin_alumno,$apellidosec_alumno,$grupo_alumno){
        parent::__construct($id,$email,$passwd);
        $this->nombre_alumno=$nombre_alumno;
        $this->apellidoprin_alumno=$apellidoprin_alumno;
        $this->apellidosec_alumno=$apellidosec_alumno;
        $this->grupo_alumno=$grupo_alumno;
      }

      /**
       * Get the value of nombre_alumno
       */ 
      public function getNombre_alumno()
      {
            return $this->nombre_alumno;
      }

      /**
       * Set the value of nombre_alumno
       *
       * @return  self
       */ 
      public function setNombre_alumno($nombre_alumno)
      {
            $this->nombre_alumno = $nombre_alumno;

            return $this;
      }

      /**
       * Get the value of apellidoprin_alumno
       */ 
      public function getApellidoprin_alumno()
      {
            return $this->apellidoprin_alumno;
      }

      /**
       * Set the value of apellidoprin_alumno
       *
       * @return  self
       */ 
      public function setApellidoprin_alumno($apellidoprin_alumno)
      {
            $this->apellidoprin_alumno = $apellidoprin_alumno;

            return $this;
      }

      /**
       * Get the value of apellidosec_alumno
       */ 
      public function getApellidosec_alumno()
      {
            return $this->apellidosec_alumno;
      }

      /**
       * Set the value of apellidosec_alumno
       *
       * @return  self
       */ 
      public function setApellidosec_alumno($apellidosec_alumno)
      {
            $this->apellidosec_alumno = $apellidosec_alumno;

            return $this;
      }

      /**
       * Get the value of grupo_alumno
       */ 
      public function getGrupo_alumno()
      {
            return $this->grupo_alumno;
      }

      /**
       * Set the value of grupo_alumno
       *
       * @return  self
       */ 
      public function setGrupo_alumno($grupo_alumno)
      {
            $this->grupo_alumno = $grupo_alumno;

            return $this;
      }
  }
?>