/*** no editar ***/
function cargarAjax(url,datos){
var contenidoAjax = false;
if(window.XMLHttpRequest) {
contenidoAjax = new XMLHttpRequest();
}else if(window.ActiveXObject) {
contenidoAjax = new ActiveXObject("Microsoft.XMLHTTP");
}else{
alert('Su navegador no soporta Ajax');
}

if(url == control){
contenidoAjax.onreadystatechange=function(){
controlCambios(contenidoAjax);
}

//var cacheParam=(control.indexOf("?")!=-1)? "&"+ new Date().getTime() : "?"+ new Date().getTime();
contenidoAjax.open('GET', control +'?rnd=' + new Date().getTime(), true);
}else{
contenidoAjax.onreadystatechange=function(){
cargaDatos(contenidoAjax,datos);
}

//var cacheParam=(phpbd.indexOf("?")!=-1)? "&"+ new Date().getTime() : "?"+ new Date().getTime();
contenidoAjax.open('GET', phpbd + '?rnd=' + new Date().getTime(), true);
}

contenidoAjax.send(null);
}

function controlCambios(contenidoAjax){
if(contenidoAjax.readyState == 4 && (contenidoAjax.status==200 || window.location.href.indexOf("http")==-1)){

//console.log('verificando cambios...');
//alert(contenidoAjax.responseText);
var act = contenidoAjax.responseText.substring(0,2);
var losDatos = contenidoAjax.responseText.substring(3)
if(act == 'si'){
//console.log('hubo modificaciones en BD');
cargarAjax(phpbd,losDatos);
}
}
}		

function cargaDatos(contenidoAjax,datos){
if(contenidoAjax.readyState == 4 && (contenidoAjax.status==200 || window.location.href.indexOf("http")==-1)){
//console.log('Actualizando Contenido del div');
document.getElementById(div_entradas).innerHTML = contenidoAjax.responseText;
//console.log('datos', datos);
	if(notifica == 1){
	notificar(datos);
	}
}
}

function ocultar(){
document.getElementById(notificaciones).style.display  ='none';
}

setInterval("cargarAjax('" +control+"')", tiempo);