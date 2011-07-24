<?php

class webCMS {
	
	var $host;
	var $username;
	var $password;
	var $db;
	
	
	function connect() {
		$con = mysql_connect($this->host, $this->username, $this->password) or die(mysql_error());
		mysql_select_db($this->db, $con) or die(mysql_error());
	}
	
	function get_content($id = '') {
		
		if($id != ""):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE id = '$id'";
			
			$return = '<p><a href="index.php">Go Back to Content</a></p>';
		else:
			$sql = "SELECT * FROM cms_content ORDER BY id DESC";
		endif;
		
		$res = mysql_query($sql) or die(mysql_error());
		
		if(mysql_num_rows($res) != 0):
			while($row = mysql_fetch_assoc($res)) {
				echo '<h2><a href="index.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h2>';
				echo '<p>' . $row['body'] . '</p>';
			}
			else:
				echo '<p>Uh Oh! This doesn\'t exist</p>';
			endif;
			
			echo $return;
	}

	function add_content($p) {
		$title = mysql_real_escape_string($p['title']);
		$body = mysql_real_escape_string($p['body']);
		
		$sql = "INSERT INTO cms_content VALUES (null, '$title', '$body')";
		$res = mysql_query($sql) or dir(mysql_error());
		echo "added Successfully!";
	}
	
	function manage_content() {
		echo '<div id="manage">';
		$sql = "SELECT * FROM cms_content";
		$res = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_assoc($res)) :
	?>
		<div>
			<h2 class='title'><?=$row['title']?></h2>
			<span class="actions"><a href="update-content.php?id=<?=$row['id'];?>">Edit</a> | <a href="?delete=<?=$row['id'];?>">Delete</a></span>
		</div>
	<?php
		endwhile;
		echo '</div>'; //Close Manage Div
	}
	
	function delete_content($id) {
		if(!$id) {
			return false;
		}else {
			$id = mysql_real_escape_string($id);
			$sql = "DELETE FROM cms_content WHERE id = '$id'";
			$res = mysql_query($sql) or die(mysql_error());
			echo "Conent Deleted Successfully!";
		}
		
	}
	
	function update_content_form($id) {
		$id = mysql_real_escape_string($id);
		$sql = "SELECT * FROM cms_content WHERE id = '$id'";
		$res = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_assoc($res);
	?>
		<form method='post' action='index.php'>

			<input type="hidden" name="update" value="true" />
			<input type="hidden" name="id" value="<?=$row['id']?>" />
			<div>
				<label for="title">Title:</label>
				<input type="text" name="title" id="title" value="<?=$row['title']?>" required="required" />
			</div>
			<div>
				<label for="bodoy">Body:</label>
				<textarea name="body" id ="body" rows="12" cols="140" required="required"><?=$row['body']?></textarea>
			</div>

			<input type="submit" name="submit" value="Update Content" />

		</form>
	<?php
	
	}
	
	function update_content($p) {
		$title = mysql_real_escape_string($p['title']);
		$body = mysql_real_escape_string($p['body']);
		$id = mysql_real_escape_string($p['id']);
		
		$sql = "UPDATE cms_content SET title = '$title', body = '$body' WHERE id = '$id'";
		$res = mysql_query($sql) or dir(mysql_error());
		echo "Updated Successfully!";
	}
	

}  // ends our class

?>