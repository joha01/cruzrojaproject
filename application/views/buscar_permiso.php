	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--necesario para utilizar ajax-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <title><?= $titulo ?></title>
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
        <script type="text/javascript">
            //función encargada de procesar la solicitud al pulsar el botón pasar_edicion
            function saltar(id){
                $("#editar").load("http://localhost/codeigniter/index.php/main/agregar", { id: id }); 
                $("#editar").fadeIn('2000');
            }
        </script>
    </head>
	<body>	
            
            <?php $plantilla = array ( 'table_open' => '<table border="1" cellpadding="2"
cellspacing="1" class="mytable">' );
$this->table->set_template($plantilla);?>
            
		<p><b>Buscar</b></p>

		

		<br /><br />
		<form id="form" method="GET" action="<?=base_url()?>index.php/main/buscar">
				<input type="text" id="query" name="query" />
				<input type="submit" id="buscar" value="Buscar" />
		</form>

		<br /><br />
                <table align="center" border="0" cellpadding="4" >
            <td align="center"><h4>Tipo</h4></td>
            <td align="center"><h4>Dirección</h4></td>
            <td align="center"><h4>Celular</h4></td>
            <td align="center"><h4>Victimas</h4></td>
            <td align="center"><h4>Hora</h4></td>

		<?php
			if ($result) {
				foreach ($result->result() as $row) {
                                      
                                    echo "<tr>";
                    echo "<td>".$row->tipo."</td>";
                    echo "<td>".$row->direccionemergencia."</td>";
                    echo "<td>".$row->numerocelular."</td>";
                    echo "<td>".$row->numerovictimas."</td>";
                    echo "<td>".$row->hora."</td>";
                                }
			}
		?>

	</table>
        </body>
