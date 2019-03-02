<!DOCTYPE html>
<html>
<head>
   <?php
    require_once 'service.php';
    $dosen=new Dosen();
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPEMCP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../assets/AdminLTE/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
    require_once '../../menu/navbar.php';
    require_once '../../menu/sidebar.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Dosen
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <!--<div class="box-header with-border">
              <h3 class="box-title">Input Mahasiswa</h3>
            </div>-->
            <!-- /.box-header -->
            <!-- form start -->
            <?php
              $dataDosen=$dosen->getListDosen($_GET['id'])->fetch(PDO::FETCH_OBJ);
              $id=$dataDosen->id;
              $nik=$dataDosen->nik;
              $nama=$dataDosen->nama;
            ?>
            <form role="form" action="edit.php?id=<?php echo $id ?>" method="post">
              <div class="box-body">
                <input type="hidden" name="id" value="<?php echo $id ?>" class="form-control" placeholder="Nomor induk pegawai" required>
                <div class="form-group">
                  <label>NIK</label>
                  <input type="text" name="nik" value="<?php echo $nik ?>" class="form-control" placeholder="Nomor induk pegawai" required>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" value="<?php echo $nama ?>" class="form-control" placeholder="Nama dosen" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="simpan" value="edit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" name="cancel" value="add" class="btn btn-default" onclick="history.go(-1);"><i class="fa fa-minus-circle"></i> Batal</button>
              </div>
            </form>
            <?php
              if(isset($_POST['simpan'])) {
                $params=array();
                $params['id']=$_POST['id'];
                $params['nik']=$_POST['nik'];
                $params['nama']=$_POST['nama'];
                $dosen->edit($params);
            ?>
                <script>
                  window.location.href = 'list.php'; 
                </script>
            <?php
              }
            ?>
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    require_once '../../menu/copyright.php';
  ?>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/AdminLTE/dist/js/demo.js"></script>
</body>
</html>
