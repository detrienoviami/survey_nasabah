
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan</h1>

    <div class="card shadow mb-4">
      <div class="col-md-12">
        <div class="">
          <form class="" action="" method="post">
            <div class="row">
              <div class="form-group col-sm-6">
                <label>Date range:</label>
                <div class="input-group">
                  <input type="date" class="form-control" id="tgl_awal" name="tgl_awal">
                  <div class="input-group-prepend ">
                    <span class="input-group-text">
                      s/d
                      <!-- <i class="far fa-calendar-alt"></i> -->
                    </span>
                  </div>
                  <!-- <input type="text" class="form-control float-right" id="daterange-btn" name="filter_tgl"> -->
                  <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir">
                </div>
              </div>
              <div class="form-group col-sm-6" style="margin-top: 1.9rem!important;">
                <button type="submit" name="filter" class="btn btn-primary col-12">Filter</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="card shadow mb-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header">
              <h3 class="card-title">Rekap Absen</h3>
            </div>
            <div class="card-body">
              <div class="col-12 mb-5">
                <div class="float-right">
                  <?php
                  if (isset($_POST['filter'])) {
              			$awal = $this->input->post('tgl_awal');
                    $akhir = $this->input->post('tgl_akhir');
                    $check = null;
              		}else{
                    $awal = null;
                    $akhir = null;
                    $check = 'disabled';
                  }
                  ?>
                  <form class="" action="<?= base_url('rekap/excel') ?>" method="post">
                    <input type="hidden" name="tgl_awal" value="<?= $awal ?>">
                    <input type="hidden" name="tgl_akhir" value="<?= $akhir ?>">
                    <button type="submit" name="filter" class="btn btn-success" <?=$check?>><i class="fas fa-file-excel mr-1"></i> Excel</button>
                  </form>
                  <!-- <a class="btn btn-success btn-sm mr-1" href="<?= base_url('rekap/excel') ?>"><i class="fas fa-file-excel mr-1"></i> Excel</a> -->
                  <!-- <button class="btn btn-danger btn-sm mr-1" href=""><i class="fas fa-file-pdf mr-1"></i> PDF</button>
                  <button class="btn btn-info btn-sm mr-1" href=""><i class="fas fa-print mr-1"></i> Print</button> -->
                </div>
              </div>
              <div class="d-block d-sm-none">
                <?php foreach ($absen as $key): ?>
                <table class="col-12 mb-2 mt-2 ">
                  <tr>
                    <th colspan="2"><?= date_indo($key['tanggal']); ?></th>
                  </tr>
                  <tr>
                    <td>Masuk</td>
                    <td class="text-right"><?= $key['jam_masuk']; ?></td>
                  </tr>
                  <tr>
                    <td>Pulang</td>
                    <td class="text-right"><?= $key['jam_pulang']; ?></td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td class="text-right"><?= $key['keterangan']; ?></td>
                  </tr>
                  <!-- <tr>
                    <td colspan="2">
                      <div class="border"></div>
                    </td>
                  </tr> -->
                </table>
                <div class="border"></div>
                <?php endforeach; ?>
              </div>
              <div class="table-responsive d-none d-sm-block">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center" width="25">NO</th>
                      <th class="text-center">Tanggal Beli</th>
                      <th class="text-center">Jam Beli</th>
                      <th class="text-center">Nama Jamu</th>
                      <th class="text-center">Jumlah</th>
                    </tr>
                  </thead>
                  <tbody class="text-capitalize">
                    <?php $i=1; ?>
                    <?php foreach ($absen as $key): ?>
                      <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td class="text-center"><?= $key['tanggal']; ?></td>
                        <td class="text-center"><?= $key['jam_masuk']; ?></td>
                        <td class="text-center"><?= $key['jam_pulang']; ?></td>
                        <td class="text-center"><?= $key['keterangan']; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="font-weight-bold text-primary float-left pt-1">Aktivitas</h6>
        <a href="<?= base_url('pegawai/registrasi_pegawai') ?>" class="btn btn-primary btn-sm float-right mr-3"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center">
                <th width="10">NO</th>
                <th>Nama Pegawai</th>
                <th>Level</th>
                <th><i class="fas fa-fw fa-cog"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              <?php foreach ($pegawai as $key): ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $key['nama_pegawai'] ?></td>
                  <td><?= $key['level'] ?></td>
                  <td class="text-center">
                    <a title="edit" href="<?= base_url('pegawai/ubah/').$key['kd_pegawai'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i> </a>
                    <a title="delete" href="<?= base_url('pegawai/hapus/').$key['kd_pegawai'] ?>" onclick="return confirm('Data Ini Akan dihapus?')" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
