<?php
session_start();
if(!isset($_SESSION['id']))
	header('Location: http://localhost/temp/login.php');
?>
<html>
	<head>
		<meta charset="utf-8">  
		<title>Movie Detail</title>  
		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<meta name="description" content="Example of thumbnails customized from w3resource.com">  
		<meta name="author" content="">  
		<style>
			body 
			{
				padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
		</style>
		<!-- Le styles -->  
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="../bootstrap/css/example-fixed-layout.css" rel="stylesheet">  
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->  
		<!--[if lt IE 9]>  
		  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>  
		<![endif]-->  

		<!-- Le fav and touch icons -->  
		
	</head>

	<body>
		<?php
			if(isset($_GET['id']))	
			{
				extract($_GET);
				$db = mysqli_connect('localhost','root','','movies');
				$query = "select * from movies where id=".$id; 
				$data = mysqli_query($db,$query);
				$row = mysqli_fetch_array($data);
				extract($row);
			}
		?>
		<div class="container">  
		    <ul class="thumbnails">  
		  		<li class="span10">  
  		          <div class="thumbnail"> 
  		          	<h2><?php echo $name;?></h2>
  		            <img src="../bootstrap/img/<?php echo $image;?>" alt="product 1" width="400px" height="400px">  
  		            <div class="caption">  
						<p><?php echo $details;?></p>  
						<p><a href="movie_list.php" class="btn btn-success">back</a></p>
  		            </div>  
  		          </div>  
  		        </li>
			</ul>  
			<hr>  
		</div>
	</body>
</html>