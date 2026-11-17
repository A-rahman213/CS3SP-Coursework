<?php
session_start();

$title = 'Blogsite - Sign up';
$error = '';

require_once __DIR__ . '/db-conn.php';

// Creating an account
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmnt = $pdo->prepare("INSERT INTO users (email, userpassword, username) VALUES (?, ?, ?)");
    $stmnt->execute([$email, $passwordHash, $username]);
    $user = $stmnt->fetch();
     
}

require_once __DIR__ . '/navbar.php';
?>

<div class="row">

  <div class="col"></div>
  <!--Form-->
  <div class="col-sm-6">
    <form method="post">
      <div class="bg-light">
        <div class="row mb-3">
          <label for=inputEmail class="col-sm-2 col-form-label">Email:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="inputEmail"/>
          </div>
        </div>
        <div class="row mb-3">
          <label for=inputUser class="col-sm-2 col-form-label">Username:</label>
          <div class="col-sm-10">
            <input class="form-control" name="username" id="inputUser"/>
          </div>
        </div>
        <div class="row mb-3">
          <label for=inputPassword class="col-sm-2 col-form-label">Password:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id=inputPassword></input>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <p><a href="login.php" class="link-primary">Have an account? Sign in</a><p>
      </div>
    </form>
  </div>

  <div class="col"></div>
</div>

