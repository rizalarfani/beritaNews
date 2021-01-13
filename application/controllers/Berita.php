<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_berita', 'berita');
        $this->log_admin = $this->session->userdata('log_admin');
        if (empty($this->log_admin)) {
            redirect('login');
        }
    }
    public function index()
    {
        if ($this->uri->segment(2) == 'add_berita') {
            $params = [
                'title' => 'Add berita',
                'page' => 'admin/berita/v_add',
                'judul' => 'Data master',
                'sub_judul' => 'Add berita',
                'list_kategori' => $this->berita->get_kategori(),
            ];
            template($params);
        } else if ($this->uri->segment(2) == 'edit_berita') {
            $id = $this->uri->segment(3);
            $params = [
                'title' => 'Add berita',
                'page' => 'admin/berita/v_edit',
                'judul' => 'Data master',
                'sub_judul' => 'Edit berita',
                'list_kategori' => $this->berita->get_kategori(),
                'list_berita' => $this->berita->get_berita(['tbl_berita.id' => $id]),
            ];
            template($params);
        } else {
            $params = [
                'title' => 'Berita',
                'page' => 'admin/berita/v_berita',
                'judul' => 'Data master',
                'sub_judul' => 'Berita',
                'list_berita' => $this->berita->get_berita()
            ];
            template($params);
        }
    }
    public function add_berita_post()
    {
        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
        if ($this->form_validation->run() == TRUE) {
            $judul = htmlspecialchars($this->input->post('judul_berita', true));
            $isi = $this->input->post('isi_berita', false);
            $penulis = $this->log_admin->nama_lengkap;
            $kategori = $this->input->post('kategori', true);
            $foto = $this->_uploadThumbnail();
            $slug = str_replace(' ', '-', $judul);
            if (empty($foto)) {
                $data = [
                    'judul_berita' => $judul,
                    'slug'  => $slug,
                    'isi_berita' => $isi,
                    'penulis' => $penulis,
                    'thumbnail' => 'asdds.png',
                    'id_kategori' => $kategori
                ];
            } else {
                $data = [
                    'judul_berita' => $judul,
                    'slug'  => $slug,
                    'isi_berita' => $isi,
                    'penulis' => $penulis,
                    'thumbnail' => $foto,
                    'id_kategori' => $kategori
                ];
            }
            $insert = $this->berita->insert($data);
            if ($insert) {
                $this->session->set_flashdata('info', 'Berhasil tambah data');
                redirect('berita');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal tambah data');
                redirect('berita');
            }
        } else {
            $this->session->set_flashdata('infoGagal', validation_errors());
            redirect('berita');
        }
    }
    public function delete()
    {
        $id = $this->uri->segment(3);
        if (empty($id)) {
            redirect('berita');
        }
        if ($this->berita->get_berita(['tbl_berita.id' => $id])) {
            $delete = $this->berita->delete(['id' => $id]);
            if ($delete) {
                $this->session->set_flashdata('info', 'Berhasil hapus data');
                redirect('berita');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal tambah data');
                redirect('berita');
            }
        } else {
            redirect('berita');
        }
    }
    private function _uploadThumbnail()
    {
        $config['upload_path'] = './upload/berita/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('thumbnail')) {
            $this->session->set_flashdata('infoGagal', $this->upload->display_errors());
            redirect('berita');
        }
        return $this->upload->data('file_name');
    }
}

/* End of file Berita.php */
