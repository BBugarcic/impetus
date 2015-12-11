<?php include('header.php') ?>

<body data-spy="scroll">
			
		<div class="modal fade" id="changeEmail"> 
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label=""><span>&times;</span></button>
						<h4 class="modal=title">Change email</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal">
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">Old email address</label>
								<div class="col-md-5">
									<input id="oldEmail" type="email" class="form-control input-sm" required>
								</div>
							</div>
							<div id="wrongOldEmail">
							</div>
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">New email address</label>
								<div class="col-md-5">
									<input id="newEmail" type="email" class="form-control input-sm" required>
								</div>
							</div>
							<div id="changeEmailAlert">
							</div>
							<div class="form-group">
								<div class="col-md-5">
									<input id="subNewEmail"  type="submit" class="btn btn-success" value="Submit">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="newPassword"> 
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label=""><span>&times;</span></button>
						<h4 class="modal=title">Change password</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal">
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">Username</label>
								<div class="col-md-5">
									<input id="username" type="text" class="form-control input-sm" required>
								</div>
							</div>
							<div id="wrongUsername">
							</div>
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">Old password</label>
								<div class="col-md-5">
									<input id="oldPass" type="password" class="form-control input-sm" required>
								</div>
							</div>
							<div id="alertOldPass">
							</div>
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">New password</label>
								<div class="col-md-5">
									<input id="newPass" type="password" class="form-control input-sm" required>
								</div>
							</div>
							<div id="alertWeakPass">
							</div>
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">Confirm new password</label>
								<div class="col-md-5">
									<input id="conf" type="password" class="form-control input-sm" required>
								</div>
							</div>
							<div id="alertNewPass">
							</div>
							<div class="form-group">
								<div class="col-md-5">
									<input id="subNewPass"  type="submit" class="btn btn-success" value="Submit">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="deleteAccount">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label=""><span>&times;</span></button>
						<h4 class="modal=title">Delte Account</h4>
					</div>
					<div class="modal-body">
						<div>
							<p class="pdel">If you delete your account, you will delete all information connected with your account.</p>
							<p class="pdel">If you still want to delete your account, please fill in the form and press delete.</p>
						</div>
						<form class="form-horizontal">
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">Username</label>
								<div class="col-md-5">
									<input id="delUsername" type="text" class="form-control input-sm" required>
								</div>
							</div>
							<div id="alertBadName">
							</div>
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">Password</label>
								<div class="col-md-5">
									<input id="delPass" type="password" class="form-control input-sm" required>
								</div>
							</div>
							<div id="alertBadPassword">
							</div>
							<div class="form-group">
								<div class="col-md-5">
									<input id="deleteAcc" type="submit" class="btn btn-success" value="Delete">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
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
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#changeEmail" role="button" data-toggle="modal">Change Email</a></li>
									<li><a href="#newPassword" role="button" data-toggle="modal">New Password</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="#deleteAccount" role="button" data-toggle="modal">Delete Account</a></li>
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
					<div id="itemRow" style="display:block">
						
					</div>	
				</div> 	
			</div> <!-- .......................................................................... end of list content -->
		</div>	
	</div>	
	
	<div class="container">
		<table id="myTables" class="display" width="100%">
				<!--<table id="myTables" class="table display"> -->
				<thead>
						<tr>
							<th>List title</th>
							<th>Date and time</th>
						</tr>
				</thead>
		</table>
	</div>
	<div id="noLists" class="container">
	</div>	
</body>

<?php include('footer.php') ?>

	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	<!-- jquery -->
	<script src="../includes/js/bootstrap.min.js"></script>		<!-- bootstrap -->
	<script src="../includes/js/jquery.jeditable.js"></script>	<!-- jeditable plug-in -->
	<script src="../includes/js/bootstrap-checkbox.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs/dt-1.10.10,r-2.0.0,se-1.1.0/datatables.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/s/bs/dt-1.10.10,r-2.0.0,se-1.1.0/datatables.js"></script>

	<script src="../jsControllers/logOut.js"></script>
	<script src="../jsControllers/buttons.js"></script>
	<script src="../jsControllers/newPassword.js"></script>
	<script src="../jsControllers/newEmail.js"></script>
	<script src="../jsControllers/deleteAccount.js"></script>