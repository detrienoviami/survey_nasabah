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
          <div style="float: right;">
              <button type="button" data-toggle="modal" data-target="#cetak_laporan" class="btn btn-sm btn-primary" onclick="cetak_laporan()">
              <i class="fa fa-print"></i>  Cetak Laporan</button>
          </div>
          <div class="table table-responsive">
            <!-- <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                    <label for="tgl_awal">Dari Tanggal</label>
                    <input type="date" class="form-control" id="min" name="min" placeholder="">
                    <span class="help-block text-danger"></span>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                    <label for="tgl_akhir">Sampai Tanggal</label>
                    <input type="date" class="form-control" id="max" name="max" placeholder="">
                    <span class="help-block text-danger"></span>
                </div>
              </div>
              <div class="align-self-center">
                <button type="button" data-toggle="modal" data-target="#cetak_laporan" class="btn btn-sm btn-primary" onclick="cetak_laporan()">
                <i class="fa fa-print"></i>  Cetak Laporan</button>
              </div>
            </div> -->

              <table class="table table-bordered table-striped" id="kuisioner_result">
                <thead>
                  <tr>
                    <th>No</th>
                    <!-- <th>ID Kuisioner Result</th> -->
                    <!-- <th>Kode Survey</th> -->
                    <th>Nomor Kuisioner</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No Handphone</th>
                    <th>Jawaban</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Pengisian</th>
                  </tr>
                </thead>
              </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="cetak_laporan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
          <h5 class="modal-title">
              <span class="fw-mediumbold">Cetak Laporan</span>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form_create" class="form_create" action="KLO_laporan.php" target="_blank">
          <input type="hidden" class="form-control" id="id_user" name="id_user">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                  <label for="tgl_awal">Dari Tanggal</label>
                  <input type="date" class="form-control" id="min" name="min" placeholder="">
                  <span class="help-block text-danger"></span>
              </div>
              <div class="form-group">
                  <label for="tgl_akhir">Sampai Tanggal</label>
                  <input type="date" class="form-control" id="max" name="max" placeholder="">
                  <span class="help-block text-danger"></span>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer no-bd">
          <button type="button" class="btn btn-sm btn-primary" id="btn_cetak_laporan" onclick="ajax_cetak_laporan()">Download</button>
      </div>
    </div>
  </div>
</div>

      <script src="<?php echo base_url()?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
      <script src="<?php echo base_url()?>assets/asset/pdf/dist/html2pdf.bundle.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
      <script type="text/javascript">

      var table;
      var save_method;

      var minDate, maxDate;

      // Custom filtering function which will search data in column four between two values
      $.fn.dataTable.ext.search.push(
          function( settings, data, dataIndex ) {
              var min = minDate.val();
              var max = maxDate.val();
              var date = new Date( data[4] );

              if (
                  ( min === null && max === null ) ||
                  ( min === null && date <= max ) ||
                  ( min <= date   && max === null ) ||
                  ( min <= date   && date <= max )
              ) {
                  return true;
              }
              return false;
          }
      );

      $(document).ready(function() {
        minDate = new DateTime($('#min'), {
          format:"yyyy-mm-dd",
        });
        maxDate = new DateTime($('#max'), {
            format: "yyyy-mm-dd",
        });
      //datatables
      table = $('#kuisioner_result').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": {
              "url": "<?php echo site_url('KLO_jawaban/datatables')?>",
              "type": "POST"
          },

          //Set column definition initialisation properties.
          "columnDefs": [
            {
                "targets": [0], //last column
                "orderable": false, //set not orderable
            },
          ],

      });

      $('.datepicker').datepicker({
          autoclose: true,
          format: "yyyy-mm-dd",
          todayHighlight: true,
          orientation: "top auto",
          todayBtn: true,
          todayHighlight: true,
      });



      // DataTables initialisation

      // Refilter the table
      $('#min, #max').on('change', function () {
        //Destroy the old Datatable
          table.clear().destroy();
          table.draw();
          console.log('aaaaaa');
          //table.rows().invalidate().draw();
          //$('#kuisioner_result').DataTable().ajax.reload();
      });
      // table.draw();

});

  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax
  }



</script>
