<?php
defined('BASEPATH') or exit('No direct script access allowed');

class isi_kepala_sekolah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_isi_kepala_sekolah', 'isi_kepala_sekolah');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('component/header');
        $this->load->view('isi_kepala_sekolah/v_isi_kepala_sekolah');
        $this->load->view('component/footer');
        $this->load->view('isi_kepala_sekolah/script');
    }


    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->isi_kepala_sekolah->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $isi_kepala_sekolah) {
            $no++;
            $row = array();
            if ($isi_kepala_sekolah->photo)
                $row[] = '<a href="' . base_url('upload/' . $isi_kepala_sekolah->photo) . '" target="_blank"><img src="' . base_url('upload/' . $isi_kepala_sekolah->photo) . '" class="img-responsive" /></a>';
            else
                $row[] = '(No photo)';
            $row[] = $isi_kepala_sekolah->nama;
            $row[] = $isi_kepala_sekolah->deskripsi;
            $row[] = $isi_kepala_sekolah->selanjutnya;
            //tambahkan html untuk tindakan
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $isi_kepala_sekolah->id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $isi_kepala_sekolah->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->isi_kepala_sekolah->count_all(),
            "recordsFiltered" => $this->isi_kepala_sekolah->count_filtered(),
            "data" => $data,
        );
		//output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->isi_kepala_sekolah->get_by_id($id);
        $data->date = ($data->date == '0000-00-00') ? '' : $data->date; //jika 0000-00-00 set tu kosong untuk kompatibilitas datepicker
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            // 'id' => $this->input->post('id'),
            'photo' => $this->input->post('photo'),
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'selanjutnya' => $this->input->post('selanjutnya'),
        );

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload();
            $data['photo'] = $upload;
        }

        $insert = $this->isi_kepala_sekolah->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            // 'id' => $this->input->post('id'),
            'photo' => $this->input->post('photo'),
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'selanjutnya' => $this->input->post('selanjutnya'),
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
            $isi_kepala_sekolah = $this->isi_kepala_sekolah->get_by_id($this->input->post('id'));
            if (file_exists('upload/' . $isi_kepala_sekolah->photo) && $isi_kepala_sekolah->photo)
                unlink('upload/' . $isi_kepala_sekolah->photo);

            $data['photo'] = $upload;
        }

        $this->isi_kepala_sekolah->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
		//menghapus berkas
        $isi_kepala_sekolah = $this->isi_kepala_sekolah->get_by_id($id);
        if (file_exists('upload/' . $isi_kepala_sekolah->photo) && $isi_kepala_sekolah->photo)
            unlink('upload/' . $isi_kepala_sekolah->photo);

        $this->isi_kepala_sekolah->delete_by_id($id);
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
            $data['error_string'][] = 'Masukan  nama';
            $data['status'] = false;
        }

        if ($this->input->post('deskripsi') == '') {
            $data['inputerror'][] = 'deskripsi';
            $data['error_string'][] = 'Masukan Deskripsi';
            $data['status'] = false;
        }

        if ($this->input->post('selanjutnya') == '') {
            $data['inputerror'][] = 'selanjutnya';
            $data['error_string'][] = 'Masukan  Selanjutnya';
            $data['status'] = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }

}