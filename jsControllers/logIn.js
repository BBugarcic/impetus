$(document).ready(function(){
	$("#logButton").click(function() {
		$.ajax ({
			type: "POST",
			url: "../phpControllers/logIn.php", // passing user's input to this address
			data: {
				username: $("#userLog").val(),
				pass: $("#passLog").val(),
			},	
			dataType: "json",
			success: function(response) {
				if(response.status == 1) {
					// if username and password are ok
					// redirect to...
					$(window).attr('location','http://localhost/view/loggedIn.php');	
				} else if (response.status == "errorUser") {
					$("#alertUsername").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
  						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
  						"<strong>Ups! Username is not correct! Please try again!</strong></div>");
				} else {
					$("#alertPassword").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
  						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
  						"<strong>Ups! Password! is not correct! Please try again!</strong></div>");					
				}
			},
			error: function(xhr,ajaxOptions,thrownError) {
				alert(thrownError);
			}
		});
		return false;
	});
});