<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sarana extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sarana', 'sarana');
    }

    public function index()
    {
        $this->load->helper('url');
        // $data['kategori'] = $this->db->get('kategori')->result();
        $this->load->view('component/header');
        $this->load->view('sarana/v_sarana');
        $this->load->view('component/footer');
        $this->load->view('sarana/script');
    }


    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->sarana->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $sarana) {
            $no++;
            $row = array();
            if ($sarana->photo)
                $row[] = '<a href="' . base_url('upload/' . $sarana->photo) . '" target="_blank"><img src="' . base_url('upload/' . $sarana->photo) . '" class="img-responsive" /></a>';
            else
                $row[] = '(No photo)';
            $row[] = $sarana->nama;
            $row[] = $sarana->keterangan;
            $row[] = $sarana->date;
			//tambahkan html untuk tindakan
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $sarana->id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $sarana->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sarana->count_all(),
            "recordsFiltered" => $this->sarana->count_filtered(),
            "data" => $data,
        );
		//output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->sarana->get_by_id($id);
        $data->date = ($data->date == '0000-00-00') ? '' : $data->date; //jika 0000-00-00 set tu kosong untuk kompatibilitas datepicker
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'photo' => $this->input->post('photo'),
            'nama' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
            'date' => $this->input->post('date'),
        );

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload();
            $data['photo'] = $upload;
        }

        $insert = $this->sarana->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'photo' => $this->input->post('photo'),
            'nama' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
            'date' => $this->input->post('date'),
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
            $sarana = $this->sarana->get_by_id($this->input->post('id'));
            if (file_exists('upload/' . $sarana->photo) && $sarana->photo)
                unlink('upload/' . $sarana->photo);

            $data['photo'] = $upload;
        }

        $this->sarana->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
		//menghapus berkas
        $sarana = $this->sarana->get_by_id($id);
        if (file_exists('upload/' . $sarana->photo) && $sarana->photo)
            unlink('upload/' . $sarana->photo);

        $this->sarana->delete_by_id($id);
        echo json_encode(array("status" => true));
    }

    private function _do_upload()
    {
        $config['upload_path'] = 'upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
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
            $data['error_string'][] = 'Masukan  Nama';
            $data['status'] = false;
        }

        if ($this->input->post('keterangan') == '') {
            $data['inputerror'][] = 'keterangan';
            $data['error_string'][] = 'Masukan  Keterangan';
            $data['status'] = false;
        }

        if ($this->input->post('date') == '') {
            $data['inputerror'][] = 'date';
            $data['error_string'][] = 'Masukan Tanggal';
            $data['status'] = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }

}
