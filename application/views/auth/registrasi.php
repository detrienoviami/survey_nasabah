<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="google" content="notranslate">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAqElEQVRYR+2WYQ6AIAiF8W7cq7oXd6v5I2eYAw2nbfivYq+vtwcUgB1EPPNbRBR4Tby2qivErYRvaEnPAdyB5AAi7gCwvSUeAA4iis/TkcKl1csBHu3HQXg7KgBUegVA7UW9AJKeA6znQKULoDcDkt46bahdHtZ1Por/54B2xmuz0uwA3wFfd0Y3gDTjhzvgANMdkGb8yAyY/ro1d4H2y7R1DuAOTHfgAn2CtjCe07uwAAAAAElFTkSuQmCC">
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=<?= base_url('auth'); ?>>
              <!-- "javascript:void(0);"> -->
              Form Registrasi</a>
        </div>

        <form class="login-box-body" action="" method="post">
          <div class="form-group has-feedback">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control form-control-user" name="nama"  placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
            <small class="form-text text-danger ml-3"><?= form_error('nama'); ?></small>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <label for="username">Username</label>
            <input type="text" class="form-control form-control-user" name="username"  placeholder="Username" value="<?= set_value('username'); ?>">
            <small class="form-text text-danger ml-3"><?= form_error('username'); ?></small>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <!-- <div class="form-group has-feedback">
              <label for="level">Level</label>
              <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1"
              tabindex="-1" aria-hidden="true" value="<?= set_value('level'); ?>">
                    <option selected="selected" data-select2-id="3">- Pilih -</option>
                    <option data-select2-id="33">KLO</option>
                    <option data-select2-id="34">Pimpinan</option>
                    <option data-select2-id="35">Teller</option>
                    <option data-select2-id="36">CSO</option>
                  </select>
          </div> -->
          <div class="form-group has-feedback">
            <label for="password1">Password</label>
            <input type="password" class="form-control form-control-user" name="password1" placeholder="Password">
            <small class="form-text text-danger ml-3"><?= form_error('password1'); ?></small>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="password2">Ulangi Password</label>
            <input type="password" class="form-control form-control-user" name="password2" placeholder="Password">
            <small class="form-text text-danger ml-3"><?= form_error('password2'); ?></small>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
              <div class="col-xs-8">
              </div>
              <div class="col-xs-4">
                  <input type="submit" name="daftar" value="Daftar" class="btn btn-primary btn-block btn-flat">
              </div>
          </div>
        </form>
    </div>

    <script src="<?= base_url('assets/'); ?>frameworks/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>frameworks/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/icheck/js/icheck.min.js"></script>
    <script>
        $(function(){
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
  </body>
</html>
