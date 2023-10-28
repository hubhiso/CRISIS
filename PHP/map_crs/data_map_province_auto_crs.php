<?php

//$strSQL = "select d.DISTRICTID,count(*) as total from distambon d  where d.PROVINCEID = '$province' and dyear = '2564' group by d.DISTRICTID order by d.DISTRICTID asc ;";


/*
$strSQL = "SELECT count(*) as total , amphur_id as DISTRICTID from case_inputs c left join prov_geo on prov_id = code where prov_id = '$province' and  c.created_at >= '".date("Y/m/d", strtotime($date_start))."' and c.created_at <= '".date("Y/m/d", strtotime($date_end))."'
$pr_q group by amphur_id order by amphur_id asc; ";
*/

$strSQL = "SELECT count(*) as total , amphur_id as DISTRICTID from case_inputs c left join prov_geo on prov_id = code where prov_id = '$province' and  c.created_at >= '".date("Y/m/d", strtotime($date_start))."' and c.created_at <= '".date("Y/m/d", strtotime($date_end))."'
$pr_q group by amphur_id order by amphur_id asc; ";


//echo $strSQL;

$getval = "total";

//echo " ".$strSQL;
$type_data = "prov_code";

$data_import = "";

$result = mysqli_query($connection,$strSQL);


while($row = mysqli_fetch_array($result))
{	
	
			
			$data_import .= "['".$row["DISTRICTID"]."',".$row["total"]."],";
			
			
				
}

		

		
				
		
				
//end data import


?>