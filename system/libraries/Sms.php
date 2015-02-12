<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
/*
* Esta clase esta basada en investigaciones y choreos de Pablo Glanz
* Envia SMS a traves de la funcion mail de PHP
*/
 
class Sms
{
 
	var $_empresas = array(	'PERSONAL'=>'personal-net.com.ar',//ojojojoj
						  	'MOVISTAR','sms.movistar.net.ec',
							'CNT','',
							'CLARO',''
							
						   );
 
	var $empresa;
	var $mensaje;
	var $nroCel;
	var $emailEnvia = "mail@from.com";
 
 
	 // ================ //
	// Constructor	  //
	// ================ //
	function Sms($empresa=null){
 
		if(!is_null($empresa) && in_array($empresa, $this->_empresas))
			$this->empresa = $empresa;
	}
 
	/**
	 * Envia el sms
	 *
	 * @param unknown_type $mensaje
	 * @param unknown_type $nroCel
	 */
	function enviar($mensaje, $nroCel, $empresa=null){
 
		if( !is_null($empresa) && isset($this->_empresas[$empresa]) ){
			$destinatario = $nroCel.'@'.$this->_empresas[$empresa];
			$mensaje = wordwrap($mensaje, 100);
 
			$asunto = 'Tu asunto';
			$cabeceras = 'From: from@from.com' . "\r\n" .
			'Reply-To: to@to.com.net' . "\r\n" .
			'X-Mailer: PHP/';
 
			mail($destinatario, $asunto, $mensaje, $cabeceras);
		}else{
			foreach($this->_empresas as $emp => $empresa){
 
					$mensaje = wordwrap($mensaje, 100);
					$destinatario = $nroCel.'@'.$empresa;
					$asunto = 'tu asunto';
					$cabeceras = 'From: from@from.com' . "\r\n" .
					'Reply-To: reply@reply.com' . "\r\n" .
					'X-Mailer: PHP/';
 
					mail($destinatario, $asunto, $mensaje, $cabeceras);
 
			}
 
		}
	}
 
}
 
?>
