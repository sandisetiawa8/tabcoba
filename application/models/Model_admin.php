<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{
    public function getUser($table)
    {
        $data = $this->db->get($table);
        return $data->result_array();
    }

    public function getUserByKelas()
    {
        $where = array('role_id' => 2, 'kelas' =>$this->session->userdata['kelas']);
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($where);
        $this->db->order_by('nama');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_user()
    {
        $where = array('role_id' => 2, 'kelas' =>$this->session->userdata['kelas']);
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($where);
        return $this->db->count_all_results();
    }

    public function import_data($datas)
    {
        return $this->db->insert_batch("user",$datas);
    }

    public function tambahkekeuangan($datas2)
    {
        return $this->db->insert_batch("keuangan",$datas2);
    }

    // mendapatkan Jumlah setoran + join tabel user dan keuangan masing masing user
    public function jumlah_setoran_by_nis()
    {
        $this->db->select('
        keuangan.*, user.nis AS nis_user, user.nama, user.email, user.image, user.kelas, 
        ');
        $this->db->select_sum('setoran');
        $this->db->join('user', 'keuangan.nis = user.nis');
        $this->db->from('keuangan');
        $this->db->where('kelas', $this->session->userdata('kelas'));
        $this->db->group_by('nis');
        $this->db->order_by('nama');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function riwayatSetoran($nis)
    {
        $where = array('nis' => $nis, 'jenis' => 'ST' );
        $this->db->select('*');
        $this->db->from('keuangan');
        $this->db->where($where);
        $this->db->order_by('tgl', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }


    //digunakan di hal. daftar user, untuk mendapatkan semua data user
    // digunakan di menu laporan keuangan dan Cetak laporan Keuangan
    public function data_siswa_tabungan()
    {
        $this->db->select('
        user.*, keuangan.*
        ');
        $this->db->select_sum('setoran');
        $this->db->select_sum('penarikan');
        $this->db->join('user', 'keuangan.nis = user.nis');
        $this->db->from('keuangan');
        $this->db->where('kelas', $this->session->userdata('kelas'));
        $this->db->group_by('user.nis');
        $this->db->order_by('nama', 'asc');
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

   
    // digunakan di halaman laporan keuangan
    public function jumlah_saldo_semua()
    {
        $this->db->select('
        keuangan.*, user.nis AS nis_user, user.nama, 
        ');
        $this->db->select_sum('setoran');
        $this->db->select_sum('penarikan');
        $this->db->join('user', 'keuangan.nis = user.nis');
        $this->db->from('keuangan');
        $this->db->where('kelas', $this->session->userdata('kelas'));
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
        $this->db->where('kelas', $this->session->userdata('kelas'));
        $this->db->group_by('nis');
        $this->db->order_by('nama');
        $query = $this->db->get();
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

    
    // mendapatkan jumlah setoran perhari perkelas
    public function getSetoranHari()
    {
        $now = date("Y-m-d");
        $where = array('tgl' => $now, 'kelas' =>$this->session->userdata['kelas']);
        $this->db->select('
        keuangan.*, user.nis AS nis_user, user.nama, 
        ');
        $this->db->join('user', 'keuangan.nis = user.nis');
        $this->db->select_sum('setoran');
        $query = $this->db->get_where('keuangan', $where);
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
        $where = array('tgl' => $now, 'kelas' =>$this->session->userdata['kelas']);
        $this->db->select('
        keuangan.*, user.nis AS nis_user, user.nama, 
        ');
        $this->db->join('user', 'keuangan.nis = user.nis');
        $this->db->select_sum('penarikan');
        $query = $this->db->get_where('keuangan', $where);
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




    // dari sini sampe bawah dipake di halaman user

    public function total_tabunganku()
    {
        $this->db->select_sum('setoran');
        $this->db->select_sum('penarikan');
        $this->db->from('keuangan');
        $this->db->where('nis', $this->session->userdata('nis'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function setoranku()
    {
        $now = date("Y-m-d");
        $where = array('tgl' => $now, 'nis' =>$this->session->userdata['nis']);
        $this->db->select_sum('setoran');
        $query = $this->db->get_where('keuangan', $where);
        if($query->num_rows()>0)
        {
            return $query->row()->setoran;
        }
        else
        {
            return 0;
        }
    }

    public function penarikanku()
    {
        $now = date("Y-m-d");
        $where = array('tgl' => $now, 'nis' =>$this->session->userdata['nis']);
        $this->db->select_sum('penarikan');
        $query = $this->db->get_where('keuangan', $where);
        if($query->num_rows()>0)
        {
            return $query->row()->penarikan;
        }
        else
        {
            return 0;
        }
    }
    
}