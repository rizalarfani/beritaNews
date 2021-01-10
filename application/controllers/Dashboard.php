<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function index()
    {
        $params = [
            'title' => 'Dahsboard',
            'page' => 'admin/v_dashboard',
            'judul' => 'Dashboard',
            'sub_judul' => 'Dashboard'
        ];
        template($params);
    }
}

/* End of file Dashboard.php */
