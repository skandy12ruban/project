<?php
include("assets/PHPmailer/PHPMailerAutoload.php");
$errEmail = "";
$errHuman = "";
$errMessage = "";
$errName = "";
$result = "";
$email = "";
$message = "";
$name = "";
$account = 'skandyssn@gmail.com';
$password = 'subashree';
$from = 'klickkit@gmail.com';
$from_name = 'klickkit';
$subject = 'Response to your mail';
$msg = 'this is to response your email.We will get back to you soon.';
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$subject = "Reply to $name for $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth= true;
$mail->Port = 465; // Or 587
$mail->Username= $account;
$mail->Password= $password;
$mail->SMTPSecure = 'ssl';
$mail->From = $from;
$mail->FromName= $from_name;
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $msg;
$mail->addAddress($email);
if(!$mail->send()){
$result = '<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Sorry, please try again later.</strong>
						</div>';
						
}else{
 $result = '<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Thank you, your message send successfully</strong>
						</div>';
}
	}
}
?>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="assets/css/style2.css">
</head>
<body class="content" onload="$().alert('close')">
<nav class="navbar navbar-inverse navbar-fixed-top" id="menu" style="color:#d6a551">
  <div class="container-fluid">
    <div class="navbar-header">
	   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#" style="font-size:30px;color:#d6a551">CompanyName</a>
    </div>
	<div class="collapse navbar-collapse" id="Navbar">
    <ul class="nav navbar-nav navbar-right" style="font-size:20px">
	  <li><a style="color:#d6a551" href="home.html">Home</a></li>
      <li><a style="color:#d6a551"href="Aboutus.html">About us</a></li>
      <li><a style="color:#d6a551"href="#">Programmes</a></li>
	  <li><a style="color:#d6a551"href="#">Gallery</a></li>
      <li class="active"><a href="contact-us.php">Contact Us</a></li>
	</ul>
	</div>
  </div>
</nav>
<br>
<br>
<div class="content">
<div>
<h1 align="center">Contact Us</h1>
<hr> 
<h3 align="center">Content description</h3>
</div>
<div class="form-group>
						<div class="col-sm-6 col-md-offset-3" align="center">
						<?php echo $result; ?>
						</div>
					
<div class="container">
    <div class="container col-md-7">
	<h1>Our Location:</h1>
	<h3>1600,Amphitheatre Parkway,</h3><h3>Mountain View, CA</h3>
	<h1>Social Connectivity:</h1>
	<div class="container-fluid row">
<a href="#">
	<img src="assets/img/facebook.png" class="img-rounded" alt="Cinque Terre" width="75" height="75"></a>
<a href="#">
	<img src="assets/img/twitter.png" class="img-rounded" alt="Cinque Terre" width="75" height="75"></a>
<a href="#">
	<img src="assets/img/google-plus.png" class="img-rounded" alt="Cinque Terre" width="75" height="75"></a>
	</div>
	</div>
    <div class="container col-sm-5">
	<h1>Contact Form:</h1>
	<form class="form-horizontal" role="form" method="post" action="contact-us.php">
					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<textarea class="form-control" id="message" rows="4" name="message" placeholder="Your Message"></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>				
					</div>
				</form>
</div>
  </div>
 </div>
 </br>
 </br>
  <!---Footer starts from here -->
  <footer class="footer navbar-inverse navbar-fixed-bottom">
      <div class="container">
	  <h4 style="color:#d6a551">&copy, 2017, All copyrights reserved <h4>
      </div>
    </footer>
  </body>
</html>