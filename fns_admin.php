<?php 
	function check_user($userid,$pwd){
		$conn = new db_connect();
		$query = "select * from userdata where userid = $userid";
		$result = $conn->query($query);
		if ($result->num_rows) {
			echo "<p>没有这个用户，请检查是否打错了。😒</p>";
			echo "<a href=\"login.php\"><input type=\"button\"  value=\"返回\"></a>";
			return false;
		}
		else{
			$row = $result->fetch_assoc();
			if ($row['password'] == sha1($pwd)) {
				$_SESSION['user'] = $userid;
				echo "<p>登陆成功！</p>";
				echo "<a href=\"index.php\"><input type=\"button\"  value=\"返回\"></a>";
				return true;
			}
			else{
				echo "<p>密码错误！</p>";
				echo "<a href=\"login.php\"><input type=\"button\"  value=\"返回\"></a>";
				return false;
			}
		}
	}


 ?>