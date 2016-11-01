<?php 
	include('fns_include.php');
	$postid = $_POST['postid'];
	do_html_header('Delete Post');
	$tree = new treenode(0,'','','',1,true,-1,false,false);
	if ($tree->delete($postid)) {
		echo "<h1>Delete Successful!</h1>";
	}
	else{
		echo "<h1>Delete False.</h1>";
	}
	echo "<a href=\"index.php\"><input type=\"button\" name=\"Back\" value=\"Back\"></a>";
	do_html_footer();
 ?>
