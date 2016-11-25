<?php 
	include('fns_include.php');
	session_start();
	@$userid = $_POST['userid'];
	@$pwd = $_POST['pwd'];

	do_html_header('Login-ing');

	if (isset($_SESSION['user'])) {
		echo "<p>你已经登陆了!
			若想更换账号请退出后登陆。</p>";
	}
	else{
		if ($userid&&$pwd) {
			check_user($userid,$pwd);
		}
		else{
			echo "<p>请确认你已输入</p>";
			echo "<a href=\"login.php\"><input type=\"button\"  value=\"返回\"></a>";
		}
	}

	do_html_footer();


 ?>