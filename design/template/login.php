<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="css/style.css" />

<title><?php echo $this->shop_name;?>-CMS</title>

</head>



<body style="background:url(img/bg.gif) repeat-x ;">

<div class="wrapperlogin">

	<form action="index.php?a=login&m=loginPost" method="post" >

	<div class="login">

        <div class="logincon">

        	<div class="logo2"></div>

            <div class="logininput">

            	<p class="p8">Welcome to <?php echo $this->shop_name;?></p>

            	<p class="p8">Content Management System</p>

                <div class="loginlist first">

                    <input name="t_username" type="text" id="text1"/>

                </div>

                <div class="loginlist">

                    <input name="t_password" type="password" id="text1"/>

                </div>

                <div class="loginlist">

                    <input name="get_c" type="checkbox" id="select1"/>

    				<div class="selectTest">REMEMBER ME 记住用户</div>

    				<!--<a href="javascript:void(0);" class="forgotPassword" onclick="alert('coming soon...')">FORGOT PASSWORD 忘记密码</a>-->

    				<div class="clear"></div>

                </div>

                <div class="loginlist">

                	<input name="" type="submit" id="button" value="ENTER 登录" />

                </div>

            </div>

        </div>

        <p class="p9">© <?php echo $this->shop_name;?></p>

    </div>

  	</form>

</div>

</body>

</html>

