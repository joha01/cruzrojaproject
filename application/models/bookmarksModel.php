<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bookmarksModel extends CI_Model { 

	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('ion_auth');
    }

    
    function validacion($query) {
        $this->db->like('users_id', $query);
        $query = $this->db->get('acceso');
        if ($query->num_rows() > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    
    
    function guardar($data){
    	$this->db->insert('usersenfermedad', $data);
    }

//---------------------------------Historial Médico-----------------------------
  
    function verTodosLosHistoriales(){        
        $this->db->select('p.nombres,p.apellidos,e.nombre,e.medicamento,e.alergia,c.nombreC,c.telefono1');
        $this->db->from('users p');
        
        $this->db->join('contactos c', 'p.id = c.users_id');
        $this->db->join('enfermedad e', 'p.id = e.users_id');
        $query = $this->db->get(); 
        return $query;   
    }

    function buscarH($abuscar) {
        $this->db->like('apellidos', $abuscar);
        $this->db->select('p.nombres,p.apellidos,e.nombre,e.medicamento,e.alergia,c.nombreC,c.telefono1');
        $this->db->from('users p');
                    
        $this->db->join('contactos c', 'p.id = c.users_id');
        $this->db->join('enfermedad e', 'p.id = e.users_id');
        
        $abuscar = $this->db->get(); 
        return $abuscar;      
    }

//-------------------------------------Alertas----------------------------------
    function verTodasLasAlertas(){
         $this -> db -> select('a.*, ta.tipo');
            $this -> db -> from('alertamedica a');
            $this -> db -> join('tipoaccidente ta','a.tipoaccidente_id = ta.id');
            $this -> db -> order_by('id','desc');            
            //$this -> db -> limit(1);
            $query = $this -> db -> get();

        return $query; 
        
        
    }

    function buscarA($query) {
        $this->db->like('direccionemergencia', $query);
        $this->db->select('ta.tipo,a.direccionemergencia,a.numerocelular,a.numerovictimas,a.hora');

        $this->db->from('alertamedica a');
                    
        $this->db->join('tipoaccidente ta', 'a.tipoaccidente_id = ta.id');
        
        $abuscar = $this->db->get(); 
        return $abuscar;   
    }
    
    
    //---------------------------Lista Negra
    function verListaNegra(){       
//        $query = $this->db->query(
//                    "SELECT COUNT(a.id) users, a.tipoaccidente_id population, ta.tipo contries
//                    FROM alertamedica a, tipoaccidente ta WHERE a.fecha between '".$fechainicio."' and '".$fechafin."' AND a.tipoaccidente_id = ta.id GROUP BY tipoaccidente_id ");
//         return $query->result();
        $this -> db -> select('*');
            $this -> db -> from('alertamedica');
            $this -> db -> where('contadorestados < 0');
            $query = $this -> db -> get();  
            return $query;
         
    }
    //--------------------------------Usuarios Internos-------------------------
    function buscarU($query) {
        $this->db->like('docid', $query);
        $this->db->select('p.docid,p.nombres,p.apellidos,p.email,p.direccion,permi.name');
        $this->db->from('users p');
                    
        $this->db->join('userspermisos pp', 'p.id = pp.users_id');
         $this->db->join('permisos permi', 'pp.permisos_id = permi.id');
        
        $abuscar = $this->db->get(); 
        return $abuscar;   
    }
     
    
    function guardarUI(){
        $data1 = "INSERT INTO users (docid,nombres,apellidos,email,password,direccion) VALUES ('$docid','$nombres','$apellidos','$email','$password','$direcion')";
        
         $resultado1=mysql_query($data1);
  
         $this->db->trans_start();
            $this->db->query("INSERT INTO `users`(`docid`,`nombres`,`apellidos`,`email`,`password`,`direccion`)
            	VALUES('".$_POST['docid']."','".$_POST['nombres']."','".$_POST['apellidos']."',".$_POST['email']."','".$_POST['password']."','".$_POST['direccion']."')");
            $almn_id = $this->db->insert_id();

                     
            $this->db->query("INSERT INTO `permisos`(`name`)
            	VALUES('".$name."')");

            $resv = $this->db->insert_id();
        $this->db->trans_complete();

        return  $resv;
    }
    //--------------------------------Extras------------------------------------
    function get_permisos(){ 
        
        $this->db->select('p.name,');
        $this->db->from('groups p');
                   
        $abuscar = $this->db->get(); 
        return $abuscar;   
    } 

    
    function mensajes(){         
         $this->db->select('p.docid,p.nombres,p.apellidos,p.fnacimiento,p.email,p.password,p.direccion,g.name');
        $this->db->from('users p');
        
        $this->db->join('users_groups ug', 'p.id = ug.user_id');
        $this->db->join('groups g', 'g.id = ug.group_id');
        $query = $this->db->get(); 
        
        foreach ($query->result() as $fila) 
        {
            $data[] = $fila;
        }
    return $data;
        
}
 
    //obtenemos la fila completa del mensaje a editar
    //vemos que como solo queremos una fila utilizamos
    //la función row que sólo nos devuelve una fila,
    //así la consulta será más rápida
    function obtener($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        $fila = $query->row();
        return $fila;
    }
 
    //actualizamos los datos en la base de datos con el patrón
    //active record de codeIginiter, recordar que no hace falta
    //escapar las consultas ya que lo hace él automaticámente
             //actualizar_mensaje($id,$docid,$nombres,$apellidos,$email,$password,$direccion,$permisos_id);   
    function actualizar_mensaje($id, $docid, $nombres, $apellidos, $email, $password, $direccion, $permisos_id) {
        $data = array(
            'docid' => $docid,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'email' => $email,
            'password' => $password,
            'direccion' => $direccion,
            'permisos_id' => $permisos_id);
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
    
     function agregandoUsuarios($docid, $nombres, $apellidos, $sexo, $fnacimiento, $email, $password, $direccion, $permisos_id){
        $datos = array(
            'docid'    =>  $docid,
            'nombres'    =>  $nombres,
            'apellidos' =>  $apellidos,
            'sexo'  =>  $sexo,
            'fnacimiento'  =>  $fnacimiento,
            'email'     =>  $email,
            'password'    =>  $password,
            'direccion'   =>  $direccion,
            'permisos_id'       =>  $permisos_id
        );
        return $this->db->insert('users', $datos);
    }
    
//---------------------------------Para permisos--------------------------------
    function permisos(){   
        $this->db->select('p.name,pp.nombres,pp.apellidos');
        $this->db->from('permisos p');           
        $this->db->join('users pp', 'p.id = pp.permisos_id');
        $query = $this->db->get(); 
        
        foreach ($query->result() as $fila) 
        {
            $data[] = $fila;
        }
    return $data;
}

    function obtener2($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('permisos');
        $fila = $query->row();
        return $fila;
    }
 
    
    function actualizar_permisos($id, $name, $nombres, $apellidos) {
       
        $this->db->from('permisos p');           
        $this->db->join('users pp', 'p.id = pp.permisos_id');
        
        
        $data = array(
            'name' => $name,
            'nombres' => $nombres,
            'apellidos' => $apellidos);
           
        $this->db->where('id', $id);
        return $this->db->update('users AND permisos', $data);
    }
    
    ///----------------------Alerta para modificar Estado-----------------------------
    function obtenerA($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('alertamedica');
        $fila = $query->row();
        return $fila;
    }
    
    function actualizar_estado($id, $direccionemergencia, $numerocelular, $numerovictimas, $longitud, $latitud, $fecha, $hora, $estado) {
        $data = array(
            'direccionemergencia' => $direccionemergencia,
            'numerocelular' => $numerocelular,
            'numerovictimas' => $numerovictimas,
            'longitud' => $longitud,
            'latitud' => $latitud,
            'fecha' => $fecha,
            'hora' => $hora,
            'estado' => $estado);
        $this->db->where('id', $id);
        return $this->db->update('alertamedica', $data);
    }
    
    function get_grupos(){
        $query = $this->db->query('SELECT id ,name FROM groups');
        // si hay resultados
    if ($query->num_rows() > 0) {
        // almacenamos en una matriz bidimensional
        foreach($query->result() as $row)
           $arrDatos[htmlspecialchars($row->id, ENT_QUOTES)] = htmlspecialchars($row->name, ENT_QUOTES);

        $query->free_result();
        return $arrDatos;
    }
    }
    function buscarUsuariosDelGrupo($query) {
       
        $this->db->like('group_id', $query);
        $this->db->select('ug.group_id, ug.user_id, u.first_name, u.last_name, u.cedula ,u.phone, u.direccion');
        $this->db->from('users_groups ug');
         $this->db->join('users u', 'ug.user_id = u.id');
        
        $abuscar = $this->db->get(); 
        return $abuscar;   
    }
     
    function verTodasLasPeticiones() {
        $query = $this->db->query(
                "SELECT * 
                    FROM users  WHERE ip_address is null ORDER BY created_on ASC");
        return $query;
    }
    function verInfoUsuario($data, $id) {
         
//        $this->db->like('users_id', $query);
//        $this->db->select('e.*, u.*');
//           $this->db->from('enfermedad e');                    
//        $this->db->join('users u', 'e.users_id = u.id');
//         $query = $this -> db -> get();  
//            return $query;
            
            
            $this->db->where('id', $id);
            $res = $this->db->update('users', $data); 
            return $res;  
    }
   
    	function getByUser($userid){
     
            $this -> db -> select('*');
            $this -> db -> from('users');
            $this -> db -> where('id', $userid);
            $query = $this -> db -> get();  
            return $query;
//            
        
	}
    
//------------------------------------Enfermedad--------------------------------
        
        
        
        
        function buscarTelefono($abuscar) {
//            echo 'fvgbhjkl';
//        $this->db->where('codtelefono', $abuscar);
//        $this->db->select('a.numerocelular, a.fecha, a.hora, a.contadorestados, a.users_id');
//        $this->db->from('alertamedica a');
//                    
//        $abuscar = $this->db->get(); 
//        
////        print_r($abuscar);
//        return $abuscar;   
        

        
    }

        
}