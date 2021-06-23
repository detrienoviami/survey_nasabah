<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="google" content="notranslate">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="javascript:void(0);">Selamat Datang di Sistem Survey Layanan</a>
        </div>
        <p class="login-box-msg"><?= $this->session->flashdata('message');?></p>
    <!-- <div class="login-box">
        <div class="login-logo">
            <a href="javascript:void(0);">Selamat Datang di Sistem Survey Layanan</a>
        </div>
        <form class="login-box-body" action="" method="post">
            <p class="login-box-msg"><?= $this->session->flashdata('message');?></p>
            <div class="form-group has-feedback">
                <input type="text" name="username" value="" id="username" class="form-control" placeholder="Your username">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" value="" id="password" class="form-control" placeholder="Your password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck col-xs-8">
                        <label>
                            <div class="icheckbox_square-blue" style="position: relative;">
                              <input type="checkbox" name="remember" value="1" class="checkbox" id="remember" />
                              <ins class="iCheck-helper"></ins>
                              Remember me
                            </div>
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <input type="submit" name="login" value="Login" class="btn btn-primary float-right">
                </div>
            </div>
            <p>Tidak punya akun?
                <a href="<?= base_url('auth/registrasi'); ?>">Buat Akun</a>
            </p>
          </form>
    </div> -->

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Login Aplikasi</h3>
      </div>
      <form class="login-box-body" action="" method="post">
        <div class="card-body">
          <div class="form-group row">
            <label for="Username" class="col-sm-4 col-form-label">Username</label>
            <div class="col-sm-8">
              <input type="text" name="username" value="" id="username" class="form-control" placeholder="Your Username">
            </div>
          </div>
          <div class="form-group row">
            <label for="Password" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
              <input type="password" name="password" value="" id="password" class="form-control" placeholder="Your Password">
            </div>
          </div>
            <button type="submit" name="login" value="Login" class="btn btn-primary float-right">Sign in</button>
          </div>
          <div class="col-sm-10">
            <p>Belum punya akun?
                <a href="<?= base_url('auth_registrasi'); ?>">Buat Akun</a>
            </p>
          </div>
        </div>
      </form>
    </div>



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
