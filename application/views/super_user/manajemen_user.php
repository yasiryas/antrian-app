         <div class="container-fluid">

              <!-- Page Heading -->
              <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
              <div class="row">
                   <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card shadow mb-4">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary" id="titleFormActionUser">Tambah User</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <form action="<?= base_url('super_user/tambah_user'); ?>" method="post">
                                       <div class="form-row align-items-top">
                                            <div class="col-auto mb-2">
                                                 <label for="name">Nama</label>
                                                 <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>">
                                                 <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
                                            </div>
                                            <div class="col-auto">
                                                 <label for="email">Email</label>
                                                 <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                                                 <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                            </div>
                                            <div class="col-auto">
                                                 <label for="password">Password</label>
                                                 <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>">
                                                 <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                                            </div>
                                            <div class="col-auto">
                                                 <label for="role">Role User</label>
                                                 <select class="custom-select mr-sm-2" id="role" name="role">
                                                      <option value="super_user" <?= set_select('role', "super_user"); ?>>Super User</option>
                                                      <option value="admin" <?= set_select('role', "admin"); ?>>Admin</option>
                                                      <option value="user" <?= set_select('role', "user", true); ?>>User</option>
                                                 </select>
                                            </div>
                                            <div class="col-auto my-1">
                                                 <label for="is_active">Status</label>
                                                 <div class="custom-control custom-checkbox mr-sm-2">
                                                      <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" <?= set_checkbox('is_active', '1'); ?>>
                                                      <label class="custom-control-label" for="is_active">Active</label>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="modal-footer mt-3">
                                            <button class="col-auto ml-auto btn btn-primary btn-sm" id="btnAddUser" type="submit"><i class="fas fa-save"></i>&nbsp Save</button>
                                       </div>
                                  </form>
                             </div>
                        </div>
                        <div class="card shadow mb-4">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary">Data User</h6>
                                  </div>
                             </div>
                             <div class="card-body">
                                  <div class="table-responsive">
                                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                 <tr>
                                                      <td>No</td>
                                                      <td>Name</td>
                                                      <td>Email</td>
                                                      <td>Role</td>
                                                      <td>Status</td>
                                                      <td>Aksi</td>
                                                 </tr>
                                            </thead>
                                            <tbody>
                                                 <?php $i = 1; ?>
                                                 <?php foreach ($list_user as $users) : ?>
                                                      <tr>
                                                           <td><?= $i++ ?></td>
                                                           <td><?= $users['name']; ?></td>
                                                           <td><?= $users['email']; ?></td>
                                                           <td><?= ($users['role'] == "super_user") ? "super user" : $users['role']; ?></td>
                                                           <td><?= $users['is_active'] == 1 ? "active" : "non-active"; ?></td>
                                                           <td>
                                                                <div class="btn-group" role="group">
                                                                     <button type="button" class="btn btn-secondary btn-sm dropdown-toggle mb-1" data-toggle="dropdown" aria-expanded="false">
                                                                          Update
                                                                     </button>
                                                                     <div class="dropdown-menu">
                                                                          <a href="#" class="dropdown-item btn btn-warning btn-sm mb-1 btnResetPassword" data-resetid="<?= $users['id']; ?>" data-email="<?= $users['email']; ?>" data-toggle="modal" data-target="#modalResetPassword"><i class="fas fa-key"></i>&nbsp Reset Password</a>
                                                                          <a href="#" class="dropdown-item btn btn-primary btn-sm mb-1 ubahUser" data-id="<?= $users['id']; ?>" data-name="<?= $users['name']; ?>" data-email="<?= $users['email']; ?>" data-role="<?= $users['role']; ?>" data-is_active="<?= $users['is_active']; ?>" data-toggle="modal" data-target="#modalUbahUser"><i class="fas fa-edit"></i>&nbsp Edit Data</a>
                                                                     </div>
                                                                </div>
                                                                <a href="#" class="btn btn-danger btn-sm mb-1 hapusUser" id="btnDeleteUser" data-toggle="modal" data-target="#modalHapusUser" data-id="<?= $users['id']; ?>" data-name="<?= $users['name']; ?>" <?= $user['id'] == $users['id'] ?  'style="pointer-events: none"' : ""; ?>><i class="fas fa-trash"></i>&nbsp Hapus</a>
                                                           </td>
                                                      </tr>
                                                 <?php endforeach; ?>
                                            </tbody>
                                  </div>
                             </div>
                        </div>

                        <!-- Modal Hapus User-->
                        <div class="modal fade" id="modalHapusUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                  <div class="modal-content">
                                       <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <form action="<?= base_url('super_user/hapus_user'); ?>" method="POST">
                                            <div class="modal-body">
                                                 Apakah kamu yakin mau menghapus user ini?
                                                 <input name="idUser" id="idUser" type="hidden" value="id">
                                            </div>
                                            <div class="modal-footer">
                                                 <button type="submit" class="btn btn-danger">Delete</button>
                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                       </form>
                                  </div>
                             </div>
                        </div>

                        <!-- Modal Ubah User-->
                        <div class="modal fade" id="modalUbahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                  <div class="modal-content">
                                       <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <form action="<?= base_url('super_user/update_user'); ?>" method="POST">
                                            <div class="modal-body">
                                                 <input name="idUpdateUser" id="idUpdateUser" type="hidden" value="">
                                                 <div class="form-group">
                                                      <label for="ubahEmail">Email</label>
                                                      <input type="email" class="form-control" id="ubahEmail" name="emailUpdateUser" readonly>
                                                      <small id="emailHelp" class="form-text text-muted ml-2">Maaf email tidak bisa diubah ya!</small>
                                                 </div>
                                                 <div class="form-group">
                                                      <label for="ubahNama">Nama</label>
                                                      <input type="text" class="form-control" id="ubahNama" name="updateName">
                                                      <div id="errorUbahNama" class="invalid-feedback ml-1"></div>
                                                 </div>
                                                 <div class="form-group">
                                                      <label for="ubahRole">Role User</label>
                                                      <select class="custom-select mr-sm-2" id="ubahRole" name="updateRole">
                                                           <option value="super_user">Super User</option>
                                                           <option value="admin">Admin</option>
                                                           <option value="user">User</option>
                                                      </select>
                                                 </div>
                                                 <div class="form-group form-check">
                                                      <input type="checkbox" class="form-check-input ubah-is-active" id="ubah_is_active" name="updateActive">
                                                      <label class="form-check-label" for="ubah_is_active">Active</label>
                                                 </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary" id="btnUpdateUser">Update</button>
                                            </div>
                                       </form>
                                  </div>
                             </div>
                        </div>

                        <!-- modal reset password -->
                        <div class="modal fade" id="modalResetPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                  <div class="modal-content">
                                       <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                                            <button type="button" class="close closeResetPassword" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <div class="modal-body">
                                            <div class="form-group">
                                                 <form action="<?= base_url('super_user/reset_password'); ?>" method="POST" id="formResetPassword">
                                                      <label for="resetPassword">Password</label>
                                                      <input type="hidden" class="idResetPassword" name="idResetPassword" id="idResetPassword" value="id">
                                                      <input type="hidden" class="emailResetPassword" name="emailResetPassword" id="emailResetPassword" value="email">
                                                      <input type="password" name="resetPassword" class="form-control resetPassword" id="resetPassword">
                                                      <div id="errorResetPassword" class="invalid-feedback ml-1"></div>
                                            </div>
                                       </div>
                                       <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary closeResetPassword" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" id="btnResetPassword">Save changes</button>
                                       </div>
                                       </form>
                                  </div>
                             </div>
                        </div>

                        <!-- /.container-fluid -->