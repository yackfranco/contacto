<?php

class usuarioDAOExt extends usuarioDAO {

  public function search($usuario, $contrasena) {
    $sql = 'SELECT id_usuario,contrasena,usuario FROM usuario WHERE usuario = :user AND contrasena = :contra';
    $params = array(
        ':user' => $usuario,
        ':contra' => $contrasena,
    );
    return $this->query($sql, $params);
  }

}
