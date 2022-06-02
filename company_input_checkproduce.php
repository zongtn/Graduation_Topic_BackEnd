<?php
//測試用的
	//引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
		$link -> set_charset("UTF8"); // 設定語系避免亂碼
		/*$company_id=$_GET['company_id'];
		$produce_name=$_GET['produce_name'];*/
		$produce_name=$_POST['produce_name'];
		$company_id=$_POST['company_id'];
		
		$sql="select * from produce where produce_name='$produce_name'
		and company_id='$company_id'";
		$result=mysqli_query($link,$sql);
		$db_inside=mysqli_num_rows($result);
		$respone["produce"]="no";
		if($db_inside>=1){
			$respone["produce"]="already";
		}
		print(json_encode($respone, JSON_UNESCAPED_UNICODE));
			$link -> close(); // 關閉資料庫連線
		
	}
?>
