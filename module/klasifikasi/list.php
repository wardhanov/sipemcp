<!DOCTYPE html>
<html>
<head>
  <?php
    require_once 'service.php';
    $klasifikasi=new Klasifikasi();
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
  <!-- DataTables -->
  <link rel="stylesheet" href="../../assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../assets/AdminLTE/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        Master Data Klasifikasi
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <div class="box-body">
              <a href="add.php"><button type="button" class="btn btn-success"><span class="fa fa-plus"></span> Input Klasifikasi</button></a>
              <br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">Nomor</th>
                  <th class="text-center">Aksi</th>
                  <th class="text-center">Rentang</th>
                  <th class="text-center">Keterangan</th>
                  <th class="text-center">Predikat</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $listKlasifikasi=$klasifikasi->getList();
                    while($row=$listKlasifikasi->fetch(PDO::FETCH_OBJ)) {
                  ?>
                      <tr>
                        <td width="8%" class="text-center"><?php echo $row->nomor ?></td>
                        <td width="15%">
                          <center>
                            <a href="edit.php?id=<?php echo $row->id ?>"><button type="button" class="btn btn-sm btn-primary"><span class="fa fa-pencil"></span> Edit</button></a>
                             <a href="list.php?delete_id=<?php echo $row->id ?>"><button type="button" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Hapus</button></a>
                          </center>
                        </td>
                        <td class="text-center"><?php echo $row->rentang ?></td>
                        <td class="text-center"><?php echo $row->keterangan ?></td>
                        <td class="text-center"><?php echo $row->predikat ?></td>
                      </tr>
                  <?php
                    }
                  ?>
                </tbody>
                <?php
                  if(isset($_GET['delete_id'])) {
                    $klasifikasi->deleteData($_GET['delete_id']);
                  ?>
                      <script>
                        window.location.href = 'list.php'; 
                      </script>
                  <?php
                  }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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
<!-- DataTables -->
<script src="../../assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/AdminLTE/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
