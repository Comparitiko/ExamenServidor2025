<?php

namespace App\models;

use \PDO;
use \PDOException;

class DBConnection
{
  private PDO|null $conn;

  public function __construct()
  {
    $host = 'mariadb_examen:3306'; // Ip of the docker container and the internal port

    try {

      $this->conn = new PDO("mysql:host=$host;dbname=examen", "root", "mysql?");
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    } catch (PDOException $e) {
        var_dump($e->getMessage());
      $this->conn = null;
    }
  }

  public function getConnection()
  {
    return $this->conn;
  }

  public function closeConnection()
  {
    unset($this->conn);
  }
}