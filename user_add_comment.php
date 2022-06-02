<?php
//一般用戶的追蹤清單ok
	//引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
		$link -> set_charset("UTF8"); // 設定語系避免亂碼
	
		// SQL 指令
		$user_id=$_POST['user_id'];
		$produce_id=$_POST['produce_id'];
		$message_con=$_POST['message_con'];
		
		$sql="INSERT INTO `message`(`user_id`,`produce_id`,`message_con`)
			VALUES('".$user_id."', '".$produce_id."', '".$message_con."')";
		$link -> query($sql);
		$respone["add"]='ok';
		print(json_encode($respone, JSON_UNESCAPED_UNICODE));
		$link -> close(); // 關閉資料庫連線
		
	}
?>