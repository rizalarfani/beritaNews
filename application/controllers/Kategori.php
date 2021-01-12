<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_kategori', 'kategori');
        $this->log_admin = $this->session->userdata('log_admin');
        if (empty($this->log_admin)) {
            redirect('login');
        }
    }
    public function index()
    {
        $params = [
            'title' => 'Kategori',
            'page' => 'admin/v_kategori',
            'judul' => 'Data Master',
            'sub_judul' => 'Kategori',
            'kategori' => $this->kategori->get_data(),
        ];
        template($params);
    }
    public function create_kategori()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
            ];
            $insert = $this->kategori->insert($data);
            if ($insert) {
                $this->session->set_flashdata('info', 'Berhasil tambah data');
                redirect('kategori');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal tambah data');
                redirect('kategori');
            }
        } else {
            $this->session->set_flashdata('infoGagal', validation_errors());
            redirect('kategori');
        }
    }
    public function edit_kategori()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');
        if ($this->form_validation->run() == TRUE) {
            $id_kat = $this->input->post('id_kat', true);
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
            ];
            $where = ['id' => $id_kat];
            $insert = $this->kategori->update($data, $where);
            if ($insert) {
                $this->session->set_flashdata('info', 'Berhasil ubah data');
                redirect('kategori');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal ubah data');
                redirect('kategori');
            }
        } else {
            $this->session->set_flashdata('infoGagal', validation_errors());
            redirect('kategori');
        }
    }
    public function delete()
    {
        $id = $this->uri->segment(3);
        if (empty($id)) {
            redirect('kategori');
        }
        if ($this->kategori->get_data(['id' => $id])) {
            $delete = $this->kategori->delete(['id' => $id]);
            if ($delete) {
                $this->session->set_flashdata('info', 'Berhasil hapus data');
                redirect('kategori');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal tambah data');
                redirect('kategori');
            }
        } else {
            redirect('kategori');
        }
    }
}

/* End of file Kategori.php */
