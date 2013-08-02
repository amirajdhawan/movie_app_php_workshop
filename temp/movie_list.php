<?php
session_start();
if(!isset($_SESSION['id']))
	header('Location: http://localhost/temp/login.php');
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Movies</title>
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
			$db = mysqli_connect('localhost','root','','movies');
			$query = "select * from movies";
			$data = mysqli_query($db,$query);
		?>
		<div class="row">  
			<div class="span12">  
				<a href="logout.php" style="float:right;">Logout</a>   
			</div>  
		</div>

		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			<table class="table" style="width:70%; margin-left:15%;">
				<thead>
					<tr>
						<th>Movies</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
				while($row=mysqli_fetch_array($data))
				{
				?>

					<tr>
						<td><a href="movie_details.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></td>
					</tr>

				<?php
				}
				?>
				</tbody>
			</table>
		</form>
	</body>
</html>