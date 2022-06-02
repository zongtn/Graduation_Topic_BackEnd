<?php
//一般用戶新增追蹤
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
		
		$sql="select * from user_follow where user_id='$user_id'
			AND produce_id='$produce_id'";
		$result=mysqli_query($link,$sql);
		$db_inside=mysqli_num_rows($result);
		
		if($db_inside>=1){
			$respone["follow"]="already";
		}
		else{
			$sql = "INSERT INTO `user_follow` (`user_id`,`produce_id`) 
			VALUES('".$user_id."', '".$produce_id."')";
			//$link -> query($sql);
			$result = mysqli_query($link,$sql);
			// 如果有異動到資料庫數量(更新資料庫)
			if (mysqli_affected_rows($link)>0) {
			// 如果有一筆以上代表有更新
			// mysqli_insert_id可以抓到第一筆的id
				$new_id= mysqli_insert_id ($link);
				$respone["insert"]=true;
				$respone["id"]=$new_id;
			}
		}
		print(json_encode($respone, JSON_UNESCAPED_UNICODE));
		$link -> close();
		
	}
?>
