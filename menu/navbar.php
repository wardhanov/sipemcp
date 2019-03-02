<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sipemcp' ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>SIP</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>SIPEMCP</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" onclick="signOut()"><i class="fa fa-sign-out"></i></a>
          <script type="text/javascript">
            var signOut=function() {
              window.open("<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sipemcp/module/logout/logout.php' ?>", "_self");
            }
          </script>
        </li>
      </ul>
    </div>
  </nav>
</header>