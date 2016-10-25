<?php 
	if ($_POST['Reply'] == "Reply") {
		include("store_new_post.php")
	}
	else if ($_POST['Delete'] == "Delete") {
		include("delete_post.php");
	}
	else{
		include 'index.php';
	}
 ?>