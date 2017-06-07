angular.module('contacto').config(['$middlewareProvider',
    function middlewareProviderConfig($middlewareProvider) {
        $middlewareProvider.map({
            'comprobarSession': ['$localStorage', '$sessionStorage', function comprobarSession($localStorage, $sessionStorage) {
                    middlewareEntrada(this, $sessionStorage);
                }],
            'validarEditar': ['$localStorage', '$sessionStorage', function validarEditar($localStorage, $sessionStorage) {
                    middlewarevalidarEditar(this, $sessionStorage);
                }],
            'validarBuscar': ['$localStorage', '$sessionStorage', function validarBuscar($localStorage, $sessionStorage) {
                    middlewarevalidarBuscar(this, $sessionStorage);
                }]
        });
    }]);


angular.module('contacto').config(['$routeProvider', '$httpProvider', function config($routeProvider, $httpProvider) {
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
        $routeProvider.
                when('/', {
                    controller: 'loginController',
                    templateUrl: 'app/template/login.html'
                }).
                when('/menuPrincipal', {
                    controller: 'menuPrincipalController',
                    templateUrl: 'app/template/menuPrincipal.html',
                    middleware: ['comprobarSession']
                }).
                when('/registroContacto', {
                    controller: 'registroContacto',
                    templateUrl: 'app/template/registroContacto.html',
                    middleware: ['comprobarSession']

                }).
                when('/busqueda', {
                    controller: 'busquedaController',
                    templateUrl: 'app/template/busqueda.html',
                    middleware: ['comprobarSession','validarBuscar']

                }).
                when('/editarContacto', {
                    controller: 'editarContactoController',
                    templateUrl: 'app/template/editarContacto.html',
                    middleware: ['comprobarSession', 'validarEditar']

                }).
                when('/logout', {
                    controller: 'logoutController',
                    template: "",
                    middleware: ['comprobarSession']

                }).
                
        otherwise('/menuPrincipal');
    }]);
