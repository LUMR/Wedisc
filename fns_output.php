<?php 
	function display_tree($expanded,$row = 0,$start = 0){
		// display the tree view of conversations
	global $table_width;
	echo "<table width=\"$table_width\">";

	// see if we are displaying the whole list or a sublist
	$sublist = ($start>0) ? true : false ;

	// contruct tree structure to represent conversation summary
	$tree = new treenode($start,'','','',1,true,-1,$expanded,$sublist);
	// tell tree to display itself
	$tree->display($row,$sublist);

	echo "</table>";
	}

	function do_html_header($title){
	echo "
	<!DOCTYPE html>
	<html>
	<head>
		<title>$title</title>
	</head>
	<body>
	<h1>Wecome To Discussion</h1>
	<img name=\"header\" src=\"./images/kokomi.png\">";
	}

	function do_html_footer(){
	echo "
	<img src=\"./images/footer.png\">
	</body>
	</html>";
	}

	function display_index_toolbar(){
		echo "<p>ToolBar</p>";
	}
 ?>