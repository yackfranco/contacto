angular.module('contacto').controller('editarContactoController', ['$scope', '$sessionStorage', 'crudContactoService', '$location', function ($scope, $sessionStorage, crudContactoService, $location) {
        delete $sessionStorage.textoBuscar;
        $scope.contacto = {};
        $scope.contacto.nombre = $sessionStorage.datosContacto.nombre;
        $scope.contacto.apellido = $sessionStorage.datosContacto.apellido;
        $scope.contacto.celular = $sessionStorage.datosContacto.celular;
        $scope.contacto.correo = $sessionStorage.datosContacto.correo;
        $scope.contacto.id = $sessionStorage.datosContacto.id_contactos;
        $scope.bus = {};

        $scope.buscar = function () {
            $sessionStorage.textoBuscar = $scope.bus;
            console.log($scope.bus);
            $location.path("/busqueda");
        }

        $scope.editarRegistro = function () {
            $scope.contacto.accion = "editar";
            crudContactoService.crud($scope.contacto).then(function successCallback(respuesta) {
                $scope.contacto = {};
                $sessionStorage.accionCrud = "editado";
                delete $sessionStorage.datosContacto;
                $location.path("/menuPrincipal");
            }, function errorCallback(respuesta) {

            });
        }


//        delete $sessionStorage.datosContacto;
    }]);
