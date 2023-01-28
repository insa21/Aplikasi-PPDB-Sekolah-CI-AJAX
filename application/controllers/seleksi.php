<?php
defined('BASEPATH') or exit('No direct script access allowed');

class seleksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_seleksi', 'seleksi');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('component/header');
        $this->load->view('seleksi/v_seleksi');
        $this->load->view('component/footer');
        $this->load->view('seleksi/script');
    }


    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->seleksi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $seleksi) {
            $no++;
            $row = array();
            if ($seleksi->photo)
                $row[] = '<a href="' . base_url('upload/' . $seleksi->photo) . '" target="_blank"><img src="' . base_url('upload/' . $seleksi->photo) . '" class="img-responsive" /></a>';
            else
                $row[] = '(No photo)';
            $row[] = $seleksi->nama;
            $row[] = $seleksi->jenis_kelamin;
            $row[] = $seleksi->tanggal;
            $row[] = $seleksi->waktu;
            $row[] = $seleksi->ruangan;
            $row[] = $seleksi->gelombang;
            $row[] = $seleksi->testing;
            $row[] = $seleksi->status;
            $row[] = $seleksi->pesan;
            //tambahkan html untuk tindakan
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Status" onclick="edit_person(' . "'" . $seleksi->id . "'" . ')"><i class="glyphicon glyphicon-user"></i> Status</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->seleksi->count_all(),
            "recordsFiltered" => $this->seleksi->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->seleksi->get_by_id($id);
        $data->ttl = ($data->ttl == '0000-00-00') ? '' : $data->ttl; //jika 0000-00-00 set tu kosong untuk kompatibilitas datepicker
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'photo' => $this->input->post('photo'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu' => $this->input->post('waktu'),
            'ruangan' => $this->input->post('ruangan'),
            'gelombang' => $this->input->post('gelombang'),
            'testing' => $this->input->post('testing'),
            'status' => $this->input->post('status'),
            'pesan' => $this->input->post('pesan'),
        );

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload();
            $data['photo'] = $upload;
        }

        $insert = $this->seleksi->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            // 'photo' => $this->input->post('photo'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu' => $this->input->post('waktu'),
            'ruangan' => $this->input->post('ruangan'),
            'gelombang' => $this->input->post('gelombang'),
            'testing' => $this->input->post('testing'),
            'status' => $this->input->post('status'),
            'pesan' => $this->input->post('pesan'),
        );

        if ($this->input->post('remove_photo')) // if remove photo checked
        {
            if (file_exists('upload/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('upload/' . $this->input->post('remove_photo'));
            $data['photo'] = '';
        }

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload();

            //menghapus berkas
            $seleksi = $this->seleksi->get_by_id($this->input->post('id'));
            if (file_exists('upload/' . $seleksi->photo) && $seleksi->photo)
                unlink('upload/' . $seleksi->photo);

            $data['photo'] = $upload;
        }

        $this->seleksi->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        //menghapus berkas
        $seleksi = $this->seleksi->get_by_id($id);
        if (file_exists('upload/' . $seleksi->photo) && $seleksi->photo)
            unlink('upload/' . $seleksi->photo);

        $this->seleksi->delete_by_id($id);
        echo json_encode(array("status" => true));
    }

    private function _do_upload()
    {
        $config['upload_path'] = 'upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100; //set max size allowed in Kilobyte
        $config['max_width'] = 1000; // set max width image allowed
        $config['max_height'] = 1000; // set max height allowed
        $config['file_name'] = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = false;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = true;

        if ($this->input->post('nama') == '') {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Masukan  Nama';
            $data['status'] = false;
        }

        if ($this->input->post('tanggal') == '') {
            $data['inputerror'][] = 'tanggal';
            $data['error_string'][] = 'Masukan tanggal';
            $data['status'] = false;
        }

        if ($this->input->post('waktu') == '') {
            $data['inputerror'][] = 'waktu';
            $data['error_string'][] = 'Masukan waktu';
            $data['status'] = false;
        }

        if ($this->input->post('ruangan') == '') {
            $data['inputerror'][] = 'ruangan';
            $data['error_string'][] = 'Masukan ruangan';
            $data['status'] = false;
        }

        if ($this->input->post('gelombang') == '') {
            $data['inputerror'][] = 'gelombang';
            $data['error_string'][] = 'Masukan gelombang';
            $data['status'] = false;
        }

        if ($this->input->post('testing') == '') {
            $data['inputerror'][] = 'testing';
            $data['error_string'][] = 'Masukan Testing';
            $data['status'] = false;
        }

        if ($this->input->post('pesan') == '') {
            $data['inputerror'][] = 'pesan';
            $data['error_string'][] = 'Masukan pesan';
            $data['status'] = false;
        }



        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }
}
