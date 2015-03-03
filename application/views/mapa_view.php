<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style type="text/css">
        body{
            background: #888888
        }
        #sidebar{
            position: absolute;
            width: 200px;
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

//    $this->load->view('templates/slidebar.php');
   
    echo Open('div', array('class'=>'col-sm-3 col-sm-offset-1 col-md-7 col-md-offset-2 main'));   
?>   
<?=$map['js']?>
    

<?=$map['html']?>

<div id="sidebar">
    <ul>
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
        foreach($datos as $marker_sidebar)
        {
            ?><li onclick="datos_marker(<?=$marker_sidebar->longitud?>,<?=$marker_sidebar->latitud?>,marker_<?=$marker_sidebar->id?>)">
            <?=$marker_sidebar->fecha;?>&nbsp; &nbsp;<?=$marker_sidebar->tipo;?>;&nbsp;<?=$marker_sidebar->direccion;?>
            &nbsp;<?=$marker_sidebar->celular;?>;&nbsp;<?=$marker_sidebar->numerovictimas;?>;&nbsp;<?=$marker_sidebar->hora;?>
            &nbsp;<?=substr($marker_sidebar->direccionemergencia,0,14)?></li><?php
            
        }
        ?>
        </table>
    </ul>
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