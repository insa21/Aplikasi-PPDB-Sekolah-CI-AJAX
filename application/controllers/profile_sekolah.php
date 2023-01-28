<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile_sekolah extends CI_Controller
{
    public function index()
    {
        $data['project'] = $this->db->get('profile_sekolah')->result();
        $data['kepala_sekolah'] = $this->db->get('kepala_sekolah')->result();
        $this->load->view('utama/header');
        $this->load->view('utama/profile_sekolah',$data);
        $this->load->view('utama/footer');
    }
    function selanjutnya()
    {
        $data['kepala_sekolah'] = $this->db->get('kepala_sekolah')->result();
        $this->load->view('utama/header');
        $this->load->view('utama/selanjutnya',$data);
        $this->load->view('utama/footer');
    }
}