// passing users inputs to php controller
$(document).ready(function(){

		$('#subBtn1').click(function() {
			var username = $('username').val();
			var email = $('email').val();
			var pass = $('#pass').val();
			var conf = $('#conf').val();
			if (username == '' || email == '' || pass == '' || conf == '') {
				alert("All fields are required");
			}
			else if (pass !== conf) {
				alert("Password and confirmation are not the same.");
			}
			
			else{
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
						alert("Username is already taken.")
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



