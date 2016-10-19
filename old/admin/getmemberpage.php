<html>
<head>
<script>

function submitform()
{
    document.forms["myform"].submit();
}

</script>
</head>
<body>

<form id="myform" action="getmember.php">
	Search: <input type='text' name='v'>
	<a href="javascript: submitform()">Submit</a>
</form>

Search By:
<select name="q" form="myform">
  <option value="fname">First Name</option>
  <option value="lname">Last Name</option>
  <option value="email">Email ID</option>
  <option value="phone">Phone Number</option>
</select>

</body>
</html>
