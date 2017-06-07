<?php

class contactoDAOExt extends contactoDAO {

    public function search($text) {
        $sql = "SELECT id_contactos,nombre, apellido, foto, celular, correo FROM contactos WHERE deleted_at IS NULL AND (nombre like :text or apellido like :text )";
//        $sql = 'SELECT nombre, apellido, foto, celular, correo FROM contactos where nombre like ?';
        $params = array(
            ':text' => (string) "%" . $text . "%"
//            ':text' =>(string) $text
        );
//        print_r($params);
//        exit();
//        $params = "'%" . $text . "%'";
        return $this->query($sql, $params);
    }

}
