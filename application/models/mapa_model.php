
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mapa_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_markers()
    {
//        $markers = $this->db->get('alertamedica');
//                                                    
//                                                    //OJO debo transformar de grados a decimales
//        if($markers->num_rows()>0)
//        {
//           // if($row->estado!=2){ 
//            return $markers->result();
//            //}
//        }
        $this -> db -> select('a.*, ta.tipo');
            $this -> db -> from('alertamedica a');
            $this -> db -> join('tipoaccidente ta','a.tipoaccidente_id = ta.id');
            //$this -> db -> order_by('id','desc');            
            //$this -> db -> limit(1);
            $markers = $this -> db -> get();

                if($markers->num_rows()>0)
        {
           // if($row->estado!=2){ 
            return $markers->result();
            //}
        }
        
    }
}