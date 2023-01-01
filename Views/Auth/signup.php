<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Eventclix - Sign up</title>
  <link rel="stylesheet" href="../../Assets/CSS/sign-up.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>

<form action="../../controllers/Auth/register.php" method="POST">
  <div class="h1">
      <center><h1>Welcome to Events.lk</h1>
<!-- Alerts -->
<?php 

if(isset($_GET['error'])){
  if($_GET['error'] == "emptyfields"){

    echo '<div class="input1" role="alert">
          All fields are required !
          </div>';
  }
  else if($_GET['error'] == "emailerror"){
    echo '<div class="input1" role="alert">
          Email Format Is Wrong !
          </div>';
  }
  else if($_GET['error'] == "passwordmismatch"){
    echo '<div class="input1" role="alert">
          Password Must Be Same !
          </div>';
  }
  else if($_GET['error'] == "emailalreadyexits"){
    echo '<div class="input1" role="alert">
          Email Already Exits !
          </div>';
  }
  else{
    echo '<div class="input1" role="alert">
             Something went wrong !
              </div>';
  }
}

?>
      <h3>Please enter your details bellow</h3></center>
  </div>
    <div class="form-field">
      <input class="input1" placeholder="First Name" type="text" name="firstname" value="<?php if(isset($_GET['first_name'])) echo $_GET['first_name']; ?>" >
    </div>

    <div class="form-field">
      <input class="input1" type="text" placeholder="Last Name" id="lastname" name="lastname" value="<?php if(isset($_GET['last_name']))echo $_GET['last_name']; ?>" >
    </div>

    <div class="form-field">
      <input class="input1" type="text" placeholder="Email" id="email" name="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>" >
    </div>
    
    <div class="form-field">
      <input class="input1" type="password" placeholder="Password" id="password" name="password" required>                         
    </div>

    <div class="form-field">
      <input class="input1" type="password" placeholder="Confirm Password" id="password" name="confirm_password" required>
    </div> 
  <div class="form">
  <div class="form-field">
    <button class="btn" type="submit" name="register">Create Account</button>
  </div> 
<div class="already">
  Already have an account ? <a href="login.php">Sign in</a>
</div>

</form>
<!-- partial -->
</body>
</html>