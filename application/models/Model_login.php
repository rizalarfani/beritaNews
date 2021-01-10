<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_login extends CI_Model
{
    public function cek_login($where)
    {
        $this->db->select('*');
        $this->db->where($where);
        $data = $this->db->get('tbl_user')->row();
        return count(((array)$data) > 0) ? $data : false;
    }
}
/* End of file Model_login.php */
