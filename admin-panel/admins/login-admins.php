<?php require "../../admin-panel/layouts/header.php" ?>
<?php require_once "./admin-functions.php" ?>
<?php require_once "../../config/config.php" ?>
<?php  

if (isset($_SESSION['adminname'])) {
  header("location: http://localhost/clean_post/admin-panel/index.php");
}
?>
<?php
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $pwd = $_POST['password'];

  if (emptyInputLogin($email, $pwd) !== false) {
    header("Location: http://localhost/clean_post/admin-panel/admins/login-admins.php?error=emptyinput");
    exit();
  }

  $login = $conn->query("SELECT * FROM admins WHERE email = '$email'");
  $row = $login->fetch_assoc();
  echo mysqli_num_rows($login);

  if (mysqli_num_rows($login)) {
    if (password_verify($pwd, $row['mypassword'])) {
      $_SESSION['adminname'] = $row['adminname'];
      $_SESSION['admin_id'] = $row['id'];
      $_SESSION['admin_email'] = $row['email'];
      header("Location: http://localhost/clean_post/admin-panel/index.php?success=loginsuccess");
    } else {
      header("Location: http://localhost/clean_post/admin-panel/admins/login-admins.php?error=wrongpassword");
    }
  } else {
    header("Location: http://localhost/clean_post/admin-panel/admins/login-admins.php?error=usernotfound");
  }
}
if (isset($_GET['error'])) {
  if ($_GET['error'] == 'wrongpassword') {
?>
    <p class="alert alert-danger"><?php echo "Wrong Password"; ?></p>
  <?php
  } elseif ($_GET['error'] == 'usernotfound') {
  ?>
    <p class="alert alert-danger"> <?php echo "User Not Found "; ?></p>
  <?php
  } elseif ($_GET['error'] == 'emptyinput') {
  ?>
    <p class="alert alert-danger"> <?php echo "Fill out all the inputs "; ?></p>
<?php
  }
}
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mt-5">Login</h5>
        <form method="POST" class="p-auto" action="login-admins.php">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

          </div>


          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />

          </div>



          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


        </form>

      </div>
    </div>
  </div>
</div>
<?php require "../../admin-panel/layouts/footer.php" ?>