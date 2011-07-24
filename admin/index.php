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
	<?php
		include '../nav.php';
	?>
	<?php
		if($_POST['add']):
			$obj->add_content($_POST);
		elseif($_POST['update']):
			$obj->update_content($_POST);
		endif;
	?>
		
	<?php include '../footer.php'; ?>
	</div>
	
</body>
</html>