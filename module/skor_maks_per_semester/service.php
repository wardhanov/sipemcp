<?php

	require_once '../../config.php';
	require_once '../../session.php';
	
	class Skor_maks_per_semester {

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
				FROM skor_maks_per_semester a, (SELECT @rownum := 0) r
				ORDER BY a.id DESC";
			$stmt = $this->conn->query($sql);
            return $stmt;
		}

		public function getListSkorMaksPerSemester($id) {
			$sql="SELECT a.* FROM skor_maks_per_semester a WHERE a.id=$id LIMIT 1";
			$stmt = $this->conn->query($sql);
            return $stmt;
		}

		public function add($params) {
			$sql="INSERT INTO skor_maks_per_semester 
				(semester, cpl, skor_maks) 
				VALUES(
					'".$params['semester']."',
					'".$params['cpl']."',
					'".$params['skor_maks']."'
				)";
			$stmt = $this->conn->query($sql);
			if($stmt) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

		public function edit($params) {
			$sql="UPDATE skor_maks_per_semester SET
					semester='".$params['semester']."',
					cpl='".$params['cpl']."',
					skor_maks='".$params['skor_maks']."'
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
			$sql="DELETE FROM skor_maks_per_semester WHERE id=$id";
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

	