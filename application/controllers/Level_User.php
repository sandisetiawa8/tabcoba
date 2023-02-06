<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level_User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('email')) {
            redirect('auth');
        };
    }

    public function index()
    {
        if($this->session->userdata('role_id') == "1"){
            redirect('admin');            
        }elseif($this->session->userdata('role_id') == 2){
            redirect('user');
        }elseif($this->session->userdata('role_id') == 3){
            redirect('verifikator');
        }
    }



}
