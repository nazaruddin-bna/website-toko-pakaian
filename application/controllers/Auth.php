<?php 

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function login()
    {     
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',[
            'required' => 'Email Harus di Isi',
            'valid_email' => 'Email Tidak Terdaftar'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Harus di Isi'
        ]);
        if ($this->form_validation->run () == false){

            $data['title'] = 'Login';    
            $this->load->view('users/login/header_login', $data);
            $this->load->view('users/login/login');
            $this->load->view('users/login/footer_login');
        } else{
            $this->_login1();
           
        }           
    }   
    
    private function _login1()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $tbl_register = $this->db->get_where('tbl_register', ['email' => $email])->row_array();
        
        //user ada
        if($tbl_register) {

            // jika user aktif
            if($tbl_register['status_aktif'] == 1) {
                // cek password

                if(password_verify($password, $tbl_register['password'])) {
                    // benar
                    $data = [
                        'email' => $tbl_register['email'],
                        'level' => $tbl_register['level']
                    ];

                    $this->session->set_userdata($data);
                    redirect('user/member');

                } else {
                    // gagal
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger"
                    role="alert">Email / Password Salah!</div>');
                    redirect('auth/login');
                }

            } else {
                // user tidak ada
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger"
                role="alert">Email Belum di Aktifasi!</div>');
                redirect('auth/login');
            }

        } else {
            // user tidak ada
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger"
            role="alert">Anda Belum Mendafatar!</div>');
            redirect('auth/login');
        }
    }

    public function register()
    {   

        $this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required|trim',[
            'required' => 'Nama Harus di Isi'
        ]);
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[tbl_register.email]',[
            'is_unique' => 'Email Sudah terdaftar',
            'required' => 'Email harus di isi',
            'valid_email' => 'Email tidak valid'
        ]);
        
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[6]|matches[password2]',[
            'matches' => 'Password tidak Valid',
            'min_length' => 'Password minimal 6 karakter',
            'required' => 'Password harus di isi'
        ]);

        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]'
        );
            

        if ($this->form_validation->run() == false){

            $data ['title'] = 'Register';
            $this->load->view('users/login/header_login', $data);
            $this->load->view('users/login/register');
            $this->load->view('users/login/footer_login');
        }else {
          
            $data = [
                'nama'  => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'email'  => htmlspecialchars($this->input->post('email', true)),
                'images'  => 'default.jpg',
                'password'  => password_hash($this->input->post('password1'),
                PASSWORD_DEFAULT),
                'level' => 2,
                'status_aktif' => 1,
                'tgl_daftar' => time()
               ];
    
               $this->db->insert('tbl_register', $data);
               $this->session->set_flashdata('pesan', '<div class="alert alert-success"
               role="alert">Registrasi Berhasil!</div>');
               redirect('auth/login');  
               
            }
            
            
        }
        
        public function logout()
        {
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('level');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success"
               role="alert">Anda Telah Keluar!</div>');
            redirect('auth/login_user');  
            
         
    }

}