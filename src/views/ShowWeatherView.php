<?php

namespace App\views;

class ShowWeatherView
{
  public static function render($cities)
  {
    include "cabecera.php";
    ?>

    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php
    foreach ($cities as $city) {
    ?>
      <div class="card col text-center" style="width: 18rem;">
        <h1 class="city"><?= $city->getName() ?></h1>
        <p>Latitud: <span class="longitude"><?= $city->getLongitude() ?></span></p>
        <p>Longitud: <span class="latitude"><?= $city->getLatitude() ?></span></p>
        <div class="div-info"></div>
      </div>
      <?php
    }
      ?>
    </div>
    </div>
    <script src="./views/assets/city-weather.js"></script>
    <?php
    include "pie.php";
  }
}