<?php
require_once dirname ( __FILE__ ) . '/' . './SqlHelper.class.php';
class UserService {
	
	/**
	 * 注册用户
	 *
	 * @param object $user
	 *        	User对象
	 * @return number
	 */
	public function register($user) {
		//$user = new User ();
		$u_email = $user->getU_email ();
		$u_password = $user->getU_password ();
		$u_nickname = $user->getU_nickname ();
		
		// 先判断email是否存在
		$sql = "select u_id from w_user where u_email='$u_email'";
		$sqlHelper = new SqlHelper ();
		$res = $sqlHelper->execute_dql ( $sql );
		// print_r($res);
		// echo "<br/>".count($res);
		// exit();
		
		if (count ( $res ) > 0) {
			return 0;
			exit ();
		}
		
		// 向数据库添加
		$sql = "insert into w_user(u_password,u_email,u_nickname) values (md5('$u_password'),'$u_email','$u_nickname')";
		
		// echo $sql;
		// exit();
		
		$sqlHelper = new SqlHelper ();
		$flag = $sqlHelper->execute_dml ( $sql );
		
		if ($flag == 1) {
			$sql = "select last_insert_id()";
			
			$res = $sqlHelper->execute_dql ( $sql );
			
			$user->setU_id ( $res [0] [0] );
		}
		
		$sqlHelper->close_connect ();
		
		// 返回执行结果 0 --失败 1 -- 执行成功并影响行数 2 --执行成功，但没有影响函数
		return $flag;
	}
	
	// 登录
	public function login($user) {
		// $user = new User ();
		$u_email = $user->getU_email ();
		$u_password = $user->getU_password ();
		
		$sql = "select u_password,u_nickname,u_id from w_user where u_email='$u_email'";
		
		$sqlHelper = new SqlHelper ();
		$res = $sqlHelper->execute_dql ( $sql );
		
		// print_r($res);
		
		$flag = 0;
		
		if (count ( $res ) > 0) {
			if (md5 ( $u_password ) == $res [0] [0]) {
				$user->setU_nickname ( $res [0] [1] );
				$user->setU_id ( $res [0] [2] );
				$flag = 1;
			}
		}
		
		$sqlHelper->close_connect ();
		
		// echo $flag;
		// exit();
		
		return $flag;
	}
	
	
	//判断是否为店主
	public function isOwner($userid){
		
		$flag=false;
		
		$sql="select u_isowner from w_user where u_id='$userid'";
		
		$sqlHelper=new SqlHelper();
		$res=$sqlHelper->execute_dql($sql);
		$sqlHelper->close_connect();
		if(count($res)>0){
			if($res[0][0]=='1'){
				$flag=true;
			}
		}
		
		return $flag;
	}
	
	// 成为或者取消店主身份
	public function setOwner($user) {
		// $user=new User();
		$u_email = $user->getU_email ();
		$u_isowner = $user->getU_isowner ();
		
		// 先查询一下是否为店主
		// $sql="select ";
		
		// 更新sql语句
		$sql = "update w_user set u_isowner='$u_isowner' where u_email='$u_email'";
		
		
		
		$sqlHelper = new SqlHelper ();
		$flag = $sqlHelper->execute_dml ( $sql );
		
		$sql = "select u_id from w_user where u_email='$u_email'";
		$res = $sqlHelper->execute_dql ( $sql );
		$user->setU_id ( $res [0] [0] );
		
		$sqlHelper->close_connect ();
		
		return $flag;
	}
}
?>