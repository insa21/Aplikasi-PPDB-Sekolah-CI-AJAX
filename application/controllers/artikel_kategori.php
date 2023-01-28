<?php
defined('BASEPATH') or exit('No direct script access allowed');

class artikel_kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_artikel_kategori', 'artikel_kategori');
    }

    public function kategori()
    {
        $this->load->helper('url');
        $this->load->view('component/header');
        $this->load->view('artikel/v_artikel_kategori');
        $this->load->view('component/footer');
        $this->load->view('artikel/script_artikel_kategori');
    }


    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->artikel_kategori->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $artikel_kategori) {
            $no++;
            $row = array();
            $row[] = $artikel_kategori->id;
            $row[] = $artikel_kategori->kategori;
			//tambahkan html untuk tindakan
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $artikel_kategori->id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $artikel_kategori->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->artikel_kategori->count_all(),
            "recordsFiltered" => $this->artikel_kategori->count_filtered(),
            "data" => $data,
        );
		//output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->artikel_kategori->get_by_id($id);
        // $data->date = ($data->date == '0000-00-00') ? '' : $data->date; //jika 0000-00-00 set tu kosong untuk kompatibilitas datepicker
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'id' => $this->input->post('id'),
            'kategori' => $this->input->post('kategori'),
        );

        $insert = $this->artikel_kategori->save($data);

        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'id' => $this->input->post('id'),
            'kategori' => $this->input->post('kategori'),
        );

        $this->artikel_kategori->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
		//menghapus berkas
        $artikel_kategori = $this->artikel_kategori->get_by_id($id);

        $this->artikel_kategori->delete_by_id($id);
        echo json_encode(array("status" => true));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = true;

        if ($this->input->post('id') == '') {
            $data['inputerror'][] = 'id';
            $data['error_string'][] = 'Masukan  kategori';
            $data['status'] = false;
        }


        if ($this->input->post('kategori') == '') {
            $data['inputerror'][] = 'kategori';
            $data['error_string'][] = 'Masukan kategori';
            $data['status'] = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }

}
