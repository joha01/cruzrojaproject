<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Alertamedicaeditarestado extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
                $this->load->model('alertamedicaestado_model');
                $this->load->model('generic_model');
		$this->load->database();
	}

	//redirect if needed, otherwise display the user list
	function index($alertamedicaid)
	{
            $alertamedica = array();
			$result = $this->alertamedicaestado_model->getAlertaByUser($alertamedicaid);
			if ($result != FALSE){
				$alertamedica = array('result' => $result);
			}else {
				$alertamedica = array('result' => '');
			}	

            $this->load->view('admin/edit_alerta',$alertamedica);       
	}
        
	//redirect if needed, otherwise display the user list
	function save()
	{
            $data = array(
                'nombre' => $this->input->post('direccionemergencia'),
                'medicamento' => $this->input->post('numerocelular'),
                'alergia' => $this->input->post('numerovictimas'),
                'id' => $this->input->post('id')
            );
            $res = $this->alertamedicaestado_model->saveAlertaMedicaEstado($data);
            
            if($res){
                echo Open('table',array('class'=>'table table-striped'));
                    echo Open('tr',array('class'=>'success'));
                        echo tagcontent('td', $this->input->post('direccionemergencia'));
                        echo tagcontent('td', $this->input->post('numerocelular'));
                        echo tagcontent('td', $this->input->post('numerovictimas'));
                    echo Close('tr');
                echo Close('table');                
            }
	}        
        
        
	function getById($id)
	{
            $res['enfermedad'] = $this->alertamedicaestado_model->getById($id);
            
            $this->load->view('admin/alertamedicaestadoedit',$res);            
	}        
       //-----------------------------------------------------------------------
	function edit_alerta()
        { 
//                $direccionemergencia = $this->input->post('direccionemergencia');
//                $numerocelular = $this->input->post('numerocelular');
//                $numerovictimas = $this->input->post('numerovictimas');
                
            $estado2 = $this->input->post('estado');
                if($estado2=='VERDADERA'){
                    $estado=1;
                }else{
                    if($estado2=='FALSA'){
                        $estado=2;
                    }
                }
            
                //$estado = $this->input->post('estado');
                
                $id=$this->input->post('id');                
                $alertadata =  $this->generic_model->get(
                        'alertamedica', 
                        array('id'=>$id), 
                        'contadorestados', null,1 );
                
                $contadorestados = $alertadata->contadorestados;
                if($estado==1){
                    $contadorestados += 1;
                }else{
                     if($estado==2){
                        $contadorestados -= 1;  
                     }
                }

                $res = $this->generic_model->update( 'alertamedica', array('estado'=>$estado, 'contadorestados'=>$contadorestados), array('id'=>$id) );
                
  
             if($res){
                
                echo tagcontent('strong', 'La actualizacion se ha realizado correctamente', array('class'=>'text-success'));

            }else{
                echo tagcontent('strong', 'Ocurrio un problema, no se pudo realizar la actualizacion', array('class'=>'text-success'));                

            }
            
	}    
   
        //edit a user
	function edit1_alerta($id)
	{
		$this->data['title'] = "Editar ALERTA";

//		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
//		{
//			redirect('auth', 'refresh');
//		}

		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('cedula', $this->lang->line('edit_user_validation_cedula_label'), 'required|xss_clean');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');
		$this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'cedula'    => $this->input->post('cedula'),
				'phone'      => $this->input->post('phone'),
			);

			// Only allow updating groups if user is admin
			if ($this->ion_auth->is_admin())
			{
				//Update the groups user belongs to
				$groupData = $this->input->post('groups');

				if (isset($groupData) && !empty($groupData)) {

					$this->ion_auth->remove_from_group('', $id);

					foreach ($groupData as $grp) {
						$this->ion_auth->add_to_group($grp, $id);
					}

				}
			}

			//update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

				$data['password'] = $this->input->post('password');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$this->ion_auth->update($user->id, $data);

				//check to see if we are creating the user
				//redirect them back to the admin page
				$this->session->set_flashdata('message', "User Saved");
				if ($this->ion_auth->is_admin())
				{
					redirect('auth', 'refresh');
				}
				else
				{
					redirect('/', 'refresh');
				}
			}
		}

		//display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['cedula'] = array(
			'name'  => 'cedula',
			'id'    => 'cedula',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('cedula', $user->cedula),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		);

		//$this->_render_page('auth/edit_user', $this->data);
	}


}
