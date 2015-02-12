/**
 * User: isra
 * Date: 21/10/12
 * Time: 3:06
 */
 
//mostramos la información que deseamos al pasar el ratón por el campo
$(document).ready(function(){
    $("#first_name").mouseenter(function(){
        if( $("#first_name").val() == ""){
            $("#first_name").focus().after("<span id='info' class='first_name'> * Campo Obligatorio</span>");
        }
    });
    $("#last_name").mouseenter(function(){
        if( $("#last_name").val() == ""){
            $("#last_name").focus().after("<span id='info' class='last_name'> * Campo Obligatorio</span>");
        }
    });
     $("#cedula").mouseenter(function(){
        if( $("#cedula").val() == ""){
            $("#cedula").focus().after("<span id='info' class='cedula'> * Campo Obligatorio</span>");
        }
    });
    $("#direccion").mouseenter(function(){
        if( $("#direccion").val() == ""){
            $("#direccion").focus().after("<span id='info' class='direccion'> * Campo Obligatorio</span>");
        }
    });
    $("#nomcontacto").mouseenter(function(){
        if( $("#nomcontacto").val() == ""){
            $("#nomcontacto").focus().after("<span id='info' class='nomcontacto'> * Campo Obligatorio</span>");
        }
    });
    $("#phonecontacto").mouseenter(function(){
        if( $("#phonecontacto").val() == ""){
            $("#phonecontacto").focus().after("<span id='info' class='phonecontacto'> * Campo Obligatorio</span>");
        }
    });
    
});
 
//al sacar el mouse hacemos desaparecer la advertencia que se mostraba
$(document).ready(function(){
    $("#first_name").mouseleave(function(){
        $(".first_name").fadeOut(300);
    });
    $("#last_name").mouseleave(function(){
        $(".last_name").fadeOut(300);
    });
     $("#cedula").mouseleave(function(){
        $(".cedula").fadeOut(300);
    });
    $("#phone").mouseleave(function(){
        $(".phone").fadeOut(300);
    });
    $("#direccion").mouseleave(function(){
        $(".direccion").fadeOut(300);
    });
    $("#nomcontacto").mouseleave(function(){
        $(".nomcontacto").fadeOut(300);
    });
    $("#phonecontacto").mouseleave(function(){
        $(".phonecontacto").fadeOut(300);
    });
    
});
 
//lo mismo que lo anterior pero al escribir, aquí podéis hacer
//las validaciones más estrictas dependiendo de cada campo
$(document).ready(function(){
    $("#first_name").keyup(function(){
        $(".first_name").fadeOut(1);
    });
    $("#apellidos").keyup(function(){
        $(".apellidos").fadeOut(300);
    });
    $("#emai").keyup(function(){
        $(".email").fadeOut(300);
    });
    $("#telefono").keyup(function(){
        $(".telefono").fadeOut(300);
    });
    $("#asunto").keyup(function(){
        $(".asunto").fadeOut(300);
    });
    $("#mensaje").keyup(function(){
        $(".mensaje").fadeOut(300);
    });
});
 //////////////////ojo cedula
// function NotIsCI($CI)
//{
//   if (!ctype_digit($CI))
//      return 'El campo <b>Cédula de Identidad</b> solo acepta números';
//   elseif (substr($CI,0,1) == 0)
//      return 'La <b>Cédula de Identidad</b> no puede comenzar por cero (0)';
//   elseif (strlen($CI) > 8)
//      return 'La <b>Cédula de Identidad</b> debe ser menor o igual a ocho (8)';
//   else
//      return false;
//}
