<?php
	include_once 'header.php';
?>

<script>
	function validateForm() {
		//checking for blank values
		var first = document.forms["signup"]["first"].value;
		if (first == "") {
			alert("First Name must be filled out.");
			return false;
		}
		var last = document.forms["signup"]["last"].value;
		if (last == "") {
			alert("Last Name must be filled out.");
			return false;
		}
		var email = document.forms["signup"]["email"].value;
		if (email == "") {
			alert("E-mail Name must be filled out.");
			return false;
		}
		var uid = document.forms["signup"]["uid"].value;
		if (uid == "") {
			alert("Username must be filled out.");
			return false;
		}
		var password = document.forms["signup"]["password"].value;
		if (password == "") { 
			alert("Password must be filled out.");
			return false;
		}
		var role = document.forms["signup"]["role"].value;
		if (role == "") {
			alert("Role must be filled out.");
			return false;
		}
		var location = document.forms["signup"]["location"].value;
		if (location == "") {
			alert("Location must be filled out.");
			return false;
		}
		var bio = document.forms["signup"]["bio"].value;
		if (bio == "" && role != "patient") {
			alert("Bio must be filled out since you are registering as a volunteer.");
			return false;
		}
		//checking if e-mail is valid
		var x = document.forms["signup"]["email"].value;
  	  	var atpos = x.indexOf("@");
    	var dotpos = x.lastIndexOf(".");
    		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        	alert("Not a valid e-mail address");
        	return false;
    	}
	}
</script>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form name="signup" class="signup-form" action="includes/signup.inc.php" onsubmit="return validateForm()" method="POST">
			<input type="text" name="first" placeholder="First Name">
			<input type="text" name="last" placeholder="Last Name">
			<input type="text" name="email" placeholder="Email">
			<input type="text" name="uid" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<input type="text" name="location" placeholder="Location">
			<textarea name="bio" rows="15" cols="48" placeholder="Type in a small bio about yourself and what you do, if you are a patient this field is not required" maxlength="1000"></textarea>
				<label for="role">Register as:</label>
			  	<select class="form-control" style="width:auto" name="role" id="role">
   				 	<option value="patient" selected>Patient</option>
   				 	<option value="virtualSpecialist">Virtual Specialist</option>
   				 	<option value="specialist">Specialist</option>
    				<option value="generalPractitioner">General Practitioner</option>
  				</select>
  			<button type="submit" name="submit" class="btn btn-info">Sign Up</button>
		</form>
	</div>
</section>

<?php
	include_once 'footer.php';
?>