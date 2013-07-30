<?php
session_start();
if(!isset($_SESSION['id']))
	header('Location: http://localhost/temp/login.php');
?>
<html>
	<head>

	</head>

	<body>
		<?php
			$db = mysqli_connect('localhost','root','','movies');
			$query = "select * from movies";
			$data = mysqli_query($db,$query);
			?>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

			<?php
			while($row=mysqli_fetch_array($data))
			{
		?>
				<div style="width:80%; align:center;">
					<div style="float:left;"><?php echo $row['name'];?></div>
					<div style="float:right;"><?php echo $row['id']?></div>
				</div><br />
		<?php
			}
		?>
			</form>
		<?php
		?>
	</body>
</html>