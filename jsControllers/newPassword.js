// passing users inputs to php controller
$(document).ready(function(){

		$("#subNewPass").click(function() {
				$.ajax({
					type: "POST",
					url:"/phpControllers/newPassword.php", 
					data: {
						username: $("#username").val(),
						oldPass: $("#oldPass").val(),
						newPass: $("#newPass").val(),
						conf: $("#conf").val()	
				},
				dataType: 'json',
				success: function (response) {
					if (response.status == 1){
						$("#newPassword").modal("toggle");
						console.log("Password is successfuly changed!");
					} else if (response.status == "errorEmpty") {
						$("#alertNewPass").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
  						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
  						"<strong>All fields are required!</strong></div>");
					}  else if (response.status == "confError") {
						$("#alertNewPass").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
  						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
  						"<strong>Ups! Your new password and conformation are not the same!</strong></div>");
					} else if (response.status == "errorName") {
						$("#wrongUsername").html("<div class='alert alert-danger alert-dismissible' role='alert'>" + 
						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + 
						"<strong>Ups! Username is not correct!</strong></div>");
					} else if (response.status == "errorOldPass") {
						$("#alertOldPass").html("<div class='alert alert-danger alert-dismissible' role='alert'>" + 
						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + 
						"<strong>Ups! Old password is not correct!</strong></div>");
					} else {
						$("#alertWeakPass").html("<div class='alert alert-danger alert-dismissible' role='alert'>" + 
						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + 
						"<strong>Your new password must contain upper case letter, lower case letter and be at least 8 characters long!</strong></div>");
					}
				},
				error: function(xhr,ajaxOptions,thrownError) {
					alert("odje");
					alert(thrownError); 
				}
				
				});

			return false;
	});
});		