<?php
class saranaa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('userModel');
    }
    function index()
    {
        $data['project'] = $this->db->get('sarana')->result();
        $this->load->view('utama/header');
        $this->load->view('utama/v_sarana', $data);
        $this->load->view('utama/footer');
    }

}