
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    
    echo Open('div', array('class'=>'col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'));    
?>
<h1><?php echo lang('deactivate_heading');?></h1>
<p><?php echo sprintf(lang('deactivate_subheading'), $user->first_name ,' ', $user->last_name);?></p>



$var=1;
<?php echo form_open("auth/deactivate/".$user->id.$var);?>

  <p>
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>

  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

<?php
    echo form_close();

        echo Close('div'); //cierra div .col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main    
    echo Close('div'); //cierra div .row
    echo Close('div');

$js = array(
    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js'
);

echo jsload($js);

?>