
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$css = array(
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap.min.css',
    base_url().'/resources/bootstrap-3.2.0/css/bootstrap-theme.css',
    base_url().'/resources/bootstrap-3.2.0/css/dashboard.css'
);

echo csslink($css);


echo Open('div', array('class'=>'container'));

//$this->load->view('templates/header.php');
///////
     $this->load->view('templates/notif_alertamedica');
     /////////

echo Open('div', array('class'=>'row'));

    $this->load->view('templates/slidebar.php');
    ///////
     //$this->load->view('templates/notif_alertamedica');
     /////////
    echo Open('div', array('class'=>'col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'));   
    
//         ////////////////
//    echo Open('div', array('class'=>'col-sm-1 col-sm-offset-3 col-md-10 col-md-offset-2 main'));   
//    $this->load->view('templates/notif_alertamedica');
//    echo Close('div');
//////////////////
?>
<h1><?php echo lang('create_group_heading');?></h1>
  
   
<p><?php echo lang('create_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_group");?>

      <p>
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            <?php echo lang('create_group_desc_label', 'description');?> <br />
            <?php echo form_input($description);?>
      </p>

      <p><?php echo form_submit('submit', lang('create_group_submit_btn'));?></p>

<?php
    echo form_close();

    echo Close('div'); //cierra div .col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main 
//    ////////////////
//    echo Open('div', array('class'=>'col-sm-1 col-sm-offset-3 col-md-10 col-md-offset-2 main'));   
//    $this->load->view('templates/notif_alertamedica');
//    echo Close('div');
//////////////////
    echo Close('div'); //cierra div .row
//      ////////////////
//    echo Open('div', array('class'=>'col-sm-1 col-sm-offset-3 col-md-10 col-md-offset-2 main'));   
//    $this->load->view('templates/notif_alertamedica');
//    echo Close('div');
//////////////////
    echo Close('div');
//        ////////////////
//    echo Open('div', array('class'=>'col-sm-1 col-sm-offset-3 col-md-10 col-md-offset-2 main'));   
//    $this->load->view('templates/notif_alertamedica');
//    echo Close('div');
//////////////////

$js = array(
    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js'
);

echo jsload($js);

?>