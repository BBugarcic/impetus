$(document).ready(function(event) {
	//disable add task button before creating list
	$("#addTask").prop("disabled", true);
	
	//show inline form after click
	$("#newList").click(function() {
		$("#titlePlace").show("slow");
		$("#newList").prop("disabled", true);
	 });
	 
	 // creating new list
	 // enable new list button for next list
	 $("#createList").click(function(event) {
		$("#newList").prop("disabled", false);
		
		// send list title to php controller via ajax
		var title = $("#NewListTitle").val();
		if (title == '') {
			//alert("List title is requiered");
			$("#required").html("<div class='alert alert-danger alert-dismissible col-md-4' role='alert'>" +
  						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
  						"<strong>List title is required!</strong></div>");
		} else {
			$.ajax({
				type: "POST",
				url: "../phpControllers/newList.php", // passing user's input to php controller
				data: {
					ListTitle: $("#NewListTitle").val(), 
				},
				dataType: "json",
				success: function(response) {
					if(response.status == 1) {
						$("#currentTitle").html("<p>" + title + "</p>");
						
						//enable add task button after creating list
						$("#addTask").prop("disabled", false);
					} else {
						alert("Ups! Something went wrong, please reload page and try again.");
					}
				},
				error: function(xhr,ajaxOptions,thrownError) {
					alert(thrownError);
				}	
			});
			
			$("#titlePlace").hide("slow");
			$("#titleRow").show();
			$("#newList").prop("disabled", false);
		}
		
		
		// delete current list
		$("#deleteCurrList").click(function(){	
			var currTitle = $("#NewListTitle").val();	
			$.ajax({
				type: "POST",
				url: "../phpControllers/delCurrList.php",
				data: {
					currTitle: currTitle,
				},
				dataType: "json",
				success: function(response) {
					if(response.status == 1) {
						$("#NewListTitle").val("");
						$("#titleRow").hide("slow");
						$("#itemRow").empty();
						$("#itemRow").hide("slow");
						$("#addItemRow").hide("slow");
					} else {
						alert("Sorry! Something went wrong. Open your list first, and than delete it.");
					}
				},
				error: function(xhr,ajaxOptions,thrownError) {
					alert(thrownError);
				}
			});
		});
			event.preventDefault();		
	 	});
		

	 
	 // cancel creating list
	 $("#listCancel").click(function(event) {
		$("#newList").prop("disabled", false);
		$("#titlePlace").hide("slow");
		event.preventDefault();
	 });
	 
	 // show categories
	 $("#addTask").click(function() {
	 	$("#itemCategory").show("slow");
		$("#addTask").prop("disabled", true);	
	 });
	 
	 // hide categories
	 // enable add task button
	 $("#cancelTask").click(function() {
	 	$("#itemCategory").hide("slow");
		$("#addTask").prop("disabled", false);	
	 });
	 
	 // to-do category
	 $("#chooseToDo").click(function() {
		$("#addItemRow").show("show");	 
	 });
	 
	 // add item into current list
	 $("#addItem").click(function (){
		 var inputToDo = $("#inputToDo").val();
		 $("#inputToDo").val("");
		 $.ajax({
				type: "POST",
				url: "../phpControllers/newItem.php",
				data: {
					item: inputToDo,
					listTitle: $("#NewListTitle").val()
				},
				dataType: "json",
				success: function(response) {
					if(response.status == 1) {
						$("#itemRow").append("<div id='newItem' class='row'><div class='col-md-1'>" +
						"<div class='checkbox'><label>" +
						"<input type='checkbox'>" +
						"</label></div></div>" +
						"<div id='ToDo' class='col-md-7'><p id='item'>" + inputToDo + "</p></div>" +
						"<div id='remove' class='col-md-1'>" +
						"<button type='submit' class='btn btn-default btn-xm'>" +
						"<span class='glyphicon glyphicon-wrench' aria-hidden='true'></span></button></div>" +
						"<div id='remove' class='col-md-1'>" +
						"<button type='submit' class='btn btn-default btn-xm'>" +
						"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></div></div>");
						$("#newItem").show("slow");	
					} else {
						alert("Sorry! Something went wrong.");
					}
				},
				error: function(xhr,ajaxOptions,thrownError) {
					alert(thrownError);
				}
			});
			
			$("#itemRow").show("slow");
		});
		
			 event.preventDefault();		
	 });
