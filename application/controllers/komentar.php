<?php
defined('BASEPATH') or exit('No direct script access allowed');

class komentar extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_komentar', 'komentar');
    }

    public function index()
    {
        $this->load->helper('url');
        // $data['kategori'] = $this->db->get('kategori')->result();//data variabel -> ke database masuk ke foreach v_artikel
        $this->load->view('component/header');
        $this->load->view('komentar/v_komentar'); //data dari table lain di masukan  ke view
        $this->load->view('component/footer');
        $this->load->view('komentar/script');
    }


    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->komentar->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $komentar) {
            $no++;
            $row = array();
            $row[] = $komentar->nama;
            $row[] = $komentar->email;
            $row[] = $komentar->subjek;
            $row[] = $komentar->pesan;
            // $row[] = $komentar->time;
            //tambahkan html untuk tindakan
            $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $komentar->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->komentar->count_all(),
            "recordsFiltered" => $this->komentar->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    // public function ajax_edit($id)
    // {
    //     $data = $this->komentar->get_by_id($id);
    //     $data->pesan = ($data->pesan == '0000-00-00') ? '' : $data->pesan; //jika 0000-00-00 set tu kosong untuk kompatibilitas datepicker
    //     echo json_encode($data);
    // }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'subjek' => $this->input->post('subjek'),
            'pesan' => $this->input->post('pesan'),
            // 'time' => $this->input->post('time'),
        );

        $insert = $this->komentar->save($data);
        if ($insert > 0) {
            $msg['insert'] =
                '<script>alert("Komentar berhasil dikirim!")</script>';
        } else {
            $msg['insert'] =
                '<script>alert("Gagal mengirim komentar")</script>';
        }
        $this->session->set_flashdata($msg);

        redirect('hubungikami');
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'subjek' => $this->input->post('subjek'),
            'pesan' => $this->input->post('pesan'),
        );

        $this->komentar->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        //menghapus berkas
        $komentar = $this->komentar->get_by_id($id);

        $this->komentar->delete_by_id($id);
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

        if ($this->input->post('nama') == '') {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Masukan  Nama';
            $data['status'] = false;
        }

        if ($this->input->post('email') == '') {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Masukan  Email';
            $data['status'] = false;
        }

        if ($this->input->post('subjek') == '') {
            $data['inputerror'][] = 'subjek';
            $data['error_string'][] = 'Masukan  Subjek';
            $data['status'] = false;
        }

        if ($this->input->post('pesan') == '') {
            $data['inputerror'][] = 'pesan';
            $data['error_string'][] = 'Masukan Pesan';
            $data['status'] = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }
}
