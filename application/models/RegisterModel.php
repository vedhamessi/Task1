<?php

class RegisterModel extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'pro_registration';
    }
    public function reg_insert($data)
    {    
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    public function check_existing_data($data){
        // print_r($data['email']);die('nn');
        $this->db->where('email',$data['email']);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0){
            return $arr = ['code' => 1, 'msg' => 'Already Exist'];
        }
        else{
            return $arr = ['code' => 0, 'msg' => 'Success'];
        }
    }
}

?>

