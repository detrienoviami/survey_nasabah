<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> <?= $title?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard');?>">Home</a></li>
            <li class="breadcrumb-item"><?= $title?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Edit Profile</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Ganti Password</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <form id="form_edit_profile" action="<?php echo base_url('karyawan_profile/edit_profile') ?>" method="post">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="nip">NIP</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="nip" id="nip" value="<?php echo $profile['nip'] ?>" class="form-control" readonly>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="nama">Nama</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="nama" id="nama" value="<?php echo $profile['nama'] ?>" class="form-control" required="true">
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="username">Username</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="username" id="username" value="<?php echo $profile['username'] ?>" class="form-control" required="true">
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo $profile['tgl_lahir'] ?>" class="form-control" required="true">
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="email">E-mail</label>
                            </div>
                            <div class="col-md-4">
                                <input type="email" name="email" id="email" value="<?php echo $profile['email'] ?>" class="form-control" required="true">
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="agama">Agama</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="agama" id="agama" value="<?php echo $profile['agama'] ?>" class="form-control" required="true">
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="alamat" id="alamat" value="<?php echo $profile['alamat'] ?>" class="form-control" required="true">
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="no_hp">No Telp / No Handphone</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="no_hp" id="no_hp" value="<?php echo $profile['no_hp'] ?>" class="form-control" required="true">
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-sm btn-primary" id="btn_edit_profile">Simpan Perubahan Profile</button>
                  </div>
                </form>


            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <form action="<?php echo base_url('karyawan_profile/edit_password') ?>" method="post">
                  <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <div class="row">
                              <div class="col-md-2">
                                  <label for="username">Username</label>
                              </div>
                              <div class="col-md-4">
                                  <input type="text" name="username" id="username" value="<?php echo $profile['username'] ?>" class="form-control" readonly>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <div class="row">
                              <div class="col-md-2">
                                  <label for="password1">Password</label>
                              </div>
                              <div class="col-md-4">
                                  <input type="password" name="password1" id="password1" class="form-control" required>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <div class="row">
                              <div class="col-md-2">
                                  <label for="password2">Ulangi Password</label>
                              </div>
                              <div class="col-md-4">
                                  <input type="password" name="password2" id="password2" class="form-control" required>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-sm btn-primary" id="btn_edit_password">Simpan Password</button>
                  </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script src="<?php echo base_url()?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
