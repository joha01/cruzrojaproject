
<?php
if ( function_exists( 'date_default_timezone_set' ) )
date_default_timezone_set('America/Guayaquil');

if ($alerta) {
    foreach ($alerta->result() as $row) {
      if($row->fecha == date('Y-m-d',time()) AND $row->estado == 0 AND $row->contadorestados>=0){
   // if($row->estado == 0){
        ?>
            <div id="alerts">

            <audio id="audioplayer" autoplay=true>
               <source src="sound/ping.mp3" type="audio/mpeg">
               <source src="sound/ping.ogg" type="audio/ogg">
               Su navegador no soporta audio. </audio>
            <li>
            <!--<img src="icons/i.jpg" align="top" style="float:left; margin-right:2px;" />-->
            <span class="glyphicon glyphicon-info-sign" style="float:left; margin-right:2px;"></span>
            <div>
                <?php
              //  echo '<a target="_blank" href="'. base_url().'alertamedicaeditarestado/index/' .$row->id.'/'.$row->direccionemergencia.'/'.$row->numerovictimas.'/'.$row->hora.'" class="text-danger"><strong>Accidente '.$row->tipo_accidente.' !!</strong></a><br/>';
                echo '<a target="_blank" href="'. base_url().'alertamedicaeditarestado/index/' .$row->id.'" class="text-danger"><strong>Accidente '.$row->tipo_accidente.' !!</strong></a><br/>';
                
                echo '<strong class="text-success">Direccion: '.$row->direccionemergencia.' </strong><br/>';
                echo '<strong class="text-success">Nro. Victimas: '.$row->numerovictimas.' </strong><br/>';
                echo '<strong class="text-info">'.$row->numerocelular.' / '.$row->hora.' </strong><br/>';
                
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
