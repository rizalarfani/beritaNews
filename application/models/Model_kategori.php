<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_kategori extends CI_Model
{
    protected $id = 'id';
    protected $table = 'tbl_kategori';

    public function get_data($where = null)
    {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
            $query = $this->db->get($this->table)->row();
        } else {
            $query = $this->db->get($this->table)->result();
        }
        $this->db->order_by('id', 'ASC');
        return (count((array)$query) > 0) ? $query : false;
    }
    public function insert($data)
    {
        return ($this->db->insert($this->table, $data)) ? true : false;
    }
    public function update($data, $where)
    {
        $this->db->where($where);
        $update = $this->db->update($this->table, $data);
        return ($update) ? true : false;
    }
    public function delete($where)
    {
        return ($this->db->where($where)->delete($this->table)) ? true : false;
    }
}

/* End of file Model_kategori.php */
