<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('email')) {
            redirect('auth');
        };
        if($this->session->userdata('role_id') != "2"){
            redirect("Level_User");
        }
        $this->load->helper('rupiah');
    }


    public function index()
    {

            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['jumlah_user'] = $this->db->count_all('user');
            $data['setoran_hari'] = $this->Model_admin->setoranku();
            $data['penarikan_hari'] = $this->Model_admin->penarikanku();
            $data['jumlah_semua'] = $this->Model_admin->total_tabunganku();    
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaruser', $data);
            $this->load->view('templates/topbaruser', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');

    }

    public function tabunganKu()
    {
        $data['title'] = 'Riwayat TabunganKu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jumlah_semua'] = $this->Model_admin->total_tabunganku();    
        $data['hasil'] = $this->db->get_where('keuangan', ['nis' => $this->session->userdata('nis')])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/topbaruser', $data);
        $this->load->view('user/tabunganku', $data);
    }

    public function cetak_riwayat_tabungan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jumlah_semua'] = $this->Model_admin->total_tabunganku();    
        $data['hasil'] = $this->db->get_where('keuangan', ['nis' => $this->session->userdata('nis')])->result_array();
       
        $this->load->view('user/riwayat_tabungan', $data);
    }

    public function myprofile()
    {
        $data['title'] = 'Profile Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ortu'] = $this->db->get_where('ortu', ['nis' => $this->session->userdata('nis')])->row_array();
       

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/topbaruser', $data);
        $this->load->view('user/my_profile', $data);
        // $this->load->view('templates/footer');
    }

    public function proses_ubah_foto()
    {
        
                $nis = $this->input->post('nis');
                    $config['upload_path']          = FCPATH.'/assets/img/profile/';
                    $config['allowed_types']        = 'jpg|png|jpeg';
                    $config['max_size']             = 100000;
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;
    

                    $this->load->library('upload', $config);
                    
                    if($this->upload->do_upload('image') == true) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                        $this->db->where('nis', $nis);
                        $this->db->update('user');

                        $this->session->set_flashdata('success', 'Profile berhasil di Ubah');
                        redirect('user/myprofile');
                    }else {
                        echo $this->upload->display_errors();
                    };
    
    }

   public function proses_ubah_profile()
   {
    $id = $this->input->post('id');
    $nama = $this->input->post('nama');
    $nis = $this->input->post('nis');
    $tgl_lahir = $this->input->post('tgl_lahir');
    $tmp_lahir = $this->input->post('tmp_lahir');
    $jk = $this->input->post('jk');
    $alamat = $this->input->post('alamat');
    $agama = $this->input->post('agama');
    $kelas = $this->input->post('kelas');
    
    
    $this->db->set('nama', $nama);
    $this->db->set('nis', $nis);
    $this->db->set('tgl_lahir', $tgl_lahir);
    $this->db->set('tmp_lahir', $tmp_lahir);
    $this->db->set('jk', $jk);
    $this->db->set('alamat', $alamat);
    $this->db->set('agama', $agama);
    $this->db->set('kelas', $kelas);
    $this->db->where('id', $id);
    $this->db->update('user');

    $this->session->set_flashdata('success', 'Berhasil Mengubah Data.');
    redirect('user/myprofile');
   }

   public function proses_ubah_ortu()
   {
    $id = $this->input->post('id');
    $ayah = $this->input->post('ayah');
    $ibu = $this->input->post('ibu');
    $alamat = $this->input->post('alamat');
    $pek_ayah = $this->input->post('pek_ayah');
    $pek_ibu = $this->input->post('pek_ibu');
    $no_hp = $this->input->post('no_hp');
   
    
    $this->db->set('ayah', $ayah);
    $this->db->set('ibu', $ibu);
    $this->db->set('alamat', $alamat);
    $this->db->set('pek_ayah', $pek_ayah);
    $this->db->set('pek_ibu', $pek_ibu);
    $this->db->set('no_hp', $no_hp);
    $this->db->where('id', $id);
    $this->db->update('ortu');

    $this->session->set_flashdata('success', 'Berhasil Mengubah Data.');
    redirect('user/myprofile');
   }


}
