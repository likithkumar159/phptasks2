<?php

class Excel_control extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view("excel_view");
    }
    public function uploadExcel()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xls|xlsx';
        $config['max_size'] = 2048;  // Adjust as needed

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('excel_file')) {
            $file_data = $this->upload->data();
            $file_path = $file_data['full_path'];
            // echo FCPATH . 'uploads/';
            // exit;
            // Use Composer autoloader

            
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_path);
            $worksheet = $spreadsheet->getActiveSheet();

            $rowIterator = $worksheet->getRowIterator();

            // Skip the first row (header)
            $rowIterator->next();

            foreach ($rowIterator as $row) {
                $data = $row->getCellIterator();

                // Assuming your model has a method named insertFromExcelRow
                $this->Excel_model->insertFromExcelRow($data);
            }

            unlink($file_path);
            redirect('Excel_control');
        } else {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
    }
}
