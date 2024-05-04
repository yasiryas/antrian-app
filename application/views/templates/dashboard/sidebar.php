         <!-- Sidebar -->
         <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

              <!-- Sidebar - Brand -->
              <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url($user['role']); ?>">
                   <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-signature"></i>
                   </div>
                   <div class="sidebar-brand-text mx-3">Dash CI <sup>3</sup></div>
              </a>

              <!-- Divider -->
              <hr class="sidebar-divider my-0">

              <!-- Nav Item - Dashboard -->
              <li class="nav-item <?= $title == "Dashboard" ? "active" : ""; ?>">
                   <a class="nav-link" href="<?= base_url($user['role']) ?>/index">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
              </li>
              <?php if ($user['role'] == 'super_user') { ?>
                   <!-- Nav Item - Manajemen User -->
                   <li class="nav-item <?= $title == "Manajemen User" ? "active" : ""; ?>">
                        <a class="nav-link" href="<?= base_url($user['role']); ?>/manajemen_user">
                             <i class="fas fa-fw fa-users-cog"></i>
                             <span>Manajemen User</span></a>
                   </li>

                   <!-- Nav Item - Manajemen Data Collapse Menu -->
                   <li class="nav-item <?= $title == "Manajemen Data" ? "active" : ""; ?>">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                             <i class="fas fa-fw fa-wrench"></i>
                             <span>Manajemen Data</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                             <div class="bg-white py-2 collapse-inner rounded">
                                  <h6 class="collapse-header">Custom Utilities:</h6>
                                  <a class="collapse-item" href="utilities-color.html">Colors</a>
                                  <a class="collapse-item" href="utilities-border.html">Borders</a>
                                  <a class="collapse-item" href="utilities-animation.html">Animations</a>
                                  <a class="collapse-item" href="utilities-other.html">Other</a>
                             </div>
                        </div>
                   </li>

                   <!-- Nav Item - Hasil Collapse Menu -->
                   <li class="nav-item active">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                             <i class="fas fa-fw fa-folder"></i>
                             <span>Hasil</span>
                        </a>
                        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                             <div class="bg-white py-2 collapse-inner rounded">
                                  <h6 class="collapse-header">Login Screens:</h6>
                                  <a class="collapse-item" href="login.html">Login</a>
                                  <a class="collapse-item" href="register.html">Register</a>
                                  <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                                  <div class="collapse-divider"></div>
                                  <h6 class="collapse-header">Other Pages:</h6>
                                  <a class="collapse-item" href="404.html">404 Page</a>
                                  <a class="collapse-item active" href="blank.html">Blank Page</a>
                             </div>
                        </div>
                   </li>

                   <!-- Nav Item - Kategori -->
                   <li class="nav-item">
                        <a class="nav-link" href="charts.html">
                             <i class="fas fa-fw fa-chart-area"></i>
                             <span>Kategori</span></a>
                   </li>

              <?php } else if ($user['role'] == 'admin') { ?>
                   <!-- Nav Item - Manajemen Data Collapse Menu -->
                   <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                             <i class="fas fa-fw fa-wrench"></i>
                             <span>Manajemen Data</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                             <div class="bg-white py-2 collapse-inner rounded">
                                  <h6 class="collapse-header">Custom Utilities:</h6>
                                  <a class="collapse-item" href="utilities-color.html">Colors</a>
                                  <a class="collapse-item" href="utilities-border.html">Borders</a>
                                  <a class="collapse-item" href="utilities-animation.html">Animations</a>
                                  <a class="collapse-item" href="utilities-other.html">Other</a>
                             </div>
                        </div>
                   </li>

                   <!-- Nav Item - Hasil Collapse Menu -->
                   <li class="nav-item active">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                             <i class="fas fa-fw fa-folder"></i>
                             <span>Hasil</span>
                        </a>
                        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                             <div class="bg-white py-2 collapse-inner rounded">
                                  <h6 class="collapse-header">Login Screens:</h6>
                                  <a class="collapse-item" href="login.html">Login</a>
                                  <a class="collapse-item" href="register.html">Register</a>
                                  <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                                  <div class="collapse-divider"></div>
                                  <h6 class="collapse-header">Other Pages:</h6>
                                  <a class="collapse-item" href="404.html">404 Page</a>
                                  <a class="collapse-item active" href="blank.html">Blank Page</a>
                             </div>
                        </div>
                   </li>

                   <!-- Nav Item - Kategori -->
                   <li class="nav-item">
                        <a class="nav-link" href="charts.html">
                             <i class="fas fa-fw fa-chart-area"></i>
                             <span>Kategori</span></a>
                   </li>

              <?php } else { ?>
                   <!-- Nav Item - Hasil Collapse Menu -->
                   <li class="nav-item <?= $title == "Hasil" ? "active" : ""; ?>">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                             <i class="fas fa-fw fa-folder"></i>
                             <span>Hasil</span>
                        </a>
                        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                             <div class="bg-white py-2 collapse-inner rounded">
                                  <h6 class="collapse-header">Login Screens:</h6>
                                  <a class="collapse-item" href="login.html">Login</a>
                                  <a class="collapse-item" href="register.html">Register</a>
                                  <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                                  <div class="collapse-divider"></div>
                                  <h6 class="collapse-header">Other Pages:</h6>
                                  <a class="collapse-item" href="404.html">404 Page</a>
                                  <a class="collapse-item active" href="blank.html">Blank Page</a>
                             </div>
                        </div>
                   </li>
              <?php } ?>

              <!-- Nav Item - Profile -->
              <li class="nav-item <?= $title == "My Profile" ? "active" : ""; ?>">
                   <a class="nav-link" href="<?= base_url('user/myprofile'); ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>My Profile</span></a>
              </li>

              <!-- Nav Item - Logout -->
              <li class="nav-item">
                   <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span></a>
              </li>

              <!-- Divider -->
              <hr class="sidebar-divider d-none d-md-block">

              <!-- Sidebar Toggler (Sidebar) -->
              <div class="text-center d-none d-md-inline">
                   <button class="rounded-circle border-0" id="sidebarToggle"></button>
              </div>

         </ul>
         <!-- End of Sidebar -->