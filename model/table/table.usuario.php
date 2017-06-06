<?php

class usuario {

  private $id_usuario;
  private $usuario;
  private $contrasena;
  private $created_at;
  private $updated_at;
  private $deleted_at;
  
  function getId_usuario() {
      return $this->id_usuario;
  }

  function getUsuario() {
      return $this->usuario;
  }

  function getContrasena() {
      return $this->contrasena;
  }

  function getCreated_at() {
      return $this->created_at;
  }

  function getUpdated_at() {
      return $this->updated_at;
  }

  function getDeleted_at() {
      return $this->deleted_at;
  }

  function setId_usuario($id_usuario) {
      $this->id_usuario = $id_usuario;
  }

  function setUsuario($usuario) {
      $this->usuario = $usuario;
  }

  function setContrasena($contrasena) {
      $this->contrasena = $contrasena;
  }

  function setCreated_at($created_at) {
      $this->created_at = $created_at;
  }

  function setUpdated_at($updated_at) {
      $this->updated_at = $updated_at;
  }

  function setDeleted_at($deleted_at) {
      $this->deleted_at = $deleted_at;
  }


}