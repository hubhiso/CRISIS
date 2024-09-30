<?php




$query_name = "
SELECT count(case_id) as total,r.code,r.name
from  r_status r left join case_inputs c
on r.code = c.status
where problem_case = '1' $filter
GROUP BY status
order by r.code asc;";

		$result = mysqli_query($conn,$query_name);

		//$result = mysqli_query($query_name);

		if (!$result) {

		  die('Invalid query: ' . mysql_error());

		}
		
		while($row = $result->fetch_assoc()) {
//while ($row = mysql_fetch_array($result)) {
                      $res_total[] = $row["total"];
         			  $res_code[] = $row["code"];	
		}
		/*
		$td =  "<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>"; */
				
		
/*		
$i == 1;		
foreach ($res_code as $v1){ 
                       if ($v1 == $i){
						   $result_arr[$i] = $v1;
					   }else{
						   $result_arr[$i] = "";
					   }

$i++;
						   
		  
         }
		 
foreach ($result_arr as $v2){ 
                       echo $v2;

}
*/						   
		 



/*

SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '1' and sub_problem = '1'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '1' and sub_problem = '2'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '1' and sub_problem = '2' and group_code = '1'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '1' and sub_problem = '2' and group_code = '2'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '1' and sub_problem = '2' and group_code = '3'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '1' and sub_problem = '2' and group_code = '4'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '1' and sub_problem = '2' and group_code = '5'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '1' and sub_problem = '2' and group_code = '7'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '1' and sub_problem = '4'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '1' and sub_problem = '3'
GROUP BY status
order by r.code asc;


SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '2'  
GROUP BY status
order by r.code asc;

SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '3'  
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '3'  and sub_problem = '1'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '3'  and sub_problem = '4'
GROUP BY status
order by r.code asc;


SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '4'  
GROUP BY status
order by r.code asc;

SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '4' and sub_problem = '2' and group_code = '1'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '4' and sub_problem = '2' and group_code = '2'
GROUP BY status
order by r.code asc;

SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '4' and sub_problem = '2' and group_code = '3'
GROUP BY status
order by r.code asc;

SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '4' and sub_problem = '2' and group_code = '4'
GROUP BY status
order by r.code asc;

SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '4' and sub_problem = '2' and group_code = '5'
GROUP BY status
order by r.code asc;

SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '4' and sub_problem = '2' and group_code = '7'
GROUP BY status
order by r.code asc;


SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '5'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '5' and sub_problem = '1'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '5' and sub_problem = '2'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '5' and sub_problem = '2' and group_code = '1'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '5' and sub_problem = '2' and group_code = '2'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '5' and sub_problem = '2' and group_code = '3'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '5' and sub_problem = '2' and group_code = '4'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '5' and sub_problem = '2' and group_code = '5'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '5' and sub_problem = '2' and group_code = '7'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '5' and sub_problem = '4'
GROUP BY status
order by r.code asc;
SELECT count(case_id) as total,r.code,r.name
from r_status r left join case_inputs c
on r.code = c.status
where problem_case = '5' and sub_problem = '3'
GROUP BY sex
order by r.code asc;
*/
?>