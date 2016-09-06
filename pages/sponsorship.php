<!DOCTYPE html>
<html lang="us">
<head>
<meta charset="utf-8" />
<title>Home</title>
<link href="../css/styles.css" rel="stylesheet">
<link href="../css/nav.css" rel="stylesheet">
<link href="../css/footer.css" rel="stylesheet">
<link rel="stylesheet" href="../css/side-menu-styles.css">
<script type="text/javascript" src="../js/side-script.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript">

   $(document).ready(function(){
	   $("#sub").click(function(){
		   var user_name = $("#name").val();
		   var user_email = $("#email").val();
		   var user_pass = $("#pass").val();

		   $.ajax({
			  url: 'test.php',
			  data: {name:user_name, email:user_email, pass:user_pass},
			  type:'POST',
			  success:function(data){
				$("#result").html(data);
				//clear fields
				$('input[type="text"],input[type="password"],textarea').val('');
			  },
			  error: function() {
		    		//clear fields
				$('input[type="text"],input[type="password"],textarea').val('');
		       	  }

		   });

	   });
   });
</script>

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
					<li class="active"><a href="sponsorship.php"><span>Sponsorship</span></a></li>
					<li><a href="culturalRegistration.php"><span>Cultural Registration</span></a></li>
					<li><a href="volunteerRegistration.php"><span>Volunteer Registration</span></a></li>
					<li><a href="memberRegistration.php"><span>Member Registration</span></a></li>
					<li><a href="events.php"><span>Events</span></a></li>
					<li><a href="about.php"><span>About Us</span></a></li>
					<li><a href="vision.php"><span>Our Vision</span></a></li>
					<li><a href="contact.php"><span>Contact</span></a></li>
				</ul>
			</div>
		</section>
		<section id="middle">
			<?php include("../includes/sponsorshipPage.php"); ?>
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