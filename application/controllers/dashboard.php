<?php
class dashboard extends CI_Controller
{
    function index()
    {
        $data['project'] = $this->db->get('show')->result();
        $this->load->view('component/header');
        $this->load->view('admin/dashboard');
        $this->load->view('component/footer');
    }
}
