angular.module('contacto').service('crudContactoService', ['$http', function ($http) {
    this.crud = function (data) {
      return $http.post('http://localhost/contacto/www/server.php/crudContacto', $.param(data));
    };

  }]);