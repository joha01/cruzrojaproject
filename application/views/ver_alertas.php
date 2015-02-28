<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
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
    echo Open('div', array('class'=>'col-sm-4 col-sm-offset-1 col-md-9 col-md-offset-3 main'));   
?>   
      
          <h1 class="page-header">Alertas Médicas Atendidas</h1>          
         
      <table>
          <tr align="center">
                <th width="150">Fecha</th>
                <th width="150">Tipo</th>
                <th width="150">Dirección</th>
                <th width="150">Celular</th>
                <th width="150">Núm. Victimas</th>
                <th width="150">Hora</th>
                
            </tr>

            <?php
                            if ($enlaces) {
                    foreach ($enlaces->result() as $row) {  
                         if($row->estado!=2){  
                             
                             
         
                             
                    echo "<tr>";
                    echo "<td>".$row->fecha."</td>";
                    echo "<td>".$row->tipo."</td>";                     
                    echo "<td>".$row->direccionemergencia."</td>";
                    echo "<td>".$row->numerocelular."</td>";
                    echo "<td align='center'>".$row->numerovictimas."</td>";
                    echo "<td>".$row->hora."</td>";
                         }
                    }
                }

            
            ?>
        </table>
   
<?php
        



    echo Close('div'); //cierra div .col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main   
             
    echo Close('div'); //cierra div .row
    echo Close('div');

$js = array(
    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js'
);
 echo $sidebar; 
echo jsload($js);

?>
        
<!--</body>-->
</html>
    
