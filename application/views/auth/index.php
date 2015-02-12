
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$js = array(
    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/bootstrap.min.js',
    base_url().'/resources/bootstrap-3.2.0/js/prototype.js'
);
echo jsload($js);
?>
<script src="http://code.jquery.com/jquery-1.7.js"></script> <script type="text/javascript"></script>



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
    
    echo Open('div', array('class'=>'col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'));?>
  
  <?php
?>
         <h1 class="page-header">Administración del Sistema</h1>          

          <h2 class="sub-header">Lista de usuarios</h2>
          <div class="table-responsive">
                <table cellpadding=0 cellspacing=10 class="table table-striped table-condensed">
                        <tr>
                                <th><?php echo lang('index_fname_th');?></th>
                                <th><?php echo lang('index_lname_th');?></th>
                                <th><?php echo lang('index_email_th');?></th>
                                <th><?php echo lang('index_groups_th');?></th>
                                <th><?php echo lang('index_status_th');?></th>
                                <th><?php echo lang('index_action_th');?></th>
                        </tr>
                        <?php foreach ($users as $user):?>
                                <tr>
                                        <td><?php echo $user->first_name.'<br/>'.anchor("enfermedad/index/".$user->id.'/'.$user->first_name.'/'.$user->last_name, 'Enfermedad',array('style'=>'font-size:10px'))?></td>
                                        <td><?php echo $user->last_name;?></td>
                                        <td><?php echo $user->email;?></td>
                                        <td>
                                            <?php foreach ($user->groups as $group):?>
                                                <?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
                                            <?php endforeach?>
                                        </td>
                                        <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                                        <td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
                                </tr>
                        <?php endforeach;?>
                </table>
          </div>

<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>          

 

        </div>
<?php

        echo Close('div'); //cierra div .col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main
       //****
        
        
        //***
    echo Close('div'); //cierra div .row
    
echo Close('div');


$this->load->view('templates/notif_alertamedica');
////////////////////////////////////////////////////
//$this->load->view('templates/notif_botonpanico');


 

 