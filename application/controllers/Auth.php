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
    private function _DaftarSession($data)
    {
        array_merge('login', ['log_status' => true]);
        $this->session->set_userdata('log_admin', $data);
    }
}

/* End of file Auth.php */
