<?php
require_once dirname ( __FILE__ ) . '/' . './classes/UserService.class.php';
require_once dirname ( __FILE__ ) . '/' . './classes/User.class.php';

header ( "content-type:text/html;charset=utf-8" );

session_start ();
if ($_POST ['checkCode'] != $_SESSION ['checkCode']) {
	header ( "Location:register.php?errno=3" );
	exit ();
}

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if ($_POST ['password'] != $_POST ['password1']) {
	header ( "Location:register.php?errno=1" );
	exit ();
}

$user = new User ();
$user->setU_email ( $_POST ['email'] );
$user->setU_nickname ( $_POST ['nickname'] );
$user->setU_password ( $_POST ['password'] );

$userService = new UserService ();

// 注册
$b = $userService->register ( $user );
switch ($b) {
	case 0 :
		// echo "Email已存在";
		header ( "Location:register.php?errno=2" );
		exit ();
		break;
	case 1 :
		// echo "恭喜你注册成功";
		header ( "Location:index.php" );
		$_SESSION ['u_nickname'] = $user->getU_nickname ();
		$_SESSION ['u_id'] = $user->getU_id ();
		$_SESSION ['u_email'] = $user->getU_email ();
		exit ();
		break;
}

?>
