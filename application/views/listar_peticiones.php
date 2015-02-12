	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--necesario para utilizar ajax-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <title><?= 'Alertas Médicas' ?></title>
        <style type="text/css">
            /*los estilos*/
            th{
                background-color: #222;
                color: #fff;
            }
            td{
                padding: 5px 40px 5px 40px;
                background-color: #D0D0D0;
            }
            label{
                display: block;
            }
            #editar{
                margin: 30px 0px 0px 300px;
                background-color: #D0D0D0;
                border: 3px solid #999;
                width: 500px;
                padding: 20px;
                display: none;
            }
            input[type=text],input[type=email]{
                padding: 5px;
                width: 250px;
            }
            input[type=submit]{
                padding: 4px 15px 4px 15px;
                background-color: #123;
                border-radius: 4px;
                color: #ddd;
            }
            #actualizadoCorrectamente{
                padding: 5px;
                background-color: #005702;
                color: #fff;
                font-weight: bold;
                text-align: center;
            }
        </style>
        
    
 </head>
    
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
    
//    echo Open('div', array('class'=>'col-sm-3 col-sm-offset-3 col-md-1 col-md-offset-2 main'));   
    echo Open('div', array('class'=>'col-sm-1 col-sm-offset-5 col-md-8 col-md-offset-3 main'));   
?>   
      
          <h1 class="page-header">Peticiones Registradas</h1>          
         
          <div class="table-responsive">
                <!--<table cellpadding=0 cellspacing=10 class="table table-striped table-condensed">-->
                <table cellpadding=0 cellspacing=1 class="table table-condensed table-bordered">
                
                    <tr>
                        <th><?php echo "FECHA";?></th>
                        <th><?php echo "NOMBRE";?></th>
                        <th><?php echo "APELLIDO";?></th>
                        <th><?php echo "CÉDULA";?></th>
                        <th><?php echo "TELÉFONO";?></th>
                        <th><?php echo "ESTADO";?></th>
                        
                        <th><?php echo "OPCIÓN";?></th>
                        <th><?php echo "OBSERVACIÓN";?></th>
                    </tr>
                 
              <?php
               if ($enlaces) {
                   
                    foreach ($enlaces->result() as $row) {  
                         
                    echo "<tr>";
                    echo "<td>".$row->created_on."</td>";
                    echo "<td>".$row->first_name."</td>";
                    echo "<td>".$row->last_name."</td>";
                    echo "<td>".$row->cedula."</td>";
                    echo "<td>".$row->phone."</td>";
                    
                    ?>
                    <td><?php echo ($row->active) ? anchor("auth/deactivate/".$row->id, 'ACTIVO') :  anchor("auth/activate/".$row->id, 'INACTIVO');?></td>
                  
                    <?php
                    
                    
                    
                    
                    ?>
                    <td><?php echo anchor("main/index2/".$row->id, 'VER');?></td>
                    
                    <?php
                     echo "<td>".$row->observacion."</td>";
                    }
              }  
            ?>
        </table>
        </div>

<?php
        



    echo Close('div'); //cierra div .col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main   
             
    echo Close('div'); //cierra div .row
    echo Close('div');

$js = array(
    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js'
);

echo jsload($js);

?>
        
<!--</body>-->
</html>
    
