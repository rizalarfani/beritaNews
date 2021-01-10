<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_user', 'user');
        $this->log_admin = $this->session->userdata('log_admin');
        if (empty($this->log_admin)) {
            redirect('login');
        }
    }
    public function index()
    {
        $get_user = $this->user->get_data_user();
        $params = [
            'title' => 'Data user',
            'page' => 'admin/v_user',
            'judul' => 'Data user',
            'sub_judul' => 'List user',
            'list_user' => $get_user
        ];
        template($params);
    }
    public function create_user()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]');
        if ($this->form_validation->run() == TRUE) {
            $email = htmlspecialchars($this->input->post('email', true));
            if (!$this->user->get_data_user(['email' => $email])) {
                $data = [
                    'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                    'email' => $email,
                    'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
                    'foto' => 'default.png'
                ];
                $this->user->insert($data);
                $this->session->set_flashdata('info', 'Berhasil tambah data');
                redirect('user');
            } else {
                $this->session->set_flashdata('infoGagal', 'Maaf email sudah terdaftar');
                redirect('user');
            }
        } else {
            $this->session->set_flashdata('infoGagal', validation_errors());
            redirect('user');
        }
    }
    public function edit_user()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == TRUE) {
            $id_user = $this->input->post('id_user', true);
            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'email' => htmlspecialchars($this->input->post('email', true))
            ];
            $where = ['id' => $id_user];
            $update = $this->user->update($data, $where);
            if ($update) {
                $this->session->set_flashdata('info', 'Berhasil update data');
                redirect('user');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal hapus data');
                redirect('user');
            }
        } else {
            $this->session->set_flashdata('infoGagal', validation_errors());
            redirect('user');
        }
    }
    public function delete()
    {
        $id = $this->uri->segment(3);
        if (empty($id)) {
            redirect('user');
        }
        if ($this->user->get_data_user(['id' => $id])) {
            $delete = $this->user->delete(['id' => $id]);
            if ($delete) {
                $this->session->set_flashdata('info', 'Berhasil hapus data');
                redirect('user');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal tambah data');
                redirect('user');
            }
        } else {
            redirect('user');
        }
    }
}

/* End of file User.php */
