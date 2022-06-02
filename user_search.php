<?php
//使用者搜尋
//search_by==all 完成
//(下面兩個未完成顯示follow_time)

	//引用資料庫
    require("db.php");
	if($link->connect_errno){ //連線錯誤
		echo '錯誤';
	}else{
		$link -> set_charset("UTF8"); // 設定語系避免亂碼
		
		$user_id=$_GET['user_id'];
		$search_by=$_GET['search_by'];//查詢商品的的方式:all、produce_company、produce_origin
		$search_key=$_GET['search_key'];//關鍵字
		//全部搜尋
		if($search_by=='all'){
		
			
			
			$sql="SELECT produce.produce_id,produce.produce_name,produce.produce_origin,company.company_name,batch.batch_id from produce
			inner join company on
				company.company_id=produce.company_id 
				AND (company.company_name LIKE '%$search_key%'
				OR produce.produce_name LIKE '%$search_key%'
				OR produce.produce_origin LIKE '%$search_key%')
			left join batch on
				batch.produce_id=produce.produce_id
			ORDER BY batch.batch_id DESC	
				";
			
			
			//http://localhost/projects/user_search.php?user_id=2&search_by=all&search_key=
			// 列出 與關鍵字有關的資料 "" 列出所有資料 在使用者登陸的情況下 以user_id 尋找並在follow_time 知道有無追蹤
			
			//	company_name: "真的食品公司"					1company_name: "xx農場"
			//	follow_time: "2021-08-08 14:21:33"				follow_time: null
			//	produce_id: "4"									produce_id: "10"
			//	produce_name: "香腸"							produce_name: "hot dog "
			//	produce_origin: "澳洲"							produce_origin: "korea"
			//  user_id: "2"									user_id: null
			/*
			$sql="SELECT produce.produce_id,produce.produce_name,produce.produce_origin,company.company_name,user_follow.user_id,user_follow.follow_time from produce inner join company on
				(company.company_id=produce.company_id 
					AND (company.company_name LIKE '%$search_key%'
					OR produce.produce_name LIKE '%$search_key%'
					OR produce.produce_origin LIKE '%$search_key%')
				)
				left join user_follow on(produce.produce_id=user_follow.produce_id and user_follow.user_id=$user_id)";
			*/
			//SELECT * FROM 表1
			//INNER JOIN 表2 ON (表1.K1=表2.K2 AND 表1及表2條件)
			//LEFT JOIN 表3 ON (表1.K1=表3.K3 AND 表1及表3條件)
			if($result = $link -> query($sql)){
				$respone["search"]=false;
				while ($row = $result->fetch_assoc())
				{
					$respone["search"]=true;
					$respone["data"][] = $row; 
				}
				print(json_encode($respone, JSON_UNESCAPED_UNICODE));
				$link -> close();
			}
		}
		//搜尋商品的公司名稱
		elseif($search_by=='produce_company') {
			
			/*$sql="SELECT * from produce WHERE 
			produce_id LIKE '%$search_key%' 
			OR produce_company LIKE '%$search_key%'";*/
			
			/*$sql="SELECT produce.produce_id,produce.produce_name,produce.produce_origin,company.company_name from produce,company WHERE 
			company.company_id=produce.company_id 
			AND company.company_name LIKE '%$search_key%'";*/
			
			$sql="SELECT produce.produce_id,produce.produce_name,produce.produce_origin,company.company_name,batch.batch_id from produce
			inner join company on
				company.company_id=produce.company_id 
				AND (company.company_name LIKE '%$search_key%')
			left join batch on
				batch.produce_id=produce.produce_id
			ORDER BY batch.batch_id DESC";
			if($result = $link -> query($sql)){
				$respone["search"]=false;
				while ($row = $result->fetch_assoc())
				{
					$respone["search"]=true;
					$respone["data"][] = $row;
				}
				print(json_encode($respone, JSON_UNESCAPED_UNICODE));
				$link -> close();
			}
		}
		//搜尋商品的名稱
		elseif($search_by=='produce_name') {
			/*$sql="SELECT * from produce WHERE 
			produce_name LIKE '%$search_key%'";*/
			/*$sql="SELECT produce.produce_id,produce.produce_name,produce.produce_origin,company.company_name from produce,company WHERE 
			company.company_id=produce.company_id 
			AND produce.produce_name LIKE '%$search_key%'";*/
			
			$sql="SELECT produce.produce_id,produce.produce_name,produce.produce_origin,company.company_name,batch.batch_id from produce
			inner join company on
				company.company_id=produce.company_id 
				AND (produce.produce_name LIKE '%$search_key%')
			left join batch on
				batch.produce_id=produce.produce_id
			ORDER BY batch.batch_id DESC";
			
			if($result = $link -> query($sql)){
				$respone["search"]=false;
				while ($row = $result->fetch_assoc())
				{
					$respone["search"]=true;
					$respone["data"][] = $row;
				}
			
				print(json_encode($respone, JSON_UNESCAPED_UNICODE));
				$link -> close();
			}
		}
		/*
		$sql="SELECT * from produce WHERE 
		produce_id LIKE '%$search%' 
		OR produce_company LIKE '%$search%'
		OR produce_name LIKE '%$search%'
		OR produce_origin LIKE '%$search%'
		OR produce_ingredient LIKE '%$search%'
		OR produce_additive LIKE '%$search%'";*/
		
	
	}
?>
