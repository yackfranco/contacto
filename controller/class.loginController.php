<?php

class login extends controllerExtends {

    public function main(\request $request) {
        try {
            $this->loadTableUsuario();

            $user = $request->getParam('usuario');
            $contra = hash('md5', $request->getParam('contrasena'));
            
            $usuarioDAO = new usuarioDAOExt($this->getConfig());
            $respuesta1 = $usuarioDAO->search($user, $contra);
            $respuesta2 = array(
                'codigo' => (count($respuesta1) > 0) ? 200 : 500,
                'usuario' => $respuesta1
            );

            $this->setParam('rsp', $respuesta2);
            $this->setView('imprimirJson');
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    private function loadTableUsuario() {
        require $this->getConfig()->getPath() . 'model/table/table.usuario.php';
        require $this->getConfig()->getPath() . 'model/interface/interface.usuario.php';
        require $this->getConfig()->getPath() . 'model/DAO/class.usuarioDAO.php';
        require $this->getConfig()->getPath() . 'model/extended/class.usuarioDAOExt.php';
    }

}
