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
    public function profil($where)
    {
        $this->db->select('id,nama_lengkap,email,foto');
        $this->db->from('tbl_user');
        $this->db->where($where);
        $data = $this->db->get()->row();
        return (count((array)$data) > 0) ? $data : false;
    }
    public function update($data, $where)
    {
        $this->db->where($where);
        $update = $this->db->update('tbl_user', $data);
        return ($update) ? true : false;
    }
}
/* End of file Model_login.php */
