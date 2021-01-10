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
        $params = [
            'title' => 'Dahsboard',
            'page' => 'admin/v_dashboard',
            'judul' => 'Dashboard',
            'sub_judul' => 'Dashboard',
            'count_user' => $count_user
        ];
        template($params);
    }
}

/* End of file Dashboard.php */
