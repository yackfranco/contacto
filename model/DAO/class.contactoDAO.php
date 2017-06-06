<?php

/**
 * conjunto de funciones para la tabla ces_usuario
 */
class contactoDAO extends dataSource implements IContacto {

    /**
     * funcion para hacer borrado logico o permanente
     * @param type $id
     * @param type $logico
     * @return integer
     */
    public function delete($id, $logico = true) {

        if ($logico === true) {
            $sql = 'UPDATE contactos SET deleted_at = now() WHERE id_contactos = :id';
        } else {
            $sql = 'DELETE contactos WHERE id_contactos = :id';
        }

        $params = array(
            ':id' => $id
        );
        return $this->execute($sql, $params);
    }

    /**
     * funcion para insertar nuevo usuario
     * @param \usuario $usuario
     * @return integer
     */
    public function insert(\contacto $contacto) {
        $sql = 'INSERT INTO contactos (nombre,apellido,celular,correo,created_at) VALUES (:nombre,:apellido,:cel,:correo,now())';
        $params = array(
            ':nombre' => $contacto->getNombre(),
            ':apellido' => $contacto->getApellido(),
            ':cel' => $contacto->getCelular(),
            'correo'=>$contacto->getCorreo()
        );
        return $this->execute($sql, $params);
    }

    /**
     * funcion para seleccionar todos los usuarios
     * @return array of stdClass
     */
    public function select() {
        $sql = 'SELECT id_contactos,nombre,apellido,celular,foto,correo FROM contactos WHERE deleted_at IS NULL';
        return $this->query($sql);
    }

    /**
     * funcion para seleccionar uduarios por id
     * @param type $id
     * @return array of stdClass
     */
    public function selectById($id) {
        $sql = 'SELECT usuario,contrasena,rol FROM usuario WHERE id_usuario = :id';
        $params = array(
            ':id' => $id
        );
        return $this->query($sql, $params);
    }

    /**
     * funcion para actulizar usuarios
     * @param \usuario $usuario
     * @return integer
     */
    public function update(\contacto $contacto) {
        $sql = 'UPDATE contactos SET nombre=:nombre, apellido=:apellido, celular=:celular, foto=:foto,correo=:correo WHERE id_contactos=:id';
        $params = array(
            ':id' => $contacto->getId_contactos(),
            ':nombre'=>$contacto->getNombre(),
            ':apellido'=>$contacto->getApellido(),
            ':celular'=>$contacto->getCelular(),
            ':foto'=>$contacto->getFoto(),
            ':correo'=>$contacto->getCorreo()
        );
        return $this->execute($sql, $params);
    }

}
