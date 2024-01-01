<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trailcontrol extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        // echo'likith';
        $this->load->database();
        // Fetch data from the database (example)
        $query = $this->db->get('trail');
        $data['records'] = $query->result();
        // Load the view with data
        $this->load->view('trail_view', $data);
    }
    public function addview()
    {
        $this->load->view('trail_add');
    }
    public function add()
    {   
        $this->load->database();
        // $this->load->library('session');//this is use less 
        if ($this->input->post()) {
            $user_name = $this->input->post('user_name');
            $gmail = $this->input->post('gmail');
            $phone_no = $this->input->post('phone_no');

            $data = array(
                'user_name' => $user_name,
                'gmail' => $gmail,
                'phone_no' => $phone_no
            );

            // Insert data into the 'trail' table
            $this->db->insert('trail', $data);
            $this->session->set_flashdata('success', 'Data has been successfully inserted.');
            redirect('Trailcontrol', 'location');
        } else {
            // Handle the case when the form is not submitted
            // You may want to add some logic here, or redirect to an error page
            $this->session->set_flashdata('success', 'Data has Not successfully inserted.');
        }
    }
    public function edit($id)
    {
        $this->load->database();
        $query= $this->db->get_where('trail', array('user_id'=>$id));
        $data['editdata'] = $query->result();
        $this->load->view('trail_add', $data);
    }

}

















   