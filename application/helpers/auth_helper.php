<?php
function check_login()
{
     $auth = get_instance();
     if (!$auth->session->userdata('email')) {
          $auth->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ups! untuk mengakses sistem harus login dulu ya...</div>');
          redirect('auth');
     } else {
          $role = $auth->session->userdata('role');
          $url = $auth->uri->segment(1);

          if ($role == "user" && $url == 'super_user') {
               redirect('auth/blocked');
          } else if ($role == "user" && $url == 'admin') {
               redirect('auth/blocked');
          } else if ($role == "admin" && $url == 'super_user') {
               redirect('auth/blocked');
          }
     }
}
