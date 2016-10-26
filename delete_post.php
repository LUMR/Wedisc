<?php 
	include('fns_include.php');
	$postid = $_POST['parent'];
	do_html_header('Delete Post');
	$tree = new treenode(0,'','','',1,true,-1,false,false);
	if ($tree->delete($postid)) {
		echo "<h1>Delete Successful!</h1>";
	}
	else{
		echo "<h1>Delete False.</h1>";
	}
	do_html_footer();

 ?>