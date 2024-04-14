         <div class="container-fluid">

              <!-- Page Heading -->
              <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
              <div class="row">
                   <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card shadow mb-4">
                             <div class="card-header py-3">
                                  <div class="row align-middle d-flex">
                                       <h6 class="m-2 col-auto font-weight-bold text-primary">Tambah User</h6>
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
                                                 <input type="password" class="form-control" id="passwors" name="password" value="<?= set_value('password'); ?>">
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
                                                 <label for="role">Status</label>
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
                                                 <?php foreach ($list_user as $user) : ?>
                                                      <tr>
                                                           <td><?= $i++ ?></td>
                                                           <td><?= $user['name']; ?></td>
                                                           <td><?= $user['email']; ?></td>
                                                           <td><?= ($user['role'] == "super_user") ? "super user" : $user['role']; ?></td>
                                                           <td><?= $user['is_active'] == 1 ? "active" : "non-active"; ?></td>
                                                           <td>
                                                                <a href="#" class="btn btn-warning btn-sm mb-1"><i class="fas fa-edit"></i>&nbsp Edit</a>
                                                                <a href="#" class="btn btn-danger btn-sm mb-1" id="btnDeleteUser" data-toggle="modal" data-target="#modalHapusUser" data-id="<?= $user['id']; ?>" data-name="<?= $user['name']; ?>"><i class="fas fa-trash"></i>&nbsp Hapus</a>
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
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <form action="<?= base_url('super_user/hapus_user'); ?>" method>
                                            <div class="modal-body">
                                                 Apakah kamu yakin mau menghapus user ini?
                                                 <input type="hidden" value="">
                                            </div>
                                            <div class="modal-footer">
                                                 <button type="button" class="btn btn-danger">Delete</button>
                                                 <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                       </form>
                                  </div>
                             </div>
                        </div>
                        <!-- /.container-fluid -->