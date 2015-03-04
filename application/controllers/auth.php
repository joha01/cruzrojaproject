<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');
                $this->load->model('generic_model');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

	//redirect if needed, otherwise display the user list
//	function index()
//	{
//
//		if (!$this->ion_auth->logged_in())
//		{
//			//redirect them to the login page
//			redirect('auth/login', 'refresh');
//		}
//		elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
//		{
//			//redirect them to the home page because they must be an administrator to view this
//			return show_error('You must be an administrator to view this page.');
//		}else{
//			//set the flash data error message if there is one
//			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
//
//			//list the users
//			$this->data['users'] = $this->ion_auth->users()->result();
//			foreach ($this->data['users'] as $k => $user)
//			{
//				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
//			}
//
//			$this->_render_page('auth/index', $this->data);
//		}
//	}
        
        function index()
	{
            $user_id = $this->ion_auth->get_user_id();
            
            $id =  $this->generic_model->get(
                        'users_groups', 
                        array('user_id'=>$user_id), 
                        'group_id', null,1 );
               $idgrupo=$id->group_id;
            
        
             $nombre_grupo=$this->generic_model->get(
                        'groups', 
                        array('id'=>$idgrupo), 
                        'name', null,1 );
                
             $nombre=$nombre_grupo->name;
             
             
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
//			redirect('/auth/login', 'refresh');
                    redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
		{
			// Condicionales: mostramos contenido segun el nombre de cada usuario  
                        
                        if ($nombre === 'Paramédicos'||$nombre === 'Ambulancia') {
                       
                            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                            $this->data['users'] = $this->ion_auth->users()->result();
                            foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
                             $this->_render_page('auth/index_nuevo', $this->data);
                         } else {
                                
                                //redirect them to the home page because they must be an administrator to view this
                                return show_error('You must be an administrator to view this page.');
                            } 
                           
		}else{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->_render_page('auth/index', $this->data);
		}
	}

	//log the user in
	function login()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
//				redirect('/', 'refresh');
                                redirect( 'refresh');
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			$this->_render_page('auth/login', $this->data);
		}
	}
//*******************************para usuarios diferentes***********************
//
	//log the user in
	function login2()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('/', 'refresh');
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			$this->_render_page('auth/login', $this->data);
		}
	}
//*******************************************************************************
	//log the user out
	function logout()
	{
		$this->data['title'] = "Logout";

		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('auth/login', 'refresh');
	}

	//change password
	function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			//display the form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id'   => 'new',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id'   => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			//render
			$this->_render_page('auth/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	//forgot password
	function forgot_password()
	{  
		//setting validation rules by checking wheather identity is username or email
		if($this->config->item('identity', 'ion_auth') == 'username' )
		{
		   $this->form_validation->set_rules('email', $this->lang->line('forgot_password_username_identity_label'), 'required');	
		}
		else
		{
		   $this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');	
		}
		
		
		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
			);

			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('auth/forgot_password', $this->data);
		}
		else
		{
			// get identity from username or email
			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
			}
			else
			{
				$identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
			}
	            	if(empty($identity)) {
	            		
	            		if($this->config->item('identity', 'ion_auth') == 'username')
		            	{
                                   $this->ion_auth->set_message('forgot_password_username_not_found');
		            	}
		            	else
		            	{
		            	   $this->ion_auth->set_message('forgot_password_email_not_found');
		            	}

		                $this->session->set_flashdata('message', $this->ion_auth->messages());
                		redirect("auth/forgot_password", 'refresh');
            		}

			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				//if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			//if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				//display the form

				//set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
				'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				//render
				$this->_render_page('auth/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						//if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						$this->logout();
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}


	//activate the user
	function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	//deactivate the user
	function deactivate($id = NULL)
	{
		$id = (int) $id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();
                        
                        
			$this->_render_page('auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
                                if($var==1){
                                   redirect("main/verPeticiones", 'refresh'); 
                                }else{
                                   
                                //redirect("auth/forgot_password", 'refresh');
                                   redirect('auth', 'refresh'); 
                                }
			}

			//redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	//create a new user
	function create_user()
	{
		$this->data['title'] = "Create User";
                if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
			redirect('auth', 'refresh');
		}
		$tables = $this->config->item('tables','ion_auth');

		//validate form input
		//$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|trim|min_length[3]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|trim|min_length[3]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|trim|min_length[7]|max_length[10]|integer|xss_clean');
		$this->form_validation->set_rules('codtarjeta', $this->lang->line('create_user_validation_codtarjeta_label'), 'required|trim|min_length[15]|max_length[20]|integer|xss_clean');
		$this->form_validation->set_rules('cedula', $this->lang->line('create_user_validation_cedula_label'), 'required|integer|min_length[10]|max_length[10]|is_unique['.$tables['users'].'.cedula]');
		$this->form_validation->set_rules('direccion', $this->lang->line('create_user_validation_direccion_label'), 'required|trim||min_length[3]|max_length[80]|xss_clean');
		$this->form_validation->set_rules('nombre_enfermedad', $this->lang->line('create_user_validation_nombre_enfermedad_label'), 'trim|min_length[5]|max_length[40]|xss_clean');
		$this->form_validation->set_rules('medicamento', $this->lang->line('create_user_validation_medicamento_label'), 'trim|min_length[4]|max_length[40]|xss_clean');
		$this->form_validation->set_rules('alergia', $this->lang->line('create_user_validation_alergia_label'), 'trim|min_length[2]|max_length[40]|xss_clean');
		$this->form_validation->set_rules('peso', $this->lang->line('create_user_validation_peso_label'), 'trim|min_length[2]|max_length[3]|integer|xss_clean');
		$this->form_validation->set_rules('genero', $this->lang->line('create_user_validation_genero_label'));
		$this->form_validation->set_rules('discapacidad', $this->lang->line('create_user_validation_discapacidad_label'), 'trim||min_length[2]|max_length[50]|xss_clean');
		$this->form_validation->set_rules('tiposangre', $this->lang->line('create_user_validation_tiposangre_label'));
		$this->form_validation->set_rules('nomcontacto', $this->lang->line('create_user_validation_nomcontacto_label'), 'required|trim|min_length[7]|max_length[40]|xss_clean');
		$this->form_validation->set_rules('phonecontacto', $this->lang->line('create_user_validation_phonecontacto_label'), 'required|trim|min_length[7]|max_length[10]|integer|xss_clean');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
                $this->form_validation->set_rules('fnacimiento','Fecha de nacimiento','trim|required|xss_clean');
		
                //personalizar mensajes de error
                $this->form_validation->set_message("required", "%s: Este campo es requerido.");
                $this->form_validation->set_message("valid_email", "%s: Escriba un email válido.");
                $this->form_validation->set_message("valid_cedula", "%s: Escriba un num de cédula valido.");//falta la validacion de cedula
                $this->form_validation->set_message("min_length", "%s: Requeridos minimo %s caracteres.");
                $this->form_validation->set_message("max_length","%s: No puede escribir mÃ¡s de %s caracteres.");
                $this->form_validation->set_message('matches', 'Los campos %s y %s no coinciden');
                $this->form_validation->set_message('is_unique', 'Este %s ya esta registrado');
                $this->form_validation->set_message('integer', '%s: Ingrese solo dígitos');
                  if ($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'cedula'    => $this->input->post('cedula'),
                                'fnacimiento'    => $this->input->post('fnacimiento'),
                                'genero'    => $this->input->post('genero'),
                                'discapacidad'    => $this->input->post('discapacidad'),
				'phone'      => $this->input->post('phone'),
                                'codtarjeta'      => $this->input->post('codtarjeta'),
                                'peso'    => $this->input->post('peso'),
                                'direccion' => $this->input->post('direccion'),
                                'nombre_enfermedad'  => $this->input->post('nombre_enfermedad'),
				'medicamento'    => $this->input->post('medicamento'),
				'alergia'      => $this->input->post('alergia'),
				'tiposangre'  => $this->input->post('tiposangre'),//Falta incluirlo en la vista
				'nomcontacto'    => $this->input->post('nomcontacto'),
				'phonecontacto'      => $this->input->post('phonecontacto'),
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}else{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['cedula'] = array(
				'name'  => 'cedula',
				'id'    => 'cedula',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('cedula'),
			);
                        $this->data['fnacimiento'] = array(
				'name'  => 'fnacimiento',
				'id'    => 'fnacimiento',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('fnacimiento'),
			);
                        $this->data['genero'] = array(
				'name'  => 'genero',
				'id'    => 'genero',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('genero'),
			);
                         $this->data['discapacidad'] = array(
				'name'  => 'discapacidad',
				'id'    => 'discapacidad',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('discapacidad'),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
                        $this->data['codtarjeta'] = array(
                                'name'  => 'codtarjeta',
                                'id'    => 'codtarjeta',
                                'type'  =>  'text',
                                'value' =>  $this->form_validation->set_value('codtarjeta'),
                        );
                        $this->data['peso'] = array(
				'name'  => 'peso',
				'id'    => 'peso',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('peso'),
			);
                       
                        $this->data['direccion'] = array(
				'name'  => 'direccion',
				'id'    => 'direccion',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('direccion'),
			);
                        $this->data['nombre_enfermedad'] = array(
				'name'  => 'nombre_enfermedad',
				'id'    => 'nombre_enfermedad',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('nombre_enfermedad'),
			);
			$this->data['medicamento'] = array(
				'name'  => 'medicamento',
				'id'    => 'medicamento',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('medicamento'),
			);
			$this->data['alergia'] = array(
				'name'  => 'alergia',
				'id'    => 'alergia',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('alergia'),
			);
			$this->data['tiposangre'] = array(
				'name'  => 'tiposangre',
				'id'    => 'tiposangre',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('tiposangre'),
			);
			$this->data['nomcontacto'] = array(
				'name'  => 'nomcontacto',
				'id'    => 'nomcontacto',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('nomcontacto'),
			);
			$this->data['phonecontacto'] = array(
				'name'  => 'phonecontacto',
				'id'    => 'phonecontacto',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phonecontacto'),
			);
                        
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

			$this->_render_page('auth/create_user', $this->data);
		}
	}

	//edit a user
	function edit_user($id)
	{
		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}
                ///
               
		$tables = $this->config->item('tables','ion_auth');

                ///
                
		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|trim|min_length[3]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|trim|min_length[3]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim|min_length[7]|max_length[10]|integer|xss_clean');
		$this->form_validation->set_rules('codtarjeta', $this->lang->line('edit_user_validation_codtarjeta_label'), 'trim|min_length[15]|max_length[20]|integer|xss_clean');
		$this->form_validation->set_rules('cedula', $this->lang->line('edit_user_validation_cedula_label'), 'required|integer|min_length[10]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('direccion', $this->lang->line('edit_user_validation_direccion_label'), 'required|trim||min_length[3]|max_length[80]|xss_clean');
		$this->form_validation->set_rules('nombre_enfermedad', $this->lang->line('edit_user_validation_nombre_enfermedad_label'), 'trim|min_length[5]|max_length[40]|xss_clean');
		$this->form_validation->set_rules('medicamento', $this->lang->line('edit_user_validation_medicamento_label'), 'trim|min_length[4]|max_length[40]|xss_clean');
		$this->form_validation->set_rules('alergia', $this->lang->line('edit_user_validation_alergia_label'), 'trim|min_length[2]|max_length[40]|xss_clean');
		$this->form_validation->set_rules('peso', $this->lang->line('edit_user_validation_peso_label'), 'trim|min_length[2]|max_length[3]|integer|xss_clean');
		$this->form_validation->set_rules('genero', $this->lang->line('edit_user_validation_genero_label'));
		$this->form_validation->set_rules('discapacidad', $this->lang->line('edit_user_validation_discapacidad_label'), 'trim|min_length[2]|max_length[50]|xss_clean');
		$this->form_validation->set_rules('tiposangre', $this->lang->line('edit_user_validation_tiposangre_label'), 'required|xss_clean');
		$this->form_validation->set_rules('nomcontacto', $this->lang->line('edit_user_validation_nomcontacto_label'), 'required|trim|min_length[7]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('phonecontacto', $this->lang->line('edit_user_validation_phonecontacto_label'), 'required|trim|min_length[7]|max_length[10]|integer|xss_clean');
		                
                $this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');
               
                ///////
                //personalizar mensajes de error
                $this->form_validation->set_message("required", "%s: Este campo es requerido.");
                $this->form_validation->set_message("valid_email", "%s: Escriba un email válido.");
                $this->form_validation->set_message("valid_cedula", "%s: Escriba un num de cédula valido.");
                $this->form_validation->set_message("min_length", "%s: Requeridos minimo %s caracteres.");
                $this->form_validation->set_message("max_length","%s: No puede escribir mÃ¡s de %s caracteres.");
                $this->form_validation->set_message('matches', 'Los campos %s y %s no coinciden');
                $this->form_validation->set_message('is_unique', 'Este %s ya esta registrado');
                $this->form_validation->set_message('integer', '%s: Ingrese solo dígitos');
                //////
		if (isset($_POST) && !empty($_POST))
		{
			//update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'first_name'  => $this->input->post('first_name'),
					'last_name'   => $this->input->post('last_name'),
					'cedula'      => $this->input->post('cedula'),
                                        'fnacimiento' => $this->input->post('fnacimiento'),
                                        'genero'      => $this->input->post('genero'),
                                        'discapacidad'=> $this->input->post('discapacidad'),
					'phone'       => $this->input->post('phone'),
                                        'codtarjeta'  => $this->input->post('codtarjeta'),
                                        'peso'        => $this->input->post('peso'),
                                        'direccion'   => $this->input->post('direccion'),
                                        'nombre_enfermedad'=> $this->input->post('nombre_enfermedad'),
				        'medicamento' => $this->input->post('medicamento'),
				        'alergia'     => $this->input->post('alergia'),
                                        'tiposangre'  => $this->input->post('tiposangre'),
					'nomcontacto' => $this->input->post('nomcontacto'),
                                        'phonecontacto'=> $this->input->post('phonecontacto'),
				);
                               
				
				//update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				

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
				
			//check to see if we are updating the user
			   if($this->ion_auth->update($user->id, $data))
			    {
			    	//redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->messages() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

			    }
			    else
			    {
			    	//redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->errors() );
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
                 $this->data['fnacimiento'] = array(
                        'name'  => 'fnacimiento',
                        'id'    => 'fnacimiento',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('fnacimiento', $user->fnacimiento),
		);
                $this->data['genero'] = array(
        		'name'  => 'genero',
			'id'    => 'genero',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('genero', $user->genero),
			);
                $this->data['discapacidad'] = array(
			'name'  => 'discapacidad',
			'id'    => 'discapacidad',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('discapacidad', $user->discapacidad),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
                $this->data['codtarjeta'] = array(
                        'name'  => 'codtarjeta',
                        'id'    => 'codtarjeta',
                        'type'  =>  'text',
                        'value' =>  $this->form_validation->set_value('codtarjeta', $user->codtarjeta),
                );
                $this->data['peso'] = array(
			'name'  => 'peso',
			'id'    => 'peso',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('peso', $user->peso),
		);
                $this->data['direccion'] = array(
			'name'  => 'direccion',
			'id'    => 'direccion',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('direccion', $user->direccion),
		);
                 $this->data['nombre_enfermedad'] = array(
			'name'  => 'nombre_enfermedad',
			'id'    => 'nombre_enfermedad',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('nombre_enfermedad', $user->nombre_enfermedad),
		);
		$this->data['medicamento'] = array(
			'name'  => 'medicamento',
			'id'    => 'medicamento',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('medicamento', $user->medicamento),
		);
		$this->data['alergia'] = array(
			'name'  => 'alergia',
			'id'    => 'alergia',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('alergia', $user->alergia),
		);
                $this->data['tiposangre'] = array(
                        'name'  => 'tiposangre',
			'id'    => 'tiposangre',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('tiposangre', $user->tiposangre),
		);
		$this->data['nomcontacto'] = array(
				'name'  => 'nomcontacto',
				'id'    => 'nomcontacto',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('nomcontacto', $user->nomcontacto),
		);
		$this->data['phonecontacto'] = array(
				'name'  => 'phonecontacto',
				'id'    => 'phonecontacto',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phonecontacto', $user->phonecontacto),
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

		$this->_render_page('auth/edit_user', $this->data);
	}

	// create a new group
	function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('description', $this->lang->line('create_group_validation_desc_label'), 'xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$this->_render_page('auth/create_group', $this->data);
		}
	}

	//edit a group
	function edit_group($id)
	{
		// bail if no group id given
		if(!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|xss_clean');// |alpha_dash
		$this->form_validation->set_rules('group_description', $this->lang->line('edit_group_validation_desc_label'), 'xss_clean');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("auth", 'refresh');
			}
		}

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['group'] = $group;

		$this->data['group_name'] = array(
			'name'  => 'group_name',
			'id'    => 'group_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_name', $group->name),
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		$this->_render_page('auth/edit_group', $this->data);
	}


	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function _render_page($view, $data=null, $render=false)
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $render);

		if (!$render) return $view_html;
	}

}
