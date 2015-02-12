

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
    $css = array(base_url().'css/styles.css');
    echo csslink($css);
?>
<div id="infoMessage" ><?php echo $message;?></div>

<div class="loginarea"> 
    <h1>CRUZ ROJA - LOJA</h1>
<p>Ingrese su Usuario y Password</p>  

<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</div>

</head>