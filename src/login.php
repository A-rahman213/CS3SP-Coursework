<?php
session_start();

$error = '';
$title = 'Blogsite - Login';

require_once __DIR__ . '/db-conn.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmnt = $pdo->prepare("SELECT * FROM users where email = ?");
    $stmnt->execute([$email]);
    $user = $stmnt->fetch();
    
    if(password_verify($password, $user['userpassword'])){
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];

      header('Location: main.php');

    }
}

require_once __DIR__ . '/navbar.php'
?>


<!--page layout: centers the form to avoid looking weird-->
<div class="row">

  <div class="col"></div>
  
  <!--Form-->
  <div class="col-sm-6">
    <form method="post">
      <div class="bg-light">
        <div class="row mb-3">
          <label for=inputEmail class="col-sm-2 col-form-label">Email:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email"  id="inputEmail"/>
          </div>
        </div>
        <div class="row mb-3">
          <label for=inputPassword class="col-sm-2 col-form-label">Password:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id=inputPassword></input>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <p><a href="signup.php" class="link-primary"> No account? Sign up here! </a></p>
      </div>
    </form>
  </div>

  <div class="col"></div>
</div>
