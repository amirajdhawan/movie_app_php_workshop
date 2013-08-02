<!DOCTYPE html>
<?php
session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Le styles -->
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		<style>
			body {
				padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
		</style>
		<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="bootstrap/js/html5shiv.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="../bootstrap/ico/favicon.png">
	</head>

	<body>
		<?php
			if(isset($_POST['submit']))
			{
				extract($_POST);
				$db = mysqli_connect('localhost','root','','movies');
				$query = "select * from login where email='".$email."' and password='".sha1($password)."'";
				$data = mysqli_query($db,$query);
				if($row = mysqli_fetch_array($data))
				{
					$_SESSION['id'] = $row["id"];
					header('Location: http://localhost/temp/movie_list.php');					
				}
			}
		?>
		
		<div class="container">
			<h1>Login</h1>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				<label>Email</label>
				<input type="text" name="email"/><br>
				<label>Password</label>
				<input type="password" name="password"/><br>
				<label>&nbsp</label>
				<input type="submit" name="submit" value="submit" class="btn btn-success btn-large"/>
			</form>	
		</div> <!-- /container -->	
	</body>
</html>