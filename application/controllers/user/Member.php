<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function profil()
    {
        $data['title'] = 'Profil Saya';
        $data['tbl_register'] = $this->db->get_where('tbl_register', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('users/templates_member/header', $data);
        $this->load->view('users/templates_member/sidebar');
        $this->load->view('users/member', $data);  
        $this->load->view('users/templates_member/footer');
    }

    public function index() 
    {
        $data['title'] = 'Menu Home';
        $data['tbl_register'] = $this->db->get_where('tbl_register', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('users/templates_member/header', $data);
        $this->load->view('users/templates_member/sidebar');
        $this->load->view('users/templates_member/halaman_utama', $data);
        $this->load->view('users/templates_member/footer');
    }
}