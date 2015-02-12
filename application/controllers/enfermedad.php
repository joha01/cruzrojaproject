<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Enfermedad extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
                $this->load->model('enfermedad_model');
		$this->load->database();
	}

	//redirect if needed, otherwise display the user list
	function index($userid,$username,$userapell)
	{
            $user['enfermedades']=$this->enfermedad_model->getEnfermedadByUser($userid);
            $user['userid']= $userid;
            $user['username']= $username;
            $user['userapell']= $userapell;
            $this->load->view('admin/enfermedadlist',$user);
            
             
            
	}
        
	//redirect if needed, otherwise display the user list
	function save()
	{
            $users_id= $this->input->post('userid');
            $data = array(
                'nombre_enfermedad' => $this->input->post('enfermedad'),
                'medicamento' => $this->input->post('medicamento'),
                'alergia' => $this->input->post('alergias')
//                'users_id' => $this->input->post('userid')
            );
            $res = $this->enfermedad_model->saveEnfermedadUser($data, $users_id);
            
            if($res){
                echo Open('table',array('class'=>'table table-striped'));
                    echo Open('tr',array('class'=>'success'));
                        echo tagcontent('td', $this->input->post('enfermedad'));
                        echo tagcontent('td', $this->input->post('medicamento'));
                        echo tagcontent('td', $this->input->post('alergias'));
                    echo Close('tr');
                echo Close('table');                
            }

	}        
        
        
	function getById($id)
	{
            $res['enfermedad'] = $this->enfermedad_model->getById($id);
            
            $this->load->view('admin/enfermedadedit',$res);            

	}        
        
	function edit()
	{
            $data = array(
                'nombre_enfermedad' => $this->input->post('enfermedad'),
                'medicamento' => $this->input->post('medicamento'),
                'alergia' => $this->input->post('alergias'),
                'discapacidad' => $this->input->post('discapacidad')
            );
            $res = $this->enfermedad_model->edit($data,$this->input->post('id'));
            
            if($res){
                echo tagcontent('strong', 'La actualizacion se ha realizado correctamente', array('class'=>'text-success'));
                redirect('auth/index');
//                http://localhost/autenticacionci/enfermedad/getById/3
            }else{
                echo tagcontent('strong', 'Ocurrio un problema, no se pudo realizar la actualizacion', array('class'=>'text-success'));                
            }
            

	}        

}
