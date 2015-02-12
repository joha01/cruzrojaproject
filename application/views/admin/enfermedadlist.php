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

    echo tagcontent('h2', 'Usuario: '.$username.' '.$userapell);
    
    if($enfermedades){
        $thead = array('Enfermedad','Medicamento','Alergias','Discapacidad','Edit');
        echo Open('table',array('class'=>'table table-striped'));
        echo tablethead($thead);
            echo Open('tbody', array('id'=>'tbodyenfermedades'));
            foreach ($enfermedades as $val) {
                echo Open('tr');
                    echo tagcontent('td', $val->nombre_enfermedad);
                    echo tagcontent('td', $val->medicamento);
                    echo tagcontent('td', $val->alergia);
                    echo tagcontent('td', $val->discapacidad);
                   echo tagcontent('td', anchor("enfermedad/getById/".$val->id, 'Edit'));
                 //   echo tagcontent('td', anchor("enfermedad/getById/".$userid, 'Edit'));
                echo Close('tr');
            }
            echo Close('tbody');
        echo Close('table');
    }else{
        echo tagcontent('strong', 'No se ha registrado enfermedades para el usuario', array('class'=>'text-info'));
        /////////////////////
        echo lineBreak2(1, array('class'=>'clr'));
        $paramsnewenf['userid'] = $userid;
        $this->load->view('admin/enfermedadnew',$paramsnewenf);
        ///////////////////////
    }
        
//    echo lineBreak2(1, array('class'=>'clr'));
//
//    $paramsnewenf['userid'] = $userid;
//    $this->load->view('admin/enfermedadnew',$paramsnewenf);
    
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