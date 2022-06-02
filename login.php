<?php
//廠商登陸
    //引用資料庫
	require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
		$link -> set_charset("UTF8"); // 設定語系避免亂碼
	
		$company_account=$_POST['company_account'];
		$company_password=$_POST['company_password'];
		// SQL 指令 廠商使用者帳號資料
		$sql = "SELECT company_id FROM `company` where company_account='".$company_account."' and company_password ='".$company_password."'";
		$result = $link -> query($sql);
		
		$respone["login"]=false;
		while($row =$result->fetch_assoc()) // 當該指令執行有回傳,從result抓一組資料到 row變數
		{
			$respone["login"]=true;
			$respone["id"] = $row; // 就逐項將回傳的東西放到陣列中
			
		}
		print(json_encode($respone, JSON_UNESCAPED_UNICODE));
		$link -> close();
		
		
		
		/*
		
		*/
		
		/*
		$result = $conn -> query($sql);
		$respone=array();
		if($row =$result->fetch_assoc()) // 當該指令執行有回傳,從result抓一組資料到 row變數
		{
			//$output[] = $row; // 就逐項將回傳的東西放到陣列中
			$respone["success"]=true;
		}
		else $respone["success"]=false;
		print(json_encode($respone, JSON_UNESCAPED_UNICODE));
		$conn -> close();
		*/
	}
?>
