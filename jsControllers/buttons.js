$(document).ready(function(event) {

	
	// initialize table with server-side processing (user's lists)
	// send ajax to php script
	var table = $('#myTables').DataTable( {
						"processing": true,
						"serverSide": true,
						"ajax": "../phpControllers/loadData.php",
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
		$("#itemRow").empty();
		$("#itemRow").hide();
		
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
					alert("thrownError");
				}
			});
			
			// hide creating form and show title of created list
			// enable new list button for creating new list
			$("#titlePlace").hide("slow");
			$("#titleRow").show();
			$("#newList").prop("disabled", false);
			// reload table, add new list
			table.ajax.reload();
	
		}
				event.preventDefault();		
	});
		
		
	// delete current list
	$("#deleteCurrList").click(function(){
		var elementId = $(this).attr('id');
		var parentId = $(this).closest("div").attr("id");

			$("#deleteAlert").html("<div class='alert alert-danger alert-dismissible col-md-10' role='alert'>" +
							"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
							"<strong>Are you sure you want to delete the list?</strong>" +
							"<button id='yes' type='button' class='btn btn-default'>Yes</button>" +
							"<button id='no' type='button' class='btn btn-default' data-dismiss='alert'>No</button></div>");
			
		$("#deleteAlert").css('display','block');					
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
						$("#itemRow").hide("slow");
						$("#addItemRow").hide("slow");
						$("#itemCategory").hide("slow");
						$("#addTask").prop("disabled", true);
						
						// reload table after deleting list
						table.ajax.reload();
							
					} else {
						$("#deleteAlert").html("<div class='alert alert-danger alert-dismissible col-md-10' role='alert'>" +
									"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
									"<strong>Ups! Something went wrong. Please open your list from table and delete it, or try after reloading page.</strong></div>");
					}
				},
				error: function(xhr,ajaxOptions,thrownError) {
					alert(thrownError);
				}
			});
		});
			
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
						"<div id='" + response.item_id + "' class='col-md-7 edit '>" + inputToDo + "</div>" +
						"<div class='edit_area' id='div_2'></div>" +
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

	// remove item button handler
	$( "#itemRow" ).on( "click", "button", function() {
		
		// get id of clicked element and id of parent element
		var elementId = $(this).attr('id');
		var parentId = $(this).closest("div").attr("id");
		
		// delete item
		// send json array to php controller
		// remove div after success
		if (parentId == "remove") {		
			$.ajax({
				type: "POST",
				url: "../phpControllers/deleteItem.php",
				data: {
					item_id: $(this).attr('id')
				},
				dataType: "json",
				success: function(response) {
					if(response.status == 1) {
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
		// get id of clicked checkbox
		var elementId = $(this).attr('id');
		// text decoration when item is done
		$("#" + elementId).find(".edit").toggleClass("strike");
		$.ajax({
			type: "POST",
			url: "../phpControllers/done.php",
			data: {
				item_id: $(this).attr('id'),
			},
			dataType: "json",
			success: function(response) {
				if(response.status == 1){
				console.log("done");
				} else if (response.status == 0) {
					console.log("not done");	
				}
				else {
					alert("Sorry! Something went wrong.");
				}
			}
		});
	});



	// handling click on table row
	// show content of clicked list in place of current list (above table)
	// enable adding new items to this list
	$('#myTables tbody').on('click', 'tr', function () {
		if ($("#addTask").prop("disabled", true)){
			$("#addTask").prop("disabled", false);
		}
        // get data from clicked row
		var data = table.row( this ).data();
		// put and display data in place of current title
		$("#currentTitle").html("<p>" + data[0] + "</p>");
		$("#titleRow").show("slow");
		
		// send data to php controller
		$.ajax ({
			type: "POST",
			url: "../phpControllers/listPreview.php",
			data: {
				title: data[0],
				date: data[1]
			},
			dataType: "json",
			success: function(response) {
					$("#addItemRow").hide("slow");
					$("#itemCategory").hide("slow");
					// for testing purposes
					console.log(JSON.stringify(response, undefined, 2));
					
					$("#itemRow").empty();
					$.each(response, function() {
						if (this.done == 0) {
						// display items that are not done
						$("#itemRow").append("<div id='" + this.id + "' class='row'><div class='col-md-1'>" +
						"<div class='checkbox' checked='disabled'><label>" +
						"<input id='" + this.id + "' type='checkbox'>" +
						"</label></div></div>" +
						"<div id='" + this.id + "' class='col-md-7 edit'>" + this.item + "</div>" +
						"<div class='edit_area' id='div_2'></div>" +
						"<div id='remove' class='col-md-1'>" +
						"<button id='" + this.id + "' type='button' class='btn btn-default btn-xm'>" +
						"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></div></div>").find('.edit').editable('../phpControllers/edit.php');
						} else {
							// display items that are already done
							$("#itemRow").append("<div id='" + this.id + "' class='row'><div class='col-md-1'>" +
							"<div class='checkbox'><label>" +
							"<input id='" + this.id + "' type='checkbox' class='checkbox' checked='checked'>" +
							"</label></div></div>" +
							"<div id='" + this.id + "' class='col-md-7 edit strike'>" + this.item + "</div>" +
							"<div class='edit_area' id='div_2'></div>" +
							"<div id='remove' class='col-md-1'>" +
							"<button id='" + this.id + "' type='button' class='btn btn-default btn-xm'>" +
							"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></div></div>").find('.edit').editable('../phpControllers/edit.php');					
						}
					}
					
					);
					$("#itemRow").css('display','block');
			}
		}); 
		
    } );	
});
