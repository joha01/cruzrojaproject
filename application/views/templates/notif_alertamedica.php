<style>

#info{ position:fixed; width:100%; height:20px;-webkit-box-shadow: 0 1px 2px #666;box-shadow: 0 1px 2px #666; top:0; padding:10px; background-color:#F60; color:#FFF; font-size:14px;}

.lessoncup{ width:300px;height:200px;margin:0 auto;margin-top:100px; margin-bottom:100px;}

.box{border:solid #09C 1px; border-radius:1px; padding:5px; resize:none; width:290px; height:100px; outline:none;}

.btn{padding:10px; border:0; margin:5px 0 0 0; background-color:#09C; color:#FFF;cursor:pointer; float:left; margin-right:5px;}

li{margin:0; padding:0; list-style:none; cursor:pointer;}

#alerts:hover, #alerts2:hover{background-color:#C6D3EC;}

#loader{margin:10px;}

#alerts{ margin:5px;padding:4px; border:solid #9dabc9 1px; width:250px; height:100px;border-radius:5px; background-color:#e2e7ee}
#alerts2{ margin:5px;padding:4px; border:solid #9dabc9 1px; width:250px; height:100px;border-radius:5px; background-color:#e2e7ee}

#alertbox{ position:fixed; width:250px; height:auto; right: 100px; bottom:10px;}
#alertbox2{ position:fixed; width:250px; height:auto; right: 500px; bottom:10px;}


</style>
   
 ?>


<script>
   

$(document).ready(function(){
 
    setInterval(mostrar_alerta, 7000);			
    setInterval(mostrar_alerta2, 10000);			
});

function mostrar_alerta(){
    $.ajax({
            type:'POST',
            url: 'http://localhost/cruzrojaproject/alertamedica/notifications',
//            data:datasend,
            cache:false,
            success:function(msg){

//                    $('#box').val('');
//                    $('#loader').hide();
                    $('#alertbox').fadeIn('slow').prepend(msg);

                    $('#alerts').delay(6000).fadeOut('slow');

            }

    });
}

function mostrar_alerta2(){
    $.ajax({
            type:'POST',
            url: 'http://localhost/cruzrojaproject/botonpanico/notifications',
//            data:datasend,
            cache:false,
            success:function(msg){

//                    $('#box').val('');
//                    $('#loader').hide();
                    $('#alertbox2').fadeIn('slow').prepend(msg);

                    $('#alerts2').delay(6000).fadeOut('slow');

            }

    });
}

</script>

<div id="alertbox">

</div>  
<div id="alertbox2">

</div>  

