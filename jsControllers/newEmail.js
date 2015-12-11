// passing users inputs to php controller
$(document).ready(function(){

		$("#subNewEmail").click(function() {
				$.ajax({
					type: "POST",
					url:"/phpControllers/newEmail.php", 
					data: {
						oldEmail: $("#oldEmail").val(),
						newEmail: $("#newEmail").val()				
				},
				dataType: 'json',
				success: function (response) {
					if (response.status == 1){
						// hide modal after success
						$("#changeEmail").modal("toggle");
						console.log("Email is successfuly changed!");
					} else if (response.status == "errorEmpty") {
						// alert if any field is empty
						$("#changeEmailAlert").html("<div class='alert alert-danger alert-dismissible' role='alert'>" +
  						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
  						"<strong>Both fields are required!</strong></div>");
					} else {
						// alert if old email is incorrect
						$("#wrongOldEmail").html("<div class='alert alert-danger alert-dismissible' role='alert'>" + 
						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + 
						"<strong>Ups! It looks you typed the wrong old email address. Please try again!</strong></div>");
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
