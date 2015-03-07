
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mapa_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_markers()
    {

        $this -> db -> select('a.*, b.*, ta.tipo');
            //$this -> db -> from('alertamedica a');
            $this -> db -> from('alertamedica a, botonpanico b');
            //$this -> db -> join('tipoaccidente ta','a.tipoaccidente_id = ta.id');
             $this -> db -> join('tipoaccidente ta','a.tipoaccidente_id = ta.id && a.estado = 1');
             $this -> db -> order_by('fecha','desc');   
            $markers = $this -> db -> get();

                if($markers->num_rows()>0)
        {
           // if($row->estado!=2){ 
            return $markers->result();
            //}
        }
        
    }
}