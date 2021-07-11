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
          <!-- <button type="submit" name="hitung_algoritma" class="btn btn-info float-right"> Hitung Algoritma C45 </button> -->
          <!-- <div class="table table-responsive"> -->
          <div class="col-sm-4">
            <div class="form-group">
                <span for="jawaban">Jumlah Data : <?php echo $jawaban ?><input class="jawaban" value="<?php echo $jawaban ?>" hidden/></span>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
                <span for="jml_puas">Jumlah Layanan (Puas) : <?php echo $all_puas ?><input class="all_puas" value="<?php echo $all_puas ?>" hidden/></span>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
                <span for="jml_tidakpuas">Jumlah Layanan (Tidak Puas) : <?php echo $all_tidak_puas ?><input class="all_tidak_puas" value="<?php echo $all_tidak_puas ?>" hidden/></span>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
                <span for="entrophi">Jumlah Entrophi : <span class="entrophy"></span><input type="hidden" id="entrophy" value="" readonly/></span>
            </div>
          </div>


          <div class="table table-responsive">
              <table class="table table-bordered table-striped" id="">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Atribut</th>
                        <th>Sangat Tidak Puas</th>
                        <th>Tidak Puas</th>
                        <th>Cukup Puas</th>
                        <th>Puas</th>
                        <th>Sangat Puas</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                          $i=1;
                         foreach ($total as  $field){ ?>
                         <tr>
                           <td><?php echo $i ?></td>
                             <td><?php echo $field['atribut'] ?><input type="hidden" value=<?php echo $field['atribut'] ?> name='atribut'/></td>
                             <td><?php echo $field['stp'] ?><input type="hidden" value=<?php echo $field['stp'] ?> name='stp'/></td>
                             <td><?php echo $field['tp'] ?><input type="hidden" value=<?php echo $field['tp'] ?> name='tp'/></td>
                             <td><?php echo $field['cp'] ?><input type="hidden" value=<?php echo $field['cp'] ?> name='cp'/></td>
                             <td><?php echo $field['p'] ?><input type="hidden" value=<?php echo $field['p'] ?> name='p'/></td>
                             <td><?php echo $field['sp'] ?><input type="hidden" value=<?php echo $field['sp'] ?> name='sp'/></td>
                         </tr>
                        <?php $i++;} ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" scope="row">Entrophy</th>
                               <td><?php echo $entrophy['stp'] ?><input type="hidden" value=<?php echo $entrophy['stp'] ?> name='stp'/></td>
                               <td><?php echo $entrophy['tp'] ?><input type="hidden" value=<?php echo $entrophy['tp'] ?> name='tp'/></td>
                               <td><?php echo $entrophy['cp'] ?><input type="hidden" value=<?php echo $entrophy['cp'] ?> name='cp'/></td>
                               <td><?php echo $entrophy['p'] ?><input type="hidden" value=<?php echo $entrophy['p'] ?> name='p'/></td>
                               <td><?php echo $entrophy['sp'] ?><input type="hidden" value=<?php echo $entrophy['sp'] ?> name='sp'/></td>
                        </tr>
                        <tr>
                            <th colspan="2" scope="row">Gain</th>
                            <!-- <td><?php echo $gain['stp'] ?><input type="hidden" value=<?php echo $gain['stp'] ?> name='stp'/></td>
                            <td><?php echo $gain['tp'] ?><input type="hidden" value=<?php echo $gain['tp'] ?> name='tp'/></td>
                            <td><?php echo $gain['cp'] ?><input type="hidden" value=<?php echo $gain['cp'] ?> name='cp'/></td>
                            <td><?php echo $gain['p'] ?><input type="hidden" value=<?php echo $gain['p'] ?> name='p'/></td>
                            <td><?php echo $gain['sp'] ?><input type="hidden" value=<?php echo $gain['sp'] ?> name='sp'/></td> -->
                            <td colspan="5" class="text-center"><?php echo $gain ?><input type="hidden" value="<?php echo $gain ?>" name='kesimpulan'/></td>
                        </tr>
                        <tr>
                            <th colspan="2" scope="row">Kesimpulan</th>
                            <td colspan="5" class="text-center"><?php echo $kesimpulan['kinerja'] ?><input type="hidden" value=<?php echo $kesimpulan['kinerja']?> name='kesimpulan'/></td>
                        </tr>
                    </tfoot>
              </table>
          </div>
          <br/>

          <!-- <p>Puas : <span><?php echo $waktu_puas ?><input type="hidden" class="waktu_puas" value="<?php echo $waktu_puas ?>" /></span></p> -->
          <!-- <p>Tidak Puas: <span><?php echo $waktu_tidak_puas ?><input type="hidden" class="waktu_tidak_puas" value="<?php echo $waktu_tidak_puas ?>" /></span></p> -->



            <span><b>ATRIBUT WAKTU</b></span>
            <div class="table table-responsive">
              <table class="table table-bordered table-striped" id="">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Atribut</th>
                    <th colspan="2">Sangat Tidak Puas</th>
                    <th colspan="2">Tidak Puas</th>
                    <th colspan="2">Cukup Puas</th>
                    <th colspan="2">Puas</th>
                    <th colspan="2">Sangat Puas</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                     $i=1;
                     foreach ($waktu as  $field){ ?>
                     <tr>
                         <td><?php echo $i ?></td>
                         <td><?php echo $field['atribut'] ?><input type="hidden" value=<?php echo $field['atribut'] ?> name='atribut'/></td>
                         <td colspan="2" class="waktu_stp"><?php echo $field['stp'] ?><input type="hidden" id="waktu_stp" value=<?php echo $field['stp'] ?> name='stp'/></td>
                         <td colspan="2" class="waktu_tp" ><?php echo $field['tp'] ?><input type="hidden" id="waktu_tp" value=<?php echo $field['tp'] ?> name='tp'/></td>
                         <td colspan="2" class="waktu_cp"><?php echo $field['cp'] ?><input type="hidden" id="waktu_cp" value=<?php echo $field['cp'] ?> name='cp'/></td>
                         <td colspan="2" class="waktu_p"><?php echo $field['p'] ?><input type="hidden" id="waktu_p" value=<?php echo $field['p'] ?> name='p'/></td>
                         <td colspan="2" class="waktu_sp"><?php echo $field['sp'] ?><input type="hidden" id="waktu_sp" value=<?php echo $field['sp'] ?> name='sp'/></td>
                     </tr>
                    <?php $i++;} ?>

                </tbody>
                <tfoot>
                  <tr>
                      <th colspan="2">Gain</th>
                         <td colspan="2" class="waktu_en_stp"><input type="hidden" id="waktu_en_stp" value="" name='stp'/></td>
                         <td colspan="2" class="waktu_en_tp"><input type="hidden" id="waktu_en_tp" value="" name='tp'/></td>
                         <td colspan="2" class="waktu_en_cp"><input type="hidden" id="waktu_en_cp" value="" name='cp'/></td>
                         <td colspan="2" class="waktu_en_p"><input type="hidden" id="waktu_en_p" value="" name='p'/></td>
                         <td colspan="2" class="waktu_en_sp"><input type="hidden" id="waktu_en_sp" value="" name='sp'/></td>
                  </tr>
                </tfoot>
                <tfoot>
                  <tr>
                      <th colspan="2">Entrophi</th>
                         <td colspan="2" class="waktu_en_stp"><input type="hidden" id="waktu_en_stp" value="" name='stp'/></td>
                         <td colspan="2" class="waktu_en_tp"><input type="hidden" id="waktu_en_tp" value="" name='tp'/></td>
                         <td colspan="2" class="waktu_en_cp"><input type="hidden" id="waktu_en_cp" value="" name='cp'/></td>
                         <td colspan="2" class="waktu_en_p"><input type="hidden" id="waktu_en_p" value="" name='p'/></td>
                         <td colspan="2" class="waktu_en_sp"><input type="hidden" id="waktu_en_sp" value="" name='sp'/></td>
                  </tr>
                </tfoot>


                <table class="table table-bordered table-striped">
                    <thead>
                        <span>Hasil klasifikasi penilaian pada atribut waktu:</span>
                      <tr>
                        <!-- <th>No</th> -->
                        <th>jawaban</th>
                        <th >Sangat Tidak Puas</th>
                        <th >Tidak Puas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i=1;
                       foreach ($waktu_layanan as  $layanan){ ?>
                      <tr>
                           <!-- <td><?php echo $i ?></td> -->
                           <td ><?php echo $layanan['atribut'] ?></td>
                           <td class="waktu_puas<?php echo $i ?>"><?php echo $layanan['puas'] ?>
                             <input type="hidden" id="waktu_puas<?php echo $i ?>" name="" value="<?php echo $layanan['puas'] ?>">
                           </td>
                           <td class="waktu_tidak_puas<?php echo $i ?>"><?php echo $layanan['tidak_puas'] ?>
                             <input type="hidden" id="waktu_tidak_puas<?php echo $i ?>"  name="" value="<?php echo $layanan['tidak_puas'] ?>">
                           </td>
                      </tr>
                      <?php $i++;} ?>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th scope="row">Entrophi</th>
                               <td colspan="2" class="waktu_en_stp"><input type="hidden" id="waktu_en_stp" value="" name='stp'/></td>
                               <td colspan="2" class="waktu_en_tp"><input type="hidden" id="waktu_en_tp" value="" name='tp'/></td>
                               <td colspan="2" class="waktu_en_cp"><input type="hidden" id="waktu_en_cp" value="" name='cp'/></td>
                               <td colspan="2" class="waktu_en_p"><input type="hidden" id="waktu_en_p" value="" name='p'/></td>
                               <td colspan="2" class="waktu_en_sp"><input type="hidden" id="waktu_en_sp" value="" name='sp'/></td>
                        </tr>
                    </tfoot> -->
                    <!-- <tfoot>
                        <tr>
                            <th colspan="2" scope="row">Layanan</th>
                            <?php foreach ($waktu_layanan as  $layanan){ ?>
                              <?php if ($layanan['stp'] == null || $layanan['tp'] == null || $layanan['cp'] == null || $layanan['p'] == null || $layanan['sp'] ==  null ): ?>
                                <td  class="puas">Puas : 0<input type="hidden" class="puas" value="0" name='puas'/></td>
                                <td  class="tidak_puas" > Tidak Puas : 0<input type="hidden" class="tidak_puas" value="0"  name='tidak_puas'/></td>
                              <?php endif; ?>

                              <?php if ($layanan['stp'] !== false || $layanan['tp'] !== false || $layanan['cp'] !== false || $layanan['p'] !== false || $layanan['sp'] !== false ): ?>
                              <td  class="puas">Puas : <?php echo $layanan['puas'] ?><input type="hidden" class="puas" value=<?php echo $layanan['puas'] ?> name='puas'/></td>
                              <td  class="tidak_puas" > Tidak Puas : <?php echo $layanan['tidak_puas'] ?><input type="hidden" class="tidak_puas" value=<?php echo $layanan['tidak_puas'] ?>  name='tidak_puas'/></td>
                              <?php endif; ?>
                            <?php ;} ?>
                            <?php foreach ($waktu_layanan as  $layanan){ ?>
                            <td><?php echo $layanan['stp'] ?></td>
                            <td><?php echo $layanan['tp'] ?></td>
                            <td><?php echo $layanan['cp'] ?></td>
                            <td><?php echo $layanan['p'] ?></td>
                            <td><?php echo $layanan['sp'] ?></td>
                            <?php ;} ?>
                        </tr>
                    </tfoot> -->
                </table>
            </table>
            </div>
            <br/>



          <span><b>ATRIBUT AKURAT</b></span>
          <div class="table table-responsive">
                <table class="table table-bordered table-striped" id="">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Atribut</th>
                    <th colspan="2">Sangat Tidak Puas</th>
                    <th colspan="2">Tidak Puas</th>
                    <th colspan="2">Cukup Puas</th>
                    <th colspan="2">Puas</th>
                    <th colspan="2">Sangat Puas</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $i=1;
                     foreach ($akurat as  $field){ ?>
                     <tr>
                         <td><?php echo $i ?></td>
                         <td><?php echo $field['atribut'] ?><input type="hidden" value=<?php echo $field['atribut'] ?> name='atribut'/></td>
                         <td colspan="2" class="akurat_stp"><?php echo $field['stp'] ?><input type="hidden" id="akurat_stp" value=<?php echo $field['stp'] ?> name='stp'/></td>
                         <td colspan="2" class="akurat_tp" ><?php echo $field['tp'] ?><input type="hidden" id="akurat_tp" value=<?php echo $field['tp'] ?> name='tp'/></td>
                         <td colspan="2" class="akurat_cp"><?php echo $field['cp'] ?><input type="hidden" id="akurat_cp" value=<?php echo $field['cp'] ?> name='cp'/></td>
                         <td colspan="2" class="akurat_p"><?php echo $field['p'] ?><input type="hidden" id="akurat_p" value=<?php echo $field['p'] ?> name='p'/></td>
                         <td colspan="2" class="akurat_sp"><?php echo $field['sp'] ?><input type="hidden" id="akurat_sp" value=<?php echo $field['sp'] ?> name='sp'/></td>
                     </tr>
                    <?php $i++;} ?>
                </tbody>
                <table>
                    <thead>
                      <span>Hasil klasifikasi pada atribut akurat, yaitu:</span>
                      <tr>
                        <!-- <th>No</th> -->
                        <th>jawaban</th>
                        <th >Sangat Tidak Puas</th>
                        <th >Tidak Puas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i=1;
                       foreach ($akurat_layanan as  $layanan){ ?>
                      <tr>
                           <!-- <td><?php echo $i ?></td> -->
                           <td ><?php echo $layanan['jawaban'] ?></td>
                           <td class="akurat_puas<?php echo $i ?>"><?php echo $layanan['puas'] ?></td>
                           <td class="akurat_tidak_puas<?php echo $i ?>"><?php echo $layanan['tidak_puas'] ?></td>
                      </tr>
                      <?php $i++;} ?>
                    </tbody>
                </table>
                <tfoot>
                    <tr>
                        <th colspan="2" scope="row">Entrophi</th>
                           <td colspan="2" class="akurat_en_stp"><input type="hidden" id="akurat_en_stp" value="" name='stp'/></td>
                           <td colspan="2" class="akurat_en_tp"><input type="hidden" id="akurat_en_tp" value="" name='tp'/></td>
                           <td colspan="2" class="akurat_en_cp"><input type="hidden" id="akurat_en_cp" value="" name='cp'/></td>
                           <td colspan="2" class="akurat_en_p"><input type="hidden" id="akurat_en_p" value="" name='p'/></td>
                           <td colspan="2" class="akurat_en_sp"><input type="hidden" id="akurat_en_sp" value="" name='sp'/></td>
                    </tr>
                    <tr>
                        <th colspan="2">Gain</th>
                           <td colspan="2" class="waktu_en_stp"><input type="hidden" id="akurat_en_stp" value="" name='stp'/></td>
                           <td colspan="2" class="waktu_en_tp"><input type="hidden" id="akurat_en_tp" value="" name='tp'/></td>
                           <td colspan="2" class="waktu_en_cp"><input type="hidden" id="akurat_en_cp" value="" name='cp'/></td>
                           <td colspan="2" class="waktu_en_p"><input type="hidden" id="akurat_en_p" value="" name='p'/></td>
                           <td colspan="2" class="waktu_en_sp"><input type="hidden" id="akurat_en_sp" value="" name='sp'/></td>
                    </tr>
                </tfoot>
                <!-- <tfoot>
                    <tr>
                        <th colspan="2" scope="row">Layanan</th>
                        <?php foreach ($waktu_layanan as  $layanan){ ?>
                          <?php if ($layanan['stp'] == false || $layanan['tp'] == false || $layanan['cp'] == false || $layanan['p'] == false || $layanan['sp'] == false ): ?>
                            <td  class="puas">Puas : 0<input type="hidden" class="puas" value="0" name='puas'/></td>
                            <td  class="tidak_puas" > Tidak Puas : 0<input type="hidden" class="tidak_puas" value="0"  name='tidak_puas'/></td>
                          <?php endif; ?>

                          <?php if ($layanan['stp'] !== false || $layanan['tp'] !== false || $layanan['cp'] !== false || $layanan['p'] !== false || $layanan['sp'] !== false ): ?>
                          <td  class="puas">Puas : <?php echo $layanan['puas'] ?><input type="hidden" class="puas" value=<?php echo $layanan['puas'] ?> name='puas'/></td>
                          <td  class="tidak_puas" > Tidak Puas : <?php echo $layanan['tidak_puas'] ?><input type="hidden" class="tidak_puas" value=<?php echo $layanan['tidak_puas'] ?>  name='tidak_puas'/></td>
                          <?php endif; ?>
                        <?php ;} ?>
                    </tr>
                </tfoot> -->
            </table>
          </div>
          <br/>
          <br/>


          <span><b>ATRIBUT FOKUS</b></span>
          <div class="table table-responsive">
            <table class="table table-bordered table-striped" id="">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Atribut</th>
                    <th colspan="2">Sangat Tidak Puas</th>
                    <th colspan="2">Tidak Puas</th>
                    <th colspan="2">Cukup Puas</th>
                    <th colspan="2">Puas</th>
                    <th colspan="2">Sangat Puas</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $i=1;
                     foreach ($fokus as  $field){ ?>
                     <tr>
                         <td><?php echo $i ?></td>
                         <td><?php echo $field['atribut'] ?><input type="hidden" value=<?php echo $field['atribut'] ?> name='atribut'/></td>
                         <td colspan="2" class="fokus_stp"><?php echo $field['stp'] ?><input type="hidden" id="fokus_stp" value=<?php echo $field['stp'] ?> name='stp'/></td>
                         <td colspan="2" class="fokus_tp" ><?php echo $field['tp'] ?><input type="hidden" id="fokus_tp" value=<?php echo $field['tp'] ?> name='tp'/></td>
                         <td colspan="2" class="fokus_cp"><?php echo $field['cp'] ?><input type="hidden" id="fokus_cp" value=<?php echo $field['cp'] ?> name='cp'/></td>
                         <td colspan="2" class="fokus_p"><?php echo $field['p'] ?><input type="hidden" id="fokus_p" value=<?php echo $field['p'] ?> name='p'/></td>
                         <td colspan="2" class="fokus_sp"><?php echo $field['sp'] ?><input type="hidden" id="fokus_sp" value=<?php echo $field['sp'] ?> name='sp'/></td>
                     </tr>
                    <?php $i++;} ?>
                </tbody>

                <table>
                    <thead>
                      <span>Hasil klasifikasi pada atribut fokus, yaitu:</span>
                      <tr>
                        <!-- <th>No</th> -->
                        <th>jawaban</th>
                        <th >Sangat Tidak Puas</th>
                        <th >Tidak Puas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i=1;
                       foreach ($fokus_layanan as  $layanan){ ?>
                      <tr>
                           <!-- <td><?php echo $i ?></td> -->
                           <td ><?php echo $layanan['jawaban'] ?></td>
                           <td class="waktu_puas<?php echo $i ?>"><?php echo $layanan['puas'] ?></td>
                           <td class="waktu_tidak_puas<?php echo $i ?>"><?php echo $layanan['tidak_puas'] ?></td>
                      </tr>
                      <?php $i++;} ?>
                    </tbody>
                </table>
                <tfoot>
                    <tr>
                        <th colspan="2" scope="row">Entrophi</th>
                           <td colspan="2" class="fokus_en_stp"><input type="hidden" class="fokus_en_stp" value="" name='stp'/></td>
                           <td colspan="2" class="fokus_en_tp"><input type="hidden" class="fokus_en_tp" value="" name='tp'/></td>
                           <td colspan="2" class="fokus_en_cp"><input type="hidden" class="fokus_en_cp" value="" name='cp'/></td>
                           <td colspan="2" class="fokus_en_p"><input type="hidden" class="fokus_en_p" value="" name='p'/></td>
                           <td colspan="2" class="fokus_en_sp"><input type="hidden" class="fokus_en_sp" value="" name='sp'/></td>
                    </tr>
                    <tr>
                        <th colspan="2">Gain</th>
                           <td colspan="2" class="fokus_en_stp"><input type="hidden" id="fokus_en_stp" value="" name='stp'/></td>
                           <td colspan="2" class="fokus_en_tp"><input type="hidden" id="fokus_en_tp" value="" name='tp'/></td>
                           <td colspan="2" class="fokus_en_cp"><input type="hidden" id="fokus_en_cp" value="" name='cp'/></td>
                           <td colspan="2" class="fokus_en_p"><input type="hidden" id="fokus_en_p" value="" name='p'/></td>
                           <td colspan="2" class="fokus_en_sp"><input type="hidden" id="fokus_en_sp" value="" name='sp'/></td>
                    </tr>
                    <tr>
                        <th colspan="2" scope="row">Entrophi</th>
                           <td colspan="2" class="fokus_en_stp"><input type="hidden" id="fokus_en_stp" value="" name='stp'/></td>
                           <td colspan="2" class="fokus_en_tp"><input type="hidden" id="fokus_en_tp" value="" name='tp'/></td>
                           <td colspan="2" class="fokus_en_cp"><input type="hidden" id="fokus_en_cp" value="" name='cp'/></td>
                           <td colspan="2" class="fokus_en_p"><input type="hidden" id="fokus_en_p" value="" name='p'/></td>
                           <td colspan="2" class="fokus_en_sp"><input type="hidden" id="fokus_en_sp" value="" name='sp'/></td>
                    </tr>

                </tfoot>
                <tfoot>

                </tfoot>
                <!-- <tfoot>
                    <tr>
                        <th colspan="2" scope="row">Layanan</th>
                        <?php foreach ($waktu_layanan as  $layanan){ ?>
                          <?php if ($layanan['stp'] == false || $layanan['tp'] == false || $layanan['cp'] == false || $layanan['p'] == false || $layanan['sp'] == false ): ?>
                            <td  class="puas">Puas : 0<input type="hidden" class="puas" value="0" name='puas'/></td>
                            <td  class="tidak_puas" > Tidak Puas : 0<input type="hidden" class="tidak_puas" value="0"  name='tidak_puas'/></td>
                          <?php endif; ?>

                          <?php if ($layanan['stp'] !== false || $layanan['tp'] !== false || $layanan['cp'] !== false || $layanan['p'] !== false || $layanan['sp'] !== false ): ?>
                          <td  class="puas">Puas : <?php echo $layanan['puas'] ?><input type="hidden" class="puas" value=<?php echo $layanan['puas'] ?> name='puas'/></td>
                          <td  class="tidak_puas" > Tidak Puas : <?php echo $layanan['tidak_puas'] ?><input type="hidden" class="tidak_puas" value=<?php echo $layanan['tidak_puas'] ?>  name='tidak_puas'/></td>
                          <?php endif; ?>
                        <?php ;} ?>
                    </tr>
                </tfoot> -->
            </table>
          </div>
          <br/><br/>

          <span><b>ATRIBUT KEPUASAN</b></span>
          <div class="table table-responsive">
              <!-- <p>Puas : <span><?php echo $waktu_puas ?><input type="hidden" class="waktu_puas" value="<?php echo $waktu_puas ?>" /></span></p> -->
              <!-- <p>Tidak Puas: <span><?php echo $waktu_tidak_puas ?><input type="hidden" class="waktu_tidak_puas" value="<?php echo $waktu_tidak_puas ?>" /></span></p> -->
              <table class="table table-bordered table-striped" id="">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Atribut</th>
                    <th colspan="2">Sangat Tidak Puas</th>
                    <th colspan="2">Tidak Puas</th>
                    <th colspan="2">Cukup Puas</th>
                    <th colspan="2">Puas</th>
                    <th colspan="2">Sangat Puas</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $i=1;
                     foreach ($kepuasan as  $field){ ?>
                     <tr>
                         <td><?php echo $i ?></td>
                         <td><?php echo $field['atribut'] ?><input type="hidden" value=<?php echo $field['atribut'] ?> name='atribut'/></td>
                         <td colspan="2" class="kepuasan_stp"><?php echo $field['stp'] ?><input type="hidden" id="kepuasan_stp" value=<?php echo $field['stp'] ?> name='stp'/></td>
                         <td colspan="2" class="kepuasan_tp" ><?php echo $field['tp'] ?><input type="hidden" id="kepuasan_tp" value=<?php echo $field['tp'] ?> name='tp'/></td>
                         <td colspan="2" class="kepuasan_cp"><?php echo $field['cp'] ?><input type="hidden" id="kepuasan_cp" value=<?php echo $field['cp'] ?> name='cp'/></td>
                         <td colspan="2" class="kepuasan_p"><?php echo $field['p'] ?><input type="hidden" id="kepuasan_p" value=<?php echo $field['p'] ?> name='p'/></td>
                         <td colspan="2" class="kepuasan_sp"><?php echo $field['sp'] ?><input type="hidden" id="kepuasan_sp" value=<?php echo $field['sp'] ?> name='sp'/></td>
                     </tr>
                    <?php $i++;} ?>
                </tbody>

                <table>
                    <thead>
                      <span><strong>Jika tidak ada nomor jawaban berarti tidak ada nasabah yang memilih jawaban tersebut di attribut Kepuasan</strong></span>
                      <tr>
                        <!-- <th>No</th> -->
                        <th>jawaban</th>
                        <th >Sangat Tidak Puas</th>
                        <th >Tidak Puas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i=1;
                       foreach ($kepuasan_layanan as  $layanan){ ?>
                      <tr>
                           <!-- <td><?php echo $i ?></td> -->
                           <td ><?php echo $layanan['jawaban'] ?></td>
                           <td class="waktu_puas<?php echo $i ?>"><?php echo $layanan['puas'] ?></td>
                           <td class="waktu_tidak_puas<?php echo $i ?>"><?php echo $layanan['tidak_puas'] ?></td>
                      </tr>
                      <?php $i++;} ?>
                    </tbody>
                </table>
                <!-- <tfoot>
                    <tr>
                        <th colspan="2" scope="row">Entrophi</th>
                           <td colspan="2" class="waktu_en_stp"><input type="hidden" class="waktu_en_stp" value="" name='stp'/></td>
                           <td colspan="2" class="waktu_en_tp"><input type="hidden" class="waktu_en_tp" value="" name='tp'/></td>
                           <td colspan="2" class="waktu_en_cp"><input type="hidden" class="waktu_en_cp" value="" name='cp'/></td>
                           <td colspan="2" class="waktu_en_p"><input type="hidden" class="waktu_en_p" value="" name='p'/></td>
                           <td colspan="2" class="waktu_en_sp"><input type="hidden" class="waktu_en_sp" value="" name='sp'/></td>
                    </tr>
                </tfoot> -->
                <!-- <tfoot>
                    <tr>
                        <th colspan="2" scope="row">Layanan</th>
                        <?php foreach ($waktu_layanan as  $layanan){ ?>
                          <?php if ($layanan['stp'] == false || $layanan['tp'] == false || $layanan['cp'] == false || $layanan['p'] == false || $layanan['sp'] == false ): ?>
                            <td  class="puas">Puas : 0<input type="hidden" class="puas" value="0" name='puas'/></td>
                            <td  class="tidak_puas" > Tidak Puas : 0<input type="hidden" class="tidak_puas" value="0"  name='tidak_puas'/></td>
                          <?php endif; ?>

                          <?php if ($layanan['stp'] !== false || $layanan['tp'] !== false || $layanan['cp'] !== false || $layanan['p'] !== false || $layanan['sp'] !== false ): ?>
                          <td  class="puas">Puas : <?php echo $layanan['puas'] ?><input type="hidden" class="puas" value=<?php echo $layanan['puas'] ?> name='puas'/></td>
                          <td  class="tidak_puas" > Tidak Puas : <?php echo $layanan['tidak_puas'] ?><input type="hidden" class="tidak_puas" value=<?php echo $layanan['tidak_puas'] ?>  name='tidak_puas'/></td>
                          <?php endif; ?>
                        <?php ;} ?>
                    </tr>
                </tfoot> -->
            </table>
          </div>
          <br/>
          <br/>



          <!-- HITUNG ATRIBUT WAKTU -->
          <table class="table table-bordered table-striped" id="waktu">
            <thead>
              <tr>
                <!-- <th>No</th> -->
                <th colspan="2">Atribut</th>
                <th colspan="2">Sangat Tidak Puas</th>
                <th colspan="2">Tidak Puas</th>
                <th colspan="2">Cukup Puas</th>
                <th colspan="2">Puas</th>
                <th colspan="2">Sangat Puas</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  // $i=1;
                 foreach ($waktu as  $field){ ?>
                 <tr>
                     <!-- <td><?php echo $i ?></td> -->
                     <td colspan="2"><b><?php echo $field['atribut'] ?><input type="hidden" value=<?php echo $field['atribut'] ?> name='atribut'/><b></td>
                     <td colspan="2" class="waktu_stp"><?php echo $field['stp'] ?><input type="hidden" id="waktu_stp" value=<?php echo $field['stp'] ?> name='stp'/></td>
                     <td colspan="2" class="waktu_tp" ><?php echo $field['tp'] ?><input type="hidden" id="waktu_tp" value=<?php echo $field['tp'] ?> name='tp'/></td>
                     <td colspan="2" class="waktu_cp"><?php echo $field['cp'] ?><input type="hidden" id="waktu_cp" value=<?php echo $field['cp'] ?> name='cp'/></td>
                     <td colspan="2" class="waktu_p"><?php echo $field['p'] ?><input type="hidden" id="waktu_p" value=<?php echo $field['p'] ?> name='p'/></td>
                     <td colspan="2" class="waktu_sp"><?php echo $field['sp'] ?><input type="hidden" id="waktu_sp" value=<?php echo $field['sp'] ?> name='sp'/></td>
                 </tr>
                <!-- <?php $i++;} ?> -->
            </tbody>
            <tfoot>
              <?php
                $i=1;
               foreach ($waktu as  $field){ ?>
                <tr>
                    <th colspan="2">Layanan</th>
                    <?php foreach ($waktu_layanan as  $layanan){ ?>
                      <?php if ($layanan['stp'] == false || $layanan['tp'] == false || $layanan['cp'] == false || $layanan['p'] == false || $layanan['sp'] == false ): ?>
                          <!-- <td  class="puas">Puas : 0 <input type="hidden" value="0" name='puas'/></td> -->
                          <!-- <td  class="tidak_puas" > Tidak Puas : 0 <input type="hidden" value="0"  name='tidak_puas'/></td> -->
                      <?php endif; ?>

                      <?php if ($layanan['stp'] !== false || $layanan['tp'] !== false || $layanan['cp'] !== false || $layanan['p'] !== false || $layanan['sp'] !== false ): ?>
                          <td  class="puas">Puas : <?php echo $layanan['puas'] ?><input type="hidden" value=<?php echo $layanan['puas'] ?> name='puas'/></td>
                          <td  class="tidak_puas" > Tidak Puas : <?php echo $layanan['tidak_puas'] ?><input type="hidden" value=<?php echo $layanan['tidak_puas'] ?> name='tidak_puas'/></td>
                      <?php endif; ?>
                    <?php ;} ?>
                </tr>
               <?php $i++;} ?>

               <tr>
                   <th colspan="2">Entrophi</th>
                      <td colspan="2" class="waktu_en_stp"><input type="hidden" class="waktu_en_stp" value="" name='stp'/></td>
                      <td colspan="2" class="waktu_en_tp"><input type="hidden" class="waktu_en_tp" value="" name='tp'/></td>
                      <td colspan="2" class="waktu_en_cp"><input type="hidden" class="waktu_en_cp" value="" name='cp'/></td>
                      <td colspan="2" class="waktu_en_p"><input type="hidden" class="waktu_en_p" value="" name='p'/></td>
                      <td colspan="2" class="waktu_en_sp"><input type="hidden" class="waktu_en_sp" value="" name='sp'/></td>
               </tr>

               <tr>
                   <th colspan="2">Gain</th>
                      <td colspan="2" class="waktu_en_stp"><input type="hidden" class="waktu_en_stp" value="" name='stp'/></td>
                      <td colspan="2" class="waktu_en_tp"><input type="hidden" class="waktu_en_tp" value="" name='tp'/></td>
                      <td colspan="2" class="waktu_en_cp"><input type="hidden" class="waktu_en_cp" value="" name='cp'/></td>
                      <td colspan="2" class="waktu_en_p"><input type="hidden" class="waktu_en_p" value="" name='p'/></td>
                      <td colspan="2" class="waktu_en_sp"><input type="hidden" class="waktu_en_sp" value="" name='sp'/></td>
               </tr>
            </tfoot>
          </table>
          </br>


          <!-- HITUNG ATRIBUT AKURAT -->
          <table class="table table-bordered table-striped" id="akurat">
            <tbody>
                  <?php
                    // $i=1;
                   foreach ($akurat as  $field){ ?>
                   <tr>
                       <!-- <td><?php echo $i ?></td> -->
                       <td colspan="2"><b><?php echo $field['atribut'] ?><input type="hidden" value=<?php echo $field['atribut'] ?> name='atribut'/></b></td>
                       <td colspan="2" class="akurat_stp"><?php echo $field['stp'] ?><input type="hidden" id="akurat_stp" value=<?php echo $field['stp'] ?> name='stp'/></td>
                       <td colspan="2" class="akurat_tp" ><?php echo $field['tp'] ?><input type="hidden" id="akurat_tp" value=<?php echo $field['tp'] ?> name='tp'/></td>
                       <td colspan="2" class="akurat_cp"><?php echo $field['cp'] ?><input type="hidden" id="akurat_cp" value=<?php echo $field['cp'] ?> name='cp'/></td>
                       <td colspan="2" class="akurat_p"><?php echo $field['p'] ?><input type="hidden" id="akurat_p" value=<?php echo $field['p'] ?> name='p'/></td>
                       <td colspan="2" class="akurat_sp"><?php echo $field['sp'] ?><input type="hidden" id="akurat_sp" value=<?php echo $field['sp'] ?> name='sp'/></td>
                   </tr>
                  <!-- <?php $i++;} ?> -->
              </tbody>
            <tfoot>
                <?php
                  $i=1;
                 foreach ($waktu as  $field){ ?>
                  <tr>
                      <th colspan="2" scope="row">Layanan</th>
                      <?php foreach ($akurat_layanan as  $layanan){ ?>
                        <?php if ($layanan['stp'] == false || $layanan['tp'] == false || $layanan['cp'] == false || $layanan['p'] == false || $layanan['sp'] == false ): ?>
                            <!-- <td  class="puas">Puas : 0 <input type="hidden" value="0" name='puas'/></td> -->
                            <!-- <td  class="tidak_puas" > Tidak Puas : 0 <input type="hidden" value="0"  name='tidak_puas'/></td> -->
                        <?php endif; ?>

                        <?php if ($layanan['stp'] !== false || $layanan['tp'] !== false || $layanan['cp'] !== false || $layanan['p'] !== false || $layanan['sp'] !== false ): ?>
                            <td  class="puas">Puas : <?php echo $layanan['puas'] ?><input type="hidden" value=<?php echo $layanan['puas'] ?> name='puas'/></td>
                            <td  class="tidak_puas" > Tidak Puas : <?php echo $layanan['tidak_puas'] ?><input type="hidden" value=<?php echo $layanan['tidak_puas'] ?>  name='tidak_puas'/></td>
                        <?php endif; ?>
                      <?php ;} ?>
                  </tr>
                 <?php $i++;} ?>

                 <tr>
                     <th colspan="2">Entrophi</th>
                        <td colspan="2" class="akurat_en_stp"><input type="hidden" id="akurat_en_stp" value="" name='stp'/></td>
                        <td colspan="2" class="akurat_en_tp"><input type="hidden" id="akurat_en_tp" value="" name='tp'/></td>
                        <td colspan="2" class="akurat_en_cp"><input type="hidden" id="akurat_en_cp" value="" name='cp'/></td>
                        <td colspan="2" class="akurat_en_p"><input type="hidden" id="akurat_en_p" value="" name='p'/></td>
                        <td colspan="2" class="akurat_en_sp"><input type="hidden" id="akurat_en_sp" value="" name='sp'/></td>
                 </tr>

                 <tr>
                     <th colspan="2">Gain</th>
                        <td colspan="2" class="akurat_en_stp"><input type="hidden" id="akurat_en_stp" value="" name='stp'/></td>
                        <td colspan="2" class="akurat_en_tp"><input type="hidden" id="akurat_en_tp" value="" name='tp'/></td>
                        <td colspan="2" class="akurat_en_cp"><input type="hidden" id="akurat_en_cp" value="" name='cp'/></td>
                        <td colspan="2" class="akurat_en_p"><input type="hidden" id="akurat_en_p" value="" name='p'/></td>
                        <td colspan="2" class="akurat_en_sp"><input type="hidden" id="akurat_en_sp" value="" name='sp'/></td>
                 </tr>
              </tfoot>
          </table>
          </br>


          <!-- HITUNG ATRIBUT FOKUS -->
          <table class="table table-bordered table-striped" id="fokus">
            <tbody>
                  <?php
                  // $i=1;
                     foreach ($fokus as  $field){ ?>
                     <tr>
                         <!-- <td><?php echo $i ?></td> -->
                         <td colspan="2"><b><?php echo $field['atribut'] ?><input type="hidden" value=<?php echo $field['atribut'] ?> name='atribut'/></b></td>
                         <td colspan="2" class="fokus_stp"><?php echo $field['stp'] ?><input type="hidden" id="fokus_stp" value=<?php echo $field['stp'] ?> name='stp'/></td>
                         <td colspan="2" class="fokus_tp" ><?php echo $field['tp'] ?><input type="hidden" id="fokus_tp" value=<?php echo $field['tp'] ?> name='tp'/></td>
                         <td colspan="2" class="fokus_cp"><?php echo $field['cp'] ?><input type="hidden" id="fokus_cp" value=<?php echo $field['cp'] ?> name='cp'/></td>
                         <td colspan="2" class="fokus_p"><?php echo $field['p'] ?><input type="hidden" id="fokus_p" value=<?php echo $field['p'] ?> name='p'/></td>
                         <td colspan="2" class="fokus_sp"><?php echo $field['sp'] ?><input type="hidden" id="fokus_sp" value=<?php echo $field['sp'] ?> name='sp'/></td>
                     </tr>
                    <!-- <?php $i++;} ?> -->
              </tbody>
            <tfoot>
                  <?php
                    $i=1;
                   foreach ($fokus as  $field){ ?>
                    <tr>
                        <th colspan="2" scope="row">Layanan</th>
                        <?php foreach ($akurat_layanan as  $layanan){ ?>
                          <?php if ($layanan['stp'] == false || $layanan['tp'] == false || $layanan['cp'] == false || $layanan['p'] == false || $layanan['sp'] == false ): ?>
                              <!-- <td  class="puas">Puas : 0 <input type="hidden" value="0" name='puas'/></td> -->
                              <!-- <td  class="tidak_puas" > Tidak Puas : 0 <input type="hidden" value="0"  name='tidak_puas'/></td> -->
                          <?php endif; ?>

                          <?php if ($layanan['stp'] !== false || $layanan['tp'] !== false || $layanan['cp'] !== false || $layanan['p'] !== false || $layanan['sp'] !== false ): ?>
                              <td  class="puas">Puas : <?php echo $layanan['puas'] ?><input type="hidden" value=<?php echo $layanan['puas'] ?> name='puas'/></td>
                              <td  class="tidak_puas" > Tidak Puas : <?php echo $layanan['tidak_puas'] ?><input type="hidden" value=<?php echo $layanan['tidak_puas'] ?>  name='tidak_puas'/></td>
                          <?php endif; ?>
                        <?php ;} ?>
                    </tr>
                   <?php $i++;} ?>

                   <tr>
                       <th colspan="2">Entrophi</th>
                          <td colspan="2" class="fokus_en_stp"><input type="hidden" id="fokus_en_stp" value="" name='stp'/></td>
                          <td colspan="2" class="fokus_en_tp"><input type="hidden" id="fokus_en_tp" value="" name='tp'/></td>
                          <td colspan="2" class="fokus_en_cp"><input type="hidden" id="fokus_en_cp" value="" name='cp'/></td>
                          <td colspan="2" class="fokus_en_p"><input type="hidden" id="fokus_en_p" value="" name='p'/></td>
                          <td colspan="2" class="fokus_en_sp"><input type="hidden" id="fokus_en_sp" value="" name='sp'/></td>
                   </tr>

                   <tr>
                       <th colspan="2">Gain</th>
                          <td colspan="2" class="fokus_en_stp"><input type="hidden" id="fokus_en_stp" value="" name='stp'/></td>
                          <td colspan="2" class="fokus_en_tp"><input type="hidden" id="fokus_en_tp" value="" name='tp'/></td>
                          <td colspan="2" class="fokus_en_cp"><input type="hidden" id="fokus_en_cp" value="" name='cp'/></td>
                          <td colspan="2" class="fokus_en_p"><input type="hidden" id="fokus_en_p" value="" name='p'/></td>
                          <td colspan="2" class="fokus_en_sp"><input type="hidden" id="fokus_en_sp" value="" name='sp'/></td>
                   </tr>
                </tfoot>
          </table>
          </br>


            <!-- HITUNG ATRIBUT KEPUASAN -->
          <table class="table table-bordered table-striped" id="kepuasan">
            <tbody>
                    <?php
                      // $i=1;
                     foreach ($kepuasan as  $field){ ?>
                     <tr>
                         <!-- <td><?php echo $i ?></td> -->
                         <td colspan="2"><b><?php echo $field['atribut'] ?><input type="hidden" value=<?php echo $field['atribut'] ?> name='atribut'/><b></td>
                         <td colspan="2" class="kepuasan_stp"><?php echo $field['stp'] ?><input type="hidden" id="kepuasan_stp" value=<?php echo $field['stp'] ?> name='stp'/></td>
                         <td colspan="2" class="kepuasan_tp" ><?php echo $field['tp'] ?><input type="hidden" id="kepuasan_tp" value=<?php echo $field['tp'] ?> name='tp'/></td>
                         <td colspan="2" class="kepuasan_cp"><?php echo $field['cp'] ?><input type="hidden" id="kepuasan_cp" value=<?php echo $field['cp'] ?> name='cp'/></td>
                         <td colspan="2" class="kepuasan_p"><?php echo $field['p'] ?><input type="hidden" id="kepuasan_p" value=<?php echo $field['p'] ?> name='p'/></td>
                         <td colspan="2" class="kepuasan_sp"><?php echo $field['sp'] ?><input type="hidden" id="kepuasan_sp" value=<?php echo $field['sp'] ?> name='sp'/></td>
                     </tr>
                    <!-- <?php $i++;} ?> -->
                </tbody>
            <tfoot>
                  <?php
                    $i=1;
                   foreach ($kepuasan as  $field){ ?>
                    <tr>
                        <th colspan="2" scope="row">Layanan</th>
                        <?php foreach ($waktu_layanan as  $layanan){ ?>
                          <?php if ($layanan['stp'] == false || $layanan['tp'] == false || $layanan['cp'] == false || $layanan['p'] == false || $layanan['sp'] == false ): ?>
                              <!-- <td  class="puas">Puas : 0 <input type="hidden" value="0" name='puas'/></td> -->
                              <!-- <td  class="tidak_puas" > Tidak Puas : 0 <input type="hidden" value="0"  name='tidak_puas'/></td> -->
                          <?php endif; ?>

                          <?php if ($layanan['stp'] !== false || $layanan['tp'] !== false || $layanan['cp'] !== false || $layanan['p'] !== false || $layanan['sp'] !== false ): ?>
                              <td  class="puas">Puas : <?php echo $layanan['puas'] ?><input type="hidden" value=<?php echo $layanan['puas'] ?> name='puas'/></td>
                              <td  class="tidak_puas" > Tidak Puas : <?php echo $layanan['tidak_puas'] ?><input type="hidden" value=<?php echo $layanan['tidak_puas'] ?>  name='tidak_puas'/></td>
                          <?php endif; ?>
                        <?php ;} ?>
                    </tr>
                   <?php $i++;} ?>

                   <tr>
                       <th colspan="2">Entrophi</th>
                          <td colspan="2" class="kepuasan_en_stp"><input type="hidden" id="kepuasan_en_stp" value="" name='stp'/></td>
                          <td colspan="2" class="kepuasan_en_tp"><input type="hidden" id="kepuasan_en_tp" value="" name='tp'/></td>
                          <td colspan="2" class="kepuasan_en_cp"><input type="hidden" id="kepuasan_en_cp" value="" name='cp'/></td>
                          <td colspan="2" class="kepuasan_en_p"><input type="hidden" id="kepuasan_en_p" value="" name='p'/></td>
                          <td colspan="2" class="kepuasan_en_sp"><input type="hidden" id="kepuasan_en_sp" value="" name='sp'/></td>
                   </tr>

                   <tr>
                       <th colspan="2">Gain</th>
                          <td colspan="2" class="kepuasan_en_stp"><input type="hidden" id="kepuasan_en_stp" value="" name='stp'/></td>
                          <td colspan="2" class="kepuasan_en_tp"><input type="hidden" id="kepuasan_en_tp" value="" name='tp'/></td>
                          <td colspan="2" class="kepuasan_en_cp"><input type="hidden" id="kepuasan_en_cp" value="" name='cp'/></td>
                          <td colspan="2" class="kepuasan_en_p"><input type="hidden" id="kepuasan_en_p" value="" name='p'/></td>
                          <td colspan="2" class="kepuasan_en_sp"><input type="hidden" id="kepuasan_en_sp" value="" name='sp'/></td>
                   </tr>
                </tfoot>
          </table>
          <br/>


        </div>
      </div>
    </div>
  </section>
</div>

<script src="<?php echo base_url()?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url()?>assets/asset/js/waktu.js"></script>
<script src="<?php echo base_url()?>assets/asset/js/fokus.js"></script>
<script src="<?php echo base_url()?>assets/asset/js/akurat.js"></script>
<script src="<?php echo base_url()?>assets/asset/js/kepuasan.js"></script>
<script type="text/javascript">
    // $('.entrophy').each({
    //   var jawaban = $('.jawaban').val();
    //   console.log(jawaban);
    //   var sp = $('.sp').val();
    //   var stp = $('.stp').val();
    //   var count = -(sp/jawaban)*Math.log2((sp/jawaban)) + -(stp/jawaban)*Math.log2((stp/jawaban));
    //   $this.val(count);
    // })
    var table;
    var save_method; //for save method string

    $(document).ready(function() {
      $('.entrophy').each(function(){
        var jawaban = $('.jawaban').val();
        console.log(jawaban);
        var sp = $('.all_puas').val();
        var stp = $('.all_tidak_puas').val();
        var count = -(sp/jawaban)*Math.log2((sp/jawaban)) + -(stp/jawaban)*Math.log2((stp/jawaban));
        $('#entrophy').val(count);
        $('.entrophy').html(count);
      });

      // waktu



      // akurat


    //tombol hitung algortima
    function hitung_algoritma()
    {
        save_method = 'add'; // sebagai kunci untuk menentukan dia save data / update data
        $('#form_create')[0].reset();
        $('#modal-create').modal('show'); // untuk menampilkan modal dengan memanggil id modal
        $('.modal-title').text('Hitung Algortima'); // untuk memberi judul pada modal
        $('.form-group').removeClass('has-error'); // untuk menampilkan pesan error / validasi pada modal
        $('.help-block').empty(); // untuk menampilkan pesan error / validasi pada modal

    }

    //datatables
      // table = $('#show_table').DataTable({
      //     "processing": true, //Feature control the processing indicator.
      //     "serverSide": true, //Feature control DataTables' server-side processing mode.
      //     // "pagination": true,
      //     "order": [], //Initial no order.
      //     // Load data for the table's content from an Ajax source
      //     "ajax": {
      //         "url": "<?php echo site_url('KLO_total/datatables')?>",
      //         "type": "POST"
      //     },
      //
      //     //Set column definition initialisation properties.
      //     "columnDefs": [
      //       {
      //           "targets": [0], //last column
      //           "orderable": false, //set not orderable
      //       },
      //     ],
      // });
      //
      // $('.datepicker').datepicker({
      //     autoclose: true,
      //     format: "yyyy-mm-dd",
      //     todayHighlight: true,
      //     orientation: "top auto",
      //     todayBtn: true,
      //     todayHighlight: true,
      // });
    });

    // function reload_table()
    // {
    //     table.ajax.reload(null,false); //reload datatable ajax
    //
    // }

    // function add_data()
    // {
    //     save_method = 'add'; // sebagai kunci untuk menentukan dia save data / update data
    //
    //     $('#form_create')[0].reset();
    //
    //     $('#modal-create').modal('show'); // untuk menampilkan modal dengan memanggil id modal
    //     $('.modal-title').text('Add Data'); // untuk memberi judul pada modal
    //
    //     $('.form-group').removeClass('has-error'); // untuk menampilkan pesan error / validasi pada modal
    //     $('.help-block').empty(); // untuk menampilkan pesan error / validasi pada modal
    //
    // }

    // function ajax_save()
    // {
    //     var url; // variable url
    //
    //     $('#btn_save').text('saving...'); //change button text
    //     $('#btn_save').attr('disabled',true); //set button disable
    //     // cek kondisi save method, jika save_method nya == add maka dia adalah tambah data
    //     // selain itu di anggap edit/update data
    //
    //     if(save_method == 'add') {
    //         url = "<?php echo site_url('KLO_total/tambah')?>"; // url untuk tambah data
    //     } else {
    //         url = "<?php echo site_url('KLO_total/update')?>"; // url untuk update data
    //     }
    //     var formData = new FormData($('#form_create')[0]); // untuk menampung hasil inputan yang di simpan untuk di kirim ke controller
    //
    //     $.ajax({
    //         url : url,
    //         type: "POST",
    //         data: formData,
    //         contentType : false,
    //         processData : false,
    //         dataType: "JSON",
    //         success: function(data)
    //         {
    //             // jika data berhasil disimpan
    //             if(data.status) //if success close modal and reload ajax table
    //             {
    //                 iziToast.success({ //tampilkan notif data berhasil disimpan pada posisi kanan bawah
    //                     title: 'Data Berhasil ditambahkan',
    //                     message: "<?php echo $this->session->flashdata('success'); ?>",
    //                     position: 'topRight'
    //                 });
    //
    //                 $('#modal-create').modal('hide'); // hidden kotak modal
    //                 reload_table(); // untuk reload table otomatis setelah tambah data
    //             }else{
    //
    //                 // ini untuk data yang tidak sesuai atau kena validasi
    //
    //                 for (var i = 0; i < data.inputerror.length; i++)
    //                 {
    //                     $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
    //                     $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
    //                 }
    //
    //             }
    //
    //             $('#btn_save').text('Save'); //change button text
    //             $('#btn_save').attr('disabled',false); //set button enable
    //         },
    //         error: function (jqXHR, textStatus, errorThrown)
    //         {
    //             // ini notif ketika data gagal di input atau gagal di update
    //
    //             iziToast.error({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
    //                     title: 'Data gagal disimpan/gagal diupdate',
    //                     message: "<?php echo $this->session->flashdata('success'); ?>",
    //                     position: 'topRight'
    //
    //             });
    //
    //             $('#btn_save').text('Save'); //change button text
    //             $('#btn_save').attr('disabled',false); //set button enable
    //
    //         }
    //     });
    // }
    //
    // function ajax_edit(id)
    // {
    //     save_method = 'update'; // variabel update
    //     $('#form_create')[0].reset(); // reset inputan pada form / kotak modal
    //     $('.form-group').removeClass('has-error'); // jika ada inputan yang tidak sesuai / validasi
    //     $('.help-block').empty(); // jika ada inputan yang tidak sesuai / validasi
    //
    //     $.ajax({
    //         url : "<?php echo site_url('KLO_total/edit')?>/" + id, // ini url edit data untuk meload data dari database(controller) ke view
    //         type: "GET",
    //         dataType: "JSON",
    //         success: function(data)
    //         {
    //
    //             // jika berhasil menampilkan data dari database
    //
    //             $('[name="id_kuisioner"]').val(data.id_kuisioner);
    //             $('[name="kuisioner"]').val(data.kuisioner);
    //
    //             $('#modal-create').modal('show'); // munculkan form/kotak modal
    //             $('.modal-title').text('Edit Data'); // judul form modal
    //
    //         },
    //         error: function (jqXHR, textStatus, errorThrown)
    //         {
    //
    //             // jika gagal menampilkan data dari database
    //
    //             iziToast.error({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
    //                     title: 'Gagal menampilkan data dari database',
    //                     message: "<?php echo $this->session->flashdata('success'); ?>",
    //                     position: 'topRight'
    //
    //             });
    //             // alert('Error get data from ajax');
    //         }
    //     });
    // }
    //
    //
    // function ajax_delete(id)
    // {
    //
    //     iziToast.question({
    //         timeout: 20000,
    //         close: false,
    //         overlay: true,
    //         displayMode: 'once',
    //         id: 'question',
    //         zindex: 999,
    //         title: 'Data Akan dihapus?',
    //         message: 'Jika sudah dihapus data tidak bisa dikembalikan !',
    //         position: 'center',
    //         buttons: [
    //             ['<button><b>Hapus</b></button>', function (instance, toast) {
    //                 $.ajax({
    //                     url : "<?php echo site_url('KLO_total/destroy')?>/"+id, // url untuk menghapus data dari controller
    //                     type: "POST",
    //                     dataType: "JSON",
    //                     success: function(data)
    //                     {
    //                         //jika berhasil di hapus
    //
    //                         iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
    //                                 title: 'Data berhasil dihapus',
    //                                 message: "<?php echo $this->session->flashdata('success'); ?>",
    //                                 position: 'topRight'
    //
    //                         });
    //                         $('#modal-create').modal('hide');
    //                         reload_table();
    //                     },
    //                     error: function (jqXHR, textStatus, errorThrown)
    //                     {
    //
    //                         //jika gagal di hapus
    //
    //                         iziToast.warning({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
    //                                 title: 'Data gagal dihapus',
    //                                 message: "<?php echo $this->session->flashdata('success'); ?>",
    //                                 position: 'topRight'
    //
    //                         });
    //                         // alert('Error deleting data');
    //                     }
    //                 });
    //
    //                 instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
    //
    //             }, true],
    //             ['<button>Batalkan</button>', function (instance, toast) {
    //
    //                 instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
    //
    //             }],
    //         ],
    //         onClosing: function(instance, toast, closedBy){
    //             console.info('Closing | closedBy: ' + closedBy);
    //         },
    //         onClosed: function(instance, toast, closedBy){
    //             console.info('Closed | closedBy: ' + closedBy);
    //         }
    //     });
    // }


</script>
