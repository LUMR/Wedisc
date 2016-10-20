<?php 
	function display_tree($expanded,$row = 0,$start = 0){
		// display the tree view of conversations
	global $table_width;
	echo "<table width=\"$table_width\">";

	// see if we are displaying the whole list or a sublist
	$sublist = ($start>0)?true:false;

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
		<link rel=\"stylesheet\" type=\"text/css\" href=\"web_style.css\">
		<title>$title</title>
	</head>
	<body>
	<h1>Wecome To Discussion</h1>
	<img id=\"img_header\" src=\"./images/kokomi.jpg\">";
	}

	function do_html_footer(){
	echo "
	<hr>
	<b>LUMR<b>
	</body>
	</html>";
	}

	function reformat_date($date){
		return $date;
	}

	function display_index_toolbar($parent = 0){
		$value = ($parent == 0)?"New Post":"Reply";
		echo "
		<div class=\"ToolBar\">
 		<hr>
 		<a href=\"new_post.php?parent=$parent\"><input type=\"button\" id=\"new_post\" value=$value></a>
 		<a href=\"index.php?expand=all\"><input type=\"button\" id=\"expand\" value=\"Expand\"></a>
 		<a href=\"index.php?collapse=all\"><input type=\"button\" id=\"collapse\" value=\"Collapse\"></a>
 		<hr>
 		</div>";
	}

	function display_new_post_form($parent,$area,$title,$message,$poster){
		echo "
<form id=\"post_form\" method=\"post\" action=\"store_new_post.php\">
<input type=\"hidden\" name=\"parent\" value=\"$parent\" readonly>
<input type=\"hidden\" name=\"area\" value=\"$area\" readonly>
<table>
	<tr>
		<td>Name</td>
		<td><input type=\"text\" name=\"poster\"></td>
	</tr>
	<tr>
		<td>Message Title</td>
		<td><input type=\"text\" name=\"title\" value=\"$title\"></td>
	</tr>
	<tr>
		<td colspan=\"2\">
			<textarea name=\"message\">$message</textarea>
		</td>
	</tr>
	<tr>
		<td colspan=\"2\"><input type=\"submit\" name=\"post\" value=\"Post\"></td>
	</tr>
</table>
</form>
		";
	}


	function display_post($post){
		display_index_toolbar($post['postid']);
	// 显示文章的格式
		echo "
<table class=\"post\">
	<tr>
		<th><b>".$post['title']."</b></th><th align=\"left\">".$post['posted']."</th>
	</tr>
	<tr>
		<td>".$post['poster'].":</td>
	</tr>
	<tr>
		<td colspan=\"2\">".$post['message']."</td>
	</tr>

</table>
		";
	}
	function display_replies_line(){
		echo "<hr>";
	}
 ?>
