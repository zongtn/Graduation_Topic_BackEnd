<?php
//一般用戶的追蹤清單ok
	//引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
		$link -> set_charset("UTF8"); // 設定語系避免亂碼
		$sql="UPDATE `produce` set total_search=total_search+1 where produce.produce_id='101'";
		$link -> query($sql);
		$link -> close(); // 關閉資料庫連線
		
	}
?>