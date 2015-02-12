<?php

class Usuario_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

	function save($form_data)
	{                
            $this->db->insert('users', $form_data ); 
             
            return $this->db->insert_id();
        
	}
        
        function save_enfermedades_usuario($usuario_id, $form_data2)
	{   
            
            $this -> db -> where('users_id', $usuario_id);
            $this->db->insert('enfermedad', $form_data2 );  
            return $this->db->insert_id();
        
	}
        
        
	function get_last()
	{
//          $this -> db -> where('users_id', $userid);
            $this -> db -> select('u.*, e.nombre, e.medicamento, e.alergia');
            $this -> db -> from('users u');
            $this -> db -> join('enfermedad e','e.users_id = u.id');
//            $this -> db -> order_by('id','desc');            
            //$this -> db -> limit(1);
            $query = $this -> db -> get();
            
            return $query;
            
            
	}        
}
?>