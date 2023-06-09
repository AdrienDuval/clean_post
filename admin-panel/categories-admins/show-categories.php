<?php
require "../layouts/header.php";
require_once "../../config/config.php";
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Categories</h5>
        <a href="http://localhost/clean_post/admin-panel/categories-admins/create-category.php" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">update</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td><a href="http://localhost/clean_post/admin-panel/categories-admins/update-category.php" class="btn btn-warning text-white text-center ">Update Categories</a></td>
              <td><a href="http://localhost/clean_post/admin-panel/categories-admins/delete-category.php" class="btn btn-danger  text-center ">Delete Categories</a></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td><a href="http://localhost/clean_post/admin-panel/categories-admins/update-category.php" class="btn btn-warning text-white text-center">Update Categories</a></td>
              <td><a href="http://localhost/clean_post/admin-panel/categories-admins/delete-category.php" class="btn btn-danger  text-center ">Delete Categories</a></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td><a href="http://localhost/clean_post/admin-panel/categories-admins/update-category.php" class="btn btn-warning text-white text-center ">Update Categories</a></td>
              <td><a href="http://localhost/clean_post/admin-panel/categories-admins/delete-category.php" class="btn btn-danger text-center">Delete Categories</a></td>
            </tr>
          </tbody>
        </table>
        <?php require "../layouts/footer.php" ?>