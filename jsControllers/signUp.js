// passing users inputs to php controller
$(document).ready(function(){

		$('#subBtn1').click(function() {
			var username = $('username').val();
			var email = $('email').val();
			var pass = $('#pass').val();
			var conf = $('#conf').val();
			if (username == '' || email == '' || pass == '' || conf == '') {
				$("#alert").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
  						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
  						"<strong>All fields are required!</strong></div>");
			}
			else if (pass !== conf) {
				$("#alert").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
  						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
  						"<strong>Password and conformation are not the same!</strong></div>");
			}
			else {
				$.ajax({
					type: "POST",
					url:"/phpControllers/signUp.php", 
					data: {
						username: $('#username').val(),
						email: $('#email').val(),
						pass: $('#pass').val(),					
				},
				dataType: 'json',
				success: function (response) {
					if(response.status == 1){
						// if new user is registered
						// redirect to...
						$(window).attr('location','http://localhost/view/loggedIn.php');
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



