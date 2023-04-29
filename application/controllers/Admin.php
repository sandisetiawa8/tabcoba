<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('email')) {
            redirect('auth');
        };
        if($this->session->userdata('role_id') != "1"){
            redirect("Level_User");
        }
        $this->load->helper('rupiah');
    }

    public function dashboard()
    {

            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['jumlah_user'] = $this->Model_admin->count_user();
            $data['setoran_hari'] = $this->Model_admin->getSetoranHari();
            $data['penarikan_hari'] = $this->Model_admin->getPenarikanHari();
            $data['jumlah_semua'] = $this->Model_admin->jumlah_saldo_semua();  
            
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbaradmin', $data);
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');

    }

    public function setoran(){
        $data['title'] = 'Data Setoran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hari'] = $this->Model_admin->getSetoranHari();
        // $data['bulan'] = $this->Model_admin->getSetoranBulan();
        $data['setoran'] = $this->Model_admin->jumlah_setoran_by_nis();
        $data['siswa'] = $this->Model_admin->getUserByKelas();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('admin/setoran', $data);
        $this->load->view('templates/footer');


    }

    public function tambahsetoran() {
        $this->form_validation->set_rules('nis', 'Nis', 'required|trim');
        $this->form_validation->set_rules('tgl', 'Tgl', 'required|trim');
        $this->form_validation->set_rules('setoran', 'Setoran', 'required|trim');
      
        $data = [
            'nis' => $this->input->post('nis', true),
            'tgl' => $this->input->post('tgl', true),
            'setoran' => $this->input->post('setoran', true),
            'jenis' => 'ST',
        ];

        $this->db->insert('keuangan', $data);

        $this->session->set_flashdata('success', 'Berhasil Menambah setoran');
        redirect('admin/setoran');
    }

    public function cetak_setoran($nis)
    {
        $data['title'] = 'Cetak Laporan setoran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['date1'] = $this->input->post('date1');
        $data['date2'] = $this->input->post('date2');
        $data['nama'] = $this->db->get_where('user', ['nis' => $nis])->result_array();

        $data['hari'] = $this->Model_admin->getSetoranHari();
        $data['bulan'] = $this->Model_admin->getSetoranBulan();
        $data['hasil'] = $this->db->get_where('keuangan', ['nis' => $nis, 'jenis' => 'ST'])->result_array();
        $data['total'] = $this->Model_admin->total_setoran_by_nis($nis);
        
       
        $this->load->view('admin/laporan_setoran', $data);
        
    }

    public function detailsetoran($nis)
    {
        $data['title'] = 'Detail Data Setoran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->get_where('user', ['nis' => $nis])->result_array();
        $data['hari'] = $this->Model_admin->getSetoranHari();
        $data['bulan'] = $this->Model_admin->getSetoranBulan();
        $data['hasil'] = $this->Model_admin->riwayatSetoran($nis);
        $data['total'] = $this->Model_admin->total_setoran_by_nis($nis);
        $data['siswa'] = $this->db->get_where('user', ['role_id' => 2, 'kelas' => 6, 'nis' => $nis])->row_array();
   

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('admin/detail_setoran', $data);
    }

    public function ubahsetoran($id) {
        $this->form_validation->set_rules('tgl', 'Tgl', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
    
        $data['title'] = 'Ubah Data Setoran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $id;
        $data['hasil'] = $this->db->get_where('keuangan', ['id' => $id])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('admin/ubah_setoran', $data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah_setoran() 
    {
        $id = $this->input->post('id');
        $tgl = $this->input->post('tgl', true);
        $jumlah = $this->input->post('jumlah', true);
        
        $this->db->set('tgl', $tgl);
        $this->db->set('setoran', $jumlah);
        $this->db->where('id', $id);
        $this->db->update('keuangan');

        $this->session->set_flashdata('success', 'Berhasil Mengubah Data Setoran');
        redirect('admin/setoran');
    }

    public function hapussetoran($kode)
    {
        $where = $kode;              
        $this->db->where('kode', $where);
        $this->db->delete('keuangan');

        $this->session->set_flashdata('success', 'Berhasil Menghapus Data setoran');
        redirect('admin/setoran');
    }

    public function penarikan()
    {
        $data['title'] = 'Data Penarikan';
        // $data['page'] = 'Penarikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hari'] = $this->Model_admin->getPenarikanHari();
        $data['bulan'] = $this->Model_admin->getPenarikanBulan();
        $data['penarikan'] = $this->Model_admin->jumlah_penarikan_by_nis();
        $data['siswa'] = $this->Model_admin->getUserByKelas();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('admin/penarikan', $data);
        $this->load->view('templates/footer');
    }

    public function tambahpenarikan() {
        $this->form_validation->set_rules('nis', 'Nis', 'required|trim');
        $this->form_validation->set_rules('tgl', 'Tgl', 'required|trim');
        $this->form_validation->set_rules('penarikan', 'Penarikan', 'required|trim');
      
         $data = [
             'nis' => $this->input->post('nis', true),
             'tgl' => $this->input->post('tgl', true),
             'penarikan' => $this->input->post('penarikan', true),
             'jenis' => 'TR',
         ];

        $this->db->insert('keuangan', $data);

        $this->session->set_flashdata('success', 'Berhasil Menambah Penarikan');
        redirect('admin/penarikan');
        //    }
    }

    public function cetak_penarikan($nis)
    {
        $data['title'] = 'Cetak Laporan Penarikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['date1'] = $this->input->post('date1');
        $data['date2'] = $this->input->post('date2');
        $data['nama'] = $this->db->get_where('user', ['nis' => $nis])->result_array();

        $data['hari'] = $this->Model_admin->getPenarikanHari();
        $data['bulan'] = $this->Model_admin->getPenarikanBulan();
        $data['hasil'] = $this->db->get_where('keuangan', ['nis' => $nis, 'jenis' => 'TR'])->result_array();
        $data['total'] = $this->Model_admin->total_penarikan_by_nis($nis);
        
       
        $this->load->view('admin/laporan_penarikan', $data);
        
    }

    public function detailpenarikan($nis)
    {
        $data['title'] = 'Detail Data Penarikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->get_where('user', ['nis' => $nis])->result_array();
        $data['hari'] = $this->Model_admin->getPenarikanHari();
        $data['bulan'] = $this->Model_admin->getPenarikanBulan();
        $data['hasil'] = $this->db->get_where('keuangan', ['nis' => $nis, 'jenis' => 'TR'])->result_array();
        $data['total'] = $this->Model_admin->total_penarikan_by_nis($nis);
        $data['siswa'] = $this->db->get_where('user', ['role_id' => 2, 'kelas' => 6, 'nis' => $nis])->result_array();
   

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('admin/detail_penarikan', $data);
    }

    public function ubahpenarikan($id) {
        $this->form_validation->set_rules('tgl', 'Tgl', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
       

        $data['title'] = 'Ubah Data Penarikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $id;
        $data['hasil'] = $this->db->get_where('keuangan', ['id' => $id])->result_array();
        // $data['isi'] = $this->db->get_where('keuangan', ['id' => $id])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('admin/ubah_penarikan', $data);
        $this->load->view('templates/footer');
    }

    public function proses_ubah_penarikan() 
    {
        $id = $this->input->post('id');
        $tgl = $this->input->post('tgl', true);
        $jumlah = $this->input->post('jumlah', true);
        
        $this->db->set('tgl', $tgl);
        $this->db->set('penarikan', $jumlah);
        $this->db->where('id', $id);
        $this->db->update('keuangan');

        $this->session->set_flashdata('success', 'Berhasil Mengubah Data Penarikan');
        redirect('admin/penarikan');
    }

    public function hapuspenarikan($kode)
    {
        $where = $kode;              
        $this->db->where('kode', $where);
        $this->db->delete('keuangan');

        $this->session->set_flashdata('success', 'Berhasil Menghapus Data Penarikan');
        redirect('admin/penarikan');
    }

    public function keuangan()
    {
        $data['title'] = 'Laporan Keuangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['setoran'] = $this->Model_admin->jumlah_setoran_by_nis();
        $data['penarikan'] = $this->Model_admin->jumlah_penarikan_by_nis();
        $data['saldo'] = $this->Model_admin->data_siswa_tabungan();
        $data['jumlah_semua'] = $this->Model_admin->jumlah_saldo_semua();    

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('admin/keuangan');
        // $this->load->view('templates/footer');
    }

    public function cetakLaporanKeuangan()
    {
        $data['title'] = 'Laporan Keuangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['setoran'] = $this->Model_admin->jumlah_setoran_by_nis();
        $data['penarikan'] = $this->Model_admin->jumlah_penarikan_by_nis();
        $data['saldo'] = $this->Model_admin->data_siswa_tabungan();
        $data['jumlah_semua'] = $this->Model_admin->jumlah_saldo_semua(); 

        $this->load->view('admin/laporan_keuangan', $data);
    }

    public function cetak_rek_koran($nis)
    {
        $data['title'] = 'Cetak Rekening Koran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->get_where('user', ['nis' => $nis])->result_array();
        $data['hasil'] = $this->db->get_where('keuangan', ['nis' => $nis])->result_array();
        $data['jumlah_semua'] = $this->Model_admin->total_saldo_by_nis($nis);
        
       
        $this->load->view('admin/rek_koran', $data);
    }

    public function daftaruser()
    {
        $data['title'] = 'Daftar User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->Model_admin->data_siswa_tabungan();
        $data['siswa'] = $this->Model_admin->getUserByKelas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('admin/daftaruser', $data);
        // $this->load->view('templates/footer', );
    }

    public function tambah_user() {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data User';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('admin/tambahuser', $data);
            $this->load->view('templates/footer');
        } else {                   
            $name = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $nis = $this->input->post('nis', true);
            $kelas = $this->input->post('kelas', true);
            $agama = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($name),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'date_created' => time(),
                'nis' => htmlspecialchars($nis),
                'kelas' => htmlspecialchars($kelas),
                'agama' => htmlspecialchars($agama),
                'jk' => $this->input->post('jk'),

            ];

                $this->db->insert('user', $data);
                $this->session->set_flashdata('success', 'User Baru Berhasil ditambahkan');
                redirect('admin/daftaruser');
           }
    }

    public function detailuser($nis)
    {
        $data['title'] = 'Detail Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->db->get_where('user',['nis' => $nis])->row_array();
        $data['ortu'] = $this->db->get_where('ortu',['nis' => $nis])->row_array();
        
   

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('admin/detail_user', $data);
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
                        redirect('user');
                    }else {
                        echo $this->upload->display_errors();
                    };
    
    }

    public function proses_ubah_profile()
    {
            $name = $this->input->post('nama', true);
            $nis = $this->input->post('nis', true);
            $tgl = $this->input->post('tgl_lahir', true);
            $tmp_lahir = $this->input->post('tmp_lahir', true);
            $jk = $this->input->post('jk', true);
            $alamat = $this->input->post('alamat', true);
            $kelas = $this->input->post('kelas', true);
            $agama = $this->input->post('agama', true);
            

            $this->db->set('nama', $name);
            $this->db->set('tgl_lahir', $tgl);
            $this->db->set('tmp_lahir', $tmp_lahir);
            $this->db->set('jk', $jk);
            $this->db->set('alamat', $alamat);
            $this->db->set('kelas', $kelas);
            $this->db->set('agama', $agama);
            $this->db->where('nis', $nis);
            $this->db->update('user');
            $this->session->set_flashdata('success', 'Berhasil update data user ');
            redirect('admin/detailuser/'. $nis);
           
    }

    public function proses_ubah_ortu()
   {
    $nis = $this->input->post('nis');
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
    redirect('admin/detailuser/'. $nis);
   }

   public function proses_tambah_ortu()
   {

    $nis = $this->input->post('nis');
    $ayah = $this->input->post('ayah');
    $ibu = $this->input->post('ibu');
    $alamat = $this->input->post('alamat');
    $pek_ayah = $this->input->post('pek_ayah');
    $pek_ibu = $this->input->post('pek_ibu');
    $no_hp = $this->input->post('no_hp');
   
    
    $data = [
        'nis' => htmlspecialchars($nis),
        'ayah' => htmlspecialchars($ayah),
        'ibu' => htmlspecialchars($ibu),
        'pek_ayah' => htmlspecialchars($pek_ayah),
        'pek_ibu' => htmlspecialchars($pek_ibu),
        'alamat' => htmlspecialchars($alamat),
        'no_hp' => htmlspecialchars($no_hp),
    ];

    $this->db->insert('ortu', $data);
    $this->session->set_flashdata('success', 'Berhasil Menambah Data.');
    redirect('admin/detailuser/'. $nis);
   }

    public function hapususer($id) {      
        $this->Model_admin->getUser('user');
        $this->db->delete('user', array('id' => $id));

        $this->session->set_flashdata('success', 'Berhasil Menghapus User');
        redirect('admin/daftaruser');
    }

    public function myprofile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('myprofile', $data);
        $this->load->view('templates/footer');
    }

    public function editprofile()
    {
            $data['title'] = 'Edit Profile';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
            $this->form_validation->set_rules('name', 'full name', 'required|trim');

            if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('admin/editprofile', $data);
            $this->load->view('templates/footer');
            } else {
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                

                    $config['upload_path']          = FCPATH.'/assets/img/profile/';
                    $config['allowed_types']        = 'jpg|png|jpeg';
                    $config['max_size']             = 100000;
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;
    

                    $this->load->library('upload', $config);
                    
                    if($this->upload->do_upload('image') == true) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                        $this->db->set('nama', $name);
                        $this->db->where('email', $email);
                        $this->db->update('user');

                        $this->session->set_flashdata('success', 'Profile berhasil di Ubah');
                        redirect('admin/myprofile');
                    } else if($this->upload->do_upload('image') == false){
                        $this->db->set('nama', $name);
                        $this->db->where('email', $email);
                        $this->db->update('user');
                        $this->session->set_flashdata('success', 'Profile Berhasil Diubah');
                        redirect('admin/myprofile');
                    }else {
                        echo $this->upload->display_errors();
                    };
            }
    }
    

   public function ubahpassword()
    {
        $data['title'] = 'Ubah Kata Sandi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email','password')])->row_array();

        $this->form_validation->set_rules('pass_lama', 'Password lama', 'required|trim');
        $this->form_validation->set_rules('pass_baru', 'Password baru', 'required|trim|min_length[3]|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Confirm New Password', 'required|trim|min_length[3]|matches[pass_baru]');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('admin/ubahpassword', $data);
            $this->load->view('templates/footer');
        } else  {
            $email = $this->input->post('email');
            $pass_lama = $this->input->post('pass_lama');
            $pass_baru = $this->input->post('pass_baru');
            if(!password_verify($pass_lama, $data['user']['password'])) {
                $this->session->set_flashdata('error', 'Password Yang anda masukan salah');
                redirect('admin/ubahpassword');
            } else {
                if($pass_lama == $pass_baru) {
                $this->session->set_flashdata('error', 'Password yang anda masukan sama seperti password sebelumnya');
                redirect('admin/ubahpassword');
                } else {
                    // jika password sudah bener
                    $password_hash = password_hash($pass_baru, PASSWORD_DEFAULT);

                    $data = array('password' => $password_hash);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->session->set_flashdata('success', 'Password berhasil di Update');
                    redirect('admin');
                }
            }
        }
    }

    

    public function viewFile($id)
    {
        $data['id'] = $id;    
        $data['title'] = 'View File';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->db->get_where('tb_proposal', ['id' => $id])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('admin/viewfile.html', $data);
        $this->load->view('templates/footer');
    }


    public function import()
    {
        $config['upload_path'] = './assets/file/dataexcel/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('importexcel')) {
            $file_data = $this->upload->data(); 
			$nama_file = $config['upload_path'].$file_data['file_name']; 
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($nama_file);
            $d = $spreadsheet->getActiveSheet()->toArray(); 
            unset($d[0]);
            $datas = array();
            foreach ($d as $t) {
                $datasiswa["nama"] = $t[0];
                $datasiswa["email"] = $t[1];
                $datasiswa["nis"] = $t[2];
                $datasiswa["image"] = $t[3];
                $datasiswa["password"] = $t[4];
                $datasiswa["role_id"] = $t[5];
                $datasiswa["date_created"] = $t[6];
                $datasiswa["tmp_lahir"] = $t[7];
                $datasiswa["tgl_lahir"] = $t[8];
                $datasiswa["jk"] = $t[9];
                $datasiswa["alamat"] = $t[10];
                $datasiswa["agama"] = $t[11];
                $datasiswa["kelas"] = $t[12];
                array_push($datas,$datasiswa);
            }
            
            $datas2 = array();
            foreach ($d as $t) {
                $datasiswa2['nis'] = $t[2];
                array_push($datas2,$datasiswa2);
            }

            $result = $this->Model_admin->import_data($datas);
            $result2 = $this->Model_admin->tambahkekeuangan($datas2);
            if($result || $result2){
                $this->session->set_flashdata('success', 'Data berhasil di Import');
                redirect('admin/daftaruser');
            }else{
                echo "Data gagal diimport.";
            }
        }
    }

}