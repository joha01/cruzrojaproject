<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Aministracion de las alertas medicasbnm
 */
class Alertamedica extends CI_Controller {

	function __construct()//bbbb
	{
		parent::__construct();
		$this->load->helper('url');
                $this->load->model('enfermedad_model');
		$this->load->database();
	}

        
        function notifications(){
           $this->load->model('alertamedica_model'); 
           $res = array(
			'alerta' => $this->alertamedica_model->get_last()	
		);
		
		$this->load->view('alertamedica', $res);
          
        }
        
}