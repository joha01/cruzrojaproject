
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$ac;
$js = array(
    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js'
);

echo jsload($js);
?>
<script src="http://code.jquery.com/jquery-1.7.js"></script> <script type="text/javascript">
    
</script>
<?php
$css = array(
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap.min.css',
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap-theme.css',
    base_url().'/resources/bootstrap-3.2.0/css/dashboard.css'
);

echo csslink($css);

$options = array(
   'SIN REVISIÓN'=>'Sin Revisión',
   'REVISADO'=>'Revisado'
 );
echo Open('div', array('class'=>'container'));

$this->load->view('templates/header.php');

echo Open('div', array('class'=>'row'));

    $this->load->view('templates/slidebar.php');
    
    echo Open('div', array('class'=>'col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'));  
  
   
    
    if ($result) {
	foreach ($result->result() as $row) {      
            echo tagcontent('div', '', array('id'=>'newuserout'));
            echo Open('form',array('class'=>'form-horizontal','method'=>'post','action'=>  base_url().'main/ver_user'));
                echo input(array('type'=>'hidden','name'=>'id','value'=>$row->id));
                
                ?>
                
                 <h2 class="sub-header">Información Personal</h2>

                <?php
                
                $label = tagcontent('label', 'ESTADO ACTUAL', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'active','value'=>$row->active,'disabled'=>'disabled', 'class'=>'form-control')), array('class'=>'col-md-10'));
                

                 echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'NOMBRE', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'first_name','value'=>$row->first_name, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
               
                $label = tagcontent('label', 'APELLIDO', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'last_name','value'=>$row->last_name, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'CÉDULA', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'cedula','value'=>$row->cedula, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'GÉNERO', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'genero','value'=>$row->genero,'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'PESO', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'peso','value'=>$row->peso, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'TELÉFONO', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'phone','value'=>$row->phone, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'FECHA DE NACIMIENTO', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'fnacimiento','value'=>$row->fnacimiento, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'DIRECCIÓN', array('class'=>'col-md-2'));
                $input = tagcontent('div' , input(array('name'=>'direccion','value'=>$row->direccion, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group') );?>
                 
                 <br> <br>
                 <h2 class="sub-header">Historial Médico</h2>

                <?php
                $label = tagcontent('label', 'ENFERMEDAD', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'nombre_enfermedad','value'=>$row->nombre_enfermedad, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'MEDICAMENTO', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'medicamento','value'=>$row->medicamento, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'DISCAPACIDAD', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'discapacidad','value'=>$row->discapacidad, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'ALERGIA', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'alergia','value'=>$row->alergia, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'GRUPO SANGUINEO', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'tiposangre','value'=>$row->tiposangre, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                
                $label = tagcontent('label', 'Observacion', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'observacion','value'=>$row->observacion,'class'=>'form-control')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
              

//                echo ($row->active) ? anchor("auth/deactivate/".$row->id, 'ACTIVO') :  anchor("auth/activate/".$row->id, 'INACTIVO');
                  
                
                echo '<hr/><div class="col-md-12">'.input(array('type'=>'submit','id'=>'ajaxformbtn','data-target'=>'newuserout','value'=>'Guardar el Usuario','class'=>'btn btn-primary pull-right')).'</div>';    
            echo Close('form');

        }  
                
             
    }
    echo Close('div'); //cierra div .col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main    
    echo Close('div'); //cierra div .row
    echo Close('div');
//
//$js = array(
//    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
//    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js'
//);
//
//echo jsload($js);
/////////////////////////////////////////////////////
$this->load->view('templates/notif_alertamedica');
////////////////////////////////////////////////////
?>
