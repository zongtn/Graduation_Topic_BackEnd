<?php
    // 設定 MySQL 的連線資訊並開啟連線
    // 資料庫位置、使用者名稱、使用者密碼、資料庫名稱
	//$db_host = 'localhost';
	$db_host = '127.0.0.1:3308';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'eat';
	//$link = mysqli_connect(	$db_host, $db_user, $db_pass, $db_name );
    $link = mysqli_connect(	$db_host, $db_user, $db_pass, $db_name ,'3308');
	
	
?>
