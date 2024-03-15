<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->library('form_validation');
     }

     public function index()
     {
          $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
               'required' => 'Maaf, Email harus terisi!',
               'valid_email' => 'Email harus belum benar! Gunakan email yang valid'
          ]);
          $this->form_validation->set_rules('password', 'Password', 'required|trim', [
               'required' => 'Password harus terisi!',
          ]);

          if ($this->form_validation->run() == false) {
               $data['title'] = "Halaman Login";
               $this->load->view('templates/auth/auth_header', $data);
               $this->load->view('auth/login');
               $this->load->view('templates/auth/auth_footer');
          } else {
               $this->_login();
          }
     }

     private function _login()
     {
          $email = $this->input->post('email');
          $password = $this->input->post('password');

          $user = $this->db->get_where('user', ['email' => $email])->row_array();
          if ($user) {
               if ($user['is_active'] == 1) {
                    if (password_verify($password, $user['password'])) {
                         $data = [
                              'email' => $user['email'],
                              'role' => $user['role'],
                         ];
                         $this->session->set_userdata($data);
                         if ($user['role'] == 'super_user') {
                              redirect('super_user');
                         } else if ($user['role'] == 'admin') {
                              redirect('admin');
                         } else {
                              redirect('users');
                         }
                    } else {
                         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, Password anda salah!</div>');
                         redirect('auth');
                    }
               } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, Akun anda tidak aktif!, harap konfirmasi admin dulu ya!</div>');
                    redirect('auth');
               }
          } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, Email tersebut belum terdaftar, daftar dulu ya!</div>');
               redirect('auth');
          }
     }

     public function registration()
     {
          $this->form_validation->set_rules('full_name', 'Name', 'required|trim', [
               'required' => 'Nama harus diisi!'
          ]);
          $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
               'required' => 'Email harus diisi!',
               'valid_email' => 'Email belum valid!',
               'is_unique' => 'Email sudah terdaftar! Coba dengan email lain'
          ]);
          $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[repeat_password]', [
               'matches' => "Password harus sama!",
               'min_length' => "Password minimal 3 karakter!",
               'required' => "Password harus diisi!",
          ]);
          $this->form_validation->set_rules('repeat_password', 'Password 2', 'required|trim|matches[password]', [
               'required' => "Password harus diisi!",
               'matches' => "Password harus sama!"
          ]);

          if ($this->form_validation->run() == false) {
               $data['title'] = "Halaman Buat Akun";
               $this->load->view('templates/auth/auth_header', $data);
               $this->load->view('auth/registration');
               $this->load->view('templates/auth/auth_footer');
          } else {
               $data = [
                    'name' => htmlspecialchars($this->input->post('full_name', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role' => 'user',
                    'date_create' => time(),
               ];

               $this->db->insert('user', $data);
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Yay Selamat! Akunmu sudah terdaftar, coba login sekarang</div>');
               redirect('auth');
          }
     }

     public function logout()
     {
          $this->session->unset_userdata('email');
          $this->session->unset_userdata('role');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout!</div>');
          redirect('auth');
     }
}
