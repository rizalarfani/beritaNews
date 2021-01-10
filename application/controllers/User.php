<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_user', 'user');
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
}

/* End of file User.php */
