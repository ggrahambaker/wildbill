<?php
$dir = "uploads/";

$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath)+12);
if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));

$dir = $uri .$dir;
// This section deals with finding the files currently in the directory
$filesOnServer = scandir($dir);
?>


<<<<<<< HEAD
?>
=======
>>>>>>> ab99f5735d5e646055ba829d25bab5ad58608714
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">


	<title>Politics and the English Language</title>
	<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="wb.css">
	</head>

<body>

		<nav class="navbar navbar-default" role="navigation">
			<a class="navbar-brand" href="index.html"><strong>Politics and the English Language </strong><br><small> by: <strong>George Orwell</strong></small></a>
			<ul class="nav navbar-nav">
				<li>
					<a class="nav" href="telescope.html">Telescoping Diagram</a>
				</li>
				<li>
					<a class="nav" href="full.html">Full Essay</a>
				</li>
				<li>
					<a class="nav" href="files.php">Resources</a>
				</li>
			</ul>
		</nav>


<div class = "container">
<div class = "row">
<div class="col-md-3 col-lg-3"></div>

<div class="col-md-6 col-lg-6">

	<div class="well">
		<legend>Resources</legend>
		<?php
		if (count($filesOnServer) < 3) {
			print "The admins haven't uploaded any resources to the server.";
		}
		else { ?>
			<table class="table table-bordered table-striped" border="1">
			<tbody align="center">
			<tr><th>File (click to access)</th></tr>
			
			<?php	
			foreach ($filesOnServer as $f => $s) {
				if($s != "." && $s != "..")
					echo "<tr><td><a href='uploads/" . $s . "'>" . $s . "</a></td></tr>"; 
			}
		}
		?>
	</tbody></table>
	</div>

</div>
<div class="col-md-3 col-lg-3"></div>
</div>
</div>
</body>
