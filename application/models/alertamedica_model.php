<?php

class Alertamedica_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

	function save($form_data)
	{                
            $this->db->insert('alertamedica', $form_data ); 
             
            return $this->db->insert_id();
        
	}
        //----------------------------------------------------------------------
	function get_last()
	{
            $this -> db -> select('a.*, ta.tipo tipo_accidente');
            $this -> db -> from('alertamedica a');
            $this -> db -> join('tipoaccidente ta','a.tipoaccidente_id = ta.id');
            $this -> db -> order_by('id','desc');            
            //$this -> db -> limit(1);
            $query = $this -> db -> get();
            
            return $query;
            
            
	}        
}
