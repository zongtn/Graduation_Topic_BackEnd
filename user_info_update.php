<?php
    //引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
	$link -> set_charset("UTF8"); // 設定語系避免亂碼
	
/*
		$user_id=$_GET['user_id'];
		$user_account=$_GET['user_account'];
		$user_password=$_GET['user_password'];
		$user_email=$_GET['user_email'];
		$user_phone=$_GET['user_phone'];
		$user_name=$_GET['user_name'];*/
		
		$user_id=$_POST['user_id'];
		$user_account=$_POST['user_account'];
		$user_password=$_POST['user_password'];
		$user_email=$_POST['user_email'];
		$user_phone=$_POST['user_phone'];
		$user_name=$_POST['user_name'];
		
		$sql="UPDATE user SET user_account = '$user_account',user_password='$user_password', user_email = '$user_email', user_phone = '$user_phone', user_name = '$user_name'
		WHERE user_id=$user_id";
		//UPDATE `user` SET `user_password` = 'a3', `user_email` = 'a4', `user_phone` = 'a5', `user_name` = 'a6' WHERE `user`.`user_id` = 2;
//UPDATE `user` SET `user_account` = 'a', `user_password` = 'a', `user_email` = 'a', `user_phone` = 'a', `user_name` = 'a' WHERE `user`.`user_id` = 2;
		$link -> query($sql);
		
		$respone["update"]=true;
		print(json_encode($respone, JSON_UNESCAPED_UNICODE));
		$link -> close();
		
		
	}
?>
