<?php


class Sms extends CI_Controller{
    function __construct(){
        parent::__construct();
	$this->load->library('sms');
## SMS a nros con el siguiente formato <codigo_area_sin_cero><numero_sin_15>
        $nro=0990080398; //este nro. no existe
        $this->sms->enviar('Texto SMS',$nro,'MOVISTAR');
    }
}
