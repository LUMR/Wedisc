<?php 
	include('fns_include.php');
	$post = $_POST['parent'];
	do_html_header('Delete Post');
	if (delete_post($post)) {
		echo "<h1>Delete Successful!</h1>";
	}
	else{
		echo "<h1>Delete False.</h1>";
	}
	do_html_footer();

 ?>