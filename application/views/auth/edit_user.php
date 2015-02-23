
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head> 
    <!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
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
    
    echo Open('div', array('class'=>'col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'));    
?>
<h1><?php echo lang('edit_user_heading');?></h1>
<p><?php echo lang('edit_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>
<?php
$options2 = array(
   'FEMENINO'=>'Femenino',
   'MASCULINO'=>'Masculino'
 );
?>

<?php echo form_open(uri_string());?>

      <p>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_cedula_label', 'cedula');?> <br />
            <?php echo form_input($cedula);?>
      </p>

     <p>
            <?php echo lang('edit_user_fnacimiento_label', 'fnacimiento');?> <br />
            <?php 
       // print_r($fnacimiento);
          
            ?> 
            <input name="fnacimiento"  class="datepicker fotm-control" type="text" id="example11" name="fnacimiento"  value="<?php $fnacimiento ?>">
            
    <!--<input  class="datepicker" type="text" placeholder="Ingrese la fecha de nacimiento"  id="example11" name="fnacimiento">-->
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
            <?php echo lang('edit_user_genero_label', 'genero');?> <br />
            
             
             <?php echo form_dropdown('genero', $options2);?>
      </p>
     <p>
            <?php echo lang('edit_user_discapacidad_label', 'discapacidad');?> <br />
            <?php echo form_input($discapacidad);?>
            
      </p>
      
      <p>
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>
      
       <p>
            <?php echo lang('edit_user_codtarjeta_label', 'codtarjeta');?> <br />
            <?php echo form_input($codtarjeta);?>
      </p>

       <p>
            <?php echo lang('edit_user_peso_label', 'peso');?> <br />
            <?php echo form_input($peso);?>
      </p>
       <p>
            <?php echo lang('edit_user_direccion_label', 'direccion');?> <br />
            <?php echo form_input($direccion);?>
      </p>
      <p>
            <?php echo lang('edit_user_nombre_enfermedad_label', 'nombre_enfermedad');?> <br />
            <?php echo form_input($nombre_enfermedad);?>
      </p>

       <p>
            <?php echo lang('edit_user_medicamento_label', 'medicamento');?> <br />
            <?php echo form_input($medicamento);?>
      </p>
       <p>
            <?php echo lang('edit_user_alergia_label', 'alergia');?> <br />
            <?php echo form_input($alergia);?>
      </p>
      <p>
            <?php echo lang('edit_user_tiposangre_label', 'tiposangre');?> <br />
            <?php echo form_input($tiposangre);?>
      </p>

      <p>
            <?php echo lang('edit_user_nomcontacto_label', 'nomcontacto');?> <br />
            <?php echo form_input($nomcontacto);?>
      </p>

       <p>
            <?php echo lang('edit_user_phonecontacto_label', 'phonecontacto');?> <br />
            <?php echo form_input($phonecontacto);?>
      </p>
      
      <p>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </p>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo $group['name'];?>
              </label>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <p><?php echo form_submit(array('type'=>'submit','class'=>'btn btn-primary'), lang('edit_user_submit_btn'));?></p>

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


/////////////////////////////////////////////////////
$this->load->view('templates/notif_alertamedica');
////////////////////////////////////////////////////
?>
    
  </html>