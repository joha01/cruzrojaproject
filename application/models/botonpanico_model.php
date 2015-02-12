<?php

class Botonpanico_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

	function save($form_data)
	{                
            $this->db->insert('botonpanico', $form_data ); 
             
            return $this->db->insert_id();
        
	}
        
	function get_last()
	{
            $this -> db -> select('b.idB, b.fecha, b.estado, u.*');
            $this -> db -> from('botonpanico b');
            
            
             $this->db->join('users u', 'b.users_id = u.id');//ojo para obtener el usuario
            
            $query = $this -> db -> get();
            return $query;
                
	}        
}
?>