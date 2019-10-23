<?php 
include_once "../class/AdminLogin.php";
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$loginobj = new AdminLogin();
		$err = $loginobj->adminLogin($_POST['username'],$_POST['password']);
	}


?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Admin Login</h1>
			<?php 

				if (isset($err)) {
					echo "<span style='color:white;background:red;'>{$err}";
				}

			 ?>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="../index.php">Real IT BD</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>