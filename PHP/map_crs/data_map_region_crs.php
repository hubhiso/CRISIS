<?php


//$strSQL = "select count(*) as total,PROVINCEID as province from distambon h inner join prov_geo p on h.PROVINCEID = p.code  where p.nhso ='$province' GROUP BY p.code;";


if($province != 0){

    if($pr != 0){
        $pr_q = " and nhso = $province and c.prov_id= '".$pr."' ";
    }else{
        $pr_q = " and nhso = $province ";
    }
}else{
    if($pr != 0){
        $pr_q = " and c.prov_id= '".$pr."' ";
    }
}

$strSQL = "SELECT
count(*) AS total,
c.prov_id AS province ,
p.nhso
FROM
case_inputs c
inner join prov_geo p ON p.code = c.prov_id 
WHERE
p.nhso = '$province'  and  c.created_at >= '".date("Y/m/d", strtotime($date_start))."' and c.created_at <= '".date("Y/m/d", strtotime($date_end))."'
$pr_q 
GROUP BY
c.prov_id ";


$getval = "total";


$data_import = "";

$result = mysqli_query($connection,$strSQL);


while($row = mysqli_fetch_array($result))
{	
    $data_import .= "['".$row["province"]."',".$row["total"]."],";		
}


$result = mysqli_query($connection,$strSQL);
while($row = mysqli_fetch_array($result))
{	
	$resource_val[] = $row["total"];
}

$min = "0";
$max = "1000";







function get_percentile($percentile, $array) {
    sort($array);
    $index = ($percentile/100) * count($array);
    if (floor($index) == $index) {
         $result = ($array[$index-1] + $array[$index])/2;
    }
    else {
        $result = $array[floor($index)];
    }
    return $result;
}
$percentile = $resource_val;


//echo $min.$max;
$p25 =  get_percentile(25, $percentile);
$p50 =  get_percentile(50, $percentile);
$p75 =  get_percentile(75, $percentile);

	
				
				
				
				
//end data import


?>