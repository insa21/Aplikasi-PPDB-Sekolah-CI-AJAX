<?php
class berita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('userModel');
    }
    function index()
    {
        $data['project'] = $this->db->get('artikel')->result();
        $this->load->view('utama/header');
        $this->load->view('utama/berita', $data);
        $this->load->view('utama/footer');
    }

}