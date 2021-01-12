<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_login', 'login');
    }
    public function index()
    {
        if ($this->session->userdata('log_admin')) {
            redirect('dashboard');
        }
        $params = [
            'title' => 'Login',
            'page' => 'v_login',
        ];
        $this->load->view('admin/v_login', $params, FALSE);
    }

    public function prosesLogin()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == TRUE) {
            $email = htmlspecialchars($this->input->post('email', true));
            $password = htmlspecialchars(addslashes($this->input->post('password', true)));
            $cek_data = $this->login->cek_login(['email' => $email]);
            if ($cek_data) {
                if (password_verify($password, $cek_data->password)) {
                    $this->_DaftarSession($cek_data);
                    $this->session->set_flashdata('info', 'Berhasil login!!');
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('infoGagal', 'Maaf email dan password anda salah!!');
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('infoGagal', 'Maaf email dan password anda salah!!');
                redirect('user');
            }
        } else {
            $this->session->set_flashdata('infoGagal', validation_errors());
            redirect('login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    public function profil()
    {
        $email = $this->session->userdata('log_admin')->email;
        $get_profil = $this->login->profil(['email' => $email]);
        $params = [
            'title' => $get_profil->nama_lengkap,
            'page' => 'admin/v_profil',
            'judul' => 'profil',
            'sub_judul' => $get_profil->nama_lengkap,
            'profil' => $get_profil
        ];
        template($params);
    }
    public function ubah_profile()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == TRUE) {
            $id = $this->session->userdata('log_admin')->id;
            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true))
            ];
            $where = ['id' => $id];
            $update = $this->login->update($data, $where);
            if ($update) {
                $this->session->set_flashdata('info', 'Berhasil ubah profile');
                redirect('profil');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal ubah profile');
                redirect('profil');
            }
        } else {
            $this->session->set_flashdata('infoGagal', validation_errors());
            redirect('profil');
        }
    }

    private function _DaftarSession($data)
    {
        array_merge('login', ['log_status' => true]);
        $this->session->set_userdata('log_admin', $data);
    }
}
/* End of file Auth.php */