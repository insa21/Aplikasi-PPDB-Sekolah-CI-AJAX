<?php
class v_gabung extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('userModel');
    }
    function index()
    {
        $data['project'] = $this->db->get('jurusan')->result();
        $this->load->view('utama/header');
        $this->load->view('utama/gabung', $data);
        $this->load->view('utama/footer');
    }
}
