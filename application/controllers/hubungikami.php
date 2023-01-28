<?php
class hubungikami extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('userModel');
    }
    function index()
    {
        // $data['project'] = $this->db->get('show')->result();
        $this->load->view('utama/header');
        $this->load->view('utama/hubungikami');
        $this->load->view('utama/footer');
    }

}