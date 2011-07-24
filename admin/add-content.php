<?php
include '../_class/cms_class.php';

$obj = new webCMS();
// Setup our connection vars
$obj->host = 'localhost'; // your MYSQL host name
$obj->username = 'db_user'; // your MYSQL db user name
$obj->password = 'db_password'; // your MYSQL db password
$obj->db = 'database_name'; // your MYSQL db Name

//setup our db connection
$obj->Connect();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>WebCMS</title>
	
	<link rel="stylesheet" href="../style.css">
</head>

<body>
	<div id="page-wrap">
	
	<?php include '../nav.php'; ?>
	<h1>Add a Post</h1>
	<form method='post' action='index.php'>
		
		<input type="hidden" name="add" value="true" />
		<div>
			<label for="title">Title:</label>
			<input type="text" name="title" id="title" required="required" />
		</div>
		<div>
			<label for="bodoy">Body:</label>
			<textarea id="body" name="body" rows="12" cols="140" required="required"></textarea>
		</div>
		
		<input type="submit" name="submit" value="Add Content" />
		
	</form>
	<?php include '../footer.php'; ?>
	</div>
	
</body>
</html>