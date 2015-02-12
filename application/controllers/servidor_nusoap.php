<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo a las p&aacute;ginas de este sitio.');

class Servidor_nusoap extends CI_Controller {

   function  __construct() {
      parent::__construct();

      $this->load->library('nu_soap');

      // Instanciamos la clase servidor de nusoap
      $this->NuSoap_server = new nusoap_server();

      // Creamos el End Point, es decir, el lugar donde la peticiÃƒÂ³n cliente va a buscar la estructura del WSDL
      // aunque hay que recordar que nusoap genera dinÃƒÂ¡micamente dicha estructura XML
      $end_point = base_url().index_page().'servidor_nusoap/index/wsdl';

      // Indicamos cÃƒÂ³mo se debe formar el WSDL
      $this->NuSoap_server->configureWSDL('AlertaWSDL', 'urn:AlertaWDSL', $end_point, 'rpc');

      $this->NuSoap_server->wsdl->addComplexType(
              'Alerta'         # Creamos nuestro propio tipo de datos, llamado Alerta, lo vamos a utilizar para regresar la respuesta
              , 'complexType'    # Es de tipo complejo, es decir, un array o array asociativo
              , 'array'          # Su equivalencia en PHP en este caso, es de tipo array, ('struct' equivale a array asociativo)
              , ''               # ComposiciÃƒÂ³n: 'all' | 'sequence' | 'choice', en nuestro caso no aplica
              , 'SOAP-ENC:Array' # CÃƒÂ³mo se debe tratar y validar esta estructura de dato
              , array(           # Los elementos del array
                  'id' => array('name' => 'id', 'type' => 'xsd:int')
              )
      );
      
      
      $this->NuSoap_server->register(
              // crear en forma de clase (controller..nombre del mÃƒÂ©todo)
              'Servidor_nusoap..crear_alerta'    # El nombre de la funciÃƒÂ³n PHP: Clase.mÃƒÂ©todo ÃƒÂ³ Clase..mÃƒÂ©todo
//              , array('id' => 'xsd:int')           # QuÃƒÂ© datos recibe
                ,array(           # QuÃƒÂ© datos recibe
                    'direccionemergencia' => 'xsd:string',
                    'numerocelular' => 'xsd:string',
                    'numerovictimas' => 'xsd:int',
                    'longitud' => 'xsd:string',
                    'latitud' => 'xsd:string',

                    'persona_id' => 'xsd:int',
                     'codtarjeta' => 'xsd:string',
                    
                    'tipoaccidente_id' => 'xsd:int',
                )                       
              , array('return' => 'tns:Alerta')  # QuÃƒÂ© datos regresa, aquÃƒÂ­ se aprecia nuestro propio tipo de datos que definimos en addComplexType()
              , 'urn:AlertaWSDL'                 # El elemento namespace de nuestro mÃƒÂ©todo
              , 'urn:AlertaWSDL#crear_alerta'  # La acciÃƒÂ³n u operaciÃƒÂ³n de nuestro mÃƒÂ©todo
              , 'rpc'                              # El estilo del XML
              , 'encoded'                          # CÃƒÂ³mo se usa: 'literal' | 'encode'
              , "Recibe informacion para agregar una nueva alerta medica." # Texto de ayuda de nuestro mÃƒÂ©todo
      );
   } // end Constructor

   function index() {
      $_SERVER['QUERY_STRING'] = '';

      if ( $this->uri->segment(3) == 'wsdl' ) {
         $_SERVER['QUERY_STRING'] = 'wsdl';
      } // endif

      $this->NuSoap_server->service(file_get_contents('php://input'));
   }  // end function
   
   
   function crear_alerta($direccionemergencia,$numerocelular, $n_victimas, $long, $lat, $persona_id, $codtarjeta, $tipoaccidente_id){
      
      $CI =& get_instance();
      $CI->load->model('alertamedica_model');
      $CI->load->model('generic_model');
     
         $contador = $CI->generic_model->get(
              'alertamedica', 
              array('codtarjeta'=> $codtarjeta), 
              'numerocelular, users_id, contadorestados, fecha, hora', null, 1);
       
         $newcontador=1;
      $persona_id=null;
      
      $numerocelular='desconocido';
     
      
      if($contador){
          $persona_id=$contador->users_id;
          $newcontador=$contador->contadorestados;
          
          $numerocelular=$contador->numerocelular;
      }

              $parts = array(
                  'direccionemergencia' => $direccionemergencia,
//                  'numerocelular' => $celular,
                  'numerocelular' => $numerocelular,
                  'numerovictimas' => $n_victimas,
                  'longitud' => $long,
                  'latitud' => $lat,
                  'fecha' => date('Y-m-d',time()),
                  'hora' => date('H:i:s',time()),
                  'estado' => 0,//ojo
                  'users_id' => $persona_id,
                  'codtarjeta'=>$codtarjeta,
                  'contadorestados'=>$newcontador,
                  'tipoaccidente_id' => $tipoaccidente_id
              );
  
              $alerta_id = $CI->alertamedica_model->save($parts); 
      
      $row = array(
              'name'=>$alerta_id,
              'fecha'=>$codtarjeta
//              'hora'=>$contador->hora,
//              'users_id'=>$contador->users_id,
//              'contadorestados'=>$contador->contadorestados
     );

      return $row;     
   }  
   
} 

/* End of file servidor_nusoap.php */