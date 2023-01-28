<?php
defined('BASEPATH') or exit('No direct script access allowed');

class artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_artikel', 'artikel');
    }

    function artikel()
    {
        $this->load->helper('url', 'form');
        $data['kategori'] = $this->db->get('kategori')->result(); //data variabel -> ke database masuk ke foreach v_artikel
        $this->load->view('component/header');
        $this->load->view('artikel/v_artikel', $data); //data dari table lain di masukan  ke view
        $this->load->view('component/footer');
        $this->load->view('artikel/script_artikel');
    }

    public function ajax_list()
    {
        $this->load->helper('url');
        $list = $this->artikel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $artikel) {
            $no++;
            $row = array();
            if ($artikel->photo)
                $row[] = '<a href="' . base_url('upload/' . $artikel->photo) . '"target="_blank/"><img src="' . base_url('upload/' . $artikel->photo) . '"class="img-responsive"/></a>';
            else
                $row[] = '(no photo)';
            $row[] = $artikel->title;
            $row[] = $artikel->kategori;
            $row[] = $artikel->keyword;
            $row[] = $artikel->date;
            //tambahkan html untuk tindakan
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $artikel->id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $artikel->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->artikel->count_all(),
            "recordsFiltered" => $this->artikel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->artikel->get_by_id($id);
        $data->date = ($data->date == '0000-00-00') ? '' : $data->date;  //jika 0000-00-00 set tu kosong untuk kompatibilitas datepicker
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'photo' => $this->input->post('photo'),
            'title' => $this->input->post('title'),
            'kategori' => $this->input->post('kategori'),
            'keyword' => $this->input->post('keyword'),
            'date' => $this->input->post('date'),
        );

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload();
            $data['photo'] = $upload;
        }

        $insert = $this->artikel->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            // 'photo' => $this->input->post('photo'),
            'title' => $this->input->post('title'),
            'kategori' => $this->input->post('kategori'),
            'keyword' => $this->input->post('keyword'),
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
            $artikel = $this->artikel->get_by_id($this->input->post('id'));
            if (file_exists('upload/' . $artikel->photo) && $artikel->photo)
                unlink('upload/' . $artikel->photo);

            $data['photo'] = $upload;
        }

        $this->artikel->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        //menghapus berkas
        $artikel = $this->artikel->get_by_id($id);
        if (file_exists('upload/' . $artikel->photo) && $artikel->photo)
            unlink('upload/' . $artikel->photo);

        $this->artikel->delete_by_id($id);
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

        if ($this->input->post('title') == '') {
            $data['inputerror'][] = 'title';
            $data['error_string'][] = 'Masukan  Title';
            $data['status'] = false;
        }

        if ($this->input->post('kategori') == '') {
            $data['inputerror'][] = 'kategori';
            $data['error_string'][] = 'Masukan  Jurusan';
            $data['status'] = false;
        }

        if ($this->input->post('keyword') == '') {
            $data['inputerror'][] = 'keyword';
            $data['error_string'][] = 'Masukan  Keyword';
            $data['status'] = false;
        }

        if ($this->input->post('date') == '') {
            $data['inputerror'][] = 'date';
            $data['error_string'][] = 'Masukan Date';
            $data['status'] = false;
        }


        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }
}
