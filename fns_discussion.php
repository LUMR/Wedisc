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

 ?>