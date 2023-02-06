<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{
    public function getUser($table)
    {
        $data = $this->db->get($table);
        return $data->result_array();
    }

}
