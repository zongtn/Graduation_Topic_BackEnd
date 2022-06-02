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
		$produce_id=$_GET['produce_id'];
		$batch_id=$_GET['batch_id'];
		
		$sql="SELECT produce.*,company.company_name,batch.*,user_follow.user_id,user_follow.follow_time,a.additive ,a.additive_id,b.ingredient,b.ingredient_id,produce_nutrition.*
				from produce 
				inner join company on
					(company.company_id=produce.company_id 
						AND produce.produce_id=$produce_id)
				left join batch on(batch.produce_id=produce.produce_id and batch.batch_id=$batch_id)
				left join user_follow on(produce.produce_id=user_follow.produce_id and user_follow.user_id=$user_id)
				
				left join produce_nutrition on(produce_nutrition.batch_id=$batch_id)
				left join (select produce_additive.batch_id, GROUP_CONCAT(all_additive.additive_name) as additive, GROUP_CONCAT(all_additive.additive_id) AS additive_id
						FROM all_additive,produce_additive
						where all_additive.additive_id=produce_additive.additive_id and produce_additive.batch_id=$batch_id
						group by produce_additive.batch_id)as a on a.batch_id=$batch_id
						
				left join (select produce_ingredient.batch_id, GROUP_CONCAT(all_ingredient.ingredient_name) as ingredient, GROUP_CONCAT(all_ingredient.ingredient_id) AS ingredient_id
						FROM all_ingredient,produce_ingredient
						where all_ingredient.ingredient_id=produce_ingredient.ingredient_id and produce_ingredient.batch_id=$batch_id
						group by produce_ingredient.batch_id)as b on b.batch_id=$batch_id	
				";
						/*
		$sql="SELECT produce_nutrition.*,produce.produce_id,produce.produce_name,produce.produce_origin,company.company_name,user_follow.user_id,user_follow.follow_time,a.additive ,a.additive_id,b.ingredient,b.ingredient_id
				from produce 
				inner join company on
					(company.company_id=produce.company_id 
						AND produce.produce_id=$produce_id
					)
				left join produce_nutrition on(produce_nutrition.produce_id=produce.produce_id)
				left join user_follow on(produce.produce_id=user_follow.produce_id and user_follow.user_id=$user_id)
				left join (select produce_additive.produce_id, GROUP_CONCAT(all_additive.additive_name) as additive, GROUP_CONCAT(all_additive.additive_id) AS additive_id
						FROM all_additive,produce_additive
						where all_additive.additive_id=produce_additive.additive_id and produce_additive.produce_id=$produce_id
						group by produce_additive.produce_id)as a on a.produce_id=$produce_id
						
				left join (select produce_ingredient.produce_id, GROUP_CONCAT(all_ingredient.ingredient_name) as ingredient, GROUP_CONCAT(all_ingredient.ingredient_id) AS ingredient_id
						FROM all_ingredient,produce_ingredient
						where all_ingredient.ingredient_id=produce_ingredient.ingredient_id and produce_ingredient.produce_id=$produce_id
						group by produce_ingredient.produce_id)as b on b.produce_id=$produce_id	
						";*/
		
		
		if($result = $link -> query($sql)){
			
			while ($row = $result->fetch_assoc()) // 當該指令執行有回傳,從result抓一組資料到 row變數
			{
				$output[] = $row; // 就逐項將回傳的東西放到陣列中
				//$company=$row["company_name"];
			}
			
			print(json_encode($output, JSON_UNESCAPED_UNICODE));
			
		}
		
		//新增曾歷史紀錄
		$sql="select * from user_history where user_id='$user_id'
			AND produce_id='$produce_id'";
		if($result=mysqli_query($link,$sql)){
			$db_inside=mysqli_num_rows($result);
		
			if($db_inside>=1){
				
				$sql = "UPDATE `user_history` set history_time=CURRENT_TIMESTAMP where user_id=$user_id AND produce_id=$produce_id";
				$link -> query($sql);
				
			}
			else{
				$sql = "INSERT INTO `user_history` (`user_id`,`produce_id`) 
				VALUES('".$user_id."', '".$produce_id."')";
				$link -> query($sql);
			}
		}
		//新增搜尋次數

		
		$link -> close(); // 關閉資料庫連線
		
	}
?>