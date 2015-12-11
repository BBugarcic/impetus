// passing users inputs to php controller
$(document).ready(function(){

		$("#deleteAcc").click(function() {
				$.ajax({
					type: "POST",
					url:"/phpControllers/deleteAccount.php", 
					data: {
						delUsername: $("#delUsername").val(),
						delPass: $("#delPass").val()
				},
				dataType: 'json',
				success: function (response) {
					if (response.status == 1){
						$("#newPassword").modal("toggle");
						// redirect to index page
						$(window).attr('location','http://localhost/index.php');

					} else if (response.status == "errorEmpty") {
						$("#alertBadPassword").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
  						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
  						"<strong>Both fields are required!</strong></div>");
						  
					} else if (response.status == "errorName") {
						$("#alertBadName").html("<div class='alert alert-danger alert-dismissible' role='alert'>" + 
						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + 
						"<strong>Ups! Username is not correct!</strong></div>");
						
					} else {
						$("#alertBadPassword").html("<div class='alert alert-danger alert-dismissible' role='alert'>" + 
						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + 
						"<strong>Ups! Password is not correct!</strong></div>");
					} 
				},
				error: function(xhr,ajaxOptions,thrownError) {
					alert(thrownError); 
				}
				
				});

			return false;
	});
});		