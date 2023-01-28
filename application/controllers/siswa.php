<?php
defined('BASEPATH') or exit('No direct script access allowed');

class siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_siswa', 'siswa');
    }

    public function index()
    {
        $data['project'] = $this->db->get('jurusan')->result();
        $this->load->helper('url');
        $this->load->view('component/header');
        $this->load->view('admin/v_siswa', $data);
        // $this->load->view('admin/pdf', $data);
        $this->load->view('component/footer');
        $this->load->view('admin/script');
    }

    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->siswa->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $siswa) {
            $no++;
            $row = array();
            if ($siswa->photo)
                $row[] = '<a href="' . base_url('upload/' . $siswa->photo) . '" target="_blank"><img src="' . base_url('upload/' . $siswa->photo) . '" class="img-responsive" /></a>';
            else
                $row[] = '(No photo)';
            $row[] = $siswa->nama;
            $row[] = $siswa->skhun;
            $row[] = $siswa->nis;
            $row[] = $siswa->jenis_kelamin;
            $row[] = $siswa->tahun_masuk;
            $row[] = $siswa->ttl;
            $row[] = $siswa->alamat;
            $row[] = $siswa->agama;
            $row[] = $siswa->sekolah_asal;
            $row[] = $siswa->nama_ibu;
            $row[] = $siswa->nama_ayah;
            // $row[] = $siswa->telp;
            $row[] = $siswa->email;
            $row[] = $siswa->jurusan;
            // $row[] = $siswa->status;
            //tambahkan html untuk tindakan
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $siswa->id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				 <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $siswa->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->siswa->count_all(),
            "recordsFiltered" => $this->siswa->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->siswa->get_by_id($id);
        $data->ttl = ($data->ttl == '0000-00-00') ? '' : $data->ttl; //jika 0000-00-00 set tu kosong untuk kompatibilitas datepicker
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'photo' => $this->input->post('photo'),
            'nama' => $this->input->post('nama'),
            'skhun' => $this->input->post('skhun'),
            'nis' => $this->input->post('nis'),
            // 'kelas' => $this->input->post('kelas'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'ttl' => $this->input->post('ttl'),
            'alamat' => $this->input->post('alamat'),
            'agama' => $this->input->post('agama'),
            'sekolah_asal' => $this->input->post('sekolah_asal'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            // 'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'jurusan' => $this->input->post('jurusan'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'id_jenis_user' => $this->input->post('id_jenis_user'),
        );

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload();
            $data['photo'] = $upload;
        }

        $insert = $this->siswa->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            // 'photo' => $this->input->post('photo'),
            'nama' => $this->input->post('nama'),
            'skhun' => $this->input->post('skhun'),
            'nis' => $this->input->post('nis'),
            // 'kelas' => $this->input->post('kelas'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'ttl' => $this->input->post('ttl'),
            'alamat' => $this->input->post('alamat'),
            'agama' => $this->input->post('agama'),
            'sekolah_asal' => $this->input->post('sekolah_asal'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            // 'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'jurusan' => $this->input->post('jurusan'),
            // 'status' => $this->input->post('status'),
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
            $siswa = $this->siswa->get_by_id($this->input->post('id'));
            if (file_exists('upload/' . $siswa->photo) && $siswa->photo)
                unlink('upload/' . $siswa->photo);

            $data['photo'] = $upload;
        }

        $this->siswa->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        //menghapus berkas
        $siswa = $this->siswa->get_by_id($id);
        if (file_exists('upload/' . $siswa->photo) && $siswa->photo)
            unlink('upload/' . $siswa->photo);

        $this->siswa->delete_by_id($id);
        echo json_encode(array("status" => true));
    }

    private function _do_upload()
    {
        $config['upload_path'] = 'upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
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

        if ($this->input->post('skhun') == '') {
            $data['inputerror'][] = 'skhun';
            $data['error_string'][] = 'Masukan  Skhun';
            $data['status'] = false;
        }

        if ($this->input->post('nis') == '') {
            $data['inputerror'][] = 'nis';
            $data['error_string'][] = 'Masukan  Nisn';
            $data['status'] = false;
        }

        // if ($this->input->post('kelas') == '') {
        //     $data['inputerror'][] = 'kelas';
        //     $data['error_string'][] = 'Masukan Kelas';
        //     $data['status'] = false;
        // }

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

        // if ($this->input->post('telp') == '') {
        //     $data['inputerror'][] = 'telp';
        //     $data['error_string'][] = 'Masukan NO telp';
        //     $data['status'] = false;
        // }

        if ($this->input->post('email') == '') {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Masukan Email';
            $data['status'] = false;
        }

        if ($this->input->post('jurusan') == '') {
            $data['inputerror'][] = 'jurusan';
            $data['error_string'][] = 'Masukan jurusan';
            $data['status'] = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }
}
