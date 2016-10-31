<?php 
	include('fns_include.php');
	$postid = $_POST['postid'];
	do_html_header('Delete Post');
	if (delete_post($postid)) {
		echo "<h1>Delete Successful!</h1>";
	}
	else{
		echo "<h1>Delete False.</h1>";
	}
	echo "<a href=\"index.php\"><input type=\"button\" name=\"Back\" value=\"Back\"></a>";
	do_html_footer();

 ?>
