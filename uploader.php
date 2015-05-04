<?php

// Directory for uploads, to read and write
$dir = "uploads/";
// Set this to true if upload is successful
$successfulUpload = false;
$loggedIn = false;
// Set a maximum filesize in bytes
$maxFileSize = 30000000000;
// Error message string
$errorMessage = "";

function getCurrentUri()
	{
		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath)+12);
		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		//$uri = '/' . trim($uri, '/');
		return $uri;
	}

// This section deals with file uploads
if(isset($_POST["submit"])) {
	$filename = basename($_FILES["fileUpload"]["name"]);
	$target_file = $dir . $filename;
	$uploadOk = true; // maintains whether this file uploaded OK
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	// Check file size
	if ($_FILES["fileUpload"]["size"] > $maxFileSize) {
	    $uploadOk = false;
	}

	// Check if $uploadOk has found an error
	if ($uploadOk && move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
		$successfulUpload = true;
	} 
	else {
		$errorCode = $_FILES["fileUpload"]["error"];
		if ($errorCode == 1 || $errorCode == 2) {
			$errorMessage = "ERROR: The uploaded file exceeds the maximum filesize of " . $maxFileSize . " bytes";
		}
		else if ($errorCode == 3) {
			$errorMessage = "ERROR: The uploaded file was only partially uploaded";
		}
		else if ($errorCode == 4) {
			$errorMessage = "ERROR: No file was uploaded";
		}
		else {
			$errorMessage = "ERROR: There was an error uploading your file.";
		}
	}
}


if(isset($_POST["logIn"])){

	$pw = $_POST["password"];
	$un = $_POST["username"];
	if($un == "wildbill" && $pw == "polenglang")
	{
		$loggedIn = true
	}


}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Orwell Upload</title>
	<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="wb.css">
	</head>

<body>

<?php

if($loggedIn)
{
	if(isset($_POST("submit")))
	{
	?>

	<div class = "container">
	<div class="row">
	<div class="col-md-3 col-lg-3"></div>
	<div class="col-md-6 col-lg-6">

	<?php if ($successfulUpload) { ?>
		<div class="alert alert-success fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<p><strong>Success!</strong> You uploaded a new resource: <?php echo $filename ?></p>
		</div>
	<?php
		}
		else if ($errorMessage != "") {
			?>
			<div class="alert alert-error fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<p><strong>Error!</strong> <?php echo $errorMessage ?></p>
			</div>
		<?php }

		if($loggedIn) { ?>
			<div class="well well-add">
			<legend>Resource Upload Form</legend>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
				<p>Upload a file</p>
				<p>Max file size: <?php echo $maxFileSize ?> bytes</p>
		   		<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $maxFileSize ?>" />
				<input type="file" name="fileUpload" id="fileUpload">
				<br/>
				<input type="submit" name="submit" value="Upload">
			</form>
			</div>
		<?php }//for admin only uploads ?>

	</div></div>
	<div class="col-md-3 col-lg-3"></div>
	</div>
	</div>
}

<?php
}else
{
	?>
	<div class="col-md-3 col-lg-3"></div>
	<div class="col-md-6 col-lg-6">
			<div class="well well-add">
				<form id="data-input" action="/uploader.php" method="POST" role="form">
					<p>Log in if you know what you're doing.</p>
					<div class="form-group">
						<textarea class="form-control" name="name" placeholder="username" rows="3"></textarea>
					</div>
					<div class="form-group">
						<textarea class="form-control" name="password" placeholder="Shibboleth" rows="3"></textarea>
					</div>
					<button  type="logIn" class="text-center btn btn-primary">Submit</button>
				</form>
			</div>
	</div>
	<div class="col-md-3 col-lg-3"></div>


	<?php
}