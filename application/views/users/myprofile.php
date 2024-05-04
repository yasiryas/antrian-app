                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                         <!-- Page Heading -->
                         <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                         <!-- Card -->
                         <div class="card mb-3" style="max-width: 540px;">
                              <div class="row no-gutters">
                                   <div class="col-md-4">
                                        <img class="card-img" src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="My Profile">
                                   </div>
                                   <div class="col-md-8">
                                        <div class="card-body ">
                                             <h5 class="card-title d-flex justify-content-between align-items-center"><?= $user['name']; ?> <span class="badge badge-info badge-pill"><?= $user['role']; ?></span></h5>
                                             <p class="card-text"><?= $user['email'] ?></p>
                                             <p class="card-text"><small class="text-muted">Bergabung sejak <?= date('d F Y', $user['date_create']); ?></small></p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <!-- /.container-fluid -->