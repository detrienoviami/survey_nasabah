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
              <button type="button" class="btn btn-sm btn-primary" id="btn_add" onclick="add_data()"><i class="fa fa-plus"></i>Tambah Data</button>
          </div>
          <br><br>
          <div class="table table-responsive">
              <table class="table table-bordered table-striped" id="show_table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Atribut</th>
                    <th>Atribut</th>
                    <th>Nilai Atribut</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
          <h5 class="modal-title">
              <span class="fw-mediumbold">Tambah Data Atribut</span>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form_create" class="form_create">
          <input type="hidden" class="form-control" id="id_atribut" name="id_atribut">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                  <label for="id_atribut">Id Atribut</label>
                  <input type="text" class="form-control" id="id_atribut" name="id_atribut" placeholder="Id Atribut">
                  <span class="help-block text-danger"></span>
              </div>
              <div class="form-group">
                  <label for="atribut">Atribut</label>
                  <input type="text" class="form-control" id="atribut" name="atribut" placeholder="Atribut">
                  <span class="help-block text-danger"></span>
              </div>
              <div class="form-group">
                  <label for="nilai_atribut">Nilai Atribut</label>
                  <input type="number" class="form-control" id="nilai_atribut" name="nilai_atribut" placeholder="Nilai Atribut">
                  <span class="help-block text-danger"></span>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer no-bd">
          <button type="button" class="btn btn-sm btn-primary" id="btn_save" onclick="ajax_save()">Save</button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url()?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">

var table;
var save_method; //for save method string
// var base_url = '<?php echo base_url();?>';

$(document).ready(function() {
//datatables
table = $('#show_table').DataTable({
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    // "pagination": true,
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": "<?php echo site_url('KLO_atribut/datatables')?>",
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

function add_data()
{
    save_method = 'add'; // sebagai kunci untuk menentukan dia save data / update data

    $('#form_create')[0].reset();

    $('#modal-create').modal('show'); // untuk menampilkan modal dengan memanggil id modal
    $('.modal-title').text('Add Data'); // untuk memberi judul pada modal

    $('.form-group').removeClass('has-error'); // untuk menampilkan pesan error / validasi pada modal
    $('.help-block').empty(); // untuk menampilkan pesan error / validasi pada modal

}

function ajax_save()
{
    var url; // variable url

    $('#btn_save').text('saving...'); //change button text
    $('#btn_save').attr('disabled',true); //set button disable
    // cek kondisi save method, jika save_method nya == add maka dia adalah tambah data
    // selain itu di anggap edit/update data

    if(save_method == 'add') {
        url = "<?php echo site_url('KLO_atribut/tambah')?>"; // url untuk tambah data
    } else {
        url = "<?php echo site_url('KLO_atribut/update')?>"; // url untuk update data
    }
    var formData = new FormData($('#form_create')[0]); // untuk menampung hasil inputan yang di simpan untuk di kirim ke controller

    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType : false,
        processData : false,
        dataType: "JSON",
        success: function(data)
        {
            // jika data berhasil disimpan
            if(data.status) //if success close modal and reload ajax table
            {
                iziToast.success({ //tampilkan notif data berhasil disimpan pada posisi kanan bawah
                    title: 'Data Berhasil ditambahkan',
                    message: "<?php echo $this->session->flashdata('success'); ?>",
                    position: 'topRight'
                });

                $('#modal-create').modal('hide'); // hidden kotak modal
                reload_table(); // untuk reload table otomatis setelah tambah data
            }else{

                // ini untuk data yang tidak sesuai atau kena validasi

                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }

            }

            $('#btn_save').text('Save'); //change button text
            $('#btn_save').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // ini notif ketika data gagal di input atau gagal di update

            iziToast.error({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                    title: 'Data gagal disimpan/gagal diupdate',
                    message: "<?php echo $this->session->flashdata('success'); ?>",
                    position: 'topRight'

            });

            $('#btn_save').text('Save'); //change button text
            $('#btn_save').attr('disabled',false); //set button enable

        }
    });
}

function ajax_edit(id)
{
    save_method = 'update'; // variabel update
    $('#form_create')[0].reset(); // reset inputan pada form / kotak modal
    $('.form-group').removeClass('has-error'); // jika ada inputan yang tidak sesuai / validasi
    $('.help-block').empty(); // jika ada inputan yang tidak sesuai / validasi

    $.ajax({
        url : "<?php echo site_url('KLO_atribut/edit')?>/" + id, // ini url edit data untuk meload data dari database(controller) ke view
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            // jika berhasil menampilkan data dari database

            $('[name="id_atribut"]').val(data.id_atribut);
            $('[name="atribut"]').val(data.atribut);
            $('[name="nilai_atribut"]').val(data.nilai_atribut);

            $('#modal-create').modal('show'); // munculkan form/kotak modal
            $('.modal-title').text('Edit Data'); // judul form modal

        },
        error: function (jqXHR, textStatus, errorThrown)
        {

            // jika gagal menampilkan data dari database

            iziToast.error({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                    title: 'Gagal menampilkan data dari database',
                    message: "<?php echo $this->session->flashdata('success'); ?>",
                    position: 'topRight'

            });
            // alert('Error get data from ajax');
        }
    });
}


function ajax_delete(id)
{

    iziToast.question({
        timeout: 20000,
        close: false,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        title: 'Data Akan dihapus?',
        message: 'Jika sudah dihapus data tidak bisa dikembalikan !',
        position: 'center',
        buttons: [
            ['<button><b>Hapus</b></button>', function (instance, toast) {
                $.ajax({
                    url : "<?php echo site_url('KLO_atribut/destroy')?>/"+id, // url untuk menghapus data dari controller
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        //jika berhasil di hapus

                        iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data berhasil dihapus',
                                message: "<?php echo $this->session->flashdata('success'); ?>",
                                position: 'topRight'

                        });
                        $('#modal-create').modal('hide');
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {

                        //jika gagal di hapus

                        iziToast.warning({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data gagal dihapus',
                                message: "<?php echo $this->session->flashdata('success'); ?>",
                                position: 'topRight'

                        });
                        // alert('Error deleting data');
                    }
                });

                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

            }, true],
            ['<button>Batalkan</button>', function (instance, toast) {

                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

            }],
        ],
        onClosing: function(instance, toast, closedBy){
            console.info('Closing | closedBy: ' + closedBy);
        },
        onClosed: function(instance, toast, closedBy){
            console.info('Closed | closedBy: ' + closedBy);
        }
    });
}


</script>
