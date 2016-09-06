<?php
session_start();
?>
<!DOCTYPE html>
<html lang="us">
<head>
<meta charset="utf-8" />
<title>Home</title>
<link href="../css/styles.css" rel="stylesheet">
<link href="../css/nav.css" rel="stylesheet">
<link href="../css/footer.css" rel="stylesheet">
<link rel="stylesheet" href="../css/side-menu-styles.css">
<link href="../css/form-styles.css" rel="stylesheet">
<link href="../css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/side-script.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<script>
function memberLogin() {
	var valid;
	valid = validateMemberLogin();
	
	if(valid) {
		alert("Email = "+$("#email").val());
		jQuery.ajax({
		url: "member_login_form.php",
		data:'email='+$("#email").val()
		      +'&passwrd='+$("#passwrd").val(),
		type: "POST",
		success:function(data){
		//$("#member-login-status").html(data);
		window.location.href = "memberProfile.php";
		},
		error:function (){}
		});
	}
}

function validateMemberLogin() {
	var valid = true;
	$(".demoInputBox").css('background-color','');
	$(".info").html('');

	if(!$("#email").val()) {
		$("#email-info").html("(required)");
		$("#email").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		$("#email-info").html("(invalid)");
		$("#email").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#passwrd").val()) {
		$("#passwrd-info").html("(required)");
		$("#passwrd").css('background-color','#FFFFDF');
		valid = false;
	}
	

	return valid;
}
</script>
<style>
.img-style {
	height: 100px;
	width: 190px;
	border-bottom: 1px solid #000;
	margin: 2px;
}

.resultStyle {
	background: #234;
	border: 1px solid #000;
	font-size: 12px;
}

.btnAction {
	background-color: #2FC332;
	border: 0;
	padding: 10px 40px;
	color: #FFF;
	border: #F0F0F0 1px solid;
	border-radius: 4px;
	margin-left: 220px;
}

.info {
	font-size: .8em;
	color: #FF6600;
	letter-spacing: 2px;
	padding-left: 5px;
}

.error {
	background-color: #FFFFFF;
	border: #AA4502 1px solid;
	padding: 5px 10px;
	color: #FFFFFF;
	border-radius: 4px;
}

.success {
	border: #0FA015 1px solid;
	padding: 5px 10px;
	color: #FFFFFF;
	border-radius: 4px;
	text-align: center;
}
</style>


</head>
<body>
	<div id="pagewrap">

		<header>
		<?php include("../includes/header.php"); ?>
	</header>
<?php include("../includes/scrollPage.php"); ?>

		<br>
		<section id="content">
			<div id="hcssmenu">
				<ul>
					<li><a href="home.php"><span>Home</span></a></li>
					<li><a href="sponsorship.php"><span>Sponsorship</span></a></li>
					<li><a href="culturalRegistration.php"><span>Cultural Registration</span></a></li>
					<li><a href="volunteerRegistration.php"><span>Volunteer Registration</span></a></li>
					<li class="active"><a href="memberRegistration.php"><span>Member Registration</span></a></li>
					<li><a href="events.php"><span>Events</span></a></li>
					<li><a href="about.php"><span>About Us</span></a></li>
					<li><a href="vision.php"><span>Our Vision</span></a></li>
					<li><a href="contact.php"><span>Contact</span></a></li>
				</ul>
			</div>

		</section>

		<section id="middle">

			<div id="envelope">
				<div id="member-login-status"></div>

				<div class="contact_form">

					<ul>
						<li>
							<h3>Member Login</h3>
						</li>

						<li><label for="email">Email ID:</label> <input type="email"
							name="email" id="email" placeholder="Enter Email ID" /> <span
							id="email-info" class="info"></span></li>
						<li><label for="passwrd">Password:</label> <input type="password"
							name="passwrd" id="passwrd" placeholder="Enter Password" /> <span
							id="passwrd-info" class="info"></span></li>

						<li>
							<button name="submit" id="submit" class="btnAction" onClick="memberLogin();">Log
								In</button>
						</li>
					</ul>
					<br>
				</div>

			</div>



		</section>

		<aside id="sidebar">
		<?php include("../includes/ads.php"); ?>
	</aside>

		<footer>
	  <?php include("../includes/footer.php"); ?> 
	</footer>

	</div>
</body>
</html>

