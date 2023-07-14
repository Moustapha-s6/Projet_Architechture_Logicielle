<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login User</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="asset/css/loginAdmin.css"/>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class="wrapper fadeInDown">
  		<div id="formContent">
    		<div class="fadeIn first">
      			<img src="asset/img/user2.png" id="icon" alt="User Icon" />
    		</div>

    		<!-- Login Form -->
    		<form action="controller/loginController.php" method="POST">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
      			<input type="text" id="login" class="fadeIn second" name="uname" placeholder="login">
      			<input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      			<input type="submit" class="fadeIn fourth" name="loginSubmit" value="Log In"><hr>
      			<div class="container">
      				<div class="row" style="margin-bottom: 10px;margin-top: -5px;">
      					<div class="col-md-6"><a href="index.html" class="btn btn-danger" class="fadeIn fifth">Back</a></div>
      					<div class="col-md-6" style="border-left: 1px solid lightgray;"><a href="session/admin/login.php" class="btn btn-warning" class="fadeIn fifth">Administrator</a></div>
      				</div>
      			</div>
    		</form>
  		</div>
	</div>
</body>
</html>