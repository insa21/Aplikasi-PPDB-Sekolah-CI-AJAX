<?php
class jurusan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('userModel');
    }
    function index()
    {
        $data['project'] = $this->db->get('show')->result();
        $this->load->view('utama/header');
        $this->load->view('utama/jurusan', $data);
        $this->load->view('utama/footer');
    }

}