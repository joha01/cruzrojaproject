<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo a las p&aacute;ginas de este sitio.');

class Servidor2_nusoap extends CI_Controller {

   function  __construct() {
      parent::__construct();

      $this->load->library('nu_soap');

      // Instanciamos la clase servidor de nusoap
      $this->NuSoap_server = new nusoap_server();

      // Creamos el End Point, es decir, el lugar donde la petición cliente va a buscar la estructura del WSDL
      // aunque hay que recordar que nusoap genera dinámicamente dicha estructura XML
      $end_point = base_url().index_page().'servidor2_nusoap/index/wsdl';

      // Indicamos cómo se debe formar el WSDL
      $this->NuSoap_server->configureWSDL('UsuarioWSDL', 'urn:UsuarioWDSL', $end_point, 'rpc');

      $this->NuSoap_server->wsdl->addComplexType(
              'Usuario'         # Creamos nuestro propio tipo de datos, llamado Alerta, lo vamos a utilizar para regresar la respuesta
              , 'complexType'    # Es de tipo complejo, es decir, un array o array asociativo
              , 'array'          # Su equivalencia en PHP en este caso, es de tipo array, ('struct' equivale a array asociativo)
              , ''               # Composición: 'all' | 'sequence' | 'choice', en nuestro caso no aplica
              , 'SOAP-ENC:Array' # Cómo se debe tratar y validar esta estructura de dato
              , array(           # Los elementos del array
                  'id' => array('name' => 'id', 'type' => 'xsd:int')
              )
      );
      
      
      $this->NuSoap_server->register(
              'Servidor2_nusoap..crear_usuario'    # El nombre de la función PHP: Clase.método ó Clase..método
//              , array('id' => 'xsd:int')           # Qué datos recibe
                ,array(           # Qué datos recibe
                    'first_name'        => 'xsd:string',
                    'last_name'         => 'xsd:string',
                    'cedula'            => 'xsd:string',
                    'phone'             => 'xsd:string',
                    'codtarjeta'        => 'xsd:string',
                    'direccion'         => 'xsd:string',
                    'fnacimiento'       => 'xsd:date',
                    'peso'              => 'xsd:string',
                    'genero'            => 'xsd:string',
                    'tiposangre'        => 'xsd:string',
                    'nombre_enfermedad' => 'xsd:string',
                    'medicamento'       => 'xsd:string',
                    'alergia'           => 'xsd:string',
                    'discapacidad'      => 'xsd:string',
                    'nomcontacto'       => 'xsd:string',
                    'phonecontacto'     => 'xsd:string',
                    'observacion'       => 'xsd:string',
                    
                 )                       
              , array('return' => 'tns:Usuario')  # Qué datos regresa, aquí se aprecia nuestro propio tipo de datos que definimos en addComplexType()
              , 'urn:UsuarioWSDL'                 # El elemento namespace de nuestro método
              , 'urn:UsuarioWSDL#crear_usuario'  # La acción u operación de nuestro método
              , 'rpc'                              # El estilo del XML
              , 'encoded'                          # Cómo se usa: 'literal' | 'encode'
              , "Recibe informacion para agregar un nuevo usuario al sistema." # Texto de ayuda de nuestro método
      );
   } // end Constructor

   function index() {
      $_SERVER['QUERY_STRING'] = '';

      if ( $this->uri->segment(3) == 'wsdl' ) {
         $_SERVER['QUERY_STRING'] = 'wsdl';
      } // endif

      $this->NuSoap_server->service(file_get_contents('php://input'));
   }  
   
   // Para verificar solicitud de registro de un usuario movil al sistema
   function crear_usuario($first_name, $last_name, $cedula,$phone,$codtarjeta, $direccion, $fnacimiento,$peso, $genero,   $tiposangre, $nombre_enfermedad, $medicamento, $alergia, $discapacidad, $nomcontacto, $phonecontacto){
       $CI =& get_instance();
      $CI->load->model('usuario_model');
/////////////
      $CI->load->model('generic_model');
    
      ////////////
      
    $parts = array(
          'active'           => 0,
          'first_name'       => $first_name,
          'last_name'        => $last_name,
          'cedula'           => $cedula,
          'phone'            => $phone,
          'codtarjeta'       => $codtarjeta,
          'direccion'        =>$direccion,
          'fnacimiento'      => $fnacimiento,
          'peso'             => $peso,
          'genero'           => $genero,
          'created_on'       =>'2014-11-27',
          'tiposangre'       => $tiposangre,
          'nombre_enfermedad'=> $nombre_enfermedad,
          'medicamento'      => $medicamento,
          'alergia'          => $alergia,
          'discapacidad'     =>$discapacidad,
          'nomcontacto'      =>$nomcontacto,
          'phonecontacto'    =>$phonecontacto,
          'observacion'      =>'Sin Revisión'
      );
   
      $usuario_id = $CI->usuario_model->save($parts); 
      
      ////////////////
      $partsUser = array(
          'user_id'       => $usuario_id,
          'group_id'        => 5
       ); 
      
      $CI->generic_model->save($partsUser, 'users_groups');
      ////////////////////
      
      
      
      $row = array(
              'name'=>$usuario_id
      );
   
      return $row;
   }

} 

/* End of file servidor_nusoap.php */