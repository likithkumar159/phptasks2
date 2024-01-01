<?php
class Thirdtrail_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Create
    public function insert_data($data)
    {
        $this->db->insert('trail', $data);
    }

    // Read
    public function get_data()
    {
        $query = $this->db->get('trail');
        return $query->result();
    }

    // Update
    public function get_record_by_id($id)
    {
        $query = $this->db->get_where('trail', array('user_id' => $id));
        return $query->row();
    }
    public function update_data($data, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('trail', $data);
    }

    // Delete
    public function delete_data($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('trail');
    }

    public function soft_delete($id)
    {
        $data = array('status' => 0);
        $this->db->where('user_id', $id);
        $this->db->update('trail', $data);
    }

    public function make_active($id)
    {
        $data = array('status' => 1);
        $this->db->where('user_id', $id);
        $this->db->update('trail', $data);
    }

    // Get Active Data
    public function get_active_data()
    {
        $this->db->where('status', 1);
        $query = $this->db->get('trail');
        return $query->result();
    }

    // Get Inactive Data
    public function get_inactive_data()
    {
        $this->db->where('status', 0);
        $query = $this->db->get('trail');
        return $query->result();
    }
    // Insert Data with Image
    public function insert_data_with_image($data)
    {
        $this->db->insert('trail', $data);
    }

    // Get All Data with Image
    public function get_all_data_with_image()
    {
        $query = $this->db->get('trail');
        return $query->result();
    }

    public function count_all_records() {
        return $this->db->count_all('trail');
    }

    public function get_records($limit, $offset) {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('trail');
        return $query->result();
    }
}
