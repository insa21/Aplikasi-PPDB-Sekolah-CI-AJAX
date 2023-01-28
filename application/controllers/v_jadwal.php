<?php
defined('BASEPATH') or exit('No direct script access allowed');

class v_jadwal extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jadwal', 'v_jadwal');
    }

    public function index()
    {
        $this->load->helper('url');
        // $data['kategori'] = $this->db->get('kategori')->result();//data variabel -> ke database masuk ke foreach v_artikel
        $this->load->view('utama/header');
        $this->load->view('utama/jadwal/v_jadwal'); //data dari table lain di masukan  ke view
        $this->load->view('utama/footer');
        $this->load->view('utama/jadwal/script');
    }


    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->v_jadwal->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $v_jadwal) {
            $no++;
            $row = array();
            $row[] = $v_jadwal->gelombang;
            $row[] = $v_jadwal->pendaftaran;
            $row[] = $v_jadwal->test;
            $row[] = $v_jadwal->kesehatan;
            $row[] = $v_jadwal->pengumuman;
            $row[] = $v_jadwal->ulang;
            // $row[] = $v_jadwal->time;
            //tambahkan html untuk tindakan
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $v_jadwal->id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $v_jadwal->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->v_jadwal->count_all(),
            "recordsFiltered" => $this->v_jadwal->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    // public function ajax_edit($id)

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'gelombang' => $this->input->post('gelombang'),
            'pendaftaran' => $this->input->post('pendaftaran'),
            'test' => $this->input->post('test'),
            'kesehatan' => $this->input->post('kesehatan'),
            'pengumuman' => $this->input->post('pengumuman'),
            'ulang' => $this->input->post('ulang'),
        );

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload();
            $data['photo'] = $upload;
        }

        $insert = $this->v_jadwal->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'id' => $this->input->post('id'),
            'gelombang' => $this->input->post('gelombang'),
            'pendaftaran' => $this->input->post('pendaftaran'),
            'test' => $this->input->post('test'),
            'kesehatan' => $this->input->post('kesehatan'),
            'pengumuman' => $this->input->post('pengumuman'),
            'ulang' => $this->input->post('ulang'),
        );

        $this->v_jadwal->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        //menghapus berkas
        $v_jadwal = $this->v_jadwal->get_by_id($id);

        $this->v_jadwal->delete_by_id($id);
        echo json_encode(array("status" => true));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = true;

        // if ($this->input->post('id') == '') {
        //     $data['inputerror'][] = 'id';
        //     $data['error_string'][] = 'Masukan  No';
        //     $data['status'] = false;
        // }

        if ($this->input->post('gelombang') == '') {
            $data['inputerror'][] = 'gelombang';
            $data['error_string'][] = 'Masukan  gelombang';
            $data['status'] = false;
        }

        if ($this->input->post('pendaftaran') == '') {
            $data['inputerror'][] = 'pendaftaran';
            $data['error_string'][] = 'Masukan  Pendaftaran';
            $data['status'] = false;
        }

        if ($this->input->post('test') == '') {
            $data['inputerror'][] = 'test';
            $data['error_string'][] = 'Masukan  Test Tulisan dan Wawancara';
            $data['status'] = false;
        }

        if ($this->input->post('kesehatan') == '') {
            $data['inputerror'][] = 'kesehatan';
            $data['error_string'][] = 'Masukan Kesehatan';
            $data['status'] = false;
        }


        if ($this->input->post('pengumuman') == '') {
            $data['inputerror'][] = 'pengumuman';
            $data['error_string'][] = 'Masukan Pengumuman';
            $data['status'] = false;
        }


        if ($this->input->post('ulang') == '') {
            $data['inputerror'][] = 'ulang';
            $data['error_string'][] = 'Masukan Daftar Ulang';
            $data['status'] = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }
}
