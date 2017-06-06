angular.module('contacto').service('cesSeguridad', ['$http', function ($http) {
    this.login = function (data) {
      return $http.post('http://localhost/contacto/www/server.php/login', $.param(data));
    };

  }]);