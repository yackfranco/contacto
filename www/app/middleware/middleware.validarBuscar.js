/**
 * middleware el cual comprueba si hay una session en linea
 * 
 */
function middlewarevalidarBuscar($this, $sessionStorage) {
 if(typeof $sessionStorage.textoBuscar=="undefined"){
     $this.redirectTo("/menuPrincipal");
 }else{
     $this.next();
 }
}