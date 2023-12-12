<?php

class File_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save_file_info($upload_data) {
        $data = array(
            'file_name' => $upload_data['file_name'],
            'file_type' => $upload_data['file_type'],
            'file_size' => $upload_data['file_size'],
            'upload_time' => time()
        );

        $this->db->insert('files', $data);
    }

}