<?php
class Excel_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insertFromExcelRow($data) {
        // Assuming $data is an iterator containing cell values
        // Adjust column names and table name based on your database structure
     
        $column_names = array('name');
     
        $insert_data = array();
     
        foreach ($column_names as $column) {
            // Get the current cell in the iteration
            $cell = $data->current();
     
            // If it's the first row (header), move to the next cell and continue
            if ($column === 'name' && $cell->getValue() === 'name') {
                $data->next();
                continue;
            }
     
            // Check if the cell is not null
            if ($cell !== null) {
                $insert_data[$column] = $cell->getValue();
            } else {
                // Handle null value case (you can set a default value or skip the cell)
                $insert_data[$column] = null; // Adjust as needed
            }
     
            // Move the iterator to the next cell
            $data->next();
        }
     
        // Check if the name is present and not empty
        if (!empty($insert_data['name'])) {
            // Check if the name already exists in the database
            $existingRecord = $this->db->get_where('process', array('name' => $insert_data['name']))->row();
     
            if (!$existingRecord) {
                // Name doesn't exist, proceed with the insertion
                $this->db->insert('process', $insert_data);
            } else {
                // Name already exists, you can log or handle this situation as needed
                // For now, let's just print a message
                echo 'Skipped row with name ' . $insert_data['name'] . ' as it already exists in the database.';
            }
        }
    }
}
