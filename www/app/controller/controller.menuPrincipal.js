angular.module('contacto').controller('menuPrincipalController', ['$scope', '$sessionStorage', '$location','crudContactoService', function ($scope, $sessionStorage, $location,crudContactoService) {
        $scope.contacto={};
        $scope.tContacto={};
        $scope.alerta=false;
        cargarTabla();
        if($sessionStorage.accionCrud==="insertado"){
            $scope.mensajeAlerta = " Contacto Registrado Correctamente";
            $scope.alerta=true;
            delete $sessionStorage.accionCrud;
        }else if($sessionStorage.accionCrud==="editado"){
            $scope.mensajeAlerta = " Contacto Editado Correctamente";
            $scope.alerta=true;
            delete $sessionStorage.accionCrud;
        }
        
        $scope.editar = function (x) {
//            console.log(x);
            $sessionStorage.datosContacto = x;
            $location.path("/editarContacto");
        }
        
        function cargarTabla(){
            $scope.contacto.accion = "cargarTabla";
            crudContactoService.crud($scope.contacto).then(function successCallback(respuesta){
                console.log(respuesta);
                $scope.tContacto = respuesta.data.contactos;
            },function errorCallback(respuesta){
               
            });
        }
        
    }]);
