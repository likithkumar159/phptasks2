<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Secondtrail extends CI_Controller
{
    // public function __construct() {
    //     parent::__construct();

    //     // Load the form helper
    //     $this->load->helper('form');
    // }

    public function index()
    {
        // Load the database library
        $this->load->database();

        // Fetch active records from the database
        $activeQuery = $this->db->get_where('trail', array('Status' => '1'));
        $data['records'] = $activeQuery->result();

        // Fetch inactive records from the database
        $inactiveQuery = $this->db->get_where('trail', array('Status' => '0'));
        $data['inactive_records'] = $inactiveQuery->result();

        // Load the view with data
        $this->load->view('secondtrail_view', $data);
    }


    public function addview()
    {
        $this->load->view('edit_view');
    }
    public function add()
    {
        $this->load->database();
        $user_name = $this->input->post('user_name');
        $data = array(
            'user_name' => $user_name,
            'Status' => '1'
        );
        $this->db->insert('trail', $data);
        redirect('Secondtrail', 'location');
    }

    public function edit($user_id)
    {
        // Load the database library
        $this->load->database();

        // Fetch the specific record by ID (example)
        $query = $this->db->get_where('trail', array('user_id' => $user_id));
        $data['record'] = $query->row();

        // Load the edit view with data
        $this->load->view('edit_view', $data);
    }
    public function update($user_id)
    {
        // Load the database library
        $this->load->database();

        // Handle the form submission and update the record (example)
        $data = array(
            'user_name' => $this->input->post('user_name'),
            // Add more fields as needed
        );

        $this->db->where('user_id', $user_id);
        $this->db->update('trail', $data);

        // Redirect to the index page or show a success message
        redirect('Secondtrail');
    }

    public function delete($user_id)
    {
        $this->load->database();
        // Handle the form submission and update the record (example)
        $data = array(
            'Status' => '0'
            // Add more fields as needed
        );
        // echo $user_id;
        $this->db->where('user_id', $user_id);
        $this->db->update('trail', $data);
        redirect('Secondtrail', 'location');
    }
    public function makeactive($user_id)
    {
        $this->load->database();
        // Handle the form submission and update the record (example)
        $data = array(
            'Status' => '1'
            // Add more fields as needed
        );
        $this->db->where('user_id', $user_id);
        $this->db->update('trail', $data);
        redirect('Secondtrail', 'location');
    }
}
