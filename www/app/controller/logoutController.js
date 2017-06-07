angular.module('contacto').controller('logoutController', ['$scope', '$location','$sessionStorage', function ($scope, $location,$sessionStorage) {
        delete $sessionStorage;
        $location.path("/");

    }]);

