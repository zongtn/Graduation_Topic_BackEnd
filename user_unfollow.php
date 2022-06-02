<?php
//一般用戶取消追蹤
    //引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
	$link -> set_charset("UTF8"); // 設定語系避免亂碼
	
		// SQL 指令 廠商輸入商品資訊
		/*
		$user_id=$_POST['user_id'];
		$produce_id=$_POST['produce_id'];*/
		

		$user_id=$_GET['user_id'];
		$produce_id=$_GET['produce_id'];

		$sql = "DELETE FROM `user_follow` where user_id=$user_id
		and produce_id=$produce_id";
		//$link -> query($sql);
		if($result = mysqli_query($link,$sql)){
			// 如果有異動到資料庫數量(更新資料庫)
			$respone["delect"]=false;
			if (mysqli_affected_rows($link)>0) {
				// 如果有一筆以上代表有更新
				$respone["delect"]=true;
			}
			print(json_encode($respone, JSON_UNESCAPED_UNICODE));
			$link -> close();
		}
	}
?>
