<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo a las p&aacute;ginas de este sitio.');

class Servidor3_nusoap extends CI_Controller {

   function  __construct() {
      parent::__construct();

      $this->load->library('nu_soap');

      // Instanciamos la clase servidor de nusoap
      $this->NuSoap_server = new nusoap_server();

      // Creamos el End Point, es decir, el lugar donde la peticiÃ³n cliente va a buscar la estructura del WSDL
      // aunque hay que recordar que nusoap genera dinÃ¡micamente dicha estructura XML
      $end_point = base_url().index_page().'servidor3_nusoap/index/wsdl';

      // Indicamos cÃ³mo se debe formar el WSDL
      $this->NuSoap_server->configureWSDL('BotonWSDL', 'urn:BotonWDSL', $end_point, 'rpc');

      $this->NuSoap_server->wsdl->addComplexType(
              'Boton'         # Creamos nuestro propio tipo de datos, llamado Alerta, lo vamos a utilizar para regresar la respuesta
              , 'complexType'    # Es de tipo complejo, es decir, un array o array asociativo
              , 'array'          # Su equivalencia en PHP en este caso, es de tipo array, ('struct' equivale a array asociativo)
              , ''               # ComposiciÃ³n: 'all' | 'sequence' | 'choice', en nuestro caso no aplica
              , 'SOAP-ENC:Array' # CÃ³mo se debe tratar y validar esta estructura de dato
              , array(           # Los elementos del array
                  'id' => array('name' => 'id', 'type' => 'xsd:int')
              )
      );
      
      
      $this->NuSoap_server->register(
              // crear en forma de clase (controller..nombre del mÃ©todo)
              'Servidor3_nusoap..crear_botonpanico'    # El nombre de la funciÃ³n PHP: Clase.mÃ©todo Ã³ Clase..mÃ©todo
//              , array('id' => 'xsd:int')           # QuÃ© datos recibe
                ,array(           # QuÃ© datos recibe
                  
                    'longitud' => 'xsd:string',
                    'latitud' => 'xsd:string',
                    'persona_id' => 'xsd:int',
                    'codtarjeta' => 'xsd:string',
                )                       
              , array('return' => 'tns:Boton')  # QuÃ© datos regresa, aquÃ­ se aprecia nuestro propio tipo de datos que definimos en addComplexType()
              , 'urn:BotonWSDL'                 # El elemento namespace de nuestro mÃ©todo
              , 'urn:BotonWSDL#crear_botonpanico'  # La acciÃ³n u operaciÃ³n de nuestro mÃ©todo
              , 'rpc'                              # El estilo del XML
              , 'encoded'                          # CÃ³mo se usa: 'literal' | 'encode'
              , "Recibe informacion para agregar una nueva alerta del boton de panico." # Texto de ayuda de nuestro mÃ©todo
      );
   } // end Constructor

   function index() {
      $_SERVER['QUERY_STRING'] = '';

      if ( $this->uri->segment(3) == 'wsdl' ) {
         $_SERVER['QUERY_STRING'] = 'wsdl';
      } // endif

      $this->NuSoap_server->service(file_get_contents('php://input'));
   }  // end function
   
   
   function crear_botonpanico($long, $lat, $persona_id, $codtarjeta){
       
      $CI =& get_instance();
      $CI->load->model('botonpanico_model');

       $CI->load->model('generic_model');
     
         $contador = $CI->generic_model->get(
              'botonpanico', 
              array('codtarjeta'=> $codtarjeta), 
              'contadorestados, users_id ', null, 1);
       
         $contador2 = $CI->generic_model->get(
              'users', 
              array('codtarjeta'=> $codtarjeta), 
              'id ', null, 1);
         
         $contadorestados=1;
  
         
         if($contador){
          $persona_id=$contador->users_id;
          $contadorestados=$contador->contadorestados;
          
      }else{
          $persona_id=$contador2->id;
      }
      
    $parts = array(
          'longitud' => $long,
          'latitud' => $lat,
          'fecha' => date('Y-m-d',time()),
          'hora' => date('H:i:s',time()),
          'estado' => 0,//ojo
          'contadorestados' =>$contadorestados,
          'users_id'=> $persona_id,
          'codtarjeta' => $codtarjeta,
      );
//    
      $boton_id = $CI->botonpanico_model->save($parts);       
      $row = array(
              'name'=>$boton_id,
              'fecha'=>$persona_id
      );
//      print_r($row);
      return $row;
   }
   
   
} 

/* End of file servidor_nusoap.php */