<?php 

class Kategori extends CI_Controller{
    public function kemeja()
    {
        $data = array(
            'title' => 'Kategori',
            'isi' => 'home',
        );
        $this->load->view('kategori/kemeja.php', $data, FALSE);
        
    }    

}