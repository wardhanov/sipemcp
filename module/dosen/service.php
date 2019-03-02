<?php

	require_once '../../config.php';
	require_once '../../session.php';
	
	class Dosen {

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

		public function getList() {
			$sql="SELECT
					@rownum := @rownum + 1 AS nomor, 
					a.* 
				FROM dosen a, (SELECT @rownum := 0) r
				ORDER BY a.id DESC";
			$stmt = $this->conn->query($sql);
            return $stmt;
		}

		public function getListDosen($id) {
			$sql="SELECT a.* FROM dosen a WHERE a.id=$id LIMIT 1";
			$stmt = $this->conn->query($sql);
            return $stmt;
		}

		public function add($params) {
			$sql="INSERT INTO dosen 
				(nik, nama, password) 
				VALUES(
					'".$params['nik']."',
					'".$params['nama']."',
					'1234'
				)";
			$stmt = $this->conn->query($sql);
			if($stmt) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

		public function edit($params) {
			$sql="UPDATE dosen SET
					nik='".$params['nik']."',
					nama='".$params['nama']."'
				WHERE id='".$params['id']."'
				";
			$stmt = $this->conn->query($sql);
			if($stmt) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

		public function deleteData($id) {
			$sql="DELETE FROM dosen WHERE id=$id";
			$stmt = $this->conn->query($sql);
			if($stmt) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

	}

	// $mahasiswa=new Mahasiswa();
	// $dataMahasiswa=$mahasiswa->read();

	// print_r($dataMahasiswa);

	// while($data = $dataMahasiswa->fetch(PDO::FETCH_OBJ)){

	// 	echo $data->nama;
	// }

	