<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    public function getUser($table)
    {
        $data = $this->db->get($table);
        return $data->result_array();
    }

    public function get_saldo_by_nis($nis)
    {
        $this->db->select('setoran', 'penarikan');
        $this->db->from('keuangan');
        $this->db->group_by($nis);
    }


    // mendapatkan setoran dari masing-masing user
    public function get_setoran_by_nis()
    {
        $this->db->select('
          keuangan.*, user.nis AS nis_user, user.nama, 
        ');
        $this->db->join('user', 'keuangan.nis = user.nis');
        $this->db->from('keuangan');
        // $this->db->where('nis' =>)
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail($nis)
    {
        $this->db->select('*');
        $this->db->from('keuangan');
        $this->db->where('nis', $nis);
    }

    // mendapatkan Jumlah setoran + join tabel user dan keuangan masing masing user
    public function jumlah_setoran_by_nis()
    {
        $this->db->select('
        keuangan.*, user.nis AS nis_user, user.nama, 
        ');
        $this->db->select_sum('setoran');
        $this->db->join('user', 'keuangan.nis = user.nis');
        $this->db->from('keuangan');
        $this->db->group_by('nis');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // digunakan di menu laporan keuangan dan Cetak laporan Keuangan
    public function jumlah_saldo_by_nis()
    {
        $this->db->select('
        keuangan.*, user.nis AS nis_user, user.nama, 
        ');
        $this->db->select_sum('setoran');
        $this->db->select_sum('penarikan');
        $this->db->join('user', 'keuangan.nis = user.nis');
        $this->db->from('keuangan');
        $this->db->group_by('nis');
        $query = $this->db->get();
        return $query->result_array();
    }

    // digunakan di halaman  cetak rekening koran
    public function total_saldo_by_nis($nis)
    {
        $this->db->select_sum('setoran');
        $this->db->select_sum('penarikan');
        $this->db->from('keuangan');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function jumlah_saldo_semua()
    {
        $this->db->select_sum('setoran');
        $this->db->select_sum('penarikan');
        $this->db->from('keuangan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function jumlah_penarikan_by_nis()
    {
        $this->db->select('
        keuangan.*, user.nis AS nis_user, user.nama, 
        ');
        $this->db->select_sum('penarikan');
        $this->db->join('user', 'keuangan.nis = user.nis');
        $this->db->from('keuangan');
        $this->db->group_by('nis');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function jumlah_setoran_by_nis_where()
    {
        
        $this->db->select('
        keuangan.*, user.nis AS nis_user, user.nama, 
        ');
        $this->db->select_sum('setoran');
        $this->db->join('user', 'keuangan.nis = user.nis');
        $this->db->from('keuangan');
        $this->db->group_by('nis');
        $this->db->where('tgl', 'BETWEEN date1 AND date2');
        $query = $this->db->get();
        return $query->result_array();
    }
    

    // mendaapatkan total setoran masing_masing user
    public function total_setoran($nis)
    {
        $where = $nis;
        $this->db->select_sum('setoran');
        $this->db->from('keuangan');
        $this->db->where('nis', $where);
        $query= $this->db->get();
        return $query->result_array();
    }

    // digunakan di halaman detail setoran
    public function total_setoran_by_nis($nis)
    {
        $this->db->select_sum('setoran');
        $this->db->from('keuangan');
        $this->db->where(['jenis'=> 'ST', 'nis'=>$nis] );
        $this->db->group_by('nis');
        $query = $this->db->get();
        return $query->result_array();
    }

    
    // mendapatkan jumlah setoran perhari
    public function getSetoranHari()
    {
        $now = date("Y-m-d");
        $this->db->select_sum('setoran');
        $query = $this->db->get_where('keuangan', ['tgl' => $now]);
        if($query->num_rows()>0)
        {
            return $query->row()->setoran;
        }
        else
        {
            return 0;
        }
        }

    // mendapatkan jumlah setoran perbulan
    public function getSetoranBulan()
    {
        $now = date("Y-m-d");
        // $bulan = MONTH();
        $this->db->select_sum('setoran');
        $query = $this->db->get_where('keuangan', ['tgl' => 20]);
        if($query->num_rows()>0)
        {
            return $query->row()->setoran;
        }
        else
        {
            return 0;
        }
    }


    // Mendapatkan jumlah penarikan perhari
    public function getPenarikanHari()
    {
        $now = date("Y-m-d");
        $this->db->select_sum('penarikan');
        $query = $this->db->get_where('keuangan', ['tgl' => $now]);
        if($query->num_rows()>0)
        {
            return $query->row()->penarikan;
        }
        else
        {
            return 0;
        }
        }


    // mendapatkan jumlah penarikan perbulan tapi belum jadi
    public function getpenarikanBulan()
    {
        // $now = date("Y-m-d");
        $this->db->select_sum('penarikan');
        $query = $this->db->get_where('keuangan', ['tgl' => '%M']);
        if($query->num_rows()>0)
        {
            return $query->row()->penarikan;
        }
        else
        {
            return 0;
        }
    }

    public function total_penarikan_by_nis($nis)
    {
        $this->db->select_sum('penarikan');
        $this->db->from('keuangan');
        $this->db->where(['jenis'=> 'TR', 'nis'=>$nis] );
        $this->db->group_by('nis');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function total_tabunganku()
    {
        $this->db->select_sum('setoran');
        $this->db->select_sum('penarikan');
        $this->db->from('keuangan');
        $this->db->where('email', $this->session->userdata('email'));
        $query = $this->db->get();
        return $query->result_array();
    }
}