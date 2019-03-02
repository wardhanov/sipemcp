<?php
	require_once '../../config.php';
	require_once '../../session.php';

	class Dashboard {

		private $conn;

		public function __construct() {
			$session	= new Session();
			if($session->cek_session()==0) {
				header("location: http://".$_SERVER['SERVER_NAME']."/sipemcp/module/login/index.php");
			}

			$database   = new Database();
            $db         = $database->dbConnection();
            $this->conn = $db;
		}

		public function getListMahasiswa() {
			$sql="SELECT a.id FROM dosen a";
			$stmt = $this->conn->query($sql);
            return $stmt;
		}

		public function getListDosen() {
			$sql="SELECT a.id FROM dosen a";
			$stmt = $this->conn->query($sql);
            return $stmt;
		}

		public function getListMataKuliah() {
			$sql="SELECT a.id FROM mata_kuliah a";
			$stmt = $this->conn->query($sql);
            return $stmt;
		}

		public function getListKlasifikasi() {
			$sql="SELECT a.id FROM klasifikasi a";
			$stmt = $this->conn->query($sql);
            return $stmt;
		}

	}