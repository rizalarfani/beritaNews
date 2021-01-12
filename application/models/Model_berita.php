<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_berita extends CI_Model
{
    protected $id = 'id';
    protected $table = 'tbl_berita';

    public function get_berita($where = null)
    {
        $this->db->select('tbl_kategori.id as id_kat,tbl_kategori.nama_kategori,tbl_berita.*');
        $this->db->join('tbl_kategori', 'tbl_kategori.id=tbl_berita.id_kategori', 'inner');
        if (!empty($where)) {
            $this->db->where($where);
            $query = $this->db->get($this->table)->row();
        } else {
            $query = $this->db->get($this->table)->result();
        }
        return (count((array)$query) > 0) ? $query : false;
    }
    public function get_kategori($where = null)
    {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
            $query = $this->db->get('tbl_kategori')->row();
        } else {
            $query = $this->db->get('tbl_kategori')->result();
        }
        return (count((array)$query) > 0) ? $query : false;
    }
    public function insert($data)
    {
        return ($this->db->insert($this->table, $data)) ? true : false;
    }
    public function delete($where)
    {
        return ($this->db->where($where)->delete($this->table)) ? true : false;
    }
}

/* End of file Model_berita.php */
