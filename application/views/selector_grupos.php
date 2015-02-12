	

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$js = array(
    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/prototype.js'
);
echo jsload($js);
?>
<script src="http://code.jquery.com/jquery-1.7.js"></script> <script type="text/javascript"></script>
  

<?php
$css = array(
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap.min.css',
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap-theme.css',
    base_url().'/resources/bootstrap-3.2.0/css/dashboard.css'
);

echo csslink($css);
$submit = array(
                'value'=> 'visualizar',
                'name' => 'visualizar',
                'id' => 'visualizar'
            );?>
    <h1 class="page-header">GRUPOS Disponibles</h1>   
    <?php echo form_open("main/presentaUsuariosDeGrupo");?>   
    <div class="form-group">
    <?php echo form_label('Grupo: '),form_dropdown('selProfesiones', $grupos);?>
   <?php echo form_submit($submit);?>
    </div> 

    
