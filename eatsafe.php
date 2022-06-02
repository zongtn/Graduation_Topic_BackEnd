<?php
//廠商添加商品資訊
    //引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
	$link -> set_charset("UTF8"); // 設定語系避免亂碼
	
		// SQL 指令 廠商輸入商品資訊
		
		$company_id=$_POST['company_id'];
		$produce_name=$_POST['produce_name'];
		$produce_origin=$_POST['produce_origin'];
		$nutrition_id=$_POST['nutrition_id'];
		
		$sql="select * from produce where company_id='$company_id'
			AND produce_name='$produce_name'";
		$result=mysqli_query($link,$sql);
		$db_inside=mysqli_num_rows($result);
		
		if($db_inside>=1){
			$respone["insert"]="already";
		}
		else{
			$sql = "INSERT INTO produce(produce_id,company_id,produce_name,produce_origin, nutrition_id) 
			VALUES('','".$company_id."', '".$produce_name."', '".$produce_origin."', '". $nutrition_id."')";
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
		//echo $produce_name." ".$produce_origin.$produce_ingredient.$produce_additive;
		
	
	
		
		
		
		
		// 如果有異動到資料庫數量(更新資料庫)
		//$sql = "INSERT INTO  `user` (`account`,`password`, `name`) VALUE ('ddd@gmail.com','dd12345','dd') ";
		// 用mysqli_query方法執行(sql語法)將結果存在變數中
		
/*$result = mysqli_query($link,$sql);

		// 如果有異動到資料庫數量(更新資料庫)
		if (mysqli_affected_rows($link)>0) {
		// 如果有一筆以上代表有更新
		// mysqli_insert_id可以抓到第一筆的id
			$new_id= mysqli_insert_id ($link);
			echo "新增後的id為 {$new_id} ";
		}
		elseif(mysqli_affected_rows($link)==0) {
			echo "無資料新增";
		}else {
			echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
		}
		mysqli_close($link); 
		*/
		
		
		/*
		$link -> query($sql);
		$link -> close();*/
		
		
		
	}
?>
