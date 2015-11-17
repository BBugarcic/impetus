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
				} else {
					alert("Ups! It looks like you've typed wrong username or password");
				}
			},
			error: function(xhr,ajaxOptions,thrownError) {
				alert(thrownError);
			}
		});
		return false;
	});
});