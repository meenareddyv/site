<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="../css/form-styles.css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>

function childrenSelection(value) {
	var i = 1;
	while ( i <= value ) {
		$('#child' + i).show();
		i++;
	}
	while ( i <= 5 ) {
		$('#child' + i).hide();
		i++;
	}
}

function memberRegistration() {
	var valid;
	valid = validateMemberRegistration();

	if(valid) {
		jQuery.ajax({
		url: "member_registration_form.php",
		data:'fname='+$("#fname").val()
		      +'&lname='+$("#lname").val()
		      +'&mobile='+$("#mobile").val()
		      +'&sname='+$("#sname").val()
		      +'&noOfChildren='+$("#noOfChildren").val()
		      +'&child1Name='+$("#child1Name").val()
		      +'&child1Age='+$("#child1Age").val()
		      +'&child1Sex='+$("#child1Sex").val()
		      +'&child2Name='+$("#child2Name").val()
		      +'&child2Age='+$("#child2Age").val()
		      +'&child2Sex='+$("#child2Sex").val()
		      +'&child3Name='+$("#child3Name").val()
		      +'&child3Age='+$("#child3Age").val()
		      +'&child3Sex='+$("#child3Sex").val()
		      +'&child4Name='+$("#child4Name").val()
		      +'&child4Age='+$("#child4Age").val()
		      +'&child4Sex='+$("#child4Sex").val()
		      +'&child5Name='+$("#child5Name").val()
		      +'&child5Age='+$("#child5Age").val()
		      +'&child5Sex='+$("#child5Sex").val()
		      +'&email='+$("#email").val(),
		type: "POST",
		success:function(data){
		$("#member-registration-status").html(data);
		  $("#fname").val('');
		  $("#lname").val('');
		    $("#mobile").val('');
		    $("#sname").val('');
		    $("#email").val('');
		    $("#child1Name").val('');
                    $("#child2Name").val('');
                    $("#child3Name").val('');
                    $("#child4Name").val('');
                    $("#child5Name").val('');
                    $("#child1Age").val('');
                    $("#child2Age").val('');
                    $("#child3Age").val('');
                    $("#child4Age").val('');
                    $("#child5Age").val(''); 
		},
		error:function (){}
		});
	}
}

function validateMemberRegistration() {
	var valid = true;
	$(".demoInputBox").css('background-color','');
	$(".info").html('');

	if(!$("#fname").val()) {
		$("#fname-info").html("(required)");
		$("#fname").css('background-color','#FFFFDF');
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

.info{font-size:.8em;color: #FF6600;letter-spacing:2px;padding-left:5px;}

.error{background-color: #FFFFFF;border:#AA4502 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;}

.success{border:#0FA015 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;text-align: center;}

</style>

<div id="envelope">
<div id="member-registration-status"></div>
	<div class="contact_form">
	<ul>
        <li>
             <h3>Member Registration</h3>
        </li>

        <li>
            <label for="fname">First Name:</label>
            <input type="text"  name="fname" id="fname" placeholder="Enter First Name"  />
            <span id="fname-info" class="info"></span>
        </li>
        <li>
            <label for="lname">Last Name:</label>
            <input type="text"  name="lname" id="lname" placeholder="Enter Last Name"  />
            <span id="lname-info" class="info"></span>
        </li>

        <li>
            <label for="mobile">Contact No.:</label>
            <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile number" />
            <span id="mobile-info" class="info"></span>
        </li>

        <li>
            <label for="sname">Spouse Name:</label>
            <input type="text"  name="sname" id="sname" placeholder="Enter Spouse Name"  />
            <span id="sname-info" class="info"></span>
        </li>

        <li>
            <label for="email">Email ID:</label>
            <input type="email" name="email" id="email" placeholder="Enter Email ID" />
            <span id="email-info" class="info"></span>
        </li>

        <li>
            <label for="noOfChildren">No of Children:</label>
            <select name="noOfChildren" id="noOfChildren" onchange="childrenSelection(this.value)">
              <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;--Select--&nbsp;&nbsp;&nbsp;&nbsp;</option>
              <option value="1">1 - One</option>
              <option value="2">2 - Two</option>
              <option value="3">3 - Three</option>
              <option value="4">4 - Four</option>
              <option value="5">5 - Five</option>
            </select>

            <span id="noOfChildren-info" class="info"></span>
        </li>

        <li id="child1" style="display:none;">
            <label for="child1Name">Child - 1:</label>
            <input type="text" name="child1Name" id="child1Name" placeholder="Enter Name"/>
            <span id="child1Name-info" class="info"></span>
            <input type="text" name="child1Age" id="child1Age" placeholder="Enter Age" style="width:110px;"/>
            <span id="child1Age-info" class="info"></span>
            <select name="child1Sex" id="child1Sex" style="width:110px;height:25px;">
              <option value="female">Female</option>
              <option value="male">Male</option>
			</select>
        </li>
        <li id="child2" style="display:none;">
            <label for="child2Name">Child - 2:</label>
            <input type="text" name="child2Name" id="child2Name" placeholder="Enter Name"/>
            <span id="child2Name-info" class="info"></span>
            <input type="text" name="child2Age" id="child2Age" placeholder="Enter Age" style="width:110px;"/>
            <span id="child2Age-info" class="info"></span>
            <select name="child2Sex" id="child2Sex" style="width:110px;height:25px;">
              <option value="female">Female</option>
              <option value="male">Male</option>
			</select>
        </li>
        <li id="child3" style="display:none;">
            <label for="child3Name">Child - 3:</label>
            <input type="text" name="child3Name" id="child3Name" placeholder="Enter Name"/>
            <span id="child3Name-info" class="info"></span>
            <input type="text" name="child3Age" id="child3Age" placeholder="Enter Age" style="width:110px;"/>
            <span id="child3Age-info" class="info"></span>
            <select name="child3Sex" id="child3Sex" style="width:110px;height:25px;">
              <option value="female">Female</option>
              <option value="male">Male</option>
			</select>
        </li>
        <li id="child4" style="display:none;">
            <label for="child4Name">Child - 4:</label>
            <input type="text" name="child4Name" id="child4Name" placeholder="Enter Name"/>
            <span id="child4Name-info" class="info"></span>
            <input type="text" name="child4Age" id="child4Age" placeholder="Enter Age" style="width:110px;"/>
            <span id="child4Age-info" class="info"></span>
            <select name="child4Sex" id="child4Sex" style="width:110px;height:25px;">
              <option value="female">Female</option>
              <option value="male">Male</option>
			</select>
        </li>
        <li id="child5" style="display:none;">
            <label for="child5Name">Child - 5:</label>
            <input type="text" name="child5Name" id="child5Name" placeholder="Enter Name"/>
            <span id="child5Name-info" class="info"></span>
            <input type="text" name="child5Age" id="child5Age" placeholder="Enter Age" style="width:110px;"/>
            <span id="child5Age-info" class="info"></span>
            <select name="child5Sex" id="child5Sex" style="width:110px;height:25px;">
              <option value="female">Female</option>
              <option value="male">Male</option>
			</select>
        </li>

        <li>
        	<button name="submit" class="btnAction" onClick="memberRegistration();">Register</button>
        </li>

    </ul>

     <br>

    </div>
</div>
