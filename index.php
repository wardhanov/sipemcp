<?php
  require_once 'session.php';

  $index=new Session();
  $cek_session=$index->cek_session();

  if ($cek_session==1) {
    header("location: http://".$_SERVER['SERVER_NAME']."/sipemcp/module/dashboard/dashboard.php");
  } else {
    header("location: http://".$_SERVER['SERVER_NAME']."/sipemcp/module/login/index.php");
  }
