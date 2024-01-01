<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_model extends CI_Model {

    public function insert_file($data) {
        $this->db->insert('files', $data);
        return $this->db->insert_id();
    }

    public function get_files() {
        return $this->db->get('files')->result_array();
    }

    public function get_file_data($file_id) {
        return $this->db->select('file_name, file_data')->where('id', $file_id)->get('files')->row_array();
    }

}
