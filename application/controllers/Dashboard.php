<?php 

class Dashboard extends CI_Controller{
    public function index()
    {
        $data['tbl_register'] = $this->db->get_where('tbl_register', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('users/templates/header');
        $this->load->view('users/templates/sidebar', $data);
        $this->load->view('users/dashboard');
        $this->load->view('users/templates/footer');
        
        
    }    

}