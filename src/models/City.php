<?php

namespace App\models;
class City
{
  private $id;
  private $name;
  private $country;
  private $longitude;
  private $latitude;

  /**
   * @param $id
   * @param $name
   * @param $country
   * @param $longitude
   * @param $latitude
   */
  public function __construct($id = '', $name = '', $country = '', $longitude = '', $latitude = '')
  {
    $this->id = $id;
    $this->name = $name;
    $this->country = $country;
    $this->longitude = $longitude;
    $this->latitude = $latitude;
  }

  public function getId(): mixed
  {
    return $this->id;
  }

  public function setId(mixed $id): void
  {
    $this->id = $id;
  }

  public function getName(): mixed
  {
    return $this->name;
  }

  public function setName(mixed $name): void
  {
    $this->name = $name;
  }

  public function getCountry(): mixed
  {
    return $this->country;
  }

  public function setCountry(mixed $country): void
  {
    $this->country = $country;
  }

  public function getLongitude(): mixed
  {
    return $this->longitude;
  }

  public function setLongitude(mixed $longitude): void
  {
    $this->longitude = $longitude;
  }

  public function getLatitude(): mixed
  {
    return $this->latitude;
  }

  public function setLatitude(mixed $latitude): void
  {
    $this->latitude = $latitude;
  }
}