<?php 
	function display_tree($expanded,$row = 0,$start = 0){
		// display the tree view of conversations
	global $table_width;
	echo "<table class=\"posts_table\">";

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
	<h1>LUMR的个人论坛</h1>
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

	function display_index_toolbar($postid = 0){
		if ($postid != 0) {
			$button1 = "Reply";
			$button2 = "Expand";
			$button3 = "Home";
			$button3_href = "";
		}
		else{
			$button1 = "New Post";
			$button2 = "Expand";
			$button3 = "Collapse";
			$button3_href = "?collapse=all";
		}
		echo "
		<div class=\"ToolBar\">
 		<hr>
 		<a href=\"new_post.php?parent=$postid\"><input type=\"button\" id=\"new_post\" value=\"$button1\"></a>
 		<a href=\"index.php?expand=all\"><input type=\"button\" id=\"expand\" value=\"$button2\"></a>
 		<a href=\"index.php$button3_href\"><input type=\"button\" id=\"collapse\" value=\"$button3\"></a>
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


	function display_post($post,$deth = 0,$floor_num = 0){
		// 显示工具按钮
		if ($deth == 0) {
			display_index_toolbar($post['postid']);
		}
		$floor = ($deth == 0) ? "楼主" : "$floor_num 楼";
		$padding = $deth*25;
	// 显示文章的格式
		echo "
<table class=\"post\" style=\"position:relative;left:".$padding."px;\">
	<tr>
		<td><b>$floor:".$post['poster']."</b></td>
	</tr>
	<tr>
		<th>".$post['title']."</th>
		<th>".$post['posted']."</th>
		<td>
		<form class=\"delete_form\" action=\"reply_or_delete.php\" method=\"post\">
		<input type=\"hidden\" value=\"".$post['postid']."\" name=\"postid\">
		<input type=\"submit\" name=\"Delete\" value=\"Delete\">
		</form>
		</td>
	</tr>
	<tr>
		<td colspan=\"3\">".$post['message']."</td>
	</tr>
</table>
		";
		$child_post = get_children_post($post['postid']);
		if ($child_post) {
			$floor_num = 1;
			foreach ($child_post as $postid) {
				$child_post = get_post($postid);
				display_post($child_post,$deth+1,$floor_num);
				$floor_num++;
			}
		}
	}

	function display_reply_form($post){
		echo "
<form class=\"reply_form\" action=\"reply_or_delete.php\" method=\"post\">
	<input type=\"hidden\" name=\"parent\" value=\"".$post['postid']."\">
	<input type=\"hidden\" name=\"title\" value=\"Re".$post['title']."\">
	<input type=\"hidden\" name=\"area\" value=\"1\">
	<table>
		<tr>
			<td>Name:</td>
			<td><input type=\"text\" name=\"poster\"></td>
		</tr>
		<tr>
			<td colspan=\"2\"><textarea name=\"message\" width=\"100%\"></textarea></td>
		</tr>
		<tr>
			<td><input type=\"submit\" name=\"Reply\" value=\"Reply\"></td>
		</tr>
	</table>	
</form>
		";
	}

	function display_replies_line(){
		echo "<hr>";
	}
 ?>