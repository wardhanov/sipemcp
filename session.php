<?php
  require_once 'config.php';

  class Session {

    private $conn;

    public function __construct() {
      $database   = new Database();
      $db         = $database->dbConnection();
      $this->conn = $db;

      session_start();
    }

    public function cek_session() {
      if(isset($_SESSION['username']) && isset($_SESSION['password'])){
        return 1;
      } else {
        return 0;
      }
    }

    public function login($params) {
      $sql="SELECT a.* FROM user a WHERE a.username='".$params['username']."' AND a.password='".$params['password']."' LIMIT 1";
      $stmt = $this->conn->query($sql);
      return $stmt;
    }

    public function logout() {
      session_destroy();
    }

  }