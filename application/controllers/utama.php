<?php
class utama extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('userModel');
    }
    function index()
    {
        $data['bergerak'] = $this->db->get('foto')->result();
        $data['artikel'] = $this->db->get('artikel')->result();
        $data['sarana'] = $this->db->get('sarana')->result();
        $data['project'] = $this->db->get('show')->result();
        $this->load->view('utama/header');
        $this->load->view('utama/content', $data);
        $this->load->view('utama/footer');
        $this->load->view('utama/v_script');
    }
}
