<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$css = array(
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap.min.css',
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap-theme.css',
    base_url().'/resources/bootstrap-3.2.0/css/dashboard.css'
);

echo csslink($css);


echo Open('div', array('class'=>'container'));

$this->load->view('templates/header.php');

echo Open('div', array('class'=>'row'));

    $this->load->view('templates/slidebar.php');
    
    echo Open('div', array('class'=>'col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'));   
    
            echo tagcontent('div', '', array('id'=>'newenfermedadout'));
            echo Open('form',array('class'=>'form-horizontal','method'=>'post','action'=>  base_url().'enfermedad/edit'));
                echo input(array('type'=>'hidden','name'=>'id','value'=>$enfermedad['id']));
                $label = tagcontent('label', 'Enfermedad', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'enfermedad','value'=>$enfermedad['nombre_enfermedad'],'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'Medicamento', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'medicamento','value'=>$enfermedad['medicamento'],'class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                
                $label = tagcontent('label', 'Alergias', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'alergias','value'=>$enfermedad['alergia'],'class'=>'form-control')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                 
                $label = tagcontent('label', 'Discapacidad', array('class'=>'col-md-2'));
                $input = tagcontent('div', input(array('name'=>'discapacidad','value'=>$enfermedad['discapacidad'],'class'=>'form-control')), array('class'=>'col-md-10'));
                echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
                echo '<hr/><div class="col-md-12">'.input(array('type'=>'submit','id'=>'ajaxformbtn','data-target'=>'newenfermedadout','value'=>'Modificar Enfermedad','class'=>'btn btn-primary pull-right')).'</div>';    
            echo Close('form');


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
