<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_home', 'home');
    }
    private function template($params = [])
    {
        $this->load->view('frontend/template/header', $params);
        $this->load->view('frontend/template/content', $params);
        $this->load->view('frontend/template/footer');
    }
    public function index()
    {
        $params = [
            'title' => 'Halaman Home',
            'page' => 'frontend/home',
            'list_berita' => $this->home->get_berita(),
            'berita_terbaru' => $this->home->get_berita_terbaru(),
        ];
        $this->template($params);
    }
    public function detail()
    {
        $slug = $this->uri->segment(1);
        $get = $this->home->get_berita(['tbl_berita.slug' => $slug]);
        if ($get) {
            $params = [
                'title' => $get->slug,
                'page' => 'frontend/v_detail',
                'berita' => $get,
                'berita_terbaru' => $this->home->get_berita_terbaru(),
            ];
            $this->template($params);
        } else {
            $params = [
                'title' => 'Halaman Tidak Ditemukan',
                'page' => 'frontend/404'
            ];
            $this->template($params);
        }
    }
}
/* End of file Home.php */
