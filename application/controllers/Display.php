<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Display extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          // check_login();
     }

     public function display()
     {
          $data['title'] = 'Display Queue';

          $this->load->view('templates/display/display_header', $data);
          $this->load->view('display/display', $data);
          $this->load->view('templates/display/display_footer');
     }

     public function print_ticket()
     {
          $data['title'] = 'Print Ticket';

          $this->load->view('templates/display/display_header', $data);
          $this->load->view('display/print_ticket', $data);
          $this->load->view('templates/display/display_footer');
     }

     public function counter()
     {
          $data['title'] = 'Print Ticket';

          $this->load->view('templates/display/display_header', $data);
          $this->load->view('display/counter', $data);
          $this->load->view('templates/display/display_footer');
     }
}
