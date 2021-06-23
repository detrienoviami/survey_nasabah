  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> <?= $title?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item"><?= $title?></li>
            </ol>
          </div>
            <br></br>
            <div>
              <h8 class="m-0 text-dark"> Selamat Datang <?php echo $this->session->userdata('nama')?>,</h8>
            </div>
          <div>
            <h8 class="m-0 text-dark">
              Aplikasi ini digunakan sebagai penelitian untuk mengetahui bagaimana penerapan Data Mining,
              dalam hal ini menggunakan kasus untuk memprediksi kepuasan Nasabah dengan Algoritma C45
            </h8>
          </div>
        </div>
      </div>
    </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="image">
          <img src="<?= base_url()?>assets/img/saham.png" alt="gambar_saham" style="width:1000px;height:250px;" align="middle" ></img>
        </div>
      </div>
      <div class="row">
        <section class="col-lg-7 connectedSortable">

        </section>
      </div>
    </div>
  </section>
</div>
