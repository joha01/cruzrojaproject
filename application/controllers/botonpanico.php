<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Botonpanico extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
                //$this->load->model('enfermedad_model');
		$this->load->database();
	}

        
        function notifications(){
           $this->load->model('botonpanico_model'); 
           $res = array(
			'boton' => $this->botonpanico_model->get_last()	
		);
		
		$this->load->view('botonpanico', $res);
          
        }
        
}