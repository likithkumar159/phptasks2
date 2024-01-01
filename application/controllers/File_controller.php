<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('File_model');
        $this->load->database();
        $this->load->helper('download');
    }
    public function index()
    {
        // $this->load->view('upload_form');
        $data['files'] = $this->File_model->get_files(); // Assume you have a method to fetch files in File_model
        $this->load->view('upload_form', $data);
    }
    public function upload_file()
    {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'pdf|csv|xlsx'; // Add more file types as needed
        $config['max_size']      = 2048; // Specify file size in KB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            $upload_data = $this->upload->data();

            $file_data = array(
                'file_name' => $upload_data['file_name'],
                'file_type' => $upload_data['file_type'],
                'file_data' => file_get_contents($upload_data['full_path']),
            );

            $this->File_model->insert_file($file_data);

            redirect('File_controller'); // Redirect to a success page
        }
    }

    // public function list_files() {
    //     $data['files'] = $this->File_model->get_files(); // Assume you have a method to fetch files in File_model
    //     $this->load->view('upload_form', $data);
    // }

    public function download_file($file_id)
    {
        $file_data = $this->File_model->get_file_data($file_id); // Assume you have a method to fetch file data by ID in File_model

        $file_name = $file_data['file_name'];
        $file_data = $file_data['file_data'];

        force_download($file_name, $file_data);
    }
    public function upload_and_list_files()
    {
        // Handle file upload
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->load->library('upload');

            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'pdf|csv|xlsx|gif|jpg|jpeg|png'; // Add image file types
            $config['max_size']      = 1000000000;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $file_data = $this->upload->data();

                $file_info = array(
                    'file_name' => $file_data['file_name'],
                    'file_type' => $file_data['file_type'],
                    'file_data' => file_get_contents($file_data['full_path']),
                    'name'=>$this->input->post('name'),
                );

                $this->File_model->insert_file($file_info);

                // Redirect to prevent form resubmission
                redirect('File_controller');
            } else {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }
        }

        // Fetch the list of files
        $data['files'] = $this->File_model->get_files();

        // Load the view
        $this->load->view('upload_form', $data);
        // redirect('File_controller'); // Redirect to a success page

    }
}
