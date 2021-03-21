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
          <br><br>
          <div class="table table-responsive">
              <table class="table table-bordered table-striped" id="kuisioner_result">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Kuisioner Result</th>
                    <th>Kode Survey</th>
                    <th>Nomor Kuisioner</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No Handphone</th>
                    <th>ID Kuisioner</th>
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

      <script src="<?php echo base_url()?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
      <script type="text/javascript">

      var table;
      var save_method;

      $(document).ready(function() {

      //datatables
      table = $('#kuisioner_result').DataTable({
          "processing": true,
          "serverSide": true,
          "order": [],
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
});

  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax
  }

</script>
