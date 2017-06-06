<?php

class crudContacto extends controllerExtends {

    public function main(\request $request) {
        try {
            
//            print_r($request);
//            exit();
            $this->loadTable();
            $Consultascontacto = new contactoDAOExt($this->getConfig());
            if ($request->getParam('accion') === "cargarTabla") {
                $respuesta1 = $Consultascontacto->select();
                $respuesta2 = array(
                    'codigo' => (count($respuesta1) > 0) ? 200 : 500,
                    'contactos' => $respuesta1,
                    'mensaje' => 'tablaCargada'
                );
            }

            if ($request->getParam('accion') === "guardar") {
                $contacto = new contacto();
                $contacto->setApellido($request->getParam('apellido'));
                $contacto->setCelular($request->getParam('celular'));
                $contacto->setCorreo($request->getParam('correo'));
//                $contacto->setFoto($request->getParam('foto'));
                $contacto->setNombre($request->getParam('nombre'));

                $respuesta1 = $Consultascontacto->insert($contacto);
                $respuesta2 = array(
                    'codigo' => (count($respuesta1) > 0) ? 200 : 500,
                    'contactos' => $respuesta1,
                    'mensaje' => 'contactoGuardado'
                );
            }

            if ($request->getParam('accion') === "editar") {
                $contacto = new contacto();
                $contacto->setApellido($request->getParam('apellido'));
                $contacto->setCelular($request->getParam('celular'));
                $contacto->setCorreo($request->getParam('correo'));
//                $contacto->setFoto($request->getParam('foto'));
                $contacto->setNombre($request->getParam('nombre'));
                $contacto->setId_contactos($request->getParam('id'));
                $contacto->setFoto('');

                $respuesta1 = $Consultascontacto->update($contacto);
                $respuesta2 = array(
                    'codigo' => (count($respuesta1) > 0) ? 200 : 500,
                    'contactos' => $respuesta1,
                    'mensaje' => 'contactoEditado'
                );
            }

            $this->setParam('rsp', $respuesta2);
            $this->setView('imprimirJson');
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    private function loadTable() {
        require $this->getConfig()->getPath() . 'model/table/table.contacto.php';
        require $this->getConfig()->getPath() . 'model/interface/interface.contacto.php';
        require $this->getConfig()->getPath() . 'model/DAO/class.contactoDAO.php';
        require $this->getConfig()->getPath() . 'model/extended/class.contactoDAOExt.php';
    }

}
