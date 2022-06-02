<?php
//
	//引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
		$link -> set_charset("UTF8"); // 設定語系避免亂碼
	
		// SQL 指令
		//$user_id=$_GET['user_id'];
		$produce_id=$_GET['produce_id'];
		$batch_id=$_GET['batch_id'];
		//echo $produce_id." ".$batch_id;
		
		/*
		$sql="SELECT produce.*,company.company_name,batch.batch_id,produce_nutrition.*
				from produce 
				inner join company on
					(company.company_id=produce.company_id 
						AND produce.produce_id=$produce_id)	
				inner join batch on batch.produce_id=$produce_id
				inner join produce_nutrition on(produce_nutrition.batch_id=batch.batch_id)
				";*/
		
		$sql="SELECT produce.*,company.company_name,batch.batch_id,produce_nutrition.*,a.additive ,a.additive_id,a.additive ,a.additive_id,b.ingredient,b.ingredient_id
				from produce 
				inner join company on
					(company.company_id=produce.company_id 
						AND produce.produce_id=$produce_id)
				inner join batch on batch.produce_id=$produce_id
				inner join produce_nutrition on(produce_nutrition.batch_id=batch.batch_id)
				
				left join (select produce_additive.batch_id, GROUP_CONCAT(all_additive.additive_name) as additive, GROUP_CONCAT(all_additive.additive_id) AS additive_id
						FROM all_additive,produce_additive
						where all_additive.additive_id=produce_additive.additive_id and produce_additive.batch_id=$batch_id
						group by produce_additive.batch_id)as a on a.batch_id=$batch_id
						
				left join (select produce_ingredient.batch_id, GROUP_CONCAT(all_ingredient.ingredient_name) as ingredient, GROUP_CONCAT(all_ingredient.ingredient_id) AS ingredient_id
						FROM all_ingredient,produce_ingredient
						where all_ingredient.ingredient_id=produce_ingredient.ingredient_id and produce_ingredient.batch_id=$batch_id
						group by produce_ingredient.batch_id)as b on b.batch_id=$batch_id	
				";
		
		
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