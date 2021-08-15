<?php 

class Admin extends CI_Controller{
    public function index()
    {
        $data = array(
            'title' => 'Admin',
            'isi' => 'admin',
        );
        $this->load->view('admin/wrapper_admin', $data, FALSE);
        
    }    

}