
<?php
if ( function_exists( 'date_default_timezone_set' ) )
date_default_timezone_set('America/Guayaquil');

if ($boton) {
    foreach ($boton->result() as $row) {
      if($row->fecha == date('Y-m-d',time()) AND $row->estado == 0){
        ?>
            <div id="alerts2">

            <audio id="audioplayer" autoplay=true>
               <source src="sound/ping.mp3" type="audio/mpeg">
               <source src="sound/ping.ogg" type="audio/ogg">
               Su navegador no soporta audio. </audio>
            <li>
            <!--<img src="icons/i.jpg" align="top" style="float:left; margin-right:2px;" />-->
            <span class="glyphicon glyphicon-info-sign" style="float:left; margin-right:2px;"></span>
            <div>
                <?php
                echo '<a target="_blank" href="'. base_url().'botonpanicoeditarestado/index/' .$row->idB.'" class="text-danger"><strong>Direccion '.$row->direccion.' !!</strong></a><br/>';
                
                echo '<strong class="text-success">Victima: '.$row->first_name.' '.$row->last_name.'</strong><br/>';
               // echo '<strong class="text-success">Hora: '.$row->hora.' '.$row->last_name.'</strong><br/>';
               // echo '<strong class="text-info">'.$row->numerocelular.' / '.$row->hora.' </strong><br/>';
                
               ?>
            </div>
            </li>
            </div>
        <?php

    }
//    else{
//        // si no hay alertas del dÃ¬a actual, no muestra nada
//        echo "NO HAYsdf";
//    }
     }
			}

?>
