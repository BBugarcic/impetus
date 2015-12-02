$(document).ready(function(event) {
	
	$('#myTables').DataTable( {
    	select: true
	} );

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
		
		// save current list title
		// send list title to php controller via ajax
	 	var title = $("#NewListTitle").val();
		if (title == '') {
			// alert if list title is not provided;
			$("#requiredAlert").html("<div class='alert alert-danger alert-dismissible col-md-4' role='alert'>" +
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
						$("#NewListTitle").val("");
						//enable add task button after creating list
						$("#addTask").prop("disabled", false);
					} else {
						$("#requiredAlert").html("<div class='alert alert-danger alert-dismissible col-md-4' role='alert'>" +
									"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
									"<strong>Ups! Something went wrong. Please reload page and try again.</strong></div>");
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
			$("#deleteAlert").html("<div class='alert alert-danger alert-dismissible col-md-10' role='alert'>" +
							"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
							"<strong>Are you sure you want to delete the list?</strong>" +
							"<button id='yes' type='button' class='btn btn-default'>Yes</button>" +
							"<button id='no' type='button' class='btn btn-default' data-dismiss='alert'>No</button></div>");
								
			var currTitle = $("#currentTitle").text();	
			$("#yes").click(function(){
				$.ajax({
					type: "POST",
					url: "../phpControllers/delCurrList.php",
					data: {
						currTitle: currTitle,
					},
					dataType: "json",
					success: function(response) {
						if(response.status == 1) {
							$("#titleRow").hide("slow");
							$("#deleteAlert").hide("slow");
							$("#itemRow").empty();
							$("#itemRow").hide("slow");
							$("#addItemRow").hide("slow");
							$("#itemCategory").hide("slow");
							$("#addTask").prop("disabled", true);
						} else {
							$("#deleteAlert").html("<div class='alert alert-danger alert-dismissible col-md-10' role='alert'>" +
										"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
										"<strong>Ups! Something went wrong. Please open your list in My Lists and delete it.</strong></div>");
						}
					},
					error: function(xhr,ajaxOptions,thrownError) {
						alert(thrownError);
					}
				});
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
					item: inputToDo
				},
				dataType: "json",
				success: function(response) {
					if(response.status == 1) {
						$("#itemRow").append("<div id='" + response.item_id + "' class='row'><div class='col-md-1'>" +
						"<div class='checkbox'><label>" +
						"<input id='" + response.item_id + "' type='checkbox'>" +
						"</label></div></div>" +
						"<div id='" + response.item_id + "' class='col-md-7 edit'>" + inputToDo + "</div>" +
						"<div class='edit_area' id='div_2'></div>" +
						"<div id='edit' class='col-md-1'>" +
						"<button id='" + response.item_id + "' type='submit' class='btn btn-default btn-xm'>" +
						"<span class='glyphicon glyphicon-wrench' aria-hidden='true'></span></button></div>" +
						"<div id='remove' class='col-md-1'>" +
						"<button id='" + response.item_id + "' type='button' class='btn btn-default btn-xm'>" +
						"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></div></div>").find('.edit').editable('../phpControllers/edit.php');
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

	 // remove and edit button handler
	$( "#itemRow" ).on( "click", "button", function() {
		var elementId = $(this).attr('id');
		var parentId = $(this).closest("div").attr("id");
		alert("perent div: " + parentId);		
		alert(elementId);
		
		// delete item
		// send json array to php controller
		// remove div after success
		if (parentId == "remove") {
			alert("u if-u");		
			$.ajax({
				type: "POST",
				url: "../phpControllers/deleteItem.php",
				data: {
					item_id: $(this).attr('id')
				},
				dataType: "json",
				success: function(response) {
					if(response.status == 1) {
						alert("uhvatio response");
						alert(elementId);
						$("#" + elementId).remove();
					} else {
						alert("Sorry! Something went wrong. Open your list first, and than delete it.");
					}
				},
				error: function(xhr,ajaxOptions,thrownError) {
					alert(thrownError);
				}
			});	
		}
	});

	// check item when done
	// uncheck item if done
	$( "#itemRow" ).on( "click", "input", function() {
		var elementId = $(this).attr('id');
		$(".edit").toggleClass("strike");
		alert(elementId);
		$.ajax({
			type: "POST",
			url: "../phpControllers/done.php",
			data: {
				item_id: $(this).attr('id'),
			},
			dataType: "json",
			success: function(response) {
				if(response.status == 1){
					alert("uradjeno");
				} else if (response.status == 0) {
					alert("nije uradjeno");	
				}
				else {
					alert("Sorry! Something went wrong.");
				}
			}
		});
	});				
});
