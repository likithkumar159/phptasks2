<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checklists extends CI_Controller
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
        //$this->load->view('welcome_message');
        $this->load->view('checklists');
        // echo "Welcome to My First Project Development";

    }
    public function addchecklist($id = "")
    {
        $data = array();
        if (!empty($id)) {
            $this->load->database();
            $getquery = "SELECT * FROM `checklists` WHERE id = $id";
            $resultdata = $this->db->query($getquery)->row_array();
            $data['all_list'] = $resultdata;
            // print "<pre>";
            // print_r($data);
            // exit;
        }
        $this->load->view('addchecklist', $data);
    }
    public function checklistAll()
    {
        $this->load->database();
        $getquery = "SELECT * FROM `checklists` ORDER BY id DESC";
        $resultdata = $this->db->query($getquery)->result_array();
        $data['all_list'] = $resultdata;

        $this->load->view('checklists', $data);
    }

    public function getchecklistbyid()
    {
        $this->load->database();
        $getquery = "SELECT * FROM `checklists` ORDER BY id DESC";
        $resultdata = $this->db->query($getquery)->result_array();
        $data['list'] = $resultdata;
        $this->load->view('addchecklist', $data);
        print "<pre>";
        print_r($data);
        exit;
    }

    public function save_checklist()
    {
        $checklist_name = $this->input->post('checklist_name');
        $this->load->database();
        $sql = "SELECT * FROM `checklists` WHERE checklist_name = '$checklist_name'";
        $rows = $this->db->query($sql)->num_rows();
        if ($rows <= 0) {
            // echo $rows;
            // exit;
            $chapters = $this->input->post('chapters');
            $scopeType = $this->input->post('scopeType');
            $toolType = $this->input->post('toolType');
            $audit_approach = $this->input->post('audit_approach');
            $assertions = $this->input->post('assertions');
            $risks = $this->input->post('risks');
            $misstatements = $this->input->post('misstatements');
            $created_at = date('Y-m-d H:i:s');

            $data = array(
                'checklist_name' => $checklist_name,
                'chapters' => $chapters,
                'scopeType' => $scopeType,
                'toolType' => $toolType,
                'audit_approach' => $audit_approach,
                'assertions' => $assertions,
                'risks' => $risks,
                'misstatements' => $misstatements,
                'created_at' => $created_at
            );
            // print "<pre>";
            // print_r($data);
            // exit;

            $this->db->insert('checklists', $data);
            echo "Data inserted successfully!";
            redirect('Checklists/checklistAll', 'refresh');
        } else {
            echo "already exists";
            redirect('Checklists/addchecklist', 'refresh');
        }


    }

    public function update_checklist()
    {
        $id_to_update = $this->input->post('edit_id');
        $checklist_name = $this->input->post('checklist_name');
        $this->load->database();

        $sql = "SELECT * FROM `checklists` WHERE checklist_name = ? AND id != ?";
        $rows = $this->db->query($sql, array($checklist_name, $id_to_update))->num_rows();

        if ($rows <= 0) {
            $chapters = $this->input->post('chapters');
            $scopeType = $this->input->post('scopeType');
            $toolType = $this->input->post('toolType');
            $audit_approach = $this->input->post('audit_approach');
            $assertions = $this->input->post('assertions');
            $risks = $this->input->post('risks');
            $misstatements = $this->input->post('misstatements');
            $created_at = date('Y-m-d H:i:s');

            $data = array(
                'checklist_name' => $checklist_name,
                'chapters' => $chapters,
                'scopeType' => $scopeType,
                'toolType' => $toolType,
                'audit_approach' => $audit_approach,
                'assertions' => $assertions,
                'risks' => $risks,
                'misstatements' => $misstatements,
                'created_at' => $created_at
            );

            $this->db->where('id', $id_to_update);
            $this->db->update('checklists', $data);
            echo "Data updated successfully!";
            exit;
            redirect('Checklists/checklistAll', 'refresh');
        } else {
            echo "A checklist with the same name already exists";
            exit;
            redirect('Checklists/addchecklist', 'refresh');
        }
    }

    public function delete_checklist($id)
    {
        if (!empty($id)) {
            $this->load->database();
            $this->db->where('id', $id);
            $this->db->delete('checklists');
        }
        redirect('Checklists/checklistAll', 'refresh');
    }

    public function markas_inactive($id)
{
    if (!empty($id)) {
        $this->load->database();

        // Retrieve the current status
        $result = $this->db->get_where('checklists', array('id' => $id))->row();

        if ($result !== null) {
            // Check if 'status' property exists before accessing it
            $current_status = isset($result->status) ? $result->status : null;

            // Toggle the status between 0 and 1
            $new_status = ($current_status == 0) ? 1 : 0;

            $data = array('status' => $new_status);

            $this->db->where('id', $id);
            $this->db->update('checklists', $data);

            echo "Status updated successfully!";
        } else {
            echo "No checklist found with the specified ID";
        }
    } else {
        echo "Invalid ID";
    }

    redirect('Checklists/checklistAll', 'refresh');
}

    
    





}