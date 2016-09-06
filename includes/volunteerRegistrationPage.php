<link rel="stylesheet"

	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script

	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link href="../css/form-styles.css" rel="stylesheet">



<script type="text/javascript" src="../js/jquery.min.js"></script>

<script>

function volunteerRegistration() {

	var valid;

	valid = validateVolunteerRegistration();

	if(valid) {

		jQuery.ajax({

		url: "volunteer_registration_form.php",

		data:'name='+$("#name").val()

		      +'&mobile='+$("#mobile").val()

		      +'&interestedIn='+$("#interestedIn").val()

		      +'&message='+$("#message").val()

		      +'&email='+$("#email").val(),

		type: "POST",

		success:function(data){

		$("#volunteer-registration-status").html(data);

		  $("#name").val('');

		    $("#mobile").val('');

		    $("#interestedIn").val('');

		    $("#email").val('');

		    $("#message").val('');

		},

		error:function (){}

		});

	}

}



function validateVolunteerRegistration() {

	var valid = true;

	$(".demoInputBox").css('background-color','');

	$(".info").html('');



	if(!$("#name").val()) {

		$("#name-info").html("(required)");

		$("#name").css('background-color','#FFFFDF');

		valid = false;

	}

	if(!$("#mobile").val()) {

		$("#mobile-info").html("(required)");

		$("#mobile").css('background-color','#FFFFDF');

		valid = false;

	}

	if(!$("#mobile").val().match(/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/)) {

		$("#mobile-info").html("(invalid)");

		$("#mobile").css('background-color','#FFFFDF');

		valid = false;

	}

	if(!$("#interestedIn").val()) {

		$("#interestedIn-info").html("(required)");

		$("#interestedIn").css('background-color','#FFFFDF');

		valid = false;

	}

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

.resultStyle{

  background: #234;

  border: 1px solid #000;

  font-size: 12px;

}



.btnAction{background-color:#2FC332;border:0;padding:10px 40px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;margin-left: 220px;}

.info{font-size:.8em;color: #FF6600;letter-spacing:2px;padding-left:5px;}

.error{background-color: #FFFFFF;border:#AA4502 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;}

.success{border:#0FA015 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;text-align: center;}



</style>





<div id="envelope">

<div id="volunteer-registration-status"></div>

	 

	<div class="contact_form">

	

	<ul>

        <li>

             <h3>Volunteer Registration</h3>

        </li>

        <li>

            <label for="name">Name:</label>

            <input type="text"  name="name" id="name" placeholder="Enter Name"  />

            <span id="name-info" class="info"></span>

        </li>

        <li>

            <label for="mobile">Mobile:</label>

            <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile number" />

            <span id="mobile-info" class="info"></span>

        </li>

        <li>

            <label for="interestedIn">Interested In:</label>

            <select name="interestedIn" id="interestedIn">

              <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;--Select--&nbsp;&nbsp;&nbsp;&nbsp;</option>

              <option value="cultural">Cultural</option>

              <option value="food">Food</option>

              <option value="decoration">Decoration</option>

              <option value="fundraising">Fund Raising</option>

              <option value="publicity">Publicity</option>

              <option value="stallmanager">Stall Manager</option>

              <option value="venuecoordination">Venue Coordination</option>

              <option value="volunteercoordination">Volunteer Coordination</option>

            </select>

            <span id="interestedIn-info" class="info"></span>

        </li>
        <li>

            <label for="email">Email ID:</label>

            <input type="email" name="email" id="email" placeholder="Enter Email ID" />

            <span id="email-info" class="info"></span>

        </li>


        <li>

            <label for="message">Message:</label>

            <textarea name="message" id="message" cols="40" rows="6" ></textarea>

            <span id="message-info" class="info"></span>

        </li>

        


        <li>

        	<button name="submit" class="btnAction" onClick="volunteerRegistration();">Register</button>

        </li>

    </ul>

     <br>

    </div>

	

</div>



