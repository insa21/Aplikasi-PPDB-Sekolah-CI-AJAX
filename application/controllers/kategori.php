<?php
defined('BASEPATH') or exit('No direct script access allowed');
class kategori extends CI_Controller
{
    public function jurusan()
    {
        $this->load->view('utama/header');
        $this->load->view('utama/jurusan');
        $this->load->view('utama/footer');
    }

}