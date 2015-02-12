<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo tagcontent('div', '', array('id'=>'newenfermedadout'));
echo Open('form',array('class'=>'form-horizontal','method'=>'post','action'=>  base_url().'enfermedad/save'));
    echo input(array('type'=>'hidden','name'=>'userid','value'=>$userid));
    $label = tagcontent('label', 'Enfermedad', array('class'=>'col-md-2'));
    $input = tagcontent('div', input(array('name'=>'enfermedad','class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
    
    echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
    $label = tagcontent('label', 'Medicamento', array('class'=>'col-md-2'));
    $input = tagcontent('div', input(array('name'=>'medicamento','class'=>'form-control','required'=>'')), array('class'=>'col-md-10'));
    
    echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
    $label = tagcontent('label', 'Alergias', array('class'=>'col-md-2'));
    $input = tagcontent('div', input(array('name'=>'alergias','class'=>'form-control')), array('class'=>'col-md-10'));
    
    echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
    $label = tagcontent('label', 'Discapacidad', array('class'=>'col-md-2'));
    $input = tagcontent('div', input(array('name'=>'discapacidad','class'=>'form-control')), array('class'=>'col-md-10'));
    echo tagcontent('dif', $label.$input, array('class'=>'form-group'));
   
    echo '<hr/><div class="col-md-12">'.input(array('type'=>'submit','id'=>'ajaxformbtn','data-target'=>'newenfermedadout','value'=>'Agregar Enfermedad','class'=>'btn btn-primary pull-right')).'</div>';    
echo Close('form');

?>
