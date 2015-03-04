<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html lang="en">
<head>
    <meta charset="utf-8">
    <style type="text/css">
        body{
            background: #888888
        }
        #sidebar{
            position: absolute;
            width: 500px;
            height: 590px;
            background: #222;
            color: #fff;
            margin-left: 600px;
            margin-top: -600px;
            border: 5px solid #fff;
        }
        ul{
            padding: 0;
            text-align: justify;        
        }
 
         li{
            cursor: pointer;
            border-top: 1px solid #fff;
            background: #c3c3c3; 
            list-style: none;
            color: #111
        }
        li:hover{
            background: #fefefe;
        }
    </style>
    <script type="text/javascript">
    function datos_marker(lat, lng, marker)
    {
     var mi_marker = new google.maps.LatLng(lat, lng);
     map.panTo(mi_marker);
     google.maps.event.trigger(marker, 'click');
    }
    </script>
   
</head>

<?php
$css = array(
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap.min.css',
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap-theme.css',
    base_url().'/resources/bootstrap-3.2.0/css/dashboard.css',
    ////////
     base_url().'/resources/bootstrap-3.2.0/css/style_light.css'
    ///////
   
);

echo csslink($css);


echo Open('div', array('class'=>'container'));

//$this->load->view('templates/header.php');

echo Open('div', array('class'=>'row'));

 
      echo Open('div', array('class'=>'col-sm-4 col-sm-offset-1 col-md-9 col-md-offset-3 main'));   
?>   
<?=$map['js']?>
    

<?=$map['html']?>

<div id="sidebar"> 
        
        <table>
          <tr >
                <th width="80">Fecha</th>
                <th width="300">Tipo</th>
                <th width="300">Dirección</th>
                <th width="300">Celular</th>
                <th width="150">Núm. Victimas</th>
                <th width="150">Hora</th>
                
            </tr>
            <?php
        foreach($datos as $marker_sidebar )
        { 
          ?>
          <li onclick="datos_marker(
          				<?php
          					echo "<td>".$marker_sidebar->longitud."</td>"
          					?>
          					,
          			       <?php 
          			       		echo "<td>".$marker_sidebar->latitud."</td>"
          			       		?>
          			       		,marker_
          			       <?php
          			       		echo "<td>".$marker_sidebar->id."</td>"?>
          			       )">

           <?php
            echo "<tr>";
            echo "<td>".$marker_sidebar->fecha."</td>";
            echo "<td>".$marker_sidebar->tipo."</td>";
            echo "<td>".$marker_sidebar->direccionemergencia."</td>";
            echo "<td>".$marker_sidebar->numerocelular."</td>";
            echo "<td>".$marker_sidebar->numerovictimas."</td>";
            echo "<td>".$marker_sidebar->hora."</td>";
            
             echo "</tr>";
           ?>
            
            </li><?php
            
            
            
        
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
    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js',
    /////
    base_url().'/resources/bootstrap-3.2.0/js/jquery-ui-1.8.14.custom.min.js',
     base_url().'/resources/bootstrap-3.2.0/js/ttw-notification-menu.js',
     base_url().'/resources/bootstrap-3.2.0/js/ttw-notification-menu.min.js'
    /////
);

echo jsload($js);

?>





</html>