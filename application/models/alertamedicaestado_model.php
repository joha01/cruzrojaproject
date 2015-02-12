<?php

class Alertamedicaestado_model extends CI_Model {

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

	function getAlertaByUser($alertamedicaid)
	{
            $this -> db -> select('*');
            $this -> db -> from('alertamedica');
            $this -> db -> where('id', $alertamedicaid);
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
        
        
//	function edit($data, $id)
        function edit($direccionemergencia,$numerocelular,$numerovictimas,$estado, $id)
	{     
            
//           $this -> db -> select('contadorestados');
//           $this -> db -> from('alertamedica');
           $this->  db ->where('id', $id);
           
//           $query=$this->db->get();
            
          
                
        
            $res = $this->db->update('alertamedica', $data1); 
            return $res;  
            
        }
      
}
?>