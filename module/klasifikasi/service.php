<?php

	require_once '../../config.php';
	require_once '../../session.php';
	
	class Klasifikasi {

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
					a.*, 
					CONCAT(FORMAT(COALESCE(a.batas_bawah, 0),2,'de_DE'),' sd ',FORMAT(COALESCE(a.batas_atas, 0),2,'de_DE')) AS rentang 
				FROM klasifikasi a, (SELECT @rownum := 0) r
				ORDER BY a.id DESC";
			$stmt = $this->conn->query($sql);
            return $stmt;
		}

		public function getListKlasifikasi($id) {
			$sql="SELECT a.* FROM klasifikasi a WHERE a.id=$id LIMIT 1";
			$stmt = $this->conn->query($sql);
            return $stmt;
		}

		public function add($params) {
			$sql="INSERT INTO klasifikasi 
				(batas_bawah, batas_atas, keterangan, predikat) 
				VALUES(
					'".$params['batas_bawah']."',
					'".$params['batas_atas']."',
					'".$params['keterangan']."',
					'".$params['predikat']."'
				)";
			$stmt = $this->conn->query($sql);
			if($stmt) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

		public function edit($params) {
			$sql="UPDATE klasifikasi SET
					batas_bawah='".$params['batas_bawah']."',
					batas_atas='".$params['batas_atas']."',
					keterangan='".$params['keterangan']."',
					predikat='".$params['predikat']."'
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
			$sql="DELETE FROM klasifikasi WHERE id=$id";
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

	