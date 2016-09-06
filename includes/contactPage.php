<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link href="../css/form-styles.css" rel="stylesheet">

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>
function sendContact() {
	var valid;	
	valid = validateContact();
	if(valid) {
		jQuery.ajax({
		url: "contact_form.php",
		data:'userName='+$("#userName").val()+'&userEmail='+$("#userEmail").val()+'&subject='+$("#subject").val()+'&message='+$(message).val(),
		type: "POST",
		success:function(data){
		$("#contact-status").html(data);
		    $("#userName").val('');
		    $("#userEmail").val('');
		    $("#subject").val('');
		    $("#message").val('');
		},
		error:function (){}
		});
	}
}

function validateContact() {
	var valid = true;	
	$(".demoInputBox").css('background-color','');
	$(".info").html('');
	
	if(!$("#userName").val()) {
		$("#userName-info").html("(required)");
		$("#userName").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#userEmail").val()) {
		$("#userEmail-info").html("(required)");
		$("#userEmail").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		$("#userEmail-info").html("(invalid)");
		$("#userEmail").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#subject").val()) {
		$("#subject-info").html("(required)");
		$("#subject").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#message").val()) {
		$("#message-info").html("(required)");
		$("#message").css('background-color','#FFFFDF');
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

.contact {
	margin: 30px;
}
.btnAction{background-color:#2FC332;border:0;padding:10px 40px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;margin-left: 220px;}
.info{font-size:.8em;color: #FF6600;letter-spacing:2px;padding-left:5px;}
.error{background-color: #FF6600;border:#AA4502 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;}
.success{border:#0FA015 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;text-align: center;}
</style>

<div id="envelope">
	<div id="contact-status"></div>

	<div class="contact_form">
        
		<ul>
			<li>
				<h3>Contact Us</h3>
			</li>
			<li><label for="userName">Name:</label> 
			
			<input type="text" name="userName" id="userName" placeholder="Enter Name" /><span id="userName-info" class="info"></span>
			
		    </li>
			<li><label for="userEmail">Email:</label> 
			
			<input type="email" name="userEmail" id="userEmail" placeholder="Enter Email" /> <span id="userEmail-info" class="info"></span>
			
			</li>
			<li><label for="subject">Subject:</label> 
			
			<input type="text" name="subject" id="subject" placeholder="Enter Subject" />
			<span id="subject-info" class="info"></span>
			</li>
			<li><label for="message">Message:</label> 
			
			<textarea name="message" id="message" cols="40" rows="6"></textarea>
			<span id="message-info" class="info"></span>
			</li>
			<li>
			  
			  <button name="submit" class="btnAction" onClick="sendContact();">Send Message</button>
			  </li>
		</ul>
		
	</div>

</div>

