<?php
	include_once 'header.php';
?>
<script>

function formReset() {
    document.getElementById("edit").reset();
}
 function checkForm() {
 var password = document.getElementById("password");
 var confirmpassword = document.getElementById("confirmpassword");

 var email = $('#email').val();

 if (password.value != confirmpassword.value) {
 	alert("Passwords do not match.");
 	return false;
 }

if (email != "") {
var x = document.forms["edit"]["email"].value;
var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    	}
    }
 }
</script>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Volunteer Page</h2>
	</div>
	<form name="acceptordecline" class="buttons" action="includes/accept.inc.php" method="POST">
	<button type="submit" class="btn btn-primary" name="button" value="1">Accept</button>
	<button type="submit" class="btn btn-warning" name="button" value="2">Decline</button>
	</form>

	<br/>
	<h2>Edit Profile Portion</h2>

<div id="editProfile">
<a data-toggle="modal" data-target="#edit-modal" onclick="formReset()">Edit Profile</a>
</div>
<div id="edit-modal" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<a class="close" data-dismiss="modal">×</a>
<h3>Edit Profile</h3>
</div>
<div class="modal-body">
<form class="edit" name="edit" action="includes/edit.inc.php" onsubmit="return checkForm()" id="edit" method="POST">
<input type="text" class="form-control" name="email" id="email" placeholder="Email">
<br/>
<input type="text" class="form-control" name="location" id="location" placeholder="Location">
<br/>
<textarea name="bio" rows="15" cols="48" class="form-control" placeholder="Update your bio here" maxlength="1000"></textarea>
<br/>
<input type="password" class="form-control" name="password" id="password" placeholder="New Password">
<br/>
<input type="password" class="form-control" name="passwordConfirm" id="confirmpassword" placeholder="Confirm Password">
<br/>
<br/>
<button class="btn btn-success" id="submit">Update</button>
<a href="#" class="btn" data-dismiss="modal">Close</a>
</form>
</div>
</div>
</div>
</div>
</section>

<?php
	include_once 'footer.php';
	/*
	if (isset($_SESSION['u_id'])) { to change content on page
	...
	} 
	*/
?>