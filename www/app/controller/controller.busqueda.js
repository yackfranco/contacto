angular.module('contacto').controller('busquedaController', ['$scope', '$location', '$sessionStorage', 'crudContactoService', function ($scope, $location, $sessionStorage, crudContactoService) {
        $scope.mod = {};
        $scope.cargarDatos = {};
        $scope.bus = {};
        $scope.buscando = $sessionStorage.textoBuscar.texto;
        $scope.bus.texto = $sessionStorage.textoBuscar.texto;
        $scope.bus.accion = "buscar";

        crudContactoService.crud($scope.bus).then(function successCallback(respuesta) {
            console.log(respuesta);
            $scope.cargarDatos = respuesta.data.contactos;
            $scope.bus.texto = "";
//            $location.path("/busqueda");
        }, function errorCallback(respuesta) {

        });

        $scope.buscar = function () {
            $sessionStorage.textoBuscar = $scope.bus;
            console.log($scope.bus);
            $location.path("/busqueda");
//            delete $sessionStorage.textoBuscar;
            location.reload(true);
        }

        $scope.editarRegistro = function (x) {
            $sessionStorage.datosContacto = x;
            $location.path("/editarContacto");
        }


        $scope.eliminar = function (x) {
            $scope.mod.nombre = x.nombre;
            $scope.mod.apellido = x.apellido;
            $scope.mod.id =parseInt( x.id_contactos);
            $scope.mod.accion = "eliminar";
        }

        $scope.confirmarEliminar = function () {
            crudContactoService.crud($scope.mod).then(function successCallback(respuesta) {
                console.log(respuesta);
                $location.path("/busqueda");
//            delete $sessionStorage.textoBuscar;
                location.reload(true);
            }, function errorCallback(respuesta) {

            })
            console.log($scope.mod);
        }


    }]);
