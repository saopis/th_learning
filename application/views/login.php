<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/fonts.googleapis.Material+Icons.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
  
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main-vali.css">
  <style>
    .login-content .login-box.flipped{
      min-height: 570px;
      margin-bottom: 50px;
    }
    .login-content .login-box{
      min-height: 420px;
    }
    .btn{
      padding: 10px !important;
      font-weight: normal;
    }
    @media (max-width: 756px) {
      h1{
        font-size: 28px !important;
      }
      h2{
        font-size: 24px !important;
      }
      h3{
        font-size: 22px !important;
      }
    }
  </style>
  <title>Login - Vali Admin</title>
</head>
<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1 class="w-100 text-center pt-2">ระบบสื่อการเรียนการสอนออนไลน์วิชาภาษาไทย</h1>
    </div>
    <div class="login-box">
      <form class="login-form" method="post" action="<?php echo current_url(); ?>">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>เข้าสู่ระบบ</h3>
        <div class="form-group">
          <label class="control-label">ชื่อผู้ใช้</label>
          <input class="form-control" name="u_name" type="text" placeholder="ชื่อผู้ใช้ในการเข้าสู่ระบบ" autofocus>
        </div>
        <div class="form-group">
          <label class="control-label">รหัสผ่าน</label>
          <input class="form-control" name="u_pwd" type="password" placeholder="รหัสผ่านในการเข้าสู่ระบบ">
          <input type="hidden" name="action" value="login">
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>เข้าสู่ระบบ</button>
          <button class="btn btn-outline-primary btn-block" data-toggle="flip"><i class="fa fa-users fa-lg fa-fw"></i>ลงทะเบียนเป็นสมาชิก</button>
        </div>
        <div class="m-2">
          <p class="semibold-text mb-2"><a href="<?php echo base_url(); ?>"><i class="fa fa-angle-left fa-fw"></i>กลับไปหน้าหลัก</a></p>
        </div>
      </form>
      <form class="forget-form"  method="post" action="<?php echo current_url(); ?>">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>ลงทะเบียนเป็นสมาชิก</h3>
        <div class="form-group">
          <label class="control-label">ชื่อ</label>
          <input class="form-control" name="f_name" type="text" placeholder="ชื่อ">
          <input type="hidden" name="action" value="register">
        </div>
        <div class="form-group">
          <label class="control-label">สกุล</label>
          <input class="form-control" name="l_name" type="text" placeholder="นามสกุล">
        </div>
        <div class="form-group">
          <label class="control-label">ชื่อผู้ใช้</label>
          <input class="form-control" name="u_name" type="text" placeholder="ชื่อผู้ใช้ในการเข้าสู่ระบบ">
        </div>
        <div class="form-group">
          <label class="control-label">รหัสผ่าน</label>
          <input class="form-control" name="u_pwd" type="password" placeholder="รหัสผ่านในการเข้าสู่ระบบ">
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block"><i class="fa fa-users fa-lg fa-fw"></i>ลงทะเบียน</button>
        </div>
        <div class="form-group mt-3">
          <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> เข้าสู่ระบบ</a></p>
        </div>
      </form>
    </div>
  </section>
  <!-- Essential javascripts for application to work-->
  <script src="<?php echo base_url('node_modules/jquery/dist/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('node_modules/popper.js/dist/umd/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
  <!-- <script src="<?php echo base_url('plugins'); ?>/js/main.js"></script> -->
  <!-- The javascript plugin to display page loading on top-->
  <script src="<?php echo base_url(); ?>/plugins/pace.min.js"></script>
  <script type="text/javascript">
    
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });
      var msg='<?php echo (isset($msg))? $msg : '' ; ?>';
      document.addEventListener("DOMContentLoaded", function(){
        if (msg!='') {
          setTimeout("alert(msg)",1000);
        }    
      });
    </script>
  </body>
  </html>