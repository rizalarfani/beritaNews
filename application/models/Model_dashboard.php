<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_dashboard extends CI_Model
{
    public function count($where = null, $table)
    {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        return $this->db->get($table)->num_rows();
    }
}

/* End of file Model_dahsboard.php */
