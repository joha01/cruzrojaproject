	

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


echo Open('div', array('class'=>'container'));

$this->load->view('templates/header.php');

echo Open('div', array('class'=>'row'));

    $this->load->view('templates/slidebar.php');
  
    echo Open('div', array('class'=>'col-sm-4 col-sm-offset-1 col-md-9 col-md-offset-3 main'));   ?>
<?php

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
<?php

    echo Close('div'); //cierra div .col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main   
  
    echo Open('div', array('class'=>'col-sm-4 col-sm-offset-1 col-md-9 col-md-offset-3 main'));   
    ?>        
      <div class="table-responsive">
         
                <table cellpadding=0 cellspacing=10 class="table table-striped table-condensed">
                
                    <tr>
                        <th><?php echo "NOMBRE";?></th>
                        <th><?php echo "APELLIDO";?></th>
                        <th><?php echo "CÉDULA";?></th>
                        <th><?php echo "TELÉFONO";?></th>
                        <th><?php echo "DIRECCIÓN";?></th>
                       
                    </tr>

             <?php
             
                    if ($result2) {
                        foreach ($result2->result() as $row) {  
                             
                        echo "<tr>";
                        echo "<td>".$row->first_name."</td>";
                        echo "<td>".$row->last_name."</td>";
                        echo "<td>".$row->cedula."</td>";
                        echo "<td>".$row->phone."</td>";
                        echo "<td>".$row->direccion."</td>";
                        }
                    }
            ?>
        </table>
   </div>
   
   <?php
    echo Close('div');
    
    echo Close('div'); //cierra div .row
    echo Close('div');

//$js = array(
//    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
//    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js'
//);
//
//echo jsload($js);

?>
        
<!--</body>-->
</html>
    
