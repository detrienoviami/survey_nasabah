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
                            <td colspan="5" class="text-center"><?php echo $gain ?><input type="hidden" value="<?php echo $gain ?>" name='gain'/></td>
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
                     <td><?php echo $field['atribut'] ?></td>
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
                  <td colspan="10" class="waktu_gain"><input type="hidden" id="waktu_gain" value="" name="waktu_gain"/></td>
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
          </table>
          <table class="table table-bordered table-striped">
              <thead>
                  <span>Hasil klasifikasi penilaian pada atribut waktu:</span>
                  <tr>
                    <!-- <th>No</th> -->
                    <th>jawaban</th>
                    <th >Sangat Puas</th>
                    <th >Tidak Puas</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  $i=1;
                 foreach ($waktu_layanan as  $layanan){ ?>
                <tr>
                     <!-- <td><?php echo $i ?></td> -->
                     <td ><?php echo $layanan['jawaban'] ?></td>
                     <td class="waktu_puas<?php echo $i ?>"><?php echo $layanan['puas'] ?>
                       <input type="hidden" id="waktu_puas<?php echo $i ?>" name="" value="<?php echo $layanan['puas'] ?>"/>
                     </td>
                     <td class="waktu_tidak_puas<?php echo $i ?>"><?php echo $layanan['tidak_puas'] ?>
                       <input type="hidden" id="waktu_tidak_puas<?php echo $i ?>"  name="" value="<?php echo $layanan['tidak_puas'] ?>"/>
                     </td>
                </tr>
                <?php $i++;} ?>
              </tbody>
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
                     <td><?php echo $field['atribut'] ?></td>
                     <td colspan="2" class="akurat_stp"><?php echo $field['stp'] ?><input type="hidden" id="akurat_stp" value=<?php echo $field['stp'] ?> name='stp'/></td>
                     <td colspan="2" class="akurat_tp" ><?php echo $field['tp'] ?><input type="hidden" id="akurat_tp" value=<?php echo $field['tp'] ?> name='tp'/></td>
                     <td colspan="2" class="akurat_cp"><?php echo $field['cp'] ?><input type="hidden" id="akurat_cp" value=<?php echo $field['cp'] ?> name='cp'/></td>
                     <td colspan="2" class="akurat_p"><?php echo $field['p'] ?><input type="hidden" id="akurat_p" value=<?php echo $field['p'] ?> name='p'/></td>
                     <td colspan="2" class="akurat_sp"><?php echo $field['sp'] ?><input type="hidden" id="akurat_sp" value=<?php echo $field['sp'] ?> name='sp'/></td>
                 </tr>
                <?php $i++;} ?>

            </tbody>
            <tfoot>
              <tr>
                  <th colspan="2">Gain</th>
                  <td colspan="10" class="akurat_gain"><input type="hidden" id="akurat_gain" value="" name="akurat_gain"/></td>
              </tr>
            </tfoot>
            <tfoot>
              <tr>
                  <th colspan="2">Entrophi</th>
                     <td colspan="2" class="akurat_en_stp"><input type="hidden" id="akurat_en_stp" value="" name='stp'/></td>
                     <td colspan="2" class="akurat_en_tp"><input type="hidden" id="akurat_en_tp" value="" name='tp'/></td>
                     <td colspan="2" class="akurat_en_cp"><input type="hidden" id="akurat_en_cp" value="" name='cp'/></td>
                     <td colspan="2" class="akurat_en_p"><input type="hidden" id="akurat_en_p" value="" name='p'/></td>
                     <td colspan="2" class="akurat_en_sp"><input type="hidden" id="akurat_en_sp" value="" name='sp'/></td>
              </tr>
            </tfoot>
          </table>
          <table class="table table-bordered table-striped">
              <thead>
                  <span>Hasil klasifikasi penilaian pada atribut akurat:</span>
                  <tr>
                    <!-- <th>No</th> -->
                    <th>jawaban</th>
                    <th >Sangat Puas</th>
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
                     <td class="akurat_puas<?php echo $i ?>"><?php echo $layanan['puas'] ?>
                       <input type="hidden" id="akurat_puas<?php echo $i ?>" name="" value="<?php echo $layanan['puas'] ?>"/>
                     </td>
                     <td class="akurat_tidak_puas<?php echo $i ?>"><?php echo $layanan['tidak_puas'] ?>
                       <input type="hidden" id="akurat_tidak_puas<?php echo $i ?>"  name="" value="<?php echo $layanan['tidak_puas'] ?>"/>
                     </td>
                </tr>
                <?php $i++;} ?>
              </tbody>
          </table>
        </div>
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
                     <td><?php echo $field['atribut'] ?></td>
                     <td colspan="2" class="fokus_stp"><?php echo $field['stp'] ?><input type="hidden" id="fokus_stp" value=<?php echo $field['stp'] ?> name='stp'/></td>
                     <td colspan="2" class="fokus_tp" ><?php echo $field['tp'] ?><input type="hidden" id="fokus_tp" value=<?php echo $field['tp'] ?> name='tp'/></td>
                     <td colspan="2" class="fokus_cp"><?php echo $field['cp'] ?><input type="hidden" id="fokus_cp" value=<?php echo $field['cp'] ?> name='cp'/></td>
                     <td colspan="2" class="fokus_p"><?php echo $field['p'] ?><input type="hidden" id="fokus_p" value=<?php echo $field['p'] ?> name='p'/></td>
                     <td colspan="2" class="fokus_sp"><?php echo $field['sp'] ?><input type="hidden" id="fokus_sp" value=<?php echo $field['sp'] ?> name='sp'/></td>
                 </tr>
                <?php $i++;} ?>

            </tbody>
            <tfoot>
              <tr>
                  <th colspan="2">Gain</th>
                  <td colspan="10" class="fokus_gain"><input type="hidden" id="fokus_gain" value="" name="fokus_gain"/></td>
              </tr>
            </tfoot>
            <tfoot>
              <tr>
                  <th colspan="2">Entrophi</th>
                     <td colspan="2" class="fokus_en_stp"><input type="hidden" id="fokus_en_stp" value="" name='stp'/></td>
                     <td colspan="2" class="fokus_en_tp"><input type="hidden" id="fokus_en_tp" value="" name='tp'/></td>
                     <td colspan="2" class="fokus_en_cp"><input type="hidden" id="fokus_en_cp" value="" name='cp'/></td>
                     <td colspan="2" class="fokus_en_p"><input type="hidden" id="fokus_en_p" value="" name='p'/></td>
                     <td colspan="2" class="fokus_en_sp"><input type="hidden" id="fokus_en_sp" value="" name='sp'/></td>
              </tr>
            </tfoot>
          </table>
          <table class="table table-bordered table-striped">
              <thead>
                  <span>Hasil klasifikasi penilaian pada atribut fokus:</span>
                  <tr>
                    <!-- <th>No</th> -->
                    <th>jawaban</th>
                    <th >Sangat Puas</th>
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
                     <td class="fokus_puas<?php echo $i ?>"><?php echo $layanan['puas'] ?>
                       <input type="hidden" id="fokus_puas<?php echo $i ?>" name="" value="<?php echo $layanan['puas'] ?>"/>
                     </td>
                     <td class="fokus_tidak_puas<?php echo $i ?>"><?php echo $layanan['tidak_puas'] ?>
                       <input type="hidden" id="fokus_tidak_puas<?php echo $i ?>"  name="" value="<?php echo $layanan['tidak_puas'] ?>"/>
                     </td>
                </tr>
                <?php $i++;} ?>
              </tbody>
          </table>
        </div>
        <br/>

        <span><b>ATRIBUT KEPUASAN</b></span>
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
                 foreach ($kepuasan as  $field){ ?>
                 <tr>
                     <td><?php echo $i ?></td>
                     <td><?php echo $field['atribut'] ?></td>
                     <td colspan="2" class="kepuasan_stp"><?php echo $field['stp'] ?><input type="hidden" id="kepuasan_stp" value=<?php echo $field['stp'] ?> name='stp'/></td>
                     <td colspan="2" class="kepuasan_tp" ><?php echo $field['tp'] ?><input type="hidden" id="kepuasan_tp" value=<?php echo $field['tp'] ?> name='tp'/></td>
                     <td colspan="2" class="kepuasan_cp"><?php echo $field['cp'] ?><input type="hidden" id="kepuasan_cp" value=<?php echo $field['cp'] ?> name='cp'/></td>
                     <td colspan="2" class="kepuasan_p"><?php echo $field['p'] ?><input type="hidden" id="kepuasan_p" value=<?php echo $field['p'] ?> name='p'/></td>
                     <td colspan="2" class="kepuasan_sp"><?php echo $field['sp'] ?><input type="hidden" id="kepuasan_sp" value=<?php echo $field['sp'] ?> name='sp'/></td>
                 </tr>
                <?php $i++;} ?>

            </tbody>
            <tfoot>
              <tr>
                  <th colspan="2">Gain</th>
                  <td colspan="10" class="kepuasan_gain"><input type="hidden" id="kepuasan_gain" value="" name="kepuasan_gain"/></td>
              </tr>
            </tfoot>
            <tfoot>
              <tr>
                  <th colspan="2">Entrophi</th>
                     <td colspan="2" class="kepuasan_en_stp"><input type="hidden" id="kepuasan_en_stp" value="" name='stp'/></td>
                     <td colspan="2" class="kepuasan_en_tp"><input type="hidden" id="kepuasan_en_tp" value="" name='tp'/></td>
                     <td colspan="2" class="kepuasan_en_cp"><input type="hidden" id="kepuasan_en_cp" value="" name='cp'/></td>
                     <td colspan="2" class="kepuasan_en_p"><input type="hidden" id="kepuasan_en_p" value="" name='p'/></td>
                     <td colspan="2" class="kepuasan_en_sp"><input type="hidden" id="kepuasan_en_sp" value="" name='sp'/></td>
              </tr>
            </tfoot>
          </table>
          <table class="table table-bordered table-striped">
              <thead>
                  <span>Hasil klasifikasi penilaian pada atribut waktu:</span>
                  <tr>
                    <!-- <th>No</th> -->
                    <th>jawaban</th>
                    <th >Sangat Puas</th>
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
                     <td class="kepuasan_puas<?php echo $i ?>"><?php echo $layanan['puas'] ?>
                       <input type="hidden" id="kepuasan_puas<?php echo $i ?>" name="" value="<?php echo $layanan['puas'] ?>"/>
                     </td>
                     <td class="kepuasan_tidak_puas<?php echo $i ?>"><?php echo $layanan['tidak_puas'] ?>
                       <input type="hidden" id="kepuasan_tidak_puas<?php echo $i ?>"  name="" value="<?php echo $layanan['tidak_puas'] ?>"/>
                     </td>
                </tr>
                <?php $i++;} ?>
              </tbody>
          </table>
        </div>
        <br/>
        <br/>

        <span>Gain Keseluruhan : <span class="all_gain"></span><input type="hidden" id="all_gain" value="" name="all_gain"/></span>
        <br/>
        <span>Kesimpulan : <span class="all_kesimpulan"></span><input type="hidden" id="all_kesimpulan" value="" name="all_gain"/></span>
        <br/>

        </div>
      </div>
    </div>
  </section>
</div>

<script src="<?php echo base_url()?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url()?>assets/asset/js/waktu.js"></script>
<script src="<?php echo base_url()?>assets/asset/js/akurat.js"></script>
<script src="<?php echo base_url()?>assets/asset/js/fokus.js"></script>
<script src="<?php echo base_url()?>assets/asset/js/kepuasan.js"></script>
<script src="<?php echo base_url()?>assets/asset/js/all_gain.js"></script>
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
        var count = (-(sp/jawaban)*Math.log2(sp/jawaban)) + (-(stp/jawaban)*Math.log2(stp/jawaban));
        $('#entrophy').val(count);
        $('.entrophy').html(count);
      });



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
});


</script>
