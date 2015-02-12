<?php

class Enfermedad_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

      /** 
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

	function getEnfermedadByUser($userid)
	{
           $this -> db -> select('*');
           //$this -> db -> select('u.nombre_enfermedad, u.medicamento, u.alergia, u.discapacidad');
           $this -> db -> from('users');
          // $this -> db -> from('users u');
            $this -> db -> where('id', $userid);
            $query = $this -> db -> get();
            return $query->result();
           
	}

	function saveEnfermedadUser($data, $users_id)
	{
	$this->db->where('id', $users_id);	
           // $this->db->insert('users', $data);
         $this->db->update('users', $data);     
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

	function getById($id)
	{
            $this -> db -> select('*');
            $this -> db -> from('users');
            $this -> db -> where('id', $id);
            $query = $this -> db -> get();
            return $query->row_array();
	}
        
        
	function edit($data, $id)
	{            
            $this->db->where('id', $id);
             $res = $this->db->update('users', $data); 
            return $res;
	}
}
?>