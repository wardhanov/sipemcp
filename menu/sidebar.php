<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <li><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sipemcp' ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sipemcp/module/mahasiswa/list.php' ?>"><i class="fa fa-graduation-cap"></i> Mahasiswa</a></li>
            <li><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sipemcp/module/mata_kuliah/list.php' ?>"><i class="fa fa-book"></i> Mata Kuliah</a></li>
            <li><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sipemcp/module/dosen/list.php' ?>"><i class="fa fa-street-view"></i> Dosen</a></li>
            <li><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sipemcp/module/skor_maks_per_semester/list.php' ?>"><i class="fa fa-tasks"></i> Skor Maks</a></li>
            <li><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sipemcp/module/klasifikasi/list.php' ?>"><i class="fa fa-sitemap"></i> Klasifikasi</a></li>
            <li><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sipemcp/module/harkat/list.php' ?>"><i class="fa fa-sort-alpha-asc"></i> Harkat</a></li>
            <li><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sipemcp/module/kelas/list.php' ?>"><i class="fa fa-university"></i> Kelas</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>