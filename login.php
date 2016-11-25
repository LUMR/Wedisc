<?php 
    session_start();
    do_html_header('login');

 ?>
<form action="dologin.php" method="post" onsubmit="return false;" jveventinit="1">
                    <div class="box">
                        <span id="userIdSpt" jvnormaltip="&amp;nbsp;">&nbsp;</span>
                        <input style="margin-bottom: 0" type="text" value="你的用户名" name="userid" maxlength="50" autocomplete="off">
                    </div>
                    <div class="box">
                        <span id="userPwdTip" jvnormaltip="&amp;nbsp;">&nbsp;</span>
                        <input id="passwdTxt" type="password" placeholder="密码" name="pwd" class="password" jverrortip="喵，你没输入密码么？" jvpattern="^.{3,30}$" jvtipid="userPwdTip">
                    </div>
                    <input type="submit" class="login" value="登录">
                    <a class="zhuce" href="register.php">注册</a>
                </form>
<?php 
    do_html_footer();
 ?>