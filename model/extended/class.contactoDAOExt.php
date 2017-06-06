<?php

class contactoDAOExt extends contactoDAO {

  public function search($text) {
    $sql = "SELECT nombre, apellido, foto, celular, correo FROM contactos where nombre like '%:text%' or apellido like '%:text%'";
    $params = array(
        ':text' => $text
    );
    return $this->query($sql, $params);
  }

}
