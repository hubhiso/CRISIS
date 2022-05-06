<meta charset="UTF-8" />

		<table id="crisisp" class="compact table-striped table hideextra is-bordered is-striped is-narrow is-hoverable" cellspacing="0" width="100%" border="0">
			<tbody>
		
            	<?php
					require("phpsql_dbinfo.php");	
					
					$connection=mysql_connect ($hostname, $username, $password);

						mysql_query("SET NAMES UTF8",$connection); 
						if (!$connection) {

						die('Not connected : ' . mysql_error());
						}

						$db_selected = mysql_select_db($database, $connection);
						if (!$db_selected) {

						die ('Can\'t use db : ' . mysql_error());

						}
						mysqli_set_charset($conn,"utf8");

				 ?>
                <tr class="red3">
					<td class="red3" style="vertical-align: middle;" rowspan = 2 width='$cel_width'>ลำดับ</td>
					<td class="red3" style="vertical-align: middle;"  rowspan = 2 width='$cel_width'>เจ้าหน้าที่</td>
					<td class="red3" style="vertical-align: middle;"  rowspan = 2 width='$cel_width'>จังหวัด</td>
					<td class="red3" style="vertical-align: middle;"  rowspan = 2 align='center' width='$cel_width'>รวม</td>
					<td class="red3" style="vertical-align: middle;"  colspan = 4 align='center' width='$cel_width'>จำนวนเคสที่ดำเนินการ  (ราย) : เวลาเฉลี่ย (วัน)</td>
				</tr>
				<tr>
					<td class="red3" style="vertical-align: middle;"  align='center' width='$cel_width'>แจ้งเหตุ -> รับเรื่อง</td>
					<td class="red3" style="vertical-align: middle;"  align='center' width='$cel_width'>รับเรื่อง -> บันทึกข้อมูล</td>
					<td class="red3" style="vertical-align: middle;"  align='center' width='$cel_width'>บันทึกข้อมูล -> ดำเนินการ</td>
					<td class="red3" style="vertical-align: middle;"  align='center' width='$cel_width'>ดำเนินการ -> เสร็จสิ้น</td>
                </tr>
			
				
				<tr class="head">
              
              
              <?php
			  		function DateDiff($strDate1,$strDate2,$case_id)
							{
								
								return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
							}
						
						
				$strSQL_office = "SELECT p.name,o.nameorg as nameorg,p.name as prov_name,o.prov_id,count(c.receiver) as total
FROM officers o left join  case_inputs c on
o.name = c.receiver left join prov_geo p on o.prov_id = p.code  where (position ='officer' or o.Name = 'adminfar' or o.Name = 'adminhatc') 
group by o.prov_id,o.nameorg
order by p.code;";

//echo 
					//where receiver = 'คุณศุภวรรณ เงินเจริญ'
					//echo $strSQL_office."<br>";
					
                    $count_no = 0;
                    $result_office = mysql_query($strSQL_office) or die(mysql_error());
					while($row_office = mysql_fetch_array($result_office)){
					$count_no++;
					echo "<tr>";
					echo " <td>".$count_no."</td>";
					echo " <td>".$row_office["nameorg"]."</td>";
					echo " <td>".$row_office["prov_name"]."</td>";
					echo " <td align='center' >".$row_office["total"]."</td>";		
						
							
					/*		
              		$strSQL = "SELECT o.nameorg as name,o.position,c.case_id as case_id,count(c.case_id) as total
FROM officers o left join  case_inputs c on
o.name = c.receiver  
group by o.`nameorg`
order by c.prov_id;";
					*/
					$strSQL = "SELECT o.name,c.case_id from case_inputs c inner join officers o on c.receiver = o.name where o.nameorg = '".$row_office["nameorg"]."' and o.prov_id = '".$row_office["prov_id"]."' limit 1;";

					//echo $strSQL."<br>";
					//where receiver = 'คุณศุภวรรณ เงินเจริญ'
					
							$count_find_case_id_total = 0;
							
							
							$count_status1_total = 0;
							$count_status2_total = 0;
							$count_status3_total = 0;
							$count_status4_total = 0;
							$count_status5_total = 0;
							
							$datediff_status1_total = 0;
							$datediff_status2_total = 0;
							$datediff_status3_total = 0;
							$datediff_status4_total = 0;
							$datediff_status5_total = 0;
							
					
                    
                    $result = mysql_query($strSQL) or die(mysql_error());
					while($row = mysql_fetch_array($result))
				
						{
							
							
							
							
							
							
							// start find case_id by receiver
							//$strSQL_find_case_id = "SELECT  receiver,case_id  from case_inputs where receiver = '".$row["name"]."' group by case_id;";
							$strSQL_find_case_id = "SELECT  receiver,case_id  from case_inputs where receiver = '".$row["name"]."' ;";
							//echo $strSQL_find_case_id."<br>";
							//echo $strSQL_find_case_id."<br>";
					//where receiver = 'คุณศุภวรรณ เ

							  	$result_find_case_id = mysql_query($strSQL_find_case_id) or die(mysql_error());
								$count_find_case_id = 0;
								$count_find_case_id = mysql_num_rows($result_find_case_id);
								
								while($row_find_case_id = mysql_fetch_array($result_find_case_id))
							
									{
							
										
										$strSQL_status1 = "SELECT case_id,date(operate_time) as operate_time FROM timelines  INNER JOIN (SELECT MAX(id) as id FROM timelines where operate_status = '1' GROUP BY case_id) last_update ON last_update.id = timelines.id where case_id = '".$row_find_case_id["case_id"]."';";
							
											$result_status1 = mysql_query($strSQL_status1) or die(mysql_error());
											$count_status1 = 0;
											$count_status1 = mysql_num_rows($result_status1);
											
											while($row_status1 = mysql_fetch_array($result_status1))
										
												{
												 	$date_status1 = $row_status1["operate_time"];
													
												}
									
											
											$strSQL_status2 = "SELECT case_id,date(operate_time) as operate_time FROM timelines  INNER JOIN (SELECT MAX(id) as id FROM timelines where operate_status = '2' GROUP BY case_id) last_update ON last_update.id = timelines.id where case_id = '".$row_find_case_id["case_id"]."';";
											
											$result_status2 = mysql_query($strSQL_status2) or die(mysql_error());
											$count_status2 = 0;
											$count_status2 = mysql_num_rows($result_status2);
											
											while($row_status2 = mysql_fetch_array($result_status2))
										
												{
													$date_status2 = $row_status2["operate_time"];
												}
											
											
												
												
												
												
											
											$strSQL_status3 = "SELECT case_id,date(operate_time) as operate_time FROM timelines  INNER JOIN (SELECT MAX(id) as id FROM timelines where operate_status = '3' GROUP BY case_id) last_update ON last_update.id = timelines.id where case_id = '".$row_find_case_id["case_id"]."';";
											
											$result_status3 = mysql_query($strSQL_status3) or die(mysql_error());
											$count_status3 = 0;
											$count_status3 = mysql_num_rows($result_status3);
											
											while($row_status3 = mysql_fetch_array($result_status3))
										
												{
												
													$date_status3 = $row_status3["operate_time"];
												}
												
											
													
												
											
												
												
													
												
												
											$strSQL_status4 = "SELECT case_id,date(operate_time) as operate_time FROM timelines  INNER JOIN (SELECT MAX(id) as id FROM timelines where operate_status = '4' GROUP BY case_id) last_update ON last_update.id = timelines.id where case_id = '".$row_find_case_id["case_id"]."';";
											
											$result_status4 = mysql_query($strSQL_status4) or die(mysql_error());
											$count_status4 = 0;
											$count_status4 = mysql_num_rows($result_status4);
											
											while($row_status4 = mysql_fetch_array($result_status4))
										
												{
													$date_status4 = $row_status4["operate_time"];
												}
												
											
											
											$strSQL_status5 = "SELECT case_id,date(operate_time) as operate_time FROM timelines  INNER JOIN (SELECT MAX(id) as id FROM timelines where operate_status = '5' GROUP BY case_id) last_update ON last_update.id = timelines.id where case_id = '".$row_find_case_id["case_id"]."';";
							
											$result_status5 = mysql_query($strSQL_status5) or die(mysql_error());
											$count_status5 = 0;
											$count_status5 = mysql_num_rows($result_status5);
											
											while($row_status5 = mysql_fetch_array($result_status5))
										
												{
													$date_status5 = $row_status5["operate_time"];
												}
												
												
												
										
										
										
										
										
											
											// 1
											if (($date_status2 >= $date_status1) and ($count_status1 != 0)){
												$count_status2_total++;
												$datediff_status2_total += DateDiff($date_status1,$date_status2);
											}
											// 2
											if (($date_status3 >= $date_status2) and ($count_status2 == 1)){
												$count_status3_total++;
												$datediff_status3_total += DateDiff($date_status2,$date_status3);
											}
											// 3
											if (($date_status4 >= $date_status3) and ($count_status3 == 1)){
												$count_status4_total++;
												$datediff_status4_total += DateDiff($date_status3,$date_status4);
											}
											// 4
											if (($date_status5 >= $date_status4) and ($count_status4 == 1)){
												$count_status5_total++;
												$datediff_status5_total += DateDiff($date_status4,$date_status5);	
											}
											
											
											
											
											
											
												
												
								 	}
									
									
									
							
									
									
						}
									echo "<td  align='center' >".$count_status2_total." : ".round($datediff_status2_total/$count_status2_total,0)."</td><td  align='center' >".$count_status3_total." : ".round($datediff_status3_total/$count_status3_total,0)."</td><td  align='center' >".$count_status4_total." : ".round($datediff_status4_total/$count_status4_total,0)."</td><td  align='center' >".$count_status5_total." : ".round($datediff_status5_total/$count_status5_total,0)."</td></tr>";
									
							
									$count_status1 = 0;
									$count_status2 = 0;
									$count_status3 = 0;
									$count_status4 = 0;
									$count_status5 = 0;
						
						
									$count_status1_total = 0;
									$count_status2_total = 0;
									$count_status3_total = 0;
									$count_status4_total = 0;
									$count_status5_total = 0;
									
									$datediff_status1_total = 0;
									$datediff_status2_total = 0;
									$datediff_status3_total = 0;
									$datediff_status4_total = 0;
									$datediff_status5_total = 0;
               
              		
					}
					
					
              
			  
			   ?>         
                
                
            </tr>
            
    </tbody>
</table>
    <link rel="stylesheet" type="text/css" href="DataTable/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="DataTable/buttons.dataTables.min.css" />

    <script type="text/javascript" language="javascript" src="DataTable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/buttons.print.min.js"></script>
	<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#crisisp').DataTable( {
			bFilter: true,
			dom: 'Bfrtip',
			buttons: [
				'excel', 'copy', 'print'
			],
			paging: false,
			ordering: false
		} );
	} );

  </script>

