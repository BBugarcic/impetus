
// redirect user to home page
// when clicked on log out button
$(document).ready(function() {
	$('#logOut').click(function() {
		$.ajax({
			type: "POST",
			url:'/phpControllers/logOut.php',
			data: {
				val: 'logOut'	
			},
			dataType: 'json',
			success: function (response) {
				if(response.status == 1) {
					// redirect to...					
					$(window).attr('location','http://localhost/index.php');
				}
			},
			error: function(xhr,ajaxOptions,thrownError) {
				alert(thrownError);
			}
		});
		return false;
	});
});



