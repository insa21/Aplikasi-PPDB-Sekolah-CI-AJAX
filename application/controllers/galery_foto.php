<?php
class galery_foto extends CI_Controller
{
    function index()
    {
        $data['project'] = $this->db->get('gambar')->result();
        $this->load->view('utama/header');
        $this->load->view('utama/galery_foto', $data);
        $this->load->view('utama/footer');
    }
}
