<?php
defined('BASEPATH') or exit('No direct script access allowed');

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


        // if($this->session->userdata('role_id === 1')) {
        //     redirect('admin');
        // } else if('role_id == 2') {
        //     redirect('user');
        // } else {
        //     redirect('verifikator');
        // };
    }

    public function index()
    {

            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email',)])->row_array();
            $data['jumlah_user'] = $this->db->count_all('user');
            $data['jumlah_proposal'] = $this->db->count_all('tb_proposal');
            $data['menunggu'] = $this->db->get_where('tb_proposal', array('status' => 'Menunggu'))->num_rows();
            $data['ditolak'] = $this->db->get_where('tb_proposal', array('status' => 'Ditolak'))->num_rows();
            $data['verif'] = $this->db->get_where('tb_proposal', array('verifikator' => $this->session->userdata('email')))->num_rows();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('templates/topbaradmin', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');

    }

    public function daftarproposal()
    {
        $data['title'] = 'Daftar Proposal Kerjasama';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email',)])->row_array();
        $data['hasil'] = $this->Model_admin->getProposal('tb_proposal');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('admin/daftarproposal', $data);
        // $this->load->view('templates/footer');
    }

    public function updateproposal()
    {
        $data['title'] = 'Update Proposal Kerjasama';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email',)])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('admin/updateproposal', $data);
        $this->load->view('templates/footer');
    }
    

    public function daftaruser()
    {
        $data['title'] = 'Daftar User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->Model_admin->getUser('user');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('daftaruser', $data);
        // $this->load->view('templates/footer', );
    }

    public function myprofile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email',)])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('myprofile', $data);
        $this->load->view('templates/footer');
    }

    public function editprofile()
    {
            $data['title'] = 'Edit Profile';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email',)])->row_array();
        
            $this->form_validation->set_rules('name', 'full name', 'required|trim');

            if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('templates/topbaradmin', $data);
            $this->load->view('editprofile', $data);
            $this->load->view('templates/footer');
            } else {
                $name = $this->input->post('name');
                $email = $this->input->post('email');

                // Jika ada gambar yang di upload
                // $upload_image = $_FILES['image']['name'];
                // if ($upload_image) {
                    $config['upload_path']          = FCPATH.'/assets/img/profile/';
                    $config['allowed_types']        = 'jpg|png';
                    $config['max_size']             = 100000;
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;
    

                    $this->load->library('upload', $config);
                    

                    if($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                        $this->db->set('nama', $name);
                        $this->db->where('email', $email);
                        $this->db->update('user');

                        $this->session->set_flashdata('success', 'Profile berhasil di Update');
                        redirect('admin');
                    }else{
                        echo $this->upload->display_errors();
                    }                
            }
    }
    

    public function ubahpassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email','password')])->row_array();

        $this->form_validation->set_rules('pass_lama', 'Password lama', 'required|trim');
        $this->form_validation->set_rules('pass_baru', 'Password baru', 'required|trim|min_length[3]|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Confirm New Password', 'required|trim|min_length[3]|matches[pass_baru]');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('templates/topbaradmin', $data);
            $this->load->view('ubahpassword', $data);
            $this->load->view('templates/footer');
        } else  {
            
            $email = $this->input->post('email');
            $pass_lama = $this->input->post('pass_lama');
            $pass_baru = $this->input->post('pass_baru');
            if(!password_verify($pass_lama, $data['user']['password'])) {
                $this->session->set_flashdata('error', 'Password yang anda masukan salah');
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

    public function menunggu()
    {
        $data['title'] = 'Menunggu Persetujuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email',)])->row_array();
        $data['hasil'] = $this->db->get_where('tb_proposal', array('status' => 'Menunggu'))->result_array();
        // $data['hasil'] = $this->Model_verifikator->getProposal('tb_proposal');
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('admin/menunggu', $data);
    }

    public function ditolak()
    {
        $data['title'] = 'Proposal Ditolak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email',)])->row_array();
        $data['hasil'] = $this->db->get_where('tb_proposal', array('status' => 'Ditolak'))->result_array();
        // $data['hasil'] = $this->Model_verifikator->getProposal('tb_proposal');
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('admin/ditolak', $data);
    }


}
