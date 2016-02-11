// passing users inputs to php controller
$(document).ready(function(){

		$('#subBtn1').click(function() {
			var username = $('#username').val();
			var email = $('#email').val(); 
			var pass = $('#pass').val();
			var conf = $('#conf').val();
			if (username == '' || email == '' || pass == '' || conf == '') {
				$("#alert").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
  						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
  						"<strong>All fields are required!</strong></div>");
			}
			else {
				$.ajax({
					type: "POST",
					url:"/phpControllers/signUp.php", 
					data: {
						username: $('#username').val(),
						email: $('#email').val(),
						pass: $('#pass').val(),
						conf: $('#conf').val()				
				},
				dataType: 'json',
				success: function (response) {
					if(response.status == 1) {
						// if new user is registered
						// redirect to...
						
					/*var host = $(location).attr('hostname');
					//console.log(host);
					$(window).attr('location','http://' + host + '/view/loggedIn.php');*/
					
											
					$(window).attr('location','/view/loggedIn.php');
					} else if (response.status == "emailError") {
						// alert if email is not in proper format
						$("#emailAlert").html("<div class='alert alert-danger alert-dismissible' role='alert'>" + 
						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + 
						"<strong>Ups! It looks like you typed invalid email address!</strong></div>");
					} else if (response.status == "passError") {
						// alert if conformation and password are not the same
						$("#alert").html("<div class='alert alert-danger alert-dismissible' role='alert'>" + 
						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + 
						"<strong>Ups! It looks like password and conformation are not the same!</strong></div>");
					} else if (response.status == "weakPass") {
						// alert if password is weak
						$("#alert").html("<div class='alert alert-danger alert-dismissible' role='alert'>" + 
						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + 
						"<strong>Your password must contain upper case letter, lower case letter and be at least 8 characters long!</strong></div>");
					} else {
						$("#takenName").html("<div class='alert alert-danger alert-dismissible' role='alert'>" + 
						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + 
						"<strong>Username is already taken!</strong></div>");						
					}
				},
				error: function(xhr,ajaxOptions,thrownError) {
					alert(thrownError);	 
				}
				
				});

			return false;
			}
			
		});		
});



