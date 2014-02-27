<?php
require_once dirname ( __FILE__ ) . '/' . './classes/User.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/UserService.class.php';

header ( "content-type:text/html;charset=utf-8" );

session_start ();

// echo $_POST['checkCode'];
// echo "<br/>".$_SESSION['checkCode'];
// exit();

$flag = $_GET ['flag'];
if ($flag == 1) {
	// 用户从登录界面登录
	if ($_POST ['checkCode'] != $_SESSION ['checkCode']) {
		header ( "Location:login.php?errno=2" );
		exit ();
	}
	
	$user = new User ();
	$user->setU_email ( $_POST ['email'] );
	$user->setU_password ( $_POST ['password'] );
} else if ($flag == 2) {
	// 用户通过dialog登录
	
	$user = new User ();
	$user->setU_email ( $_GET ['email'] );
	$user->setU_password ( $_GET ['password'] );
}

$userService = new UserService ();
$b = $userService->login ( $user );
// echo $b;
// exit();
if ($b) {
	// echo "登录成功";
	$_SESSION ['u_nickname'] = $user->getU_nickname ();
	$_SESSION ['u_id'] = $user->getU_id ();
	$_SESSION ['u_email'] = $user->getU_email ();
	
	//设置cookie,保存时间为为一个月
	setcookie("u_email",$user->getU_email(),time()+24*3600*30);
	if ($flag == 1) {
		header ( "Location:index.php" );
		exit ();
	} else if ($flag == 2) {
		// 用户从登录对话框登录成功
		echo "true";
	}
} else {
	
	if ($flag == 1) {
		header ( "Location:login.php?errno=1" );
		exit ();
	} else if ($flag == 2) {
		// 用户从登录对话框登录失败
		echo "false";
	}
}

?>