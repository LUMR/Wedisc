<?php 
    include('fns_include.php');
    session_start();
    do_html_header('login');

 ?>
<form action="dologin.php" method="post" >
                    <div class="box">
                        <span id="userIdSpt" jvnormaltip="&amp;nbsp;">Name:</span>
                        <input style="margin-bottom: 0" type="text" placeholder="你的用户名" name="userid" maxlength="50" autocomplete="off">
                    </div>
                    <div class="box">
                        <span id="userPwdTip" jvnormaltip="&amp;nbsp;">Password:</span>
                        <input id="passwdTxt" type="password" placeholder="密码" name="pwd" class="password" jverrortip="喵，你没输入密码么？" jvpattern="^.{3,30}$" jvtipid="userPwdTip">
                    </div>
                    <input type="submit" class="login" value="登录">
                    <a class="zhuce" href="register.php">注册</a>
                </form>
<?php 
    do_html_footer();
 ?>