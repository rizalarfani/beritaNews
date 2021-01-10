<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('template')) {
    function template($data = [])
    {
        $CI = &get_instance();
        $CI->load->view('admin/template/header', $data);
        $CI->load->view('admin/template/sidebar');
        $CI->load->view('admin/template/content', $data);
        $CI->load->view('admin/template/footer');
    }
}
