<?php

class AdminModel extends CI_Model{
	public function __construct(){
        parent::__construct();
        $this->table = 'pro_registration';
    }
    public function getLog($data){
        $query = $this->db->get_where($this->table, 
            array(
                'email' => $data['query']['email'], 
                'password' => $data['query']['password'],
                'status' => $data['query']['status'],
                'is_admin' => $data['query']['is_admin']
            )
        );
        $result = $query->row_array();
        return $result; 
        // print_r($result);die('cc');
    }
    public function getUsers(){
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        $row = $query->result();
        return $row;
    }
    public function getUserById($id){
        $this->db->select('*');
        $query = $this->db->get_where($this->table, 
            array(
                'id' => $id, 
            )
        );
        $row = $query->row_array();
        // print_r($row);die('vb');
        if($row){
            return $row;
        } else {
            return false;
        }
        
    }
    public function reg_update($data, $id){
        $this->db->where('id', $id);
        $query = $this->db->update($this->table, $data);
        return $query;
        // print_r($data['first_name']);
        // print_r($id);
        // echo "<br><br>";
        // die('nm');
        // print_r($query);die('m');
    }
}

?>

