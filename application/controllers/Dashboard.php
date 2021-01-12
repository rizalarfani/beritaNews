<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_dashboard', 'dashboard');
        $this->log_admin = $this->session->userdata('log_admin');
        if (empty($this->log_admin)) {
            redirect('login');
        }
    }
    public function index()
    {
        $count_user = $this->dashboard->count('', 'tbl_user');
        $count_kategori = $this->dashboard->count('', 'tbl_kategori');
        $count_berita = $this->dashboard->count('', 'tbl_berita');
        $params = [
            'title' => 'Dahsboard',
            'page' => 'admin/v_dashboard',
            'judul' => 'Dashboard',
            'sub_judul' => 'Dashboard',
            'count_user' => $count_user,
            'count_kategori' => $count_kategori,
            'count_berita' => $count_berita,
        ];
        template($params);
    }
}

/* End of file Dashboard.php */
