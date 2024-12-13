<?php

namespace App;

use App\controllers\CitiesController;
use App\models\City;

/**
 * AUTOLOAD
 */
spl_autoload_register(function ($class) {
    $path = substr($class, strpos($class, "\\") + 1);
    $path = str_replace("\\", "/", $path);
    include_once "./" . $path . ".php";
});

// Handle get requests
if (!empty($_GET)) {
  if (isset($_GET['action']) && strcmp($_GET['action'], "delete") === 0) {
    // Handle delete request
    CitiesController::deleteById($_GET['id']);
  } else if (isset($_GET['action']) && strcmp($_GET['action'], "show-finder") === 0) {
    // Handle show finder request
    CitiesController::showFinder();
  } else if (isset($_GET['action']) && strcmp($_GET['action'], "save-city") === 0) {
    // Handle save-city request
    $city = new City("", $_GET['city'], $_GET['country'], $_GET["longitude"], $_GET["latitude"]);
    CitiesController::addCity($city);
  } else if (isset($_GET['action']) && strcmp($_GET['action'], "show-weather") === 0) {
    // Handle show weather request
    CitiesController::showWeather();
  }
} else if (!empty($_POST)) {
  // Handle post requests
  if (isset($_POST["add-city"])) {
    // Handle add city request
    $city = new City("", $_POST["name"], $_POST["country"], $_POST["latitude"], $_POST["longitude"]);
    CitiesController::addCity($city);
  }
} else {
  CitiesController::getAllCities();
}
