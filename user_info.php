<?php
    //引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
	$link -> set_charset("UTF8"); // 設定語系避免亂碼
	
		/*$user_id=$_GET['user_id'];*/
		$user_id=$_POST['user_id'];
		
		
		$sql="SELECT * FROM user WHERE user_id=$user_id";
		
		
		if($result = $link -> query($sql)){
			
			while ($row = $result->fetch_assoc()) // 當該指令執行有回傳,從result抓一組資料到 row變數
			{
				$respone[] = $row; // 就逐項將回傳的東西放到陣列中
				//$company=$row["company_name"];
			}
			
		}	
		print(json_encode($respone, JSON_UNESCAPED_UNICODE));
		$link -> close();
		
	}
?>
