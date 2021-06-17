<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Survey Layanan | Nasabah</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--   <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->

  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

  <!-- datetimepicker -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css">

    <!-- notification -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />


  <script src="<?= base_url();?>assets/plugins/jquery/jquery.min.js"></script>

  <!-- <script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
  <!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

  <script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>assets/dist/js/adminlte.min.js"></script>
  <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
  <!-- hightchart -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <!-- <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
  <script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script> -->
  <!-- notification -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>



  <script type="text/javascript" src="<?php echo base_url()?>assets/ckeditor/ckeditor.js"></script>
  <!-- panggil adapter jquery ckeditor -->
  <script type="text/javascript" src="<?php echo base_url()?>assets/ckeditor/adapters/jquery.js"></script>
  </head>

  <body class="hold-transition layout-top-nav">
    <div class="wrapper">

      <nav class="main-header navbar navbar-expand-md navbar-dark navbar-primary">
        <div class="container">
          <h1 class="text-white">KCP Rengasdengklok</h1>
        </div>
      </nav>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark"> Survey Layanan</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <div class="container">
            <!-- <div class="col-md-12"> -->
              <div class="card">
                <div class="card-body">
                  <!-- <div class="row"> -->
                      <!-- <div class="col-md-12"> -->
        <form method="POST" id="kuisioner_result" action="<?php echo base_url('Nasabah_kuisioner_result/tambah')?>" class="form_create">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <!-- <label for="id_kuisioner_result">ID Kuisioner</label> -->
                              <input type="hidden" class="form-control" id="id_kuisioner_result" name="id_kuisioner_result" placeholder="ID Kuisioner" readonly value="<?php echo $kode; ?>">
                              <span class="help-block text-danger"></span>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nohp">No Handphone</label>
                                <input type="number" class="form-control" id="nohp" name="nohp" placeholder="No Handphone" value="">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="jk">Jenis Kelamin</label>
                            <div>
                              <input type='radio' name='jk' value='laki-laki' />Laki-laki
                              <input type='radio' name='jk' value='perempuan' class="ml-5"/>Perempuan
                            </div>
                        </div>
                      </div>


                      <div class="col-sm-8">
                          <div class="form-group">
                              <label for="nama_karyawan">Nama Karyawan</label>
                              <select class="form-control" id="nama_karyawan" name="nama_karyawan">
                                <option value="">-- Pilih Karyawan --</option>
                                <?php foreach ($nama_karyawan as $key => $value): ?>
                                  <option value="<?php echo $value->nama ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                              </select>
                              <span class="help-block text-danger"></span>
                          </div>
                      </div>
                      <!-- <div class="col-sm-5">
                          <div class="form-group">
                              <label for="nama_karyawan">Apakah Bapak/Ibu puas dengan layanan yang telah diberikan?</label>
                              <select class="form-control" id="nama_karyawan" name="nama_karyawan">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($nama_karyawan as $key => $value): ?>
                                  <option value="<?php echo $value->nama ?>"><?php echo $value->nama ?></option>
                                <?php endforeach; ?>
                              </select>
                              <span class="help-block text-danger"></span>
                          </div>
                      </div> -->
                      <div class="row">
                        <div class="col-md-12">
                          <?php if (count($kuisioner) > 0): ?>
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Pernyataan</th>
                                      <th colspan="5" class="text-center">Jawaban</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $i=1;
                                     foreach ($kuisioner as $no => $soal){ ?>
                                      <tr>
                                        <td><?php echo $soal->id_kuisioner ?><input type="hidden" name="no_kuisioner<?= $i ?>" id="no_kuisioner" value="<?php echo $soal->id_kuisioner ?>"/></td>
                                        <td><?php echo $soal->kuisioner ?><input type="hidden" value=<?php echo $soal->kuisioner?> name='id_soal<?= $i ?>'/></td>

                                        <?php if ($soal->id_kuisioner != '5'): ?>
                                        <td><input type='radio' name='jawaban<?=$i?>' value='1' required /> Sangat Tidak Puas</td>
                                        <td><input type='radio' name='jawaban<?=$i?>' value='2' required /> Tidak Puas</td>
                                        <td><input type='radio' name='jawaban<?=$i?>' value='3' required /> Cukup Puas</td>
                                        <td><input type='radio' name='jawaban<?=$i?>' value='4' required /> Puas</td>
                                        <td><input type='radio' name='jawaban<?=$i?>' value='5' required /> Sangat Puas</td>
                                        <?php endif; ?>
                                        <?php if ($soal->id_kuisioner == '5'): ?>
                                          <td><input type='radio' name='jawaban<?=$i?>' value='5' required /> Ya</td>
                                          <td><input type='radio' name='jawaban<?=$i?>' value='1' required /> Tidak</td>
                                        <?php endif; ?>
                                      </tr>
                                  <?php $i++;} ?>
                                  </tbody>
                                </table>
                          <?php endif ?>
                        </div>

                      </div>

                      </div>
                      <div class="col-xs-4">
                        <center>
                          <input type="submit" name="kirim" value="Kirim" class="btn btn-primary btn-flat">
                        </center>
                      </div>
        </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
          <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Detrie Noviami</a>.</strong> All rights reserved.
        </div>
        <!-- <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Detrie Noviami</a>.</strong> All rights reserved. -->
      </footer>
    </div>
  </body>
</html>
