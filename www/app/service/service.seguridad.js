angular.module('contacto').service('cesSeguridad', ['$http', function ($http) {
    this.login = function (data) {
      return $http.post('http://localhost/Contactos2/www/server.php/login', $.param(data));
    };

  }]);