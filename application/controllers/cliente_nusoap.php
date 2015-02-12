<?php

if ( ! defined('BASEPATH')) exit('No se permite el acceso directo a las p&aacute;ginas de este sitio.');

class Cliente_nusoap extends CI_Controller {

   function  __construct() {
      parent::__construct();

      $this->load->library('nu_soap');
   } // end Constructor

   function index() {
   }  // end function

   function call_crear_alerta() {
      $proxyhost = isset($_POST['proxyhost']) ? $_POST['proxyhost'] : '';
      $proxyport = isset($_POST['proxyport']) ? $_POST['proxyport'] : '';
      $proxyusername = isset($_POST['proxyusername']) ? $_POST['proxyusername'] : '';
      $proxypassword = isset($_POST['proxypassword']) ? $_POST['proxypassword'] : '';

      // Instanciamos la clase cliente de nusoap
      $this->client = new nusoap_client('http://localhost/cruzrojaproject/servidor_nusoap/index/wsdl', 'wsdl',
              $proxyhost, $proxyport, $proxyusername, $proxypassword);

      // Cachamos algún error en los parámetros dados
      $err = $this->client->getError();
      if ($err) {
         echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
      } // endif

      // ¡Importante!
      //  Hacemos la llamada al método en forma de clase (Controlador..Nombre del método)
      $call = 'Servidor_nusoap..crear_alerta';
      
      $parts = array(
          'direccionemergencia' => 'UNL',
         // 'numerocelular' => '0991232931',
          'numerovictimas' => '5',
          'longitud' => '1.45938832',
          'latitud' => '8.87377',

          'codtarjeta' => '23456789',
          'tipoaccidente_id' => '2',
      );
      
      $result = $this->client->call($call, $parts);

      // Gestionamos la respuesta
//        print_r($result);
      $this->_manage_response($result, $this->client->fault, $this->client->getError());

      return;
   } // end function


   /*
    * Acción predeterminada para las pruebas del webservices cliente
   */
   private function _manage_response($result, $is_fault, $is_error) {
      // Fallas
      if ($is_fault) {
         echo '<h2>Falla:</h2><pre>';
         print_r($result);
         echo '</pre>';
         echo '<h2>Request</h2><pre>' . htmlspecialchars($this->client->request, ENT_QUOTES) . '</pre>';
         echo '<h2>Response</h2><pre>' . htmlspecialchars($this->client->response, ENT_QUOTES) . '</pre>';
         echo '<h2>Debug</h2><pre>' . htmlspecialchars($this->client->debug_str, ENT_QUOTES) . '</pre>';
      } else {
         // Errores
         if ($is_error) {
            // Imprimir los detalles del error
            echo '<h2>Error:</h2><pre>' . $is_error . '</pre>';
            echo '<h2>Request</h2><pre>' . htmlspecialchars($this->client->request, ENT_QUOTES) . '</pre>';
            echo '<h2>Response</h2><pre>' . htmlspecialchars($this->client->response, ENT_QUOTES) . '</pre>';
            echo '<h2>Debug</h2><pre>' . htmlspecialchars($this->client->debug_str, ENT_QUOTES) . '</pre>';
         } else {
            // ¡Que felicidad, desplegamos el resultado!
            echo '<h2>Resultado:</h2><pre>';
            print_r($result);
            echo '</pre>';
         }
      }
      return;
   } // end function


} // end Class

/* End of file cliente.php */