<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_user extends CI_Model
{
    protected $id = 'id';
    protected $table = 'tbl_user';

    public function get_data_user($where = null)
    {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($this->table)->result();
        return (count((array) $query) > 0) ? $query : false;
    }
}

/* End of file Model_user.php */
