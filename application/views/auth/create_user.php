<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head> 
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
        $(function(){
           $("#obtener_valor").click(function(){
              var valor_seleccionado = $( "#mi_select option:selected" ).val();
              alert(valor_seleccionado);
           });
        });
    </script>
    
       <?php 
       
    $css = array(
        'http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css',
        base_url().'/resources/bootstrap-3.2.0/css/bootstrap.min.css',
        base_url().'/resources/bootstrap-3.2.0/css/bootstrap-theme.css',
        base_url().'/resources/bootstrap-3.2.0/css/dashboard.css'
    );?>
    
</head>

                  
 <div id="datetimepicker" class="input-append date"></div>
    <script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script>  
<?php
echo csslink($css);


echo Open('div', array('class'=>'container'));

$this->load->view('templates/header.php');

echo Open('div', array('class'=>'row'));

    $this->load->view('templates/slidebar.php');
 ?>
     
    <?php
    echo Open('div', array('class'=>'col-sm-20 col-sm-offset-4 col-md-5 col-md-offset-3 main'));  
?>

<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>
<?php

 $options = array(
   'DESCONOCE'=>'Desconoce',
   'A+'=>'A+',
   'A-'=>'A-',
   'B+'=>'B+',
   'B-'=>'B-',
   'O+'=>'O+',
   'O-'=>'O-',
   'AB+'=>'AB+',
   'AB-'=>'AB-'
 );
$options2 = array(
   'FEMENINO'=>'Femenino',
   'MASCULINO'=>'Masculino'
 );

$optionspeso = array(
   'LIBRAS'=>'Libras',
   'KILOS'=>'Kilos'
 );

$first_name = array(
    'name' => 'first_name',
    'id' => 'first_name',
    'class' =>  'cajas',
    'value' =>  set_value('first_name'),
    'placeholder' => 'Escriba su nombre',
);
$last_name = array(
    'name' => 'last_name',
    'id' => 'last_name',
    'class' =>  'cajas',
    'value' =>  set_value('last_name'),
    'placeholder' => 'Escriba su apellido',
);
$cedula = array(
    'name' => 'cedula',
    'id' => 'cedula',
    'class' =>  'cajas',
    'value' =>  set_value('cedula'),
    'placeholder' => 'Escriba su cédula',
);
$email = array(
    'name' => 'email',
    'id' => 'email',
    'class' =>  'cajas',
  
    'value' =>  set_value('email'),
    'placeholder' => 'Escriba su email',
);
$phone = array(
    'name' => 'phone',
    'id' => 'phone',
    'class' =>  'cajas',
    'value' =>  set_value('phone'),
    'placeholder' => 'Escriba su teléfono',
);
$codtarjeta = array(
    'name' => 'codtarjeta',
    'id' => 'codtarjeta',
    'class' =>  'cajas',
    'value' =>  set_value('codtarjeta'),
    'placeholder' => 'Escriba el código de su tarjeta sim',
);
$direccion = array(
    'name' => 'direccion',
    'id' => 'direccion',
    'class' =>  'cajas',
    'value' =>  set_value('direccion'),
    'placeholder' => 'Escriba su dirección',
);
$discapacidad = array(
    'name' => 'discapacidad',
    'id' => 'discapacidad',
    'class' =>  'cajas',
    'value' =>  set_value('talla'),
    'placeholder' => 'Escriba su discapacidad',
);
$nombre_enfermedad = array(
    'name' => 'nombre_enfermedad',
    'id' => 'nombre_enfermedad',
    'class' =>  'cajas',
    'value' =>  set_value('nombre_enfermedad'),
    'placeholder' => 'Escriba su enfermedad',
);
$medicamento = array(
    'name' => 'medicamento',
    'id' => 'medicamento',
    'class' =>  'cajas',
    'value' =>  set_value('medicamento'),
    'placeholder' => 'Escriba los medicamentos',
);
$alergia = array(
    'name' => 'alergia',
    'id' => 'alergia',
    'class' =>  'cajas',
    'value' =>  set_value('alergia'),
    'placeholder' => 'Escriba sus alergias',
);
$peso = array(
    'name' => 'peso',
    'id' => 'peso',
    'class' =>  'cajas',
    'value' =>  set_value('peso'),
    'placeholder' => 'Escriba su peso',
);

$nomcontacto = array(
    'name' => 'nomcontacto',
    'id' => 'nomcontacto',
    'class' =>  'cajas',
    'value' =>  set_value('nomcontacto'),
    'placeholder' => 'Escriba el nombre de un contacto',
);
$phonecontacto = array(
    'name' => 'phonecontacto',
    'id' => 'phonecontacto',
    'class' =>  'cajas',
    'value' =>  set_value('phonecontacto'),
    'placeholder' => 'Escriba el teléfono de un contacto',
);

?>

<?php echo form_open("auth/create_user");?>


<form id="registration-form" class="form-horizontal">
<div class="form-control-group">
            <label class="control-label" for="name">Your Name</label>
<div class="controls">
              <input type="text" class="input-xlarge" name="name" id="name"></div>
</div>


     <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
            
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
            <?php echo lang('create_user_cedula_label', 'cedula');?> <br />
            <?php echo form_input($cedula);?>
      </p>
      <p>
            <?php echo lang('create_user_fnacimiento_label', 'fnacimiento');?> <br />
                     
    <input  class="datepicker" type="text" placeholder="Ingrese la fecha de nacimiento"  id="example11" name="fnacimiento">
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('.datepicker').datepicker({
                      format: "yyyy-mm-dd",
                      language: "es"
                  }); 
            
            });
        </script>
     </p>
     <p>
             <?php echo lang('create_user_genero_label', 'genero');?> <br />  
             <?php echo form_dropdown('genero', $options2);?>
            
     </p>
     
     <p>
            <?php echo lang('create_user_discapacidad_label', 'discapacidad');?> <br />
            <?php echo form_input($discapacidad);?>
            
      </p>
             
      <p> <div>
            <?php echo lang('create_user_email_label', 'email', '<div class="error">', '</div>');?> <br />
            <?php echo form_input($email);?></div>
      </p>

      
      
      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>
      
      <p>
            <?php echo lang('create_user_codtarjeta_label', 'codtarjeta');?> <br />
            <?php echo form_input($codtarjeta);?>
      </p>

      <p>
            <?php echo lang('create_user_peso_label', 'peso');?> <br />
            
            <?php echo form_input($peso);
             //echo form_dropdown('medidapeso', $optionspeso);?>
            
      </p>

          
       <p>
            <?php echo lang('create_user_direccion_label', 'direccion');?> <br />
            <?php echo form_input($direccion);?>
      </p>

       <p>
             <?php echo lang('create_user_nombre_enfermedad_label', 'nombre_enfermedad');?> <br />   
             <?php echo form_input($nombre_enfermedad);?>
     </p>
         <p>
             <?php echo lang('create_user_medicamento_label', 'medicamento');?> <br />   
             <?php echo form_input($medicamento);?>
     </p>
      <p>
             <?php echo lang('create_user_alergia_label', 'alergia');?> <br />   
             <?php echo form_input($alergia);?>
     </p>
 
     <p>
             <?php echo lang('create_user_tiposangre_label', 'tiposangre');?> <br />  
             
             <?php echo form_dropdown('tiposangre', $options);?>
            
     </p>
     
       <p>
            <?php echo lang('create_user_nomcontacto_label', 'nomcontacto');?> <br />
            <?php echo form_input($nomcontacto);?>
      </p>

      <p>
            <?php echo lang('create_user_phonecontacto_label', 'phonecontacto');?> <br />
            <?php echo form_input($phonecontacto);?>
      </p>
      
      
      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php
        echo form_close();
        echo Close('div'); //cierra div .col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main
    echo Close('div'); //cierra div .row
echo Close('div');


$js = array(
    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js',
    base_url().'/js/bootstrap-datepicker.js',
    base_url('/js/bootstrap-datepicker.es.js')
);

echo jsload($js);
?>

        
</html>