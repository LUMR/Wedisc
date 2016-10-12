<?php 
// include function libraries
	include('fns_include.php');
	$postid = $_GET['postid'];
	// get postid detail
	$post = get_post($postid);

	do_html_header($post['title']);
	// display post
	display_post($post);

	// if post has any replies,show the tree view of them
	if ($post['children']) {
		echo "<br/><br/>";
		display_replies_line();
		display_tree($_SESSION['expanded'],0,$postid);
	}

	do_html_footer();
?>