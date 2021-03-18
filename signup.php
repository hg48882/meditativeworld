<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/css/main.css"> -->
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body id="registerBody">

    <nav class="navbar navbar-expand-lg navbar-light " id="loginNav">
        <div class="container">
          <a class="navbar-brand text-white" href="#">Your Logo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end text-success" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-white fw-bold" aria-current="page" href="index.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white fw-bold" href="signup.php">Register</a>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>

	  <section class="login-section">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xs-10 col-sm-10 col-md-3 p-4 login-input rounded">
                  <div class="errors">
                    <?php
                      require_once "classes/DB.php";

                      $connection = DB::getInstance();

                      if(isset($_POST['registerSubmit'])){

                        $name = trim($_POST['name']);
                        $username = trim($_POST['username']);
                        $email = trim($_POST['email']);
                        $password = trim($_POST['password']);
                        $confirmPassword = trim($_POST['confirmPassword']);

                        $errors = false;

                        if(empty($name)){
                          echo "<div class='error-message'><p style='color:#d8000c;margin-top:10px'>Name field should be filled</p></div>";
                          $error = true;
                      }else if(empty($username)){
                          echo "<div class='error-message'><p style='color:#d8000c;margin-top:10px'>Username field should be filled</p></div>";
                          $error = true;
                      }else
                      if(empty($email)){
                          echo "<div class='error-message'><p style='color:#d8000c;margin-top:10px'>Email field should be filled</p></div>";
                          $error = true;
                      }else
                      if(empty($password)){
                          echo "<div class='error-message'><p style='color:#d8000c;margin-top:10px'>Password field should be filled</p></div>";
                          $error = true;
                      }else
                      if(empty($confirmPassword   )){
                          echo "<div class='error-message'><p style='color:#d8000c;margin-top:10px'>Password confirmation field should be filled</p></div>";
                          $error = true;
                      }else
                      if($password !== $confirmPassword){
                          echo "<div class='error-message'><p style='color:#d8000c;margin-top:10px'>Password missmatch!</p></div>";
                          $error = true;
                      }
    
                      if(!$errors){
                        $connection->registerUser($name, $username, $email , $password);
                      }
                      
                    }
                    
                    ?>

                  </div>
                  <form action="signup.php" method="POST">
                  <div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
					
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
					<div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="form-control mt-3 bg-primary text-white" id="loginBtn" name="registerSubmit">Sign in</button>
                    </div>
                  </form>
					
                </div>
            </div>
        </div>
    </section>
</body>
