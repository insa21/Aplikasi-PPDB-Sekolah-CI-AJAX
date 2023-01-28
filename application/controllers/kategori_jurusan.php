<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori_jurusan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori_jurusan', 'kategori_jurusan');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('component/header');
        $this->load->view('admin/kategori_jurusan');
        $this->load->view('component/footer');
        $this->load->view('admin/script_kategori');
    }


    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->kategori_jurusan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $kategori_jurusan) {
            $no++;
            $row = array();
            // $row[] = $kategori_jurusan->id;
            $row[] = $kategori_jurusan->jurusan;
			//tambahkan html untuk tindakan
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $kategori_jurusan->id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $kategori_jurusan->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->kategori_jurusan->count_all(),
            "recordsFiltered" => $this->kategori_jurusan->count_filtered(),
            "data" => $data,
        );
		//output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->kategori_jurusan->get_by_id($id);
        // $data->date = ($data->date == '0000-00-00') ? '' : $data->date; //jika 0000-00-00 set tu kosong untuk kompatibilitas datepicker
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            // 'id' => $this->input->post('id'),
            'jurusan' => $this->input->post('jurusan'),
        );

        $insert = $this->kategori_jurusan->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            // 'id' => $this->input->post('id'),
            'jurusan' => $this->input->post('jurusan'),
        );

        $this->kategori_jurusan->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
		//menghapus berkas
        $kategori_jurusan = $this->kategori_jurusan->get_by_id($id);

        $this->kategori_jurusan->delete_by_id($id);
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
        //     $data['error_string'][] = 'Masukan  id';
        //     $data['status'] = false;
        // }


        if ($this->input->post('jurusan') == '') {
            $data['inputerror'][] = 'jurusan';
            $data['error_string'][] = 'Masukan Kategori';
            $data['status'] = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }

}
