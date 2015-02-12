
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Highcharts lib examples</title>
	<style type="text/css">
/*		a, a:link, a:visited {
			color: #444;
			text-decoration: none;
		}
		a:hover {
			color: #000;
		}*/
		.left {
			float: left;
		}
		#menu {
			width: 20%;
		}
		#g_render {
			width: 80%;
		}
		li {
			margin-bottom: 1em;
		}
	</style>
	<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript">
		google.load("jquery", "1.4.4");
	</script>
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
    
</head>

    <?php
$css = array(
     'http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css',
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap.min.css',
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap-theme.css',
    base_url().'/resources/bootstrap-3.2.0/css/dashboard.css'
);

echo csslink($css);

 $submit = array(
                'value'=> 'visualizar',
                'name' => 'visualizar',
                'id' => 'visualizar'
            );

?>
<div id="datetimepicker" class="input-append date">

    </div>
    <script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> 


<?php
echo Open('div', array('class'=>'container'));

$this->load->view('templates/header.php');

echo Open('div', array('class'=>'row'));

    $this->load->view('templates/slidebar.php');
    
    echo Open('div', array('class'=>'col-sm-1 col-sm-offset-2 col-md-1 col-md-offset-3 main'));  
    
    $example = array('id' =>  'example', 'name' => 'example');

   echo form_open("charts_1/paginacion",$example);?>
    <p>
    <label for="example1">Desde</label> 
    
    <input  type="text" placeholder="Seleccione la F. Nacimiento"  id="example1">
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
           
        </script>
        <script type="text/javascript"
        src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
        </script>
    <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'pt-BR'
      });
    </script>
<!--     </p>
    
<p>-->
            <?php echo lang('create_user_fnacimiento_label', 'fnacimiento');?> <br />
            
    <label for="example11">Hasta</label>            
    <input  type="text" placeholder="Ingrese hasta que fecha"  id="example11" >
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example11').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>
        <script type="text/javascript"
        src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
        </script>
    <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'pt-BR'
      });
    </script>
     </p>

<p><?php echo form_submit($submit);?></p>
<?php


foreach($results as $key) {?>
					<tr>
						<td><?=$key->id;?></td>
						<td><?=$key->fecha;?></td>
						<td><?=$key->direccion;?></td>
					</tr>
<?php }?>

echo Close('div');

echo Open('div', array('class'=>'col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'));  ?>
<!--<body>-->
<!--	<div id="menu" class="left">
		<ol>
			<li><?php echo anchor($home, 'basic example')?></li>
			<li><?php echo anchor($home.'categories', 'Advanced example')?></li>
			<li><?php echo anchor($home.'template', 'Options from template file')?></li>
			<li><?php echo anchor($home.'active_record', 'multiples chart and Database result')?></li>
			<li><?php echo anchor($home.'pie', 'Pie grah with callback functions')?></li>
			<li><?php echo anchor($home.'data_get', 'outputing json or array')?></li>
		</ol>
	</div>-->

	<div id="g_render"  class="left">
		<?php if (isset($charts)) echo $charts; ?>
		<?php if (isset($json)): ?>
			<h3>Json string output: associative array with global options and 'local options' (for each graph)</h3>
			<pre><?php echo print_r($json); ?></pre>
		<?php endif; if (isset($array)): ?>
			<h3>Array output: associative array with global options and 'local options' (for each graph)</h3>
			<pre><?php echo print_r($array); ?></pre>
		<?php endif; ?>
	</div>
    
<?php
////////

///////////
        echo Close('div'); //cierra div .col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main 
        
        
                    
          /////////////////

//////////////
 
        
    echo Close('div'); //cierra div .row
    
                 
          /////////////////

//////////////

    
    echo Close('div');
 ///////////             

//////////////
$js = array(
    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js',
    base_url().'/js/bootstrap-datepicker.js'
);

echo jsload($js);
               
///////////             

//////////////
 
?>
        
<!--</body>-->
</html>