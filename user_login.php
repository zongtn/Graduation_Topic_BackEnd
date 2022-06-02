<?php
//使用者登陸ok
    // 設定 MySQL 的連線資訊並開啟連線
    // 資料庫位置、使用者名稱、使用者密碼、資料庫名稱
	require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
		$link -> set_charset("UTF8"); // 設定語系避免亂碼
	
		// SQL 指令
		//$user_account=$_GET['user_account'];
		//$user_password=$_GET['user_password'];
		$user_account=$_POST['user_account'];
		$user_password=$_POST['user_password'];
		$sql = "SELECT user_id,user_name FROM `user` where user_account='".$user_account."' and user_password ='".$user_password."'";
		$result = $link -> query($sql);
		$respone["login"]=false;
		while($row =$result->fetch_assoc()) // 當該指令執行有回傳,從result抓一組資料到 row變數
		{
			
			$respone["login"]=true;
			$respone["name"] = $row; // 就逐項將回傳的東西放到陣列中
			
		}
		print(json_encode($respone, JSON_UNESCAPED_UNICODE));
		$link -> close();
	}
?>
