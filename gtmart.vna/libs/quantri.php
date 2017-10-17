<?php
	function menu($id_father){
		$qr="
		select * from menu 
		where id_father = $id_father
		and hide_show = 0
		";
		return mysql_query($qr);
	}
	function list_product_highlight($limit){
		$qr="
		select * from product 
		where Highlights=1
			order by id_product desc
		$limit 
		";
		return mysql_query($qr);
	}
	function list_comment(){
		$qr="
			select * from comment_customer,product 
			where comment_customer.id_product=product.id_product
			order by id_comment desc
		";
		return mysql_query($qr);
	}
	function detail_ten_kd($ten_kd){
		$qr="select * from menu where name_unsigned='$ten_kd'
		";
		$row=mysql_query($qr);
		return mysql_fetch_array($row);
	}
	
	function detail_menu_id($id){
		$qr="select * from menu where id_menu ='$id'
		";
		$row=mysql_query($qr);
		return mysql_fetch_array($row);
	}
	
	function detail_ten_kd_product($ten_kd_producta){
		$qr="select * from product where unsigned_name_product='$ten_kd_producta'
		";
		$row1=mysql_query($qr);
		return mysql_fetch_array($row1);
	}
	function detail_ten_kd_news($ten_kd_news){
		$qr="select * from news where unsigned_title='$ten_kd_news'
		";
		$row1=mysql_query($qr);
		return mysql_fetch_array($row1);
	}
	function list_product_news($limit){
		$qr="
		select * from product 
		where Highlights=0
		order by id_product desc
		$limit
		";
		return mysql_query($qr);
	}
	function list_product_menu($id_menu,$from,$sotin1trang){
		$qr="
		select * from product where id_menu=$id_menu
		limit $from,$sotin1trang
		";
		return(mysql_query($qr));
	}
	function list_title_product(){
		$qr="
		select * from menu 
		where id_father > 0
		";
		return mysql_query($qr);
	}
	function list_product($id_product){
		$qr="select * from product where id_product in ($id_product) 
		";
		return(mysql_query($row));
	}
	
	function detail_menu($id_menu){
		$qr="select * from menu 
		where id_menu='$id_menu' 
		";
		$row=mysql_query($qr);
		return(mysql_fetch_array($row));
	}
	
	function detail_menu_name($name_kd){
		$qr="select * from menu 
		where name_unsigned='$name_kd' 
		";
		$row=mysql_query($qr);
		return(mysql_fetch_array($row));
	}
	
	function list_news($from,$sotin1trang){
		 $qr="
		select * from news where id_news>4 
		LIMIT $from,$sotin1trang
		";
		return(mysql_query($qr));
	}
	function number_news(){
	 $qr="
		SELECT * FROM news where id_news>4
		";
		return(mysql_query($qr));
			
	}
	function number_product($loai){
	 $qr="
		SELECT * FROM menu where name_unsigned='$loai'
		";
		$row= mysql_query($qr);
		return mysql_fetch_array($row);
	}
	
	function list_product_lq($id_menu){
		$qr="
		select * from product where id_menu=$id_menu
		";
		return(mysql_query($qr));
	}
	function rand_product(){
		$qr="
			select * from product 
			order by rand()
			limit 3
		";
		return mysql_query($qr);
	}
	
	function list_new_right(){
		 $qr="
			select * from news
			where id_news > 4
			order by rand()
			limit 5
		";
		return mysql_query($qr);
	}
	
	function search_tenkd_product($id){
		 $qr="
			select * from product where id_menu='$id'
		";
		return mysql_query($qr);

	}
	
	function get_sl(){
		$qr="select count(*) from statistic
		";
		$row= mysql_query($qr);
		return mysql_fetch_array($row);
	}
	function detail_cart_two_table($id){
		 $qr="
			select * from cart,shopping_cart,product 
			where cart.id_cart=shopping_cart.id_cart
			and product.id_product=shopping_cart.id_product 
			and cart.id_cart=$id
		";
		return mysql_query($qr);
		
	}
	function getRealIPAddress(){  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
	}
	function search_lsp($table){
		$qr = "SELECT * FROM $table
				where id_$table >7
			   order by id_$table desc
			 
				";
		return mysql_query($qr);
	}

	function show_menu(){
		$qr= "
		select * from menu
		
		order by id_menu
		
		";
		return mysql_query($qr);
	}

	function stripUnicode($str){
		if(!$str) return false;
			$unicode = array(
				'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
				'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
				'd'=>'đ',
				'D'=>'Đ',
				'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
				'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
				'i'=>'í|ì|ỉ|ĩ|ị',	  
				'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
				'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
				'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
				'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
				'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
				'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
				'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
			);
		foreach($unicode as $khongdau=>$codau) {
			$arr=explode("|",$codau);
			$str = str_replace($arr,$khongdau,$str);
		}
		return $str;
	}	
	function changeTitle($str){
		$str=trim($str);
		if ($str=="") return "";
		$str =str_replace('"','',$str);
		$str =str_replace("'",'',$str);
		$str = stripUnicode($str);
		$str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');
		
		// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
		$str = str_replace(' ','-',$str);
		return $str;
	}
	
	function list_lsp(){
		 $qr="
SELECT * FROM menu where id_father = 2 or id_father in ( SELECT id_menu FROM menu WHERE id_father = 2 )
		";
		return mysql_query($qr);
	}
	function list_lsp_cap1_cap2(){
		$qr="
			select * from menu where id_menu=2 or id_father=2 
		";
		return mysql_query($qr);
	}
	
	function list_menu_footer(){
		$qr="
			select * from menu where location=1
		";
		return mysql_query($qr);
	}
	function list_search($lsp,$made,$brand,$price){
		$where = "where ";
		if($lsp != 0){
			$where = $where."id_menu = ".$lsp;
			if($made != 0){
				$where = $where." and id_made = ".$made;
			}
			if($brand != 0){
				$where = $where." and id_brand = ".$brand;
			}
			if($price == 1){
				$where = $where." and price_product < 50000";
			}else if($price == 2){
				$where = $where." and price_product > 50000 and price_product < 200000";
			}else if($price == 3){
				$where = $where." and price_product > 200000 and price_product < 500000";
			}else if($price == 4){
				$where = $where." and price_product > 500000";
			}
		}else if($made != 0){
			$where = $where."id_made = ".$made;
			if($brand != 0){
				$where = $where." and id_brand = ".$brand;
			}
			if($price == 1){
				$where = $where." and price_product < 50000";
			}else if($price == 2){
				$where = $where." and price_product > 50000 and price_product < 200000";
			}else if($price == 3){
				$where = $where." and price_product > 200000 and price_product < 500000";
			}else if($price == 4){
				$where = $where." and price_product > 500000";
			}
		}else if($brand != 0){
			$where = $where."id_brand = ".$brand;
			if($price == 1){
				$where = $where." and price_product < 50000";
			}else if($price == 2){
				$where = $where." and price_product > 50000 and price_product < 200000";
			}else if($price == 3){
				$where = $where." and price_product > 200000 and price_product < 500000";
			}else if($price == 4){
				$where = $where." and price_product > 500000";
			}
		}else if($price != 0){
			if($price == 1){
				$where = $where."price_product < 50000";
			}else if($price == 2){
				$where = $where."price_product > 50000 and price_product < 200000";
			}else if($price == 3){
				$where = $where."price_product > 200000 and price_product < 500000";
			}else{
				$where = $where."price_product > 500000";
			}
		}else{
			
		}
		
		
		 $qr="
			SELECT * FROM product
			$where
			
			
		";
		return mysql_query($qr);
	}
	
?>
