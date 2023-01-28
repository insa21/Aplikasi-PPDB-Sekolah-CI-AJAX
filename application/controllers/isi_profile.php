<?php
defined('BASEPATH') or exit('No direct script access allowed');

class isi_profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_isi_profile', 'isi_profile');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('component/header');
        $this->load->view('isi_profile/v_isi_profile');
        $this->load->view('component/footer');
        $this->load->view('isi_profile/script');
    }


    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->isi_profile->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $isi_profile) {
            $no++;
            $row = array();
            if ($isi_profile->photo)
                $row[] = '<a href="' . base_url('upload/' . $isi_profile->photo) . '" target="_blank"><img src="' . base_url('upload/' . $isi_profile->photo) . '" class="img-responsive" /></a>';
            else
                $row[] = '(No photo)';
            $row[] = $isi_profile->pembuat;
            $row[] = $isi_profile->date;
            $row[] = $isi_profile->tempat;
            $row[] = $isi_profile->nks;
            $row[] = $isi_profile->visi;
            $row[] = $isi_profile->misi;
            $row[] = $isi_profile->tujuan;
            $row[] = $isi_profile->kebijakan;
            $row[] = $isi_profile->moto;
            $row[] = $isi_profile->selengkapnya;
            //tambahkan html untuk tindakan
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $isi_profile->id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $isi_profile->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->isi_profile->count_all(),
            "recordsFiltered" => $this->isi_profile->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->isi_profile->get_by_id($id);
        $data->date = ($data->date == '0000-00-00') ? '' : $data->date; //jika 0000-00-00 set tu kosong untuk kompatibilitas datepicker
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            // 'id' => $this->input->post('id'),
            'photo' => $this->input->post('photo'),
            'pembuat' => $this->input->post('pembuat'),
            'date' => $this->input->post('date'),
            'tempat' => $this->input->post('tempat'),
            'nks' => $this->input->post('nks'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
            'tujuan' => $this->input->post('tujuan'),
            'kebijakan' => $this->input->post('kebijakan'),
            'moto' => $this->input->post('moto'),
            'selengkapnya' => $this->input->post('selengkapnya'),
        );

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload();
            $data['photo'] = $upload;
        }

        $insert = $this->isi_profile->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            // 'id' => $this->input->post('id'),
            'photo' => $this->input->post('photo'),
            'pembuat' => $this->input->post('pembuat'),
            'date' => $this->input->post('date'),
            'tempat' => $this->input->post('tempat'),
            'nks' => $this->input->post('nks'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
            'tujuan' => $this->input->post('tujuan'),
            'kebijakan' => $this->input->post('kebijakan'),
            'moto' => $this->input->post('moto'),
            'selengkapnya' => $this->input->post('selengkapnya'),
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
            $isi_profile = $this->isi_profile->get_by_id($this->input->post('id'));
            if (file_exists('upload/' . $isi_profile->photo) && $isi_profile->photo)
                unlink('upload/' . $isi_profile->photo);

            $data['photo'] = $upload;
        }

        $this->isi_profile->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        //menghapus berkas
        $isi_profile = $this->isi_profile->get_by_id($id);
        if (file_exists('upload/' . $isi_profile->photo) && $isi_profile->photo)
            unlink('upload/' . $isi_profile->photo);

        $this->isi_profile->delete_by_id($id);
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

        if ($this->input->post('pembuat') == '') {
            $data['inputerror'][] = 'pembuat';
            $data['error_string'][] = 'Masukan  pembuat';
            $data['status'] = false;
        }

        if ($this->input->post('date') == '') {
            $data['inputerror'][] = 'date';
            $data['error_string'][] = 'Masukan Tanggal';
            $data['status'] = false;
        }

        if ($this->input->post('tempat') == '') {
            $data['inputerror'][] = 'tempat';
            $data['error_string'][] = 'Masukan  tempat';
            $data['status'] = false;
        }

        if ($this->input->post('nks') == '') {
            $data['inputerror'][] = 'nks';
            $data['error_string'][] = 'Masukan  nks';
            $data['status'] = false;
        }

        if ($this->input->post('visi') == '') {
            $data['inputerror'][] = 'visi';
            $data['error_string'][] = 'Masukan  visi';
            $data['status'] = false;
        }

        if ($this->input->post('misi') == '') {
            $data['inputerror'][] = 'misi';
            $data['error_string'][] = 'Masukan  misi';
            $data['status'] = false;
        }

        if ($this->input->post('tujuan') == '') {
            $data['inputerror'][] = 'tujuan';
            $data['error_string'][] = 'Masukan  tujuan';
            $data['status'] = false;
        }

        if ($this->input->post('kebijakan') == '') {
            $data['inputerror'][] = 'kebijakan';
            $data['error_string'][] = 'Masukan  kebijakan';
            $data['status'] = false;
        }

        if ($this->input->post('moto') == '') {
            $data['inputerror'][] = 'moto';
            $data['error_string'][] = 'Masukan  moto';
            $data['status'] = false;
        }

        if ($this->input->post('selengkapnya') == '') {
            $data['inputerror'][] = 'selengkapnya';
            $data['error_string'][] = 'Masukan  selengkapnya';
            $data['status'] = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }
}
