	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--necesario para utilizar ajax-->
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
        
    </head>
	<body>	
            
           <form name="grupopersonas" method="post">
<p> Grupo: 
<select name="selectGrupo" onChange="submit();">
   <?php echo $data;
foreach($result as $result){
$grupopersonas = $result->getGrupos(); 
?>
<option value="<?php echo $grupopersonas;?>">
<?php echo $grupopersonas; ?></option>
<?php }

?>

</select>
</p>
</form>
        </body>
