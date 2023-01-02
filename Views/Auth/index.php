<!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
    <link rel="stylesheet" type="text/css" href="../../Assets/CSS/mailindex.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="../Assets/img/content/logo-light.png">
</head>
<body>

<!--Navigaion bar-->
<section>
    <header>
      <a href="#" class="logo"><span>EVENTCLiX.LK</span></a>

      <ul class="navbar">
        <li><a href="../../index.html" class="active">Home</a></li>
        <li><a href="../event.html">Find Info</a></li>
        <li><a href="../gallery.html">Gallery</a></li>
        <li><a href="../about-us.html">About Us</a></li>
        <li><a href="../Auth/index.php">Contact Us</a></li>
      </ul>
    </header>
</section>
<!--Navigaion bar end-->

<div class="formphp">
	<center>
		<h4 class="sent-notification"></h4>
    
		<form id="myForm">
        
    <div class="flex-container">  
        <div  class="heading">
            <h2>Contact Us</h2>
            <p>If you have any questions or quaries a member of our gorup 
                will always be happy to help.Feel free to contact us by telpone or email
                and we will be sure to get back to you as soon as possible.
            </p>
        </div>
        <div class="flex-1">
			<label>Name</label><br>
			<input id="name" type="text" placeholder="Enter Name">
			<br><br>

			<label>Email</label><br>
			<input id="email" type="text" placeholder="Enter Email">
			<br><br>

			<label>Subject</label><br>
			<input id="subject" type="text" placeholder=" Enter Subject"> 
			<br><br>
            
			<p class="para">Message</p>
			<textarea id="body" rows="7" cols="40" placeholder="Type Message"></textarea>
			<br><br>
      
			<button type="button" onclick="sendEmail()" value="Send An Email">Submit</button> 
		</form>
        </div>
        </div> 
	</center>


	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("HEY! We got Your Message.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '3px solid red');
                return false;
            } else
                caller.css('border', '3px solid green');

            return true;
        }
    </script>
</div>


<!-- Footer start -->
<footer>
  <div class="footer-container">

      <div class="one-footer">
          <img src="../../Assets/img/content/logo-light.png" alt="LOGO">

          <p>  
              EVENTCLiX is a website designed to help tourist<br>discover our and 
              book events and acvities in their<br>
              destination.
          </p>
      </div>

      <div class="two-footer">
        <ul>
            <li><a href="../../index.html" class="active">Home</a></li>
            <li><a href="../event.html">Find Info</a></li>
            <li><a href="../gallery.html">Gallery</a></li>
            <li><a href="../about-us.html">About Us</a></li>
            <li><a href="../Auth/index.php">Contact Us</a></li>
          </ul>
      </div>

      <div class="three-footer">
          <ul>
              <li>Contact Us</li>
              <li>EVENTCLiX@gmail.com</li>
              <li>EVENTCLiX@yahoo.com</li>
              <li>WWW.EVENTCLiX.com</li>
              <li>+94 760 832 563</li>
          </ul>
      </div>

      <div class="icons">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>
      </div>
  </div>
  <hr>
  <p class=copyright> Copyright ® 2023 Eventclix All rights Reserved </p>
</footer>
<!-- Footer start -->    


</body>
</html>