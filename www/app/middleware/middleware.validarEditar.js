/**
 * middleware el cual comprueba si hay una session en linea
 * 
 */
function middlewarevalidarEditar($this, $sessionStorage) {
 if(typeof $sessionStorage.datosContacto=="undefined"){
     $this.redirectTo("/menuPrincipal");
 }else{
     $this.next();
 }
}