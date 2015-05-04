<?php
$dir = "uploads/";

function getCurrentUri()
	{
		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath)+12);
		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		//$uri = '/' . trim($uri, '/');
		return $uri;
	}

$dir = getCurrentUri() + $dir;
// This section deals with finding the files currently in the directory
$filesOnServer = scandir($dir);


?>
<div class = "container">
<div class = "row">
<div class="col-md-3 col-lg-3"></div>

<div class="col-md-6 col-lg-6">

	<div class="well">
		<legend>Bills Resources</legend>
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