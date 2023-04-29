<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        if($this->session->userdata('email')) {
            redirect('user');
        };

        // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header');
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $data['title'] = 'User Login';
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $nis = $this->db->get_where('user', ['nis' => $email])->row_array();

        //usernya ada
        if ($user || $nis) {
                //cek passwordnya
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'nis' => $user['nis'],
                        'kelas' => $user['kelas'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        $this->session->set_flashdata('success', 'Berhasil Login');
                        redirect('admin');
                    } else if ($user['role_id'] == 2) {
                        $this->session->set_flashdata('success', 'Berhasil Login');
                        redirect('user');
                    } else {
                        $this->session->set_flashdata('success', 'Berhasil Login');
                        redirect('verifikator');
                    } 
                } else {
                    $this->session->set_flashdata('error', 'Password yang anda masukan salah!');
                    redirect('auth');
                }
           
           
        } else {
            $this->session->set_flashdata('error', 'Email belum terdaftar!');
            redirect('auth');
        }
    }

    public function registration()
    {

        if($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', 
            [
            'is_unique' => 'Email Sudah Terdaftar.'
            ]);
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|is_unique[user.nis]', [
            'is_unique' => 'NIS Sudah Terdaftar.'
            ]);
        $this->form_validation->set_rules(
            'password','Password','required|trim|min_length[3]',
            [
                'min_length' => 'Password Terlalu Pendek.'
            ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            // $this->load->view('templates/auth_footer');
        } else {
            $name = $this->input->post('name', true);
            $email = $this->input->post('email', true);
            $nis = $this->input->post('nis', true);
            $kelas = $this->input->post('kelas', true);
            $agama = $this->input->post('agama', true);
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
            ];
            $data2 = [
                'nis' => htmlspecialchars($nis)
            ];

            // siapkan token
            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created' => time()
            // ];

            $this->db->insert('user', $data);
            $this->db->insert('keuangan', $data2);
            // $this->db->insert('user_token', $user_token);

            // $this->sendEmail($token, 'verify');

            $this->session->set_flashdata('success', 'Selamat akun anda berhasil dibuat, silahkan login.');
            redirect('auth');
        }
    }


    public function sendEmail($token, $type)
    {
        if(isset($_POST['submit_email'])) {
            $email = $this->input->post('email');
            
            if(!empty($email)) {
                $config = [
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'protocol'  => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_user' => 'sikam.app@gmail.com',
                    'smtp_pass' => 'mjemdkfppbfhngrg',
                    'smtp_port' => 465,
                ];

                $this->load->library('email', $config);
                $this->email->initialize($config);

                $this->email->set_newline("\r\n");
                $this->email->from('kkp.app@gmail.com', 'KKP-App');
                $this->email->to($email);

                if($type == 'verify') {
                    $this->email->subject('Aktivasi Akun');
                    $this->email->message('Klik link berikut untuk memverifikasi akun anda : <a href="' . base_url(). 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
                } else if ($type == 'forget') {
                    $this->email->subject('Reset Password');
                    $this->email->message('Klik link berikut untuk reset password akun anda : <a href="' . base_url(). 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
                }


                if($this->email->send($type == 'verify')) {
                    $this->session->set_flashdata('message','Email berhasil dikirim, silahkan cek Email anda untuk aktivasi akun.');
                } else if ($this->email->send($type == 'forget')) {
                    $this->session->set_flashdata('message','Email berhasil dikirim, silahkan cek Email anda untuk mengubah password.');
                }else {
                    show_error($this->email->print_debugger());
                    die;
                }
            }
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email] ) -> row_array();

        if($user) {
            // cek token di tb_user_token
            $user_token = $this->db->get_where('user_token', ['token' => $token])->result_array();
            if($user_token) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', $email.' berhasil diaktivasi, silahkan login');
                    redirect('auth');
            }else {
                $this->db->delete('user', ['email' => $email]);
                $this->db->delete('user_token', ['email' => $email]);
                $this->session->set_flashdata('error', 'Aktivasi akun gagal! Token Invalid.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Aktivasi akun gagal! Email salah.');
            redirect('auth');
        }


    }

    public function forgetPassword() 
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if($this->form_validation->run() == false) {
            $data['title'] = 'Forget Password';
            $this->load->view('templates/auth_header');
            $this->load->view('auth/forget-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                
                $this->db->insert('user_token', $user_token);

                $this->sendEmail($token, 'forget');
    
                $this->session->set_flashdata('message', 'Silahkan cek email untuk melanjutkan reset password.');
                redirect('auth/forgetpassword');

            }else {
                $this->session->set_flashdata('error', 'Email belum terdaftar atau belum diaktivasi.');
                redirect('auth/forgetpassword');
            }

        }
    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' =>$email])->row_array();

        if($user) {
            $user_token = $this->db->get_where('user_token', ['token' =>$token])->row_array();
            if($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->ubahPassword();
            } else {
                $this->session->set_flashdata('error', 'Gagal Mereset password, Token salah');
            redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Gagal Mereset password, Email salah');
            redirect('auth');
        }
    }


    public function ubahPassword()
    {
        if(!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[3]|matches[password1]');

        if($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header');
            $this->load->view('auth/ubah-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('success', 'Password Berhasil diubah! Silahkan Login');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Anda Berhasil logged out!');
        redirect('auth');
    }


    public function bloked()
    {
        echo 'access bloked';
    }
}