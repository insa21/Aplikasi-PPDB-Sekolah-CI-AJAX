<?php
class bs_data extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_jenis_user') <> '2') {
            redirect('login');
        }
        $this->load->model('m_siswa');
    }
    function index()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['project'] = $this->db->get('jurusan')->result();
        $this->load->view('b_siswa/component/header', $data);
        $this->load->view('b_siswa/siswa/bs_gabung', $data);
        $this->load->view('b_siswa/component/footer');
    }

    function biodata()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['project'] = $this->db->get('jurusan')->result();
        $data['data'] = $this->m_siswa->biodata($data);
        $this->load->view('b_siswa/component/header', $data);
        $this->load->view('b_siswa/siswa/bs_biodata', $data);
        $this->load->view('b_siswa/component/footer');
    }

    function sarat()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['project'] = $this->db->get('jurusan')->result();
        $data['data'] = $this->m_siswa->biodata($data);
        $this->load->view('b_siswa/component/header', $data);
        $this->load->view('b_siswa/siswa/sarat', $data);
        $this->load->view('b_siswa/component/footer');
    }

    function status()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['project'] = $this->db->get('jurusan')->result();
        $data['data'] = $this->m_siswa->biodata($data);
        $this->load->view('b_siswa/component/header', $data);
        $this->load->view('b_siswa/siswa/bs_status', $data);
        $this->load->view('b_siswa/component/footer');
    }
}
