<?php

class Botonpanicoestado_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

	function getAlertaByUser($botonpanicoid)
	{
            $this -> db -> select('b.*,u.*');
            $this -> db -> from('botonpanico b');
            $this -> db -> where('b.idB', $botonpanicoid);
           
           
             $this->db->join('users u', 'b.users_id = u.id');//ojo para obtener el usuario
            
            $query = $this -> db -> get();  

            //return $query->row();
            return $query;
            
            
            
	}

	function saveEnfermedadUser($data)
	{
		$this->db->insert('enfermedad', $data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

	function getById($id)
	{
            $this -> db -> select('*');
            $this -> db -> from('enfermedad');
            $this -> db -> where('id', $id);
//            $this -> db -> limit(1);
            $query = $this -> db -> get();

        //    $query = $this->db->get();
//            $ret = $query->row();
//            return $ret->contacuentasplan_codventa;    

            return $query->row_array();
	}
        
        
	function edit($data, $idB)
	{            
            $this->db->where('idB', $idB);
            $res = $this->db->update('botonpanico', $data); 
            return $res;  
            
        }
      
}
?>