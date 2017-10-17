<?php
//Tên: Lê Thành Đạt
//email: lethanhdat791996@gmail.com
	
	function search_list_table($table,$row_name,$id){
		$qr = "SELECT * FROM $table
				where $row_name=$id
			   order by id_$table desc
				";
		return mysql_query($qr);
	}
	function list_table_lq($table,$id_menu,$id,$limit){
		 $qr = "SELECT * FROM $table
				where id_menu='$id_menu'
				and id_$table != $id
			   order by id_$table desc
			   $limit
				";
		return mysql_query($qr);
	}
	function list_table_sp_lq($table,$id_menu,$limit){
		$qr="SELECT * FROM $table
				where id_menu='$id_menu'
				order by id_$table desc
			   $limit
				";
		return mysql_query($qr);
	}
	
	function list_table($table){
		$qr = "SELECT * FROM $table
			
			   order by id_$table desc
			 
				";
		return mysql_query($qr);
	}
		function list_table1($table){
		$qr = "SELECT * FROM $table
				where id_$table >4
			   order by id_$table desc
			 
				";
		return mysql_query($qr);
	}
	
	function list_two_table($table1,$table2){
		 $qr = "SELECT * FROM $table1,$table2
			where $table1.id_$table2 = $table2.id_$table2 
			order by id_$table1 desc
			";
		return mysql_query($qr);
	}
	function list_user(){
		$qr="
		select * from user,role where user.id_role=role.id_role
		";
		return mysql_fetch_array($qr);
	}
	function cart(){
		$qr = "SELECT * FROM cart
			";
		return mysql_query($qr);
	}

	function detail_table($table,$id){
		 $qr = "SELECT * FROM $table
			   where id_$table = $id
			";
		$row = mysql_query($qr);
		return mysql_fetch_array($row);
	}
	
	function detail_two_table($table1,$table2,$id){
		$qr = "SELECT * FROM $table1,$table2		
					where id_$table1 = $id
					and $table1.id_$table2 = $table2.id_$table2
			";
		$row = mysql_query($qr);
		return mysql_fetch_array($row);
	}
	function detail_user_role(){
		$qr = "SELECT * FROM role,user		
					where role.id_role = user.id_role
					
			";
	return (mysql_query($qr));
		
	}
	
	function add($table,$array){
		$length = count($array);
		$max = $length - 1;
		$value="";
		for($i = 0; $i <$length; $i++){
			$value =$value."'".$array[$i]."'";
			
			if($i == $max){
				break;
			}
			
			$value = $value.',';
		}
		$qr="INSERT INTO $table VALUES (NULL, $value);";
		mysql_query($qr);
	}

	function check_array_empty($array1,$array2){
		$quantity = count($array1);
		
		for($i=0;$i<$quantity;$i++){
			if($array1[$i] == ""){
				$error = "không được bỏ trống ".$array2[$i];
				break;
			}
		}
		return $error;
	}
	
	function limit($string_into,$limit){
		$mang = explode(' ', $string_into);
		$length = count($mang);
		$string_out = "";
		if($limit < $length){
			for($i=0;$i<$limit;$i++){
				$string_out = $string_out.$mang[$i]." ";
			}
			$string_out = $string_out."...";
		}else{
			$string_out = $string_into;
		}
		return $string_out;
	}
	
?>