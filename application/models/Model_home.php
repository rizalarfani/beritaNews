<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_home extends CI_Model
{
    public function get_berita($where = null)
    {
        $this->db->select('tbl_berita.slug,tbl_berita.id as id_berita,tbl_berita.judul_berita,tbl_berita.isi_berita,tbl_berita.penulis,tbl_berita.thumbnail,tbl_berita.id_kategori,tbl_berita.date_created,tbl_kategori.id,tbl_kategori.nama_kategori');
        $this->db->join('tbl_kategori', 'tbl_berita.id_kategori=tbl_kategori.id', 'inner');
        if (!empty($where)) {
            $this->db->where($where);
            $data = $this->db->get('tbl_berita')->row();
        } else {
            $data = $this->db->get('tbl_berita')->result();
        }
        $this->db->order_by('tbl_berita.id', 'asc');
        return (count((array)$data) > 0) ? $data : false;
    }
    public function get_berita_terbaru($where = null)
    {
        $this->db->select('tbl_berita.slug,tbl_berita.id as id_berita,tbl_berita.judul_berita,tbl_berita.isi_berita,tbl_berita.penulis,tbl_berita.thumbnail,tbl_berita.id_kategori,tbl_berita.date_created,tbl_kategori.id,tbl_kategori.nama_kategori');
        $this->db->join('tbl_kategori', 'tbl_berita.id_kategori=tbl_kategori.id', 'inner');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('tbl_berita.id', 'asc');
        $this->db->limit(5);
        $data = $this->db->get('tbl_berita')->result();
        return (count((array)$data) > 0) ? $data : false;
    }
    public function get_berita_kategori($where = null)
    {
        $this->db->select('tbl_berita.slug,tbl_berita.id as id_berita,tbl_berita.judul_berita,tbl_berita.isi_berita,tbl_berita.penulis,tbl_berita.thumbnail,tbl_berita.id_kategori,tbl_berita.date_created,tbl_kategori.id,tbl_kategori.nama_kategori');
        $this->db->join('tbl_kategori', 'tbl_berita.id_kategori=tbl_kategori.id', 'inner');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('tbl_berita.id', 'asc');
        $data = $this->db->get('tbl_berita')->result();
        return (count((array)$data) > 0) ? $data : false;
    }
    public function kategori($where = null)
    {
        if (!empty($where)) {
            $this->db->where($where);
            $data = $this->db->get('tbl_kategori')->row();
        } else {
            $data = $this->db->get('tbl_kategori')->result();
        }
        return (count((array)$data) > 0) ? $data : false;
    }
}

/* End of file Model_home.php */
