<?php
session_start();
?>
<html>
	<head>

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
					//redirect to any page where u want to.
					exit;//comment this soon
				}
			}
		?>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			<label>Email</label>
			<input type="text" name="email"/><br>
			<label>Password</label>
			<input type="password" name="password"/><br>
			<label>&nbsp</label>
			<input type="submit" name="submit" value="submit"/>
		</form>
	</body>
</html>