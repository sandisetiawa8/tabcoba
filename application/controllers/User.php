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
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email',)])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/topbaruser', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function formkerjasama()
    {
        $this->form_validation->set_rules('namamedia', 'Namamedia', 'required|trim');
        $this->form_validation->set_rules('kabiro', 'Kabiro', 'required|trim');
        $this->form_validation->set_rules('pimred', 'Pimred', 'required|trim');
        $this->form_validation->set_rules('namaperusahaan', 'Namaperusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required|trim');
        $this->form_validation->set_rules('rekening', 'Rekening', 'required|trim');
        $this->form_validation->set_rules('siup', 'Siup', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        // $this->form_validation->set_rules('file', 'File', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Pengajuan Kerjasama';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email',)])->row_array();
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaruser', $data);
            $this->load->view('templates/topbaruser', $data);
            $this->load->view('user/formKerjasama', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = FCPATH.'/assets/file/softcopy/';
            $config['allowed_types']        = 'doc|docx|pdf';
            $config['max_size']             = 100000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if($this->upload->do_upload('file')) {
                $new_file = $this->upload->data('file_name');
                $rek = $this->input->post('bank');
                $no = $this->input->post('rekening');
                $gabung = $rek. ": ". $no;
                $data = [
                    'email' => $this->input->post('email', true),
                    'nama_media' => htmlspecialchars($this->input->post('namamedia', true)),
                    'kabiro' => $this->input->post('kabiro', true),
                    'pimred' => $this->input->post('pimred', true),
                    'nama_perusahaan' => $this->input->post('namaperusahaan', true),
                    'alamat' => $this->input->post('alamat', true),
                    'npwp' => $this->input->post('npwp', true),
                    'no_rek' => $gabung,
                    'no_siup' => $this->input->post('siup', true),
                    'keterangan' => $this->input->post('keterangan', true),
                    'file' => $new_file,
                    'tgl_pengajuan' => time(),
                    'status' => 'Menunggu'
                ];

                $this->db->insert('tb_proposal', $data);

                $this->session->set_flashdata('success', 'Proposal Berhasil diajukan');
                redirect('user/formkerjasama');
            }else{
                echo $this->upload->display_errors();
            }

            
            
        }
    
    }

    public function editprofile()
    {
            $data['title'] = 'Edit Profile';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email',)])->row_array();
        
            $this->form_validation->set_rules('name', 'full name', 'required|trim');

            if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaruser', $data);
            $this->load->view('templates/topbaruser', $data);
            $this->load->view('editprofile', $data);
            $this->load->view('templates/footer');
            } else {
                $name = $this->input->post('name');
                $email = $this->input->post('email');

                // Jika ada gambar yang di upload
                // $upload_image = $_FILES['image']['name'];
                // if ($upload_image) {
                    $config['upload_path']          = FCPATH.'/assets/img/profile/';
                    $config['allowed_types']        = 'jpg|jpeg|png';
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
                        redirect('user');
                    }else{
                        echo $this->upload->display_errors();
                    }
                // }

                
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
            $this->load->view('templates/sidebaruser', $data);
            $this->load->view('templates/topbaruser', $data);
            $this->load->view('ubahpassword', $data);
            $this->load->view('templates/footer');
        } else  {
            
            $email = $this->input->post('email');
            $pass_lama = $this->input->post('pass_lama');
            $pass_baru = $this->input->post('pass_baru');
            if(!password_verify($pass_lama, $data['user']['password'])) {
                $this->session->set_flashdata('error', 'Password Yang anda masukan salah');
                redirect('user/ubahpassword');
            } else {
                if($pass_lama == $pass_baru) {
                $this->session->set_flashdata('error', 'Password yang anda masukan sama seperti password sebelumnya');
                redirect('user/ubahpassword');
                } else {
                    // jika password sudah bener
                    $password_hash = password_hash($pass_baru, PASSWORD_DEFAULT);

                    $data = array('password' => $password_hash);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->session->set_flashdata('success', 'Password berhasil di Update');
                    redirect('user');
                }
            }
        }
    }


    public function proposalsaya() 
    {
        $data['title'] = 'Proposal Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] =  $this->db->get_where('tb_proposal', ['email' => $this->session->userdata('email')])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/topbaruser', $data);
        $this->load->view('user/proposalsaya', $data);
        // $this->load->view('templates/footer'); 
    }


}
