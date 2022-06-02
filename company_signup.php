<?php
//廠商註冊帳號ok
    //引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
		$link -> set_charset("UTF8"); // 設定語系避免亂碼
		/*
		$company_name=$_GET['company_name'];
		$company_account=$_GET['company_account'];
		$company_password=$_GET['company_password'];
		$company_email=$_GET['company_email'];
		*/
		
		$company_name=$_POST['company_name'];
		$company_account=$_POST['company_account'];
		$company_password=$_POST['company_password'];
		$company_email=$_POST['company_email'];
		$company_phone=$_POST['company_phone'];
		
		$sql="select * from company where company_account='$company_account'
			OR company_name='$company_name'";
		if($result=mysqli_query($link,$sql)){
			$db_inside=mysqli_num_rows($result);
			
			if($db_inside>=1){
				$respone["signup"]="already";
				
			}
			else{
				$sql= $link->prepare("INSERT INTO company(company_name,company_account,company_password,company_email,company_phone)
					VALUES(?,?,?,?,?)");
				$sql->bind_param("sssss",
					$company_name,
					$company_account,
					$company_password,
					$company_email,
					$company_phone);
					$sql->execute();
				
				$respone["signup"]="true";
				
				$sql->close();
			}
			print(json_encode($respone, JSON_UNESCAPED_UNICODE));
			$link->close();
		}
		
		
		/*
		$result = $link -> query($sql);
		while($row =$result->fetch_assoc()) // 當該指令執行有回傳,從result抓一組資料到 row變數
		{
			$respone["name"] = $row; // 就逐項將回傳的東西放到陣列中
			
		}
		print(json_encode($respone, JSON_UNESCAPED_UNICODE));
		$link -> close();
		*/
		
	
	}
?>
