
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
$css = array(
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap.min.css',
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap-theme.css',
    base_url().'/resources/bootstrap-3.2.0/css/dashboard.css'
);

echo csslink($css);


$options = array(
   'PENDIENTE'=>'Pendiente',
   'VERDADERA'=>'Verdadera',
    'FALSA'=>'Falsa'
 );

echo Open('div', array('class'=>'container'));

//$this->load->view('templates/header.php');

echo Open('div', array('class'=>'row'));

// $this->load->view('templates/slidebar.php');
    
    echo Open('div', array('class'=>'col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'));   

    
    if ($result) {
	foreach ($result->result() as $row) {
            echo tagcontent('div', '', array('idB'=>'newbotonpanicoout'));
            echo Open('form',array('class'=>'form-horizontal','method'=>'post','action'=>  base_url().'botonpanicoeditarestado/edit_alerta'));
                echo input(array('type'=>'hidden','name'=>'idB','value'=>$row->idB));
                
                $label = tagcontent('label', 'Nombre', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'first_name','value'=>$row->first_name, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'Apellido', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'last_name','value'=>$row->last_name, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'Fecha de Nacimiento', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'fnacimiento','value'=>$row->fnacimiento, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'Discapacidad', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'discapacidad','value'=>$row->discapacidad, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'Enfermedad', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'nombre_enfermedad','value'=>$row->nombre_enfermedad, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'Medicamento', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'direccion','value'=>$row->medicamento, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'Alergia', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'alergia','value'=>$row->alergia, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'Tipo de Sangre', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'tiposangre','value'=>$row->tiposangre, 'disabled'=>'disabled', 'class'=>'form-control')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'Contacto', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'nomcontacto','value'=>$row->nomcontacto, 'disabled'=>'disabled', 'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'Telefono del Contacto', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'phonecontacto','value'=>$row->phonecontacto, 'disabled'=>'disabled', 'class'=>'form-control')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'Estado', array('class'=>'col-md-2'));
                $input=form_dropdown('estado', $options);
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                 
               
                echo '<hr/><div class="col-md-12">'.input(array('type'=>'submit','idB'=>'ajaxformbtn','data-target'=>'newbotonpanicoout','value'=>'Modificar El Estado de la Alerta','class'=>'btn btn-primary pull-right')).'</div>';    
            echo Close('form');
        }
    }
                
            

        echo Close('div'); //cierra div .col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main    
    echo Close('div'); //cierra div .row
    echo Close('div');

$js = array(
    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/jquery.form.js',
    base_url().'/resources/bootstrap-3.2.0/js/comunes.js',
    base_url().'/resources/bootstrap-3.2.0/js/main.js'
);

echo jsload($js);
