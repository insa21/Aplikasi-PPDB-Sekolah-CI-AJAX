<?php
defined('BASEPATH') or exit('No direct script access allowed');

class data_kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data_kelas', 'data_kelas');
    }

    function index()
    {
        $data['jurusan'] = $this->db->get('jurusan')->result();
        $this->load->helper('url');
        $this->load->view('component/header');
        $this->load->view('data_kelas/v_data_kelas', $data);
        $this->load->view('component/footer');
        $this->load->view('data_kelas/script');
    }

    public function ajax_list()
    {
        $this->load->helper('url');
        $list = $this->data_kelas->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $data_kelas) {
            $no++;
            $row = array();
            if ($data_kelas->photo)
                $row[] = '<a href="' . base_url('upload/' . $data_kelas->photo) . '"target="_blank/"><img src="' . base_url('upload/' . $data_kelas->photo) . '"class="img-responsive"/></a>';
            else
                $row[] = '(no photo)';
            $row[] = $data_kelas->nama;
            $row[] = $data_kelas->kelas;
            $row[] = $data_kelas->jurusan;
            $row[] = $data_kelas->ke;
            $row[] = $data_kelas->status;
            //tambahkan html untuk tindakan
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit"  onclick="edit_person(' . "'" . $data_kelas->id . "'" . ')"><i class="glyphicon glyphicon-user"></i> Edit</a>
              <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $data_kelas->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->data_kelas->count_all(),
            "recordsFiltered" => $this->data_kelas->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->data_kelas->get_by_id($id);
        // $data->tanggal = ($data->tanggal == '0000-00-00') ? '' : $data->tanggal;  //jika 0000-00-00 set tu kosong untuk kompatibilitas datepicker
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'photo' => $this->input->post('photo'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'jurusan' => $this->input->post('jurusan'),
            'ke' => $this->input->post('ke'),
            'status' => $this->input->post('status'),
        );

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload();
            $data['photo'] = $upload;
        }

        $insert = $this->data_kelas->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            // 'photo' => $this->input->post('photo'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'jurusan' => $this->input->post('jurusan'),
            'ke' => $this->input->post('ke'),
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
            $data_kelas = $this->data_kelas->get_by_id($this->input->post('id'));
            if (file_exists('upload/' . $data_kelas->photo) && $data_kelas->photo)
                unlink('upload/' . $data_kelas->photo);

            $data['photo'] = $upload;
        }

        $this->data_kelas->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        //menghapus berkas
        $data_kelas = $this->data_kelas->get_by_id($id);
        if (file_exists('upload/' . $data_kelas->photo) && $data_kelas->photo)
            unlink('upload/' . $data_kelas->photo);

        $this->data_kelas->delete_by_id($id);
        echo json_encode(array("status" => true));
    }

    private function _do_upload()
    {
        $config['upload_path'] = 'upload/';
        $config['allowed_types'] = 'gif|jpg|pngIjpeg';
        $config['max_size'] = 1000; //set max size allowed in Kilobyte
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
            $data['error_string'][] = 'Masukan nama';
            $data['status'] = false;
        }


        if ($this->input->post('kelas') == '') {
            $data['inputerror'][] = 'kelas';
            $data['error_string'][] = 'Masukan  Kelas';
            $data['status'] = false;
        }

        if ($this->input->post('jurusan') == '') {
            $data['inputerror'][] = 'jurusan';
            $data['error_string'][] = 'Masukan  Jurusan';
            $data['status'] = false;
        }



        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }
}
