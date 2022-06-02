<?php
//一般用戶註冊帳號ok
    //引用資料庫
    require("db.php");
	if($link->connect_error){ //連線錯誤
		echo '錯誤';
	}else{
		$link -> set_charset("UTF8"); // 設定語系避免亂碼
		
		$user_account=$_POST['user_account'];
		$user_password=$_POST['user_password'];
		$user_email=$_POST['user_email'];
		$user_phone=$_POST['user_phone'];
		$user_name=$_POST['user_name'];

		/*
		$user_account=$_GET['user_account'];
		$user_password=$_GET['user_password'];
		$user_email=$_GET['user_email'];
		$user_phone=$_GET['user_phone'];
		$user_name=$_GET['user_name'];
		*/
		//echo $user_account.",".$user_password.",".$user_email.", ". $user_phone.", ". $user_name;
		$sql="select * from user where user_account='$user_account'";
		$result=mysqli_query($link,$sql);
		$db_inside=mysqli_num_rows($result);
		$respone["DD"]=$user_name;
		if($db_inside>=1){
			$respone["signup"]="already";
			
		}
		else{
			$sql= $link->prepare("INSERT INTO user(user_account,user_password,user_email,user_phone,user_name)
				VALUES(?,?,?,?,?)");
			$sql->bind_param("sssss",
				$user_account,
				$user_password,
				$user_email,
				$user_phone,
				$user_name);
				$sql->execute();
			//echo "add";
			$respone["signup"]="true";
			
			$sql->close();
		}
		print(json_encode($respone, JSON_UNESCAPED_UNICODE));
		$link->close();
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
