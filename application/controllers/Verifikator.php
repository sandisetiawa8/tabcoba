<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('email')) {
            redirect('auth');
        };  
        if($this->session->userdata('role_id') != "3"){
            redirect("Level_User");
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jumlah_user'] = $this->db->count_all('user');
        $data['jumlah_proposal'] = $this->db->count_all('tb_proposal');
        $data['menunggu'] = $this->db->get_where('tb_proposal', array('status' => 'Menunggu'))->num_rows();
        $data['review'] = $this->db->get_where('tb_proposal', array('status' => 'Sedang diverifikasi'))->num_rows();
        $data['verif'] = $this->db->get_where('tb_proposal', array('verifikator' => $this->session->userdata('email'), 'status' => 'Disetujui'))->num_rows();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarverifikator', $data);
        $this->load->view('templates/topbarverifikator', $data);
        $this->load->view('verifikator/index', $data);
        $this->load->view('templates/footer');
    }

    public function daftarproposal()
    {
        $data['title'] = 'Daftar Proposal Kerjasama';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->db->get_where('tb_proposal', array('status' => 'Sedang diverifikasi'))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarverifikator', $data);
        $this->load->view('templates/topbarverifikator', $data);
        $this->load->view('verifikator/daftarproposal', $data);
        // $this->load->view('templates/footer');
    }
    

    public function daftaruser()
    {
        $data['title'] = 'Daftar User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->Model_verifikator->getUser('user');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarverifikator', $data);
        $this->load->view('templates/topbarverifikator', $data);
        $this->load->view('daftaruser', $data);
        // $this->load->view('templates/footer', );
    }


    public function myprofile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarverifikator', $data);
        $this->load->view('templates/topbarverifikator', $data);
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
            $this->load->view('templates/sidebarverifikator', $data);
            $this->load->view('templates/topbarverifikator', $data);
            $this->load->view('verifikator/editprofile', $data);
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
                        redirect('verifikator/myprofile');
                    } else if($this->upload->do_upload('image') == false){
                        $this->db->set('nama', $name);
                        $this->db->where('email', $email);
                        $this->db->update('user');
                        $this->session->set_flashdata('success', 'Profile Berhasil Diubah');
                        redirect('verifikator/myprofile');
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
            $this->load->view('templates/sidebarverifikator', $data);
            $this->load->view('templates/topbarverifikator', $data);
            $this->load->view('verifikator/ubahpassword', $data);
            $this->load->view('templates/footer');
        } else  {
            $email = $this->input->post('email');
            $pass_lama = $this->input->post('pass_lama');
            $pass_baru = $this->input->post('pass_baru');
            if(!password_verify($pass_lama, $data['user']['password'])) {
                $this->session->set_flashdata('error', 'Password Yang anda masukan salah');
                redirect('verifikator/ubahpassword');
            } else {
                if($pass_lama == $pass_baru) {
                $this->session->set_flashdata('error', 'Password yang anda masukan sama seperti password sebelumnya');
                redirect('verifikator/ubahpassword');
                } else {
                    // jika password sudah bener
                    $password_hash = password_hash($pass_baru, PASSWORD_DEFAULT);

                    $data = array('password' => $password_hash);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->session->set_flashdata('success', 'Password berhasil di Update');
                    redirect('verifikator');
                }
            }
        }
    }

    public function menunggu()
    {
        $data['title'] = 'Menunggu Persetujuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->db->get_where('tb_proposal', array('status' => 'menunggu'))->result_array();
        // $data['hasil'] = $this->Model_verifikator->getProposal('tb_proposal');
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarverifikator', $data);
        $this->load->view('templates/topbarverifikator', $data);
        $this->load->view('verifikator/daftarproposal', $data);
    }

    public function sayaSetujui()
    {
        $data['title'] = 'Proposal Yang Saya Setujui';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->db->get_where('tb_proposal', array('verifikator' => $this->session->userdata('email'), 'status' => 'Disetujui'))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarverifikator', $data);
        $this->load->view('templates/topbarverifikator', $data);
        $this->load->view('verifikator/sayasetujui', $data);
    }

    public function sayaReview()
    {
        $data['title'] = 'Proposal Yang Saya Setujui';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->db->get_where('tb_proposal', array('verifikator' => $this->session->userdata('email'), 'status' => 'Sedang diverifikasi'))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarverifikator', $data);
        $this->load->view('templates/topbarverifikator', $data);
        $this->load->view('verifikator/sayaReview', $data);
    }


    

    public function setujui($id)
    {
        $where = $id;       
        $verifikator = $this->session->userdata('email');
        $status = 'Disetujui';
        $tgl = time();
        
        $this->db->set('status', $status);
        $this->db->set('verifikator', $verifikator);
        $this->db->set('tgl_diverifikasi', $tgl);
        $this->db->where('id', $where);
        $this->db->update('tb_proposal');

        $this->session->set_flashdata('success', 'Berhasil Menyetujui Proposal Kerjasama');
        redirect('verifikator/daftarproposal');
    }
    
    
    public function tolak($id)
    {
       $where = $id;
        $verifikator = $this->session->userdata('email');
        $status = 'Ditolak';
        $tgl = time();
        
        $this->db->set('status', $status);
        $this->db->set('verifikator', $verifikator);
        $this->db->set('tgl_diverifikasi', $tgl);
        $this->db->where('id', $id);
        $this->db->update('tb_proposal');

        $this->session->set_flashdata('success', 'Berhasil Menolak Proposal Kerjasama');
        redirect('verifikator/daftarproposal');
    }
}
