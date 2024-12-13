<?php

namespace App\views;

class ShowFinderView
{
  public static function render()
  {
    include "cabecera.php";
    ?>
    <div class="container">
        <div class="form-floating mb-3 w-50 m-auto">
          <input required type="text" class="form-control" id="city" name="city" placeholder="Antas">
          <label for="city">Ciudad y pais</label>
        </div>
    <div id="root"></div>
    </div>
    <script src="./views/assets/city-finder.js"></script>
    <?php

    include "pie.php";
  }
}