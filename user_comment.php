<?php
//一般用戶的追蹤清單ok
	//引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
		$link -> set_charset("UTF8"); // 設定語系避免亂碼
	
		// SQL 指令
		$produce_id=$_GET['produce_id'];
		
		$sql="SELECT * FROM message where produce_id=$produce_id";
		
		
		if($result = $link -> query($sql)){
			
			while ($row = $result->fetch_assoc()) // 當該指令執行有回傳,從result抓一組資料到 row變數
			{
				$output[] = $row; // 就逐項將回傳的東西放到陣列中
				//$company=$row["company_name"];
			}
			
			// 將資料陣列轉成 Json 並顯示在網頁上，並要求不把中文編成 UNICODE
			print(json_encode($output, JSON_UNESCAPED_UNICODE));
			//$link -> close(); // 關閉資料庫連線
		}
		$link -> close(); // 關閉資料庫連線
		
	}
?>