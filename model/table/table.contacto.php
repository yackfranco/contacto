<?php

class contacto {

  private $id_contactos;
  private $nombre;
  private $apellido;
  private $celular;
  private $foto;
  private $correo;
  private $created_at;
  private $updated_at;
  private $deleted_at;
  
  function getId_contactos() {
      return $this->id_contactos;
  }

  function getNombre() {
      return $this->nombre;
  }

  function getApellido() {
      return $this->apellido;
  }

  function getCelular() {
      return $this->celular;
  }

  function getFoto() {
      return $this->foto;
  }

  function getCorreo() {
      return $this->correo;
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

  function setId_contactos($id_contactos) {
      $this->id_contactos = $id_contactos;
  }

  function setNombre($nombre) {
      $this->nombre = $nombre;
  }

  function setApellido($apellido) {
      $this->apellido = $apellido;
  }

  function setCelular($celular) {
      $this->celular = $celular;
  }

  function setFoto($foto) {
      $this->foto = $foto;
  }

  function setCorreo($correo) {
      $this->correo = $correo;
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