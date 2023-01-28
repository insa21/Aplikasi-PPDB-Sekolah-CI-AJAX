<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_isi_kepala_sekolah extends CI_Model
{

    var $table = 'kepala_sekolah';   //table
    var $column_order = array('nama', 'deskripsi', 'selanjutnya', null); //setel kolom bidang basis data agar dapat didatangkan dengan data
    var $column_search = array('nama', 'deskripsi', 'selanjutnya',); //set kolom kolom database untuk dapat dicari datatable hanya nama depan, nama belakang, alamat dapat dicari
    var $order = array('id' => 'desc'); // pesanan default 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // kolom loop 
        {
            if ($_POST['search']['value']) // jika datatable kirim POST untuk pencarian
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // braket terbuka. kueri Di mana dengan ATAU klausa lebih baik dengan braket. karena mungkin bisa menggabungkan dengan WHERE lainnya dengan AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //lingkaran terakhir
                $this->db->group_end(); //tutup braket
            }
            $i++;
        }

        if (isset($_POST['order'])) // di sini pemrosesan pesanan
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}
