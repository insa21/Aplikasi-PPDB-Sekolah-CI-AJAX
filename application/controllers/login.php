
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Login Multiuser Sekolah';
        $data['judul'] = 'Login Multiuser Codeigniter dengan Mysql';
        $data['project'] = $this->db->get('jurusan')->result();
        $this->load->view('home', $data);
    }


    function masuk()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->M_login->cek($username, $password);
        if ($cek->num_rows() == 1) {
            foreach ($cek->result() as $data) {
                $sess_data['id'] = $data->id;
                $sess_data['photo'] = $data->photo;
                $sess_data['nama'] = $data->nama;
                $sess_data['skhun'] = $data->skhun;
                $sess_data['nis'] = $data->nis;
                $sess_data['jenis_kelamin'] = $data->jenis_kelamin;
                $sess_data['tahun_masuk'] = $data->tahun_masuk;
                $sess_data['ttl'] = $data->ttl;
                $sess_data['alamat'] = $data->alamat;
                $sess_data['agama'] = $data->agama;
                $sess_data['sekolah_asal'] = $data->sekolah_asal;
                $sess_data['nama_ibu'] = $data->nama_ibu;
                $sess_data['nama_ayah'] = $data->nama_ayah;
                $sess_data['email'] = $data->email;
                $sess_data['jurusan'] = $data->jurusan;
                $sess_data['status'] = $data->status;
                $sess_data['ke'] = $data->ke;
                $sess_data['testing'] = $data->testing;
                $sess_data['tanggal'] = $data->tanggal;
                $sess_data['waktu'] = $data->waktu;
                $sess_data['ruangan'] = $data->ruangan;
                $sess_data['gelombang'] = $data->gelombang;
                $sess_data['pesan'] = $data->pesan;
                $sess_data['kelas'] = $data->kelas;
                $sess_data['username'] = $data->username;
                $sess_data['id_jenis_user'] = $data->id_jenis_user;
                $this->session->set_userdata($sess_data);
            }
            if (!empty($_FILES['photo']['name'])) {
                $upload = $this->_do_upload();
                $data['photo'] = $upload;
            }

            if ($this->session->userdata('id_jenis_user') == '1') {
                redirect('dashboard');
            } elseif ($this->session->userdata('id_jenis_user') == '2') {
                redirect('bs_data');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Maaf, kombinasi username dengan password salah.');
            redirect('login');
        }
    }

    function keluar()
    {
        $this->session->sess_destroy();
        redirect('login');
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
}
