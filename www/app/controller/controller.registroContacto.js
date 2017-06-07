angular.module('contacto').controller('registroContacto', ['$scope', 'crudContactoService', '$sessionStorage', '$location', function ($scope, crudContactoService, $sessionStorage, $location) {
        $scope.contacto = {};
        delete $sessionStorage.textoBuscar;
        $scope.guardar = function () {
            $scope.contacto.accion = "guardar";
//            console.log($scope.contacto);
            crudContactoService.crud($scope.contacto).then(function successCallback(respuesta) {
                $scope.contacto = {};
                $sessionStorage.accionCrud = "insertado";
                $location.path("/menuPrincipal");
                $scope.tContacto = respuesta.data.contactos;
            }, function errorCallback(respuesta) {

            });
        }
        $scope.buscar = function () {
            $sessionStorage.textoBuscar = $scope.bus;
            console.log($scope.bus);
            $location.path("/busqueda");
        }

    }]);
