<?php
abstract class Persona{
      protected $email;
      protected $passwd;
      protected $id;

      function __construct($email,$passwd){
          $this->email=$email;
          $this->passwd=$passwd;
      }

      /**
       * Get the value of email
       */ 
      public function getEmail()
      {
            return $this->email;
      }

      /**
       * Set the value of email
       *
       * @return  self
       */ 
      public function setEmail($email)
      {
            $this->email = $email;

            return $this;
      }

      /**
       * Get the value of passwd
       */ 
      public function getPasswd()
      {
            return $this->passwd;
      }

      /**
       * Set the value of passwd
       *
       * @return  self
       */ 
      public function setPasswd($passwd)
      {
            $this->passwd = $passwd;

            return $this;
      }

      /**
       * Get the value of id
       */ 
      public function getId()
      {
            return $this->id;
      }

      /**
       * Set the value of id
       *
       * @return  self
       */ 
      public function setId($id)
      {
            $this->id = $id;

            return $this;
      }
}
?>