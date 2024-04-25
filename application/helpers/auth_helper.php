<?php
function check_login()
{
     $auth = get_instance();
     if (!$auth->session->userdata('email')) {
          redirect('auth');
     } else {
          $role = $auth->session->userdata('role');
          $menu = $auth->uri->segment(1);

          if ($role = 'super_user') {
               redirect('user');
          }
     }
}
