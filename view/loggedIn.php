<?php include('header.php') ?>

<body data-spy="scroll">
			
	<!-- content of the body -->			
	<div class="container-fluid">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
						<a class="navbar-brand" href="#">Momentum</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">My Lists</a></li> 
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Change Email</a></li>
									<li><a href="#">New Password</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="#">Delete Account</a></li>
								</ul>
							</li>
						<li><a id="logOut" type="button" class="btn btn-link">Log out</a></li>
						<!-- http://localhost/index.php -->	
					</ul>
				</div>
			</div>
		</nav>

				
		<!-- picture -->
		<div class="row">
			<div id="smallpic" class="col-md-2">
				<img class="center-block" src="../includes/img/galop.png" />
			</div>
		
		
			
			<div id="block" class="col-md-8">

				<form id="list" class="form-inline">
					<button id="newList" type="button" class="btn btn-default btn-sm">New List</button>
					<div id="titlePlace" class="form-group">
						<label for="NewListTitle" class="sr.only">New list</label>
						<input id="NewListTitle" type="text" class="form-control" placeholder="List Title">
						<button id="createList" type="submit" class="btn btn-default btn-xm">
							<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> <!--........... create -->
						</button>
						<button id="listCancel" type="submit" class="btn btn-default btn-xm">
							<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> <!--........... cancel -->
						</button>
					</div>
					<div id="requiredAlert">
					</div>
				</form>
			</div>
		</div>
		
		
		
		<div class="row">
			<div class="col-md-2">
				<button id="addTask" type="button" class="btn btn-default btn-sm center-block">Add task</button>
				<div id="itemCategory" class="btn-group-vertical center-block" role="group">
					<button id="chooseToDo" type="submit" class="btn btn-default btn-sm">To-do</button>
					<button type="submit" class="btn btn-default btn-sm">Repetition</button>
					<button type="submit" class="btn btn-default btn-sm">On time</button>
					<button id="cancelTask" type="submit" class="btn btn-default btn-sm">
						<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
					</button>
				</div>
			</div>			
			<div id="listCont" class="col-md-8"> <!-- .........................................................list content -->
				<div class="row">
					<div id="titleRow">
						<div class="col-md-10"> 
							<div id="currentTitle">
							 <!-- Title of current list -->
							</div>
						</div>
						<div class="col-md-2">
							<button id="deleteCurrList" type="submit" class="btn btn-default btn-xm">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> <!--........... delete list -->
							</button>
						</div>
					</div>
					<div id="deleteAlert">
					</div>
				</div>
				<div class="row">
					<div id="addItemRow">
						<div class="col-md-10">
							<input id="inputToDo" type="text" class="form-control" placeholder="To-do"> 
						</div>
						<div class="col-md-1"> <!--.....................................................add item -->
							<button id="addItem" type="submit" class="btn btn-default btn-xm">
								<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> <!-- .........add item -->
							</button>
						</div>
					</div>	
				</div>
				<div class="row">
					<div id="itemRow">
						
					</div>	
				</div> 	
			</div> <!-- .......................................................................... end of list content -->
		</div>	
	</div>	
	
	<div class="container">
		<table id="myTables" class="table display">
    		<thead>
        		<tr>
					<th>List title</th>
					<th>Date and time</th>
				</tr>
    	</thead>
    	<tbody>
        	<tr>
				<td>Row 1 Data 1</td>
				<td>Row 1 Data 2</td>
        	</tr>
    </tbody>
</table>
	</div>	
</body>

<?php include('footer.php') ?>

	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	<!-- jquery -->
	<script src="../includes/js/bootstrap.min.js"></script>		<!-- bootstrap -->
	<script src="../includes/js/jquery.jeditable.js"></script>	<!-- jeditable plug-in -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10,r-2.0.0,se-1.1.0/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/s/bs/dt-1.10.10,r-2.0.0,se-1.1.0/datatables.min.js"></script>

	
	<script src="../jsControllers/logOut.js"></script>
	<script src="../jsControllers/buttons.js"></script>
	<script src="../jsControllers/edit.js"></script>