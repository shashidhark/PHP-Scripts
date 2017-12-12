<?php
$filter_item = array(
	"date_from" 	=> "",
	"date_to"		=> "",
	"item_name" 	=> "maggi",
	"item_brand" 	=> "",
	"item_category" => "",
	"item_type" 	=> "",
	"hsnc" 			=> "" );
	
$q = "";

$where = " where ";
$and = " and ";

$itration = 0;
foreach($filter_item as $fi_key => $fi_val){
	if($fi_key == "date_to")
		continue;
	
	if($fi_val == "")
		continue;
	
	if($itration == 0)
		$q .= $where;
			
	if($fi_key == "date_from"){
		if($fi_val != "" && $filter_item["date_to"] != ""){
			$date_filter = 'bill_date BETWEEN "'.$fi_val.'" AND "'.$filter_item["date_to"].'" ';
		}
		else if($fi_val != "" && $filter_item["date_to"] == ""){
			$date_filter = 'bill_date like "%'.$fi_val.'%" ';
		}
		
		if($date_filter != "")
			$q .= $date_filter;
	}
	else{
		if($itration != 0){
			if($date_filter != ""){
				$q.=$and;
			}
		}
		
		$q .= $fi_key.' like "%'.$fi_val.'%"';
	}
	
	$itration++;
	
}
echo $q;
?>
