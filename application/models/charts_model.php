<?php

class Charts_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

	
        function getData($fechainicio, $fechafin)
	{
            
            $query = $this->db->query(
                    "SELECT COUNT(a.id) users, a.tipoaccidente_id population, ta.tipo contries
                    FROM alertamedica a, tipoaccidente ta WHERE a.fecha between '".$fechainicio."' and '".$fechafin."' AND a.tipoaccidente_id = ta.id GROUP BY tipoaccidente_id ");
         return $query->result();
	}
}
?>

