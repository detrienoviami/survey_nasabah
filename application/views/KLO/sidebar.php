<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?php echo base_url('dashboard')?>" class="brand-link">
    <img src="<?= base_url()?>assets/img/LogoBCA.jpg" alt="" class="brand-image img-circle elevation-2"
         style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo $this->session->userdata('nama')?></span>
    <span class="brand-text font-weight-light"></span>
  </a>
  <div class="sidebar">
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php if ($this->session->userdata('image') == '' || $this->session->userdata('image') == null ): ?>
              <img src="<?= base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        <?php else: ?>
             <img src="<?= base_url('assets/img/user/'.$this->session->userdata('image'))?>" class="img-circle elevation-2" alt="User Image">
        <?php endif ?>
      </div>
      <div class="info">
        <span class="text-white"><?php echo $this->session->userdata('nama')?></span>
      </div>
    </div> -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Master Data</li>
        <li class="nav-item">
            <a href="<?php echo base_url('klo_karyawan')?>" class="nav-link">
              <i class="fas fa-users"></i>
              <p>Data Karyawan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo base_url('klo_kuisioner')?>" class="nav-link">
              <i class="fas fa-file"></i>
              <p>Kuisioner</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo base_url('klo_atribut')?>" class="nav-link">
              <i class="fas fa-file"></i>
              <p>Atribut Penilaian</p>
            </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('klo_jawaban')?>" class="nav-link">
            <i class="fas fa-chart-line"></i>
            <p>Hasil Survey Nasabah</p>
          </a>
        </li>
        <li class="nav-header">Data Mining</li>
        <li class="nav-item">
          <a href="<?php echo base_url('klo_total')?>" class="nav-link">
            <i class="fas fa-chart-line"></i>
            <p>Kelompok Nilai</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo base_url('klo_datamining')?>" class="nav-link">
              <i class="fas fa-database"></i>
              <p>Algoritma C45</p>
            </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('klo_pohonkeputusan')?>" class="nav-link">
            <i class="fas fa-chart-line"></i>
            <p>Pohon Keputusan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('klo_laporan')?>" class="nav-link">
            <i class="fas fa-file"></i>
            <p>Laporan</p>
          </a>
        </li>
        <!-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-open"></i>
            <p>
              Hasil Survey
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('KLO_jawaban')?>" class="nav-link">
                <i class="fas fa-chart-line"></i>
                <p>Jawaban Survey Nasabah</p>
              </a>
            </li>
          </ul>
        </li> -->
        <li class="nav-header">OTHER</li>
        <li class="nav-item">
          <a href="<?php echo base_url('auth/destroy')?>" class="nav-link">
            <i class="nav-icon fas fa-arrow-circle-right"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
    	</ul>
    </nav>
  </div>
</aside>
