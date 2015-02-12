
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mapa_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_markers()
    {
        $markers = $this->db->get('alertamedica');
                                                    
                                                    //OJO debo transformar de grados a decimales
        if($markers->num_rows()>0)
        {
           // if($row->estado!=2){ 
            return $markers->result();
            //}
        }
    }
}