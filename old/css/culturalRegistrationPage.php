<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="../css/form-styles.css" rel="stylesheet">

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>
function culturalRegistration() {
	var valid;
	valid = validateCulturalRegistration();
	if(valid) {
		jQuery.ajax({
		url: "cultural_registration_form.php",
		data:'nameofevent='+$("#nameofevent").val()
		      +'&ownerofevent='+$("#ownerofevent").val()
		      +'&mobile='+$("#mobile").val()
		      +'&noofparticipants='+$("#noofparticipants").val()
		      +'&typeofevent='+$("#typeofevent").val()
		      +'&duration='+$("#duration").val()
		      +'&email='+$("#email").val()
		      +'&message='+$("#message").val(),
		type: "POST",
		success:function(data){
		$("#cultural-registration-status").html(data);
		  $("#nameofevent").val('');
		    $("#ownerofevent").val('');
		    $("#mobile").val('');
		    $("#noofparticipants").val('');
		    $("#typeofevent").val('');
		    $("#duration").val('');
		    $("#email").val('');
		    $("#message").val('');
		},
		error:function (){}
		});
	}
}

function validateCulturalRegistration() {
	var valid = true;
	$(".demoInputBox").css('background-color','');
	$(".info").html('');

	if(!$("#nameofevent").val()) {
		$("#nameofevent-info").html("(required)");
		$("#nameofevent").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#ownerofevent").val()) {
		$("#ownerofevent-info").html("(required)");
		$("#ownerofevent").css('background-color','#FFFFDF');
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
	if(!$("#noofparticipants").val()) {
		$("#noofparticipants-info").html("(required)");
		$("#noofparticipants").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#noofparticipants").val().match(/^[\d\s]+$/)) {
		$("#noofparticipants-info").html("(Number Only)");
		$("#noofparticipants").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#typeofevent").val()) {
		$("#typeofevent-info").html("(required)");
		$("#typeofevent").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#duration").val()) {
		$("#duration-info").html("(required)");
		$("#duration").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#duration").val().match(/^[\d\s]+$/)) {
		$("#duration-info").html("(Number Only)");
		$("#duration").css('background-color','#FFFFDF');
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
.info{font-size:.8em;color: #adf;letter-spacing:2px;padding-left:5px;}
.error{background-color: #FFFFFF;border:#AA4502 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;}
.success{border:#0FA015 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;text-align: center;}
</style>

<hr>

<div id="envelope">
<div id="cultural-registration-status"></div>
	
	<div class="contact_form">
	
	<ul>
        <li>
             <h3>Cultural Registration for Ugadi Celebrations</h3>
        </li>
        <li>
            <label for="nameofevent">Name of the Event:</label>
            <input type="text"  name="nameofevent" id="nameofevent" placeholder="Enter Name of event"  />
            <span id="nameofevent-info" class="info"></span>
        </li>
        <li>
            <label for="ownerofevent">Owner of the Event:</label>
            <input type="text" name="ownerofevent" id="ownerofevent" placeholder="Enter Owner of event"/>
            <span id="ownerofevent-info" class="info"></span>
        </li>
        <li>
            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile number" />
            <span id="mobile-info" class="info"></span>
        </li>
        <li>
            <label for="noofparticipants">No of Participants:</label>
            <input type="text" name="noofparticipants" id="noofparticipants" placeholder="Enter No of Participants count" />
            <span id="noofparticipants-info" class="info"></span>
        </li>
        <li>
            <label for="typeofevent">Type of Event:</label>
            <select name="typeofevent" id="typeofevent">
              <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;--Select--&nbsp;&nbsp;&nbsp;&nbsp;</option>
              <option value="Dancing">Dancing</option>
              <option value="Singing">Singing</option>
              <option value="Skit">Skit</option>
              <option value="Other">Fund Other</option>
            </select>
            <span id="typeofevent-info" class="info"></span>
        </li>
        <li>
            <label for="duration">Duration in minutes:</label>
            <input type="text" name="duration" id="duration" placeholder="Enter Duration in minutes" />
            <span id="duration-info" class="info"></span>
        </li>
        <li>
            <label for="email">Email ID:</label>
            <input type="email" name="email" id="email" placeholder="Enter Email ID" />
            <span id="email-info" class="info"></span>
        </li>
        <li>
            <label for="message">Message:</label>
            <textarea name="message" id="message" cols="40" rows="6" ></textarea>
            
        </li>
        <li>
        	
        	<button name="submit" class="btnAction" onClick="culturalRegistration();">Register</button>
        </li>
    </ul>
     <br>
    </div>
	
</div>

