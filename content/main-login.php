<?php
session_start();								//初始化SESSION变量

if($_POST['sublogin']){
    $uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	switch ($uname)
    {
		case 'dbm':
			$_SESSION['userinfo']=array(
				"uname" =>$uname,
				"userid" =>1,
				"qx"   =>1,
				"login" =>true,
				"connname" =>'wongdbm',
			);
			$_SESSION['pageinfo']=array('dbm-index','','');//这里后面要根据权限修改为主页
			echo "<script>alert('登录成功！'); window.location.href='../index.php';</script>";
		break;
		case 'flm':
			$_SESSION['userinfo']=array(
				"uname" =>$uname,
				"userid" =>123,
				"qx"   =>2,
				"login" =>true,
				"connname" =>'wongflm',
			);
			echo "<script>alert('登录成功！'); window.location.href='../index.php';</script>";
		break;
		case 'sfm':
			$_SESSION['userinfo']=array(
				"uname" =>$uname,
				"userid" =>1234,
				"qx"   =>3,
				"login" =>true,
				"connname" =>'wongsfm',
			);
			echo "<script>alert('登录成功！'); window.location.href='../index.php';</script>";
		break;
		case 'wtr':
		$_SESSION['userinfo']=array(
			"uname" =>$uname,
			"userid" =>12345,
			"qx"   =>4,
			"login" =>true,
			"connname" =>'wongwtr',
		);
			echo "<script>alert('登录成功！'); window.location.href='../index.php';</script>";
		break;
		case 'ctr':
		$_SESSION['userinfo']=array(
			"uname" =>$uname,
			"userid" =>123456,
			"qx"   =>5,
			"login" =>true,
			"connname" =>'wongctr',
		);
			echo "<script>alert('登录成功！'); window.location.href='../index.php';</script>";
		break;
		case 'std':
		$_SESSION['userinfo']=array(
			"uname" =>$uname,
			"userid" =>1234567,
			"qx"   =>6,
			"login" =>true,
			"connname" =>'wongstd',
		);
			echo "<script>alert('登录成功！'); window.location.href='../index.php';</script>";
		break;
		default:
		echo "<script>alert('账号错误！'); window.location.href='../index.php';</script>";
		break;
	}

}else{
    session_start();
    session_destroy();
    header("Location: ../index.php");
}