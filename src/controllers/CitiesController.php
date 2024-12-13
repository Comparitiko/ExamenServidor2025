<?php

namespace App\controllers;

use App\models\CitiesModel;
use App\models\City;
use App\views\ShowCitiesView;
use App\views\ShowFinderView;
use App\views\ShowWeatherView;

class CitiesController
{
  public static function getAllCities(): void
  {
    $cities = CitiesModel::getAllCities();
    ShowCitiesView::render($cities);
  }

  public static function addCity(City $city): void
  {
    CitiesModel::addCity($city);
    header("Location: index.php");
  }

  public static function deleteById(mixed $id)
  {
    CitiesModel::deleteById($id);
    header("Location: index.php");
  }

  public static function showFinder(): void
  {
    ShowFinderView::render();
  }

  public static function showWeather(): void
  {
    $cities = CitiesModel::getAllCities();
    ShowWeatherView::render($cities);
  }
}