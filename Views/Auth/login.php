<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page with Background Image Example</title>
  <link rel="stylesheet" href="../../Assets/CSS/sign-up.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>

<form action="../../controllers/Auth/login.php" method="POST">
<div class="h1">
    <center><h1>Welcome to Events.lk</h1>
    <?php 

            if(isset($_GET['error'])){
              if($_GET['error'] == "emptyfields"){
                echo '<div class="input1" role="alert">
                      All fields are required !
                      </div>';
              }
              else if($_GET['error'] == "wrongcredentials"){
                echo '<div class="input1" role="alert">
                      Invalid Credentials !
                      </div>';
              }
              else if($_GET['error'] == "wrongpassword"){
                echo '<div class="input1" role="alert">
                      Wrong password !
                      </div>';
              }
            }

          ?>
      <h3>Please enter your details bellow</h3></center>

</div>

  <div class="form-field">
    <input class="input1" type="email" placeholder="Email" id="email" name="email" value="<?php if(isset($_GET['email'])) echo $_GET['email'] ?>" required/>
  </div>
  
  <div class="form-field">
    <input class="input1" type="password" placeholder="Password" id="password" name="password" required/>                         
  </div>

  <div class="form-field">
    <button class="btn" type="submit" name="login">Login</button>
  </div>
  <div class="row mt-3">
    <div class="already">
    Don’t have an account?<a href="signup.php" class="text-light">Sign up</a>
    </div>
  </div>
</form>




<!-- partial -->
  
</body>
</html>