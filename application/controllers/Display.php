<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Display extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          // check_login();
     }

     public function index()
     {
          $data['title'] = 'Display Queue';
          // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

          $this->load->view('templates/display/display_header', $data);
          $this->load->view('display/index', $data);
          $this->load->view('templates/display/display_footer');
     }
}
