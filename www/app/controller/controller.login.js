angular.module('contacto').controller('loginController', ['$scope','cesSeguridad','$sessionStorage','$location',function ($scope,cesSeguridad,$sessionStorage,$location) {    
        $scope.datos={};
        $scope.usuarioErroneo=false;
        $scope.entrar = function(){
            cesSeguridad.login($scope.datos).then(function successCallback(respuesta){
                console.log(respuesta);
                if(respuesta.data.codigo===200){
                    $sessionStorage.usuario = respuesta.data.usuario[0];
                        $location.path("/menuPrincipal");
                    console.log("Entro");
                }else{
                    console.log("No Entro");
                    $scope.usuarioErroneo=true;
                };
            },function errorCallback(respuesta){
                console.log("Error:   "+respuesta);
            });
            
        };
  }]);
