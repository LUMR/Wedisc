<?php 
	function db_connect(){
		$conn = new mysqli('localhost','','','discussion');
		return $conn
	}

	function check_db_err($result){
		if (!result) {
			echo "DB_ERROR:".$result->error.",Please check the DB.";
			return false;
		}
	}


 ?>