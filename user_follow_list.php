<?php
//一般用戶的追蹤清單ok
	//引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
		$link -> set_charset("UTF8"); // 設定語系避免亂碼
	
		// SQL 指令
		$user_id=$_GET['user_id'];
		$sql="SELECT company.company_name,produce.produce_id,produce.produce_name,produce.produce_origin, user_follow.follow_time,produce.batch_id
		FROM `user_follow`,`produce`,`company` where 
		user_follow.user_id=$user_id 
		AND user_follow.produce_id=produce.produce_id 
		AND user_follow.produce_id=produce.produce_id
		AND produce.company_id=company.company_id";
		
		
		if($result = $link -> query($sql)){
			
			while ($row = $result->fetch_assoc()) // 當該指令執行有回傳,從result抓一組資料到 row變數
			{
				$output[] = $row; // 就逐項將回傳的東西放到陣列中
				//$company=$row["company_name"];
			}
			
			// 將資料陣列轉成 Json 並顯示在網頁上，並要求不把中文編成 UNICODE
			print(json_encode($output, JSON_UNESCAPED_UNICODE));
			$link -> close(); // 關閉資料庫連線
		}
		
	}
?>
