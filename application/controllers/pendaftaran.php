<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pendaftaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pendaftaran', 'pendaftaran');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('utama/header');
        $this->load->view('utama/pendaftaran/v_pendaftaran');
        $this->load->view('utama/footer');
        $this->load->view('utama/pendaftaran/script');
    }


    // public function pengumuman_daftar()
    // {
    //     $this->load->helper('url');
    //     $this->load->view('utama/header');
    //     $this->load->view('utama/pendaftaran/v_pendaftaran');
    //     $this->load->view('utama/footer');
    //     $this->load->view('utama/pendaftaran/script');
    // }

    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->pendaftaran->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pendaftaran) {
            $no++;
            $row = array();
            if ($pendaftaran->photo)
                $row[] = '<a href="' . base_url('upload/' . $pendaftaran->photo) . '" target="_blank"><img src="' . base_url('upload/' . $pendaftaran->photo) . '" class="img-responsive" /></a>';
            else
                $row[] = '(No photo)';
            $row[] = $pendaftaran->nama;
            $row[] = $pendaftaran->jenis_kelamin;
            $row[] = $pendaftaran->tanggal;
            $row[] = $pendaftaran->waktu;
            $row[] = $pendaftaran->ruangan;
            $row[] = $pendaftaran->gelombang;
            $row[] = $pendaftaran->testing;
            $row[] = $pendaftaran->status;
            //tambahkan html untuk tindakan
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Status" onclick="edit_person(' . "'" . $pendaftaran->id . "'" . ')"><i class="glyphicon glyphicon-user"></i> Status</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pendaftaran->count_all(),
            "recordsFiltered" => $this->pendaftaran->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->pendaftaran->get_by_id($id);
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
        );

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload();
            $data['photo'] = $upload;
        }

        $insert = $this->pendaftaran->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
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
            $pendaftaran = $this->pendaftaran->get_by_id($this->input->post('id'));
            if (file_exists('upload/' . $pendaftaran->photo) && $pendaftaran->photo)
                unlink('upload/' . $pendaftaran->photo);

            $data['photo'] = $upload;
        }

        $this->pendaftaran->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        //menghapus berkas
        $pendaftaran = $this->pendaftaran->get_by_id($id);
        if (file_exists('upload/' . $pendaftaran->photo) && $pendaftaran->photo)
            unlink('upload/' . $pendaftaran->photo);

        $this->pendaftaran->delete_by_id($id);
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

        if ($this->input->post('nis') == '') {
            $data['inputerror'][] = 'nis';
            $data['error_string'][] = 'Masukan  Nis';
            $data['status'] = false;
        }

        if ($this->input->post('kelas') == '') {
            $data['inputerror'][] = 'kelas';
            $data['error_string'][] = 'Masukan Kelas';
            $data['status'] = false;
        }

        if ($this->input->post('tahun_masuk') == '') {
            $data['inputerror'][] = 'tahun_masuk';
            $data['error_string'][] = ' Masukan Tahun Masuk';
            $data['status'] = false;
        }

        if ($this->input->post('ttl') == '') {
            $data['inputerror'][] = 'ttl';
            $data['error_string'][] = 'Masukan Tempat Tanggal Lahir';
            $data['status'] = false;
        }

        if ($this->input->post('alamat') == '') {
            $data['inputerror'][] = 'alamat';
            $data['error_string'][] = 'Masukan Alamat';
            $data['status'] = false;
        }

        if ($this->input->post('agama') == '') {
            $data['inputerror'][] = 'agama';
            $data['error_string'][] = 'Masukan Agama';
            $data['status'] = false;
        }

        if ($this->input->post('sekolah_asal') == '') {
            $data['inputerror'][] = 'sekolah_asal';
            $data['error_string'][] = 'Masukan Sekolah Asal';
            $data['status'] = false;
        }

        if ($this->input->post('nama_ibu') == '') {
            $data['inputerror'][] = 'nama_ibu';
            $data['error_string'][] = 'Masukan Nama Ibu';
            $data['status'] = false;
        }

        if ($this->input->post('nama_ayah') == '') {
            $data['inputerror'][] = 'nama_ayah';
            $data['error_string'][] = 'Masukan Nama Ayah';
            $data['status'] = false;
        }

        // if ($this->input->post('hp') == '') {
        //     $data['inputerror'][] = 'hp';
        //     $data['error_string'][] = 'Masukan NO HP';
        //     $data['status'] = false;
        // }

        if ($this->input->post('email') == '') {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Masukan Email';
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



        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }
}
