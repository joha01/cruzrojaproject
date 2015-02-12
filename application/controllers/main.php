<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller { 
	
	function __construct() {
		parent::__construct();
		$this->load->model('bookmarksModel');
                $this->load->model('mapa_model');
                $this->load->helper('url');
                $this->load->helper('html');
                $this->load->library('image_lib');
                $this->load->library('table');
                $this->load->library('form_validation');
		$this->load->database();

	}

	public function index() {
            $this->load->helper('html5');
            
           
	}
        
       function index2($userid)
	{
               
            $user = array();
			$result = $this->bookmarksModel->getByUser($userid);
			if ($result != FALSE){
				$user = array('result' => $result);
			}else {
				$user = array('result' => '');
			}	

            $this->load->view('ver_info_usuario',$user);       
	}
        
            
        
        
        public function prim() {
            $data['mensajes'] = $this->bookmarksModel->mensajes();
            $this->load->view('ver_usuarios', $data);
	}
        
        public function seg() {
            $data['mensajes']= $this->bookmarksModel->permisos();
            $this->load->view('ver_permisos', $data);
	}
        
        public function primFormulario() {
            $this->load->view('formulario_view');
	}
        
        //Usuarios Internos al Sistema
        public function buscarUsuarios() {
            $data = array();

		$query = $this->input->get('query', TRUE);

		if ($query) {
			$result = $this->bookmarksModel->buscarU(trim($query));
			if ($result != FALSE){
				$data = array('result' => $result);
			}else {
				$data = array('result' => '');
			}	
		}else{
			$data = array('result' => '');
		}
		$this->load->view('buscar_usuario', $data);
		$this->load->view('footer');
	}
        //ojojojojo
        public function agregar() {//es el administracion de usuarios
            
             //recuperamos la id que hemos envíado por ajax
            $id = $this->input->post('id');
            //solicitamos al modelo los datos de esa id
            $edicion = $this->bookmarksModel->obtener($id);
        //recorremos el array con los datos de ese id y creamos el formulario con el helper form
 
            $docid = array(
                'name' => 'docid',
                'id' => 'docid',
                'value' => $edicion->docid
            );
            $nombres = array(
                'name' => 'nombres',
                'id' => 'nombres',
                'value' => $edicion->nombres
            );
            $apellidos = array(
                'name' => 'apellidos',
                'id' => 'apellidos',
                'value' => $edicion->apellidos
            );
          
               $fnacimiento = array(
                'name' => 'fnacimiento',
                'id' => 'fnacimiento',
                'value' => $edicion->fnacimiento
            );
            $email = array(
                'name' => 'email',
                'id' => 'email',
                'value' => $edicion->email
            );
            $password = array(
                'name' => 'password',
                'id' => 'password',
                'value' => $edicion->password
            );
            
            $direccion = array(
                'name' => 'direccion',
                'id' => 'direccion',
                'value' => $edicion->direccion
            );
            $permisos_id = array(
                'name' => 'permisos_id',
                'id' => 'permisos_id',
                'value' => $edicion->permisos_id
            );
            
            $submit = array(
                'name' => 'editando',
                'id' => 'editando',
                'value' => 'Editar mensaje'
            );
            $oculto = array(
                'id_persona' => $id
               );
 
            //mostramos el formulario con los datos cargados
            ?>
            <?= form_open(base_url() .'index.php/main/actualizar_datos','', $oculto) ?>
            
            <?= form_label('DocID') ?>
            <?= form_input($docid) ?>
                    
            <?= form_label('Nombres') ?>
            <?= form_input($nombres) ?>

            <?= form_label('Apellidos') ?>
            <?= form_input($apellidos) ?>

            <?= form_label('FechaNacimiento') ?>
            <?= form_input($fnacimiento) ?>

            <?= form_label('Email') ?>
            <?= form_input($email) ?>

            <?= form_label('Password') ?>
            <?= form_input($password) ?>

            <?= form_label('Direccion') ?>
            <?= form_input($direccion) ?>
 
             <?= form_label('Permisos') ?>
            <?= form_input($permisos_id) ?>
            
            <?= form_submit($submit) ?>
            <?php     
            }     
   
           function actualizar_datos(){         //función de actualización de los datos de usuarios  
               $id = $this->input->post('id_persona');
               $docid = $this->input->post('docid');
               $nombres = $this->input->post('nombres');
               $apellidos = $this->input->post('apellidos');
               $email = $this->input->post('email');
               $password = $this->input->post('password');
               $direccion = $this->input->post('direccion');
               
               $name = $this->input->post('name');
               $actualizar = $this->bookmarksModel->actualizar_mensaje($id, $docid, $nombres, $apellidos, $email, $password, $direccion, $name);
            
               if($actualizar){
                $this->session->set_flashdata('actualizado', 'La información del Usuario se actualizó correctamente');
                redirect('main/prim', 'refresh');
               }
	}        
        
        public function nuevo_Usuario(){    // Función para crear un Nuevo usuario
            $this->form_validation->set_rules("docid","CI","required|trim|min_length[2]|max_length[50]|xss_clean");
            $this->form_validation->set_rules("nombres","Nombres","required|trim|min_length[2]|max_length[50]|xss_clean");
            $this->form_validation->set_rules("apellidos","Apellidos","required|trim|min_length[4]|max_length[100]|xss_clean");
            $this->form_validation->set_rules("sexo","Sexo","required|trim|min_length[1]|max_length[10]|xss_clean");
            $this->form_validation->set_rules("fnacimiento","Fecha Nacimiento","required|trim|min_length[5]|max_length[100]|xss_clean");
            $this->form_validation->set_rules("email","Email","required|trim|valid_email|xss_clean");
            $this->form_validation->set_rules("password","Password","required|trim|min_length[5]|max_length[12]|xss_clean");
            $this->form_validation->set_rules("direccion","Dirección","required|min_length[3]|max_length[100]|xss_clean");
            $this->form_validation->set_rules("permisos_id","Tipo de permiso","required|min_length[1]|max_length[2]|xss_clean");
            
//personalizar mensajes de error
//            $this->form_validation->set_message("required", Este campo es requerido.");
//            $this->form_validation->set_message("valid_email", Escriba un email válido.");
//            $this->form_validation->set_message("min_length", Requeridos minimo %s caracteres.");
//            $this->form_validation->set_message("max_length", No puede escribir más de %s caracteres.");
// 
            if(!$this->form_validation->run())
            {
                 $this->primFormulario();
            }else{
               $docid = $this->input->post('docid');
               $nombres = $this->input->post('nombres');
               $apellidos = $this->input->post('apellidos');
               $sexo = $this->input->post('sexo');
               $fnacimiento = $this->input->post('fnacimiento');
               $email = $this->input->post('email');
               $password = $this->input->post('password');
               $direccion = $this->input->post('direccion');
               $permisos_id = $this->input->post('permisos_id');
               
               $nuevo = $this->bookmarksModel->agregandoUsuarios($docid, $nombres, $apellidos, $sexo, $fnacimiento, $email, $password, $direccion, $permisos_id);
 
               if($nuevo){
                   $this->session->set_flashdata('correcto', 'El Registro del Nuevo Usuario ha sido realizado con Éxito!');
                   redirect('main/prim', 'refresh');
                  
               }
            } 
    }
             
//	public function guardar() {
//            if ($this->form_validation->run('pre_inscripcion')!=false) {
//			$id_preinsc = $this->bookmarksModel->guardarUI();
//			//redirect('reportes/preinscripcion/'.$id_preinsc);
//		}
//            
////            $data = array(
////                        'docid'   => $this->input->post('docid',TRUE),
////			'nombres'   => $this->input->post('nombres',TRUE),
////			'apellidos'   => $this->input->post('apellidos',TRUE),
////                        'email'   => $this->input->post('email',TRUE),
////                        'password'   => $this->input->post('password',TRUE),
////                        'direccion'   => $this->input->post('direccion',TRUE),
////                        'name'   => $this->input->post('name',TRUE),
////                        
////                );
////		$this->bookmarksModel->guardarUI($data);
////                redirect('main/agregar');
//            
//            
//	}

//	public function guardarD() {
//		$data = array(
//			'medico'   => $this->input->post('medico',TRUE),
//			
//		);
//
//		$this->bookmarksModel->guardar($data);
//		redirect('main/agregar');
//	}

//	public function ver(){
//		$data = array(
//			'enlaces' => $this->bookmarksModel->verTodo()
//			
//		);
//
//		$this->load->view('headers/librerias');
//		$this->load->view('ver', $data);
//		$this->load->view('footer');
//	}
//-----------------------------------Alertas------------------------------------
	public function buscar() {
		$data = array();

		$query = $this->input->get('query', TRUE);

		if ($query) {
			$result = $this->bookmarksModel->buscarA(trim($query));
			if ($result != FALSE){
				$data = array('result' => $result);
			}else {
				$data = array('result' => '');
			}	
		}else{
			$data = array('result' => '');
		}
		$this->load->view('buscar_alerta', $data);
		$this->load->view('footer');
	}

      
        public function verAlertas(){//ojo ARREGLAR el estado de las alertas(MAPA)
		$data = array(
			'enlaces' => $this->bookmarksModel->verTodasLasAlertas()
			
		);
		
		$this->load->view('ver_alertas', $data);
		
                //------------------
                //creamos la configuración del mapa con un array
        $config = array();
        //la zona del mapa que queremos mostrar al cargar el mapa
        //como vemos le podemos pasar la ciudad y el país
        //en lugar de la latitud y la longitud
        $config['center'] = 'loja,ecuador';
        // el zoom, que lo podemos poner en auto y de esa forma
        //siempre mostrará todos los markers ajustando el zoom    
//        $config['zoom'] = '12';        
        $config['zoom'] = '12';    
        //el tipo de mapa, en el pdf podéis ver más opciones
//        $config['map_type'] = 'ROADMAP';
//        //el ancho del mapa        
//        $config['map_width'] = '700px';   
//        //el alto del mapa    
//        $config['map_height'] = '400px';    
        
        
      
        
        //inicializamos la configuración del mapa    
        $this->googlemaps->initialize($config);    
        
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el direccionemergencia
        $markers = $this->mapa_model->get_markers();
        foreach($markers as $info_marker)
        {
            $marker = array();
            //podemos elegir DROP o BOUNCE
            $marker ['animation'] = 'DROP';
            //posición de los markers
            $marker ['position'] = $info_marker->longitud.','.$info_marker->latitud;
            //direccionemergencia de los markers(ventana de información)    
            $marker ['direccionemergencia_content'] = $info_marker->direccionemergencia;
            
            $marker['infowindow_content'] = $info_marker->direccionemergencia;
           
       


            //la id del marker
            $marker['id'] = $info_marker->id; 
            $this->googlemaps->add_marker($marker);
 
            
        }
        
        //en $data['datos'tenemos la información de cada marker para
        //poder utilizarlo en el sidebar en nuestra vista mapa_view
        $data['datos'] = $this->mapa_model->get_markers();
        //en data['map'] tenemos ya creado nuestro mapa para llamarlo en la vista
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('mapa_view',$data);
                //-----------------
                
	}

        
//----------------------------Historial Médico----------------------------------
    public function verHistorial() {
        $data = array(
			'enlaces' => $this->bookmarksModel->verTodosLosHistoriales()
			
		);
		
		$this->load->view('listar_historiales', $data);
		
    }
    public function buscarHistorial() {
        $data = array();

		$query = $this->input->get('query', TRUE);

		if ($query) {
			$result = $this->bookmarksModel->buscarH(trim($query));
			if ($result != FALSE){
				$data = array('enlaces' => $result);
			}else {
				$data = array('enlaces' => '');
			}	
		}else{
			$data = array('enlaces' => '');
		}
           
        $this->load->view('ver_historiales',$data);

    }

//-------------------------------Estadísticas-----------------------------------
    public function verEstadisticas(){
        
    }
//--------------------------------Lista Negra-----------------------------------
        public function verListaNegra(){
                $res = array(
			'alerta' => $this->bookmarksModel->verListaNegra()
			
		);             
		$this->load->view('ver_lista', $res);  
	}
//---------------------------------Administración-------------------------------
        public function administrar(){
            
        }
        
//--------------Administración de Permisos------------------------------
        
        public function buscarPermisos() {
            $data['grupos'] = $this->bookmarksModel->get_grupos();
            
       $this->load->view('listar_grupos',$data);
	//$this->load->view('selector_grupos',$data);
			
	}

        public function presentaUsuariosDeGrupo() {
            $nombregrupo = $this->input->post('selProfesiones');
         
                    $data = array(
                        'result2' => $this->bookmarksModel->buscarUsuariosDelGrupo(trim($nombregrupo))
                            );

               $this->load->view('listar_grupos', $data); 
        }
        
        public function agregarPermisos() {
//            $data = array(
//			'nombres'   => $this->input->post('nombres',TRUE),
//			'apellidos'   => $this->input->post('apellidos',TRUE),
//                        'docid'   => $this->input->post('docid',TRUE),
//                        'direccion'   => $this->input->post('direccion',TRUE),
//                        'email'   => $this->input->post('email',TRUE),
//                        'password'   => $this->input->post('password',TRUE),
//                        );
//		$this->bookmarksModel->guardarUI($data);
//                
//            
//            $datos['arrPermisos'] = $this->bookmarksModel->get_permisos();
//            $this->load->view('agregar_usuarios',$datos);
            
            
            $data['titulo'] = "Administración de Permisos";     
            $this->load->view('ubigeo_vista', $data);
		
	}  
        
        public function cancelar(){
            
            //$this->load->view('headers/menu');
        }
        
        
        
        
        public function nuevoUSis()	{
//		
		if ($this->form_validation->run('pre_inscripcion')!=false) {
			$id_preinsc = $this->data_db->pre_inscripcion();
			$this->load->view('headers/menu');
                        //redirect('main/usuarios/'.$id_preinsc);
		}

		$data['error']="";

		$data['content']='Preinscripcion';
		
	}
        
        public function mostrarPermisos() {//es el administracion de permisos
        $id = $this->input->post('id');

        $edicion = $this->bookmarksModel->obtener2($id);

            $name = array(
                'name' => 'name',
                'id' => 'name',
                'value' => $edicion->name
            );
            $nombres = array(
                'name' => 'nombres',
                'id' => 'nombres',
                'value' => $edicion->nombres
            );
            $apellidos = array(
                'name' => 'apellidos',
                'id' => 'apellidos',
                'value' => $edicion->apellidos
            );
          
            $submit = array(
                'name' => 'editando',
                'id' => 'editando',
                'value' => 'Editar mensaje'
            );
            $oculto = array(
                'id_permisos' => $id
               );
 
            //mostramos el formulario con los datos cargados
            ?>
            <?= form_open(base_url() .'index.php/main/actualizar_datosPermisos','', $oculto) ?>
            
            <?= form_label('name') ?>
            <?= form_input($name) ?>
                    
            <?= form_label('Nombres') ?>
            <?= form_input($nombres) ?>

            <?= form_label('Apellidos') ?>
            <?= form_input($apellidos) ?>

            
            <?= form_submit($submit) ?>
            <?php     
            }     
 
           //función encargada de actualizar los datos     
           function actualizar_datosPermisos()      {         
               $id = $this->input->post('id_permisos');
               $name = $this->input->post('docid');
               $nombres = $this->input->post('nombres');
               $apellidos = $this->input->post('apellidos');
               $actualizar = $this->bookmarksModel->actualizar_permisos($id,$name,$nombres,$apellidos);
            
               if($actualizar){
                $this->session->set_flashdata('actualizado', 'El mensaje se actualizó correctamente');
                redirect('main/seg', 'refresh');
               }
	}

        //función para enviar notificaciones via mensaje de texto
        function enviar_mensaje(){
            ## SMS a nros con el siguiente formato <codigo_area_sin_cero><numero_sin_15> $nro=11435598; //este nro. no existe 
            $this->sms->enviar('Texto SMS',$nro,'MOVISTAR');
        }
        
        
        //----------------------PARA EL EDITAR ESTADO DE LAS ALERTAS------------
        function actualizar_estadoAlerta(){         //función de actualización de los datos de usuarios  
               $id = $this->input->post('id');
               $direccionemergencia = $this->input->post('direccionemergencia');
               $numerocelular = $this->input->post('numerocelular');
               $numerovictimas = $this->input->post('numerovictimas');
               $longitud = $this->input->post('longitud');
               $latitud = $this->input->post('latitud');
               $fecha = $this->input->post('fecha');
               $hora = $this->input->post('hora');
               
               $estado = $this->input->post('estado');
               $actualizar = $this->bookmarksModel->actualizar_estado($id, $direccionemergencia, $numerocelular, $numerovictimas, $longitud, $latitud, $fecha, $hora, $estado);
            
               if($actualizar){
                $this->session->set_flashdata('actualizado', 'El ESTADO de la Alerta se ha actualizado');
                redirect('auth/index', 'refresh');
               }
	}   
        public function agregarE() {// ojo es para editar la alerta médica(ESTADO)
            
             //recuperamos la id que hemos envíado por ajax
            $id = $this->input->post('id');
            //solicitamos al modelo los datos de esa id
            $edicion = $this->bookmarksModel->obtenerA($id);
        //recorremos el array con los datos de ese id y creamos el formulario con el helper form
 
            $direccionemergencia = array(
                'name' => 'direccionemergencia',
                'id' => 'direccionemergencia',
                'value' => $edicion->direccionemergencia
            );
            $numerocelular = array(
                'name' => 'numerocelular',
                'id' => 'numerocelular',
                'value' => $edicion->numerocelular
            );
            $numerovictimas = array(
                'name' => 'numerovictimas',
                'id' => 'numerovictimas',
                'value' => $edicion->numerovictimas
            );
          
               $longitud = array(
                'name' => 'longitud',
                'id' => 'longitud',
                'value' => $edicion->longitud
            );
            $latitud = array(
                'name' => 'latitud',
                'id' => 'latitud',
                'value' => $edicion->latitud
            );
            $fecha = array(
                'name' => 'fecha',
                'id' => 'fecha',
                'value' => $edicion->fecha
            );
            
            $hora = array(
                'name' => 'hora',
                'id' => 'hora',
                'value' => $edicion->hora
            );
            $estado = array(
                'name' => 'estado',
                'id' => 'estado',
                'value' => $edicion->estado
            );
            
            $submit = array(
                'name' => 'editando',
                'id' => 'editando',
                'value' => 'Editar mensaje'
            );
            $oculto = array(
                'id_alerta' => $id
               );
 
            //mostramos el formulario con los datos cargados
            ?>
            <?= form_open(base_url() .'index.php/main/actualizar_estadoAlerta','', $oculto) ?>
            
            <?= form_label('Dirección') ?>
            <?= form_input($direccionemergencia) ?>
                    
            <?= form_label('Celular') ?>
            <?= form_input($numerocelular) ?>

            <?= form_label('Victimas') ?>
            <?= form_input($numerovictimas) ?>

            <?= form_label('Longitud') ?>
            <?= form_input($longitud) ?>

            <?= form_label('Latitud') ?>
            <?= form_input($latitud) ?>

            <?= form_label('Fecha') ?>
            <?= form_input($fecha) ?>

            <?= form_label('Hora') ?>
            <?= form_input($hora) ?>
 
             <?= form_label('Estado') ?>
            <?= form_input($estado) ?>
            
            <?= form_submit($submit) ?>
            <?php     
            }     
   /////////////////////////////////////////////////////////////////////////////
            public function verPeticiones() {
                $data = array(
			'enlaces' => $this->bookmarksModel->verTodasLasPeticiones()	
		);
		$this->load->view('listar_peticiones', $data);
		
            }
    
    
    function ver_user(){  
        
        $data = array(
                
                'observacion' => $this->input->post('observacion')
            );
        
        $result = $this->bookmarksModel->verInfoUsuario($data,$this->input->post('id'));	
        
        if($result){
                
                //echo tagcontent('strong', 'La actualizacion se ha realizado correctamente', array('class'=>'text-success'));
                redirect('main/verPeticiones', 'refresh');
            }else{
                echo tagcontent('strong', 'Ocurrio un problema, no se pudo realizar la actualizacion', array('class'=>'text-success'));                

            }

        }
    
           public function verEst() {
        
		
		$this->load->view('charts/charts');
		
    }
    public function obtenerContador($persona_id){
        echo $persona_id;
        
        $data = array(
			'enlaces' => $this->bookmarksModel->buscarTelefono($persona_id)	
		);
		
                
                return $persona_id;      
             //***********
//      $CI->load->model('bookmarksModel'); 
//
//               $alerta = $CI->bookmarksModel->buscarTelefono($persona_id);       
//
//		$row = array(
//              'name'=>$alerta
//      );
//
//      
	
       
//                                $contadorestados= $alerta;
//                    
//                              
//                   
//               
//      
//     //********** 
    }

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */