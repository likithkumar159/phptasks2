<?php
class Thirdtrail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Thirdtrail_model');
        $this->load->library('upload');
    }

    // Index page to display data
    public function index()
    {
        $data['records'] = $this->Thirdtrail_model->get_active_data();
        $data['active_data'] = true;
        $this->load->view('third_view', $data);

        // for Getting all data 
        // $data['records'] = $this->Thirdtrail_model->get_data();
        // $this->load->view('third_view', $data);
    }

    // Create
    // public function create()
    // {
    //     $data = array(
    //         'user_name' => $this->input->post('user_name'),
    //         'gmail' => $this->input->post('gmail'),
    //         'phone_no' => $this->input->post('phone_no'),
    //     );

    //     $this->Thirdtrail_model->insert_data($data);
    //     redirect('Thirdtrail/index');
    // }

    // Update
    public function add_edit($id = null)
    {
        if ($id !== null) {
            // Editing existing record
            $data['record'] = $this->Thirdtrail_model->get_record_by_id($id);
            $action = 'Thirdtrail/do_update/' . $id;
        } else {
            // Adding new record
            $data['record'] = null;
            $action = 'Thirdtrail/do_add';
        }

        $data['action'] = $action;

        // Load the view with the data
        $this->load->view('thirdaddedit_view', $data);
    }

    public function do_update($id)
    {
        // Check if a new image is uploaded
        if ($_FILES['image_path']['error'] != 4) {
            // Handle Image Upload
            $config['upload_path']   = './uploads/';  // Change this to your desired upload path
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 2048;  // 2MB max size, adjust as needed
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image_path')) {
                $upload_data = $this->upload->data();
                $image_path = 'uploads/' . $upload_data['file_name'];

                // Update image path in the data array
                $data['image_path'] = $image_path;
            } else {
                // Handle upload error
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                return;  // Stop execution if image upload fails
            }
        }
        // Data for update
        $data = array(
            'user_name' => $this->input->post('user_name'),
            'gmail' => $this->input->post('gmail'),
            'phone_no' => $this->input->post('phone_no'),
            'image_path' => $image_path,
            // Add more columns as needed
        );


        // Save Data with or without Image
        $this->Thirdtrail_model->update_data($data, $id);
        redirect('Thirdtrail/index');
    }

    public function do_add()
    {
        // Handle Image Upload
        $config['upload_path']   = './uploads/';  // Change this to your desired upload path
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;  // 2MB max size, adjust as needed

        $this->upload->initialize($config);

        if ($this->upload->do_upload('image_path')) {
            $upload_data = $this->upload->data();
            $image_path = 'uploads/' . $upload_data['file_name'];

            // Data for insertion
            $data = array(
                'user_name' => $this->input->post('user_name'),
                'gmail' => $this->input->post('gmail'),
                'phone_no' => $this->input->post('phone_no'),
                'status' => '1',
                'image_path' => $image_path,
                // Add more columns as needed
            );

            // Save Data with Image
            $this->Thirdtrail_model->insert_data_with_image($data);
            redirect('Thirdtrail/index');
        } else {
            // Handle upload error
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
    }
    public function display_data()
    {
        $data['records'] = $this->Thirdtrail_model->get_all_data_with_image();
        $this->load->view('third_view', $data);
    }

    // public function update($id)
    // {
    //     $data['record'] = $this->Thirdtrail_model->get_record_by_id($id);
    //     // Load the view with the data
    //     $this->load->view('thirdaddedit_view', $data);
    // }


    // Delete
    public function delete($id)
    {
        $this->Thirdtrail_model->delete_data($id);
        redirect('Thirdtrail/index');
    }

    public function soft_delete($id)
    {
        $this->Thirdtrail_model->soft_delete($id);
        redirect('Thirdtrail/index');
    }
    public function make_active($id)
    {
        $this->Thirdtrail_model->make_active($id);
        redirect('Thirdtrail/get_active_data');
    }

    // Get Active Data
    public function get_active_data()
    {
        $data['records'] = $this->Thirdtrail_model->get_active_data();
        $data['active_data'] = true;
        $this->load->view('third_view', $data);
    }

    // Get Inactive Data
    public function get_inactive_data()
    {
        $data['records'] = $this->Thirdtrail_model->get_inactive_data();
        $data['active_data'] = false;
        $this->load->view('third_view', $data);
    }
}
