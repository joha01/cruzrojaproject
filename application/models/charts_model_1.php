<?php

class Charts_model_1 extends CI_Model {

	function __construct()
	{
		parent::__construct();
                $this->load->database();
	}
	
	public function record_count() {
		return $this->db->count_all("alertamedica");
	}
	public function fetch_prueba($limit, $start) {
		$this->db->limit($limit, $start);
		$query = $this->db->get("alertamedica");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

}
?>

