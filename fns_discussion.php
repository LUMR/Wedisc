<?php 
// mark all threads with children as to be shown expanded
	function expand_all(&$expanded){
		$conn = db_connect();
		$query = "select postid from header where children = 1";
		$result = $conn->query($query);
		$num = $result->num_rows;
		for ($i=0; $i < $num; $i++) { 
			$this_row = $result->fetch_row();
			$expanded[$this_row[0]] = true; 
		}
	}

	function get_post($postid){
	// extract one post from the database and return as an array
		if (!$postid) {
			return false;
		}
		$conn = db_connect();
	// get all header information from 'header'
		$query = "select * from header where postid = \"$postid\"";
		$result2 = $conn->query($query);
		if ($result2->num_rows>0) {
			$body = $result2->query->fetch_assoc();
			if ($body) {
				$post['message'] = $body['message'];
			}
		}
		return $post;
	}
 ?>