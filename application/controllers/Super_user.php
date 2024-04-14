<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super_user extends CI_Controller
{
     public function index()
     {
          //mengatasi error sesi habis
          if ($this->session->userdata('email') == null) {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, Sesi anda sudah habis, silahkan login kembali!</div>');
               redirect('auth');
          }

          $data['title'] = 'Dashboard';
          $data['dashboard'] = 'active';
          $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

          $this->load->view('templates/dashboard/dashboard_header', $data);
          $this->load->view('templates/dashboard/sidebar', $data);
          $this->load->view('templates/dashboard/topbar', $data);
          $this->load->view('super_user/index', $data);
          $this->load->view('templates/dashboard/dashboard_footer');
     }

     public function manajemen_user()
     {
          $data['title'] = 'Manajemen User';
          $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
          $data['list_user'] = $this->db->get('user')->result_array();

          $this->load->view('templates/dashboard/dashboard_header', $data);
          $this->load->view('templates/dashboard/sidebar', $data);
          $this->load->view('templates/dashboard/topbar', $data);
          $this->load->view('super_user/manajemen_user', $data);
          $this->load->view('templates/dashboard/dashboard_footer');
     }

     public function tambah_user()
     {
          $this->form_validation->set_rules('name', 'Name', 'required|trim', [
               'required' => 'Sorry, Nama harus terisi!',
               'valid_email' => 'Nama harus Terisi ya!',
          ]);
          $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
               'required' => 'Maaf, Email harus terisi!',
               'valid_email' => 'Email harus belum benar! Gunakan email yang valid',
               'is_unique' => 'Ups, Email ini telah terdaftar di sistem!'
          ]);
          $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
               'required' => 'Upss, Password harus terisi!',
               'min_length' => "Password minimal 3 karakter!"
          ]);

          if ($this->form_validation->run() == false) {
               // redirect('super_user/manajemen_user');
               $data['title'] = 'Manajemen User';
               $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
               $data['list_user'] = $this->db->get('user')->result_array();

               $this->load->view('templates/dashboard/dashboard_header', $data);
               $this->load->view('templates/dashboard/sidebar', $data);
               $this->load->view('templates/dashboard/topbar', $data);
               $this->load->view('super_user/manajemen_user', $data);
               $this->load->view('templates/dashboard/dashboard_footer');
          } else {
               $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role' => $this->input->post('role', true),
                    'is_active' => $this->input->post('is_active', true),
                    'date_create' => time(),
               ];

               $this->db->insert('user', $data);
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Yay Selamat! Akun berhasil didaftarkan</div>');
               redirect('super_user/manajemen_user');
          }
     }

     public function delete_user()
     {
     }
}
