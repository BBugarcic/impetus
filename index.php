<?php include('./view/header.php'); ?>
	
	<body data-spy="scroll">
		<!-- modal window sign up form -->
		<div class="modal fade" id="signupForm"> 
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label=""><span>&times;</span></button>
						<h4 class="modal=title">Sign up</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal">
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">Username</label>
								<div class="col-md-5">
									<input id="username" type="text" class="form-control input-sm" required>
								</div>
							</div>
							<div id="takenName"></div>
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">Email address</label>
								<div class="col-md-5">
									<input id="email" type="email" class="form-control input-sm" required>
								</div>
							</div>
							<div id="emailAlert"></div>
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">Password</label>
								<div class="col-md-5">
									<input id="pass" type="password" class="form-control input-sm" required>
								</div>
							</div>
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">Confirm password</label>
								<div class="col-md-5">
									<input id="conf" type="password" class="form-control input-sm" required>
								</div>
							</div>
							<div id="alert">
							</div>
							<div class="form-group">
								<div class="col-md-5">
									<input id="subBtn1"  type="submit" class="btn btn-success" value="Submit">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- modal window log in form -->
		<div class="modal fade" id="loginForm">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label=""><span>&times;</span></button>
						<h4 class="modal=title">Log in</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal">
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">Username</label>
								<div class="col-md-5">
									<input id="userLog" type="text" class="form-control input-sm" required>
								</div>
							</div>
							<div id="alertUsername">
							</div>
							<div class = "form-group">
								<label class="col-md-4 com-md-offset-1">Password</label>
								<div class="col-md-5">
									<input id="passLog" type="password" class="form-control input-sm" required>
								</div>
							</div>
							<div id="alertPassword">
							</div>
							<div class="form-group">
								<div class="col-md-5">
									<input id="logButton" type="submit" class="btn btn-success" value="Submit">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
 	<!-- navigation bar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
			
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Impetus</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#loginForm" role="button" data-toggle="modal">Log in</a>
                    </li>
                    <li>
                        <a href="#signupForm" role="button" data-toggle="modal">Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	
	<!--background picture -->
	<div class="container">
		<img class="center-block" src="includes/img/smallhorse.jpg" />
		
	</div>
	
	<!-- main div with informations --> 
	<div class="container">
		<div class="col-xs-12 text-center">
			<h1>IMPETUS</h1>
			<a class="btn btn-default" href="#signupForm" role="button" data-toggle="modal">Sign up</a>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h2>Build it</h2>
				<p>Use simple to-do lists to achive your yearly, monthly and daily goals. 
					Build up your motivation. Achieve big goals by focusing on every day steps.</p>
			</div>
			<div class="col-md-4">
				<h2>Maintain it</h2>
				<p>Impuls to do something is just a beginning. Achieving is matter of effort, perseverance and patience.</p>
			</div>
			<div class="col-md-4">
				<h2>Increase it</h2>
				<p>Maintain your spiritual momentum and put yourself in action. Analyze, improve, press harder!</p>
			</div>
		</div>
	</div>



<?php include('./view/footer.php'); ?>
	
	
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="includes/js/bootstrap.min.js"></script>
		<script src="jsControllers/signUp.js"></script>
		<script src="jsControllers/logOut.js"></script>
		<script src="jsControllers/logIn.js"></script>
			
	
	</body>
</html>