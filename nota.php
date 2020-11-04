<?php
class Nota {
    private $nombre_asignatura;
    private $id_nota;
    private $nota_alumno;
    private $id_alumno;
    static $nota_media;

    function __construct($id_alumno,$nombre_asignatura,$id_nota,$nota_alumno)
    {
        $this->nombre_asignatura=$nombre_asignatura;
        $this->id_nota=$id_nota;
        $this->nota_alumno=$nota_alumno;     
        $this->id_alumno=$id_alumno;
    }

    /**
     * Get the value of nombre_asignatura
     */ 
    public function getNombre_asignatura()
    {
        return $this->nombre_asignatura;
    }

    /**
     * Set the value of nombre_asignatura
     *
     * @return  self
     */ 
    public function setNombre_asignatura($nombre_asignatura)
    {
        $this->nombre_asignatura = $nombre_asignatura;

        return $this;
    }

    /**
     * Get the value of id_nota
     */ 
    public function getId_nota()
    {
        return $this->id_nota;
    }

    /**
     * Set the value of id_nota
     *
     * @return  self
     */ 
    public function setId_nota($id_nota)
    {
        $this->id_nota = $id_nota;

        return $this;
    }

    /**
     * Get the value of nota_alumno
     */ 
    public function getNota_alumno()
    {
        return $this->nota_alumno;
    }

    /**
     * Set the value of nota_alumno
     *
     * @return  self
     */ 
    public function setNota_alumno($nota_alumno)
    {
        $this->nota_alumno = $nota_alumno;

        return $this;
    }

    /**
     * Get the value of id_alumno
     */ 
    public function getId_alumno()
    {
        return $this->id_alumno;
    }

    /**
     * Set the value of id_alumno
     *
     * @return  self
     */ 
    public function setId_alumno($id_alumno)
    {
        $this->id_alumno = $id_alumno;

        return $this;
    }

    /**
     * Get the value of nota_media
     */ 
    public function getNota_media()
    {
        return $this->nota_media;
    }

    /**
     * Set the value of nota_media
     *
     * @return  self
     */ 
    public function setNota_media($nota_media)
    {
        $this->nota_media = $nota_media;

        return $this;
    }
}
?>