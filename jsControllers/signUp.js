// passing users inputs to php controller
$(document).ready(function(){

		$('#subBtn1').click(function() {
			var pass = $('#pass').val();
			var conf = $('#conf').val();
			if (pass !== conf) {
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
						$(window).attr('location','http://localhost/view/loggedIn.php');
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


