<?php

namespace App\models;

use App\models\DBConnection;
use PDO;

class CitiesModel
{
  /**
   * Get all the cities
   * @return array
   */
  public static function getAllCities() {
    $conn = new DBConnection();

    $stmt = $conn->getConnection()->prepare("SELECT * FROM cities");

    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\models\City');

    $stmt->execute();

    $conn->closeConnection();

    return $stmt->fetchAll();
  }

  /**
   * Add a city
   * @param City $city
   * @return void
   */
  public static function addCity(City $city): void
  {
    $conn = new DBConnection();

    $stmt = $conn->getConnection()->prepare("INSERT INTO cities (name, country, latitude, longitude) VALUES (:name, :country, :latitude, :longitude)");

    $stmt->bindValue(':name', $city->getName());
    $stmt->bindValue(':country', $city->getCountry());
    $stmt->bindValue(':latitude', $city->getLatitude());
    $stmt->bindValue(':longitude', $city->getLongitude());

    $stmt->execute();

    $conn->closeConnection();
  }

  /**
   * Delete a city by id
   * @param mixed $id
   * @return void
   */
  public static function deleteById(mixed $id): void
  {
    $conn = new DBConnection();

    $stmt = $conn->getConnection()->prepare("DELETE FROM cities WHERE id = :id");

    $stmt->bindValue(':id', $id);

    $stmt->execute();

    $conn->closeConnection();
  }

}