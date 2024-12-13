<?php

namespace App\views;

class ShowCitiesView
{
  public static function render($cities): void
  {
    include "cabecera.php";

    ?>
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Crear una ciudad
        </button>
        <table class="table table-striped w-75 m-auto text-center align-middle">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Pais</th>
                <th scope="col">Latitud</th>
                <th scope="col">Longitud</th>
                <th scope="col">Borrar</th>
            </tr>
            </thead>
            <tbody>
    <?php
    foreach ($cities as $city) {
    ?>
        <tr>
            <td><?= $city->getName() ?></td>
            <td><?= $city->getCountry() ?></td>
            <td><?= $city->getLatitude() ?></td>
            <td><?= $city->getLongitude() ?></td>
            <td><a class="btn btn-danger" href="index.php?action=delete&id=<?= $city->getId() ?>">X</a></td>
        </tr>
    <?php
    }
    ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva ciudad</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="add-city" action="index.php" method="post">
              <div class="form-floating mb-3">
                <input required type="text" class="form-control" id="name" name="name" placeholder="Antas">
                <label for="name">Nombre ciudad</label>
              </div>
              <div class="form-floating mb-3">
                <input required type="text" class="form-control" id="country" name="country" placeholder="España">
                <label for="country">Nombre Pais</label>
              </div>
              <div class="form-floating mb-3">
                <input required type="text" class="form-control" id="latitude" name="latitude" placeholder="10.8">
                <label for="country">Latitud</label>
              </div>
              <div class="form-floating mb-3">
                <input required type="text" class="form-control" id="longitude" name="longitude" placeholder="10.7">
                <label for="country">Longitud</label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button form="add-city" type="submit" name="add-city" class="btn btn-primary">Agregar</button>
          </div>
        </div>
      </div>
    </div>
    <?php

    include "pie.php";
  }
}