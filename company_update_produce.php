<?php
//測試用的
	//引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
		$link -> set_charset("UTF8"); // 設定語系避免亂碼
		
		$produce_id=$_POST['produce_id'];
		
		$produce_name=$_POST['produce_name'];
		$produce_origin=$_POST['produce_origin'];
		$produce_weight=$_POST['produce_weight'];
		
		$produce_ingreds=$_POST['produce_ingreds'];
		
        $nut_weight=$_POST['nut_weight'];
		$nut_quantity=$_POST['nut_quantity'];
		$nut_calories=$_POST['nut_calories'];
		$nut_protein=$_POST['nut_protein'];
		$nut_fat=$_POST['nut_fat'];
		$nut_saturatedfat=$_POST['nut_saturatedfat'];
		$nut_transfat=$_POST['nut_transfat'];
		$nut_sugar=$_POST['nut_sugar'];
		$nut_na=$_POST['nut_na'];
		

		$produce_adds=$_POST['produce_adds'];
		
	
//新增批次
		$batch_id=0;
		$sql = "INSERT INTO `batch` (`produce_id`) 
			VALUES('".$produce_id."')";
		$result = mysqli_query($link,$sql);
			// 如果有異動到資料庫數量(更新資料庫)
		if (mysqli_affected_rows($link)>0) {
			// 如果有一筆以上代表有更新
			// mysqli_insert_id可以抓到第一筆的id
				$batch_id= mysqli_insert_id ($link);
		}
		/*
		$sql = "UPDATE `produce` SET `batch_id` = '$batch_id' WHERE produce.produce_id = $produce_id";
		$result = mysqli_query($link,$sql);*/
	
//更新商品資訊

		$sql = "UPDATE `produce` SET `produce_name` = '$produce_name', `produce_origin` = '$produce_origin', `produce_weight` = '$produce_weight', `batch_id` = '$batch_id' 
		WHERE produce_id = $produce_id";
			
		$link -> query($sql);
		$respone["update"]=true;
		
		
//新增商品營養標事
		/*$sql = "UPDATE `produce_nutrition` SET `nutrition_weight` = '$nut_weight', `nutrition_quantity` = '$nut_quantity', `nutrition_calories` = '$nut_calories'
		, `nutrition_protein` = '$nut_protein', `nutrition_fat-interview` = '$nut_fat', `nutrition_saturated-fat-interview` = '$nut_saturatedfat'
		, `nutrition_trans-lipid-interview` = '$nut_transfat', `nutrition_sugar` = '$nut_sugar'
		, `nutrition_na` = '$nut_na' WHERE produce_id = $produce_id";
		$link -> query($sql);*/
		$sql = "INSERT INTO `produce_nutrition` (`batch_id`,`nutrition_weight`, `nutrition_quantity`,
		`nutrition_calories`, `nutrition_protein`, `nutrition_fat-interview`, 
		`nutrition_saturated-fat-interview`, `nutrition_trans-lipid-interview`, `nutrition_sugar`,
		`nutrition_na`) 
				VALUES($batch_id,$nut_weight,$nut_quantity,$nut_calories,$nut_protein,$nut_fat,$nut_saturatedfat,$nut_transfat,$nut_sugar,$nut_na)";
		$link -> query($sql);
				
//商品添加劑
		/*
		$sql = "DELETE FROM `produce_additive` WHERE `produce_id` = $produce_id";
		$link -> query($sql);
		
		$datas= explode(",",$produce_adds);
		$i=0;
		for($i;$i<count($datas);$i++){
				
			$sql = "INSERT INTO `all_additive` (`additive_name`) 
			VALUES('$datas[$i]')";
			$link -> query($sql);
			
		}
		for($i=0;$i<count($datas);$i++){
			$sql = "INSERT INTO `produce_additive` (`additive_id`,`produce_id`) 
			(SELECT additive_id, '$produce_id' FROM all_additive where all_additive.additive_name = '$datas[$i]')";
			$link -> query($sql);
			//echo $datas[$i];
		}*/
		$datas= explode(",",$produce_adds);
		$i=0;
		for($i;$i<count($datas);$i++){
				
			$sql = "INSERT INTO `all_additive` (`additive_name`) 
			VALUES('$datas[$i]')";
			$link -> query($sql);
			
		}
		for($i=0;$i<count($datas);$i++){
			$sql = "INSERT INTO `produce_additive` (`additive_id`,`batch_id`) 
			(SELECT additive_id, '$batch_id' FROM all_additive where all_additive.additive_name = '$datas[$i]')";
			$link -> query($sql);
			//echo $datas[$i];
		}
		
//商品成分	
/*	
		$sql = "DELETE FROM `produce_ingredient` WHERE `produce_id` = $produce_id";
		$link -> query($sql);
		$data2= explode(",",$produce_ingreds);
		$i=0;
		for($i;$i<count($data2);$i++){
				
			$sql = "INSERT INTO `all_ingredient` (`ingredient_name`) 
			VALUES('$data2[$i]')";
			$link -> query($sql);
			
		}
		for($i=0;$i<count($data2);$i++){
			$sql = "INSERT INTO `produce_ingredient` (`ingredient_id`,`produce_id`) 
			(SELECT ingredient_id, '$produce_id' FROM all_ingredient where all_ingredient.ingredient_name = '$data2[$i]')";
			$link -> query($sql);
			//echo $datas[$i];
		}
		*/
		$data2= explode(",",$produce_ingreds);
		$i=0;
		for($i;$i<count($data2);$i++){
				
			$sql = "INSERT INTO `all_ingredient` (`ingredient_name`) 
			VALUES('$data2[$i]')";
			$link -> query($sql);
			
		}
		for($i=0;$i<count($data2);$i++){
			$sql = "INSERT INTO `produce_ingredient` (`ingredient_id`,`batch_id`) 
			(SELECT ingredient_id, '$batch_id' FROM all_ingredient where all_ingredient.ingredient_name = '$data2[$i]')";
			$link -> query($sql);
			//echo $datas[$i];
		}
		
		print(json_encode($respone, JSON_UNESCAPED_UNICODE));
		$link -> close(); // 關閉資料庫連線

	}
?>
