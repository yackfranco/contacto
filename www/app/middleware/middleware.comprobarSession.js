/**
 * middleware el cual comprueba si hay una session en linea
 * 
 */
function middlewareEntrada($this, $sessionStorage) {
    if (typeof $sessionStorage.usuario == "undefined") {
        $this.redirectTo('/');
    } else {
        $this.next();
    }
    ;
}