<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          check_login();
     }
     public function index()
     {
          $data['title'] = 'Profil Saya';
          $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

          $this->load->view('templates/dashboard/dashboard_header', $data);
          $this->load->view('templates/dashboard/sidebar', $data);
          $this->load->view('templates/dashboard/topbar', $data);
          $this->load->view('users/index', $data);
          $this->load->view('templates/dashboard/dashboard_footer');
     }
}
