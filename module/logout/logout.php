<?php
	require_once '../../session.php';
	$session	= new Session();
	$session->logout();
	header("location: http://".$_SERVER['SERVER_NAME']."/sipemcp/module/login/index.php");