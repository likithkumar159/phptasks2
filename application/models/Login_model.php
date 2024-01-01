<?php

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function index()
    {

    }
    public function check_login($name)
    {
        $query= $this->db->get_where("newuser_creation",array("name"=>$name));
        // echo $query;
        // die();
        return $query->row_array();
    }
    public function create_login($data)
    {
        // alert('it is entering or not');  
        $this->db->insert("newuser_creation", $data);
    }
    public function check_name_existence($name)
    {
        // echo "Check name existence method called";
        // die;
        $this->db->where('name', $name);
        $query = $this->db->get('newuser_creation');
        return $query->num_rows() > 0;
    }
}
