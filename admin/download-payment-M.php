<?php 

error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');
date_default_timezone_set("Asia/Dhaka");

echo "<table border='1'>
									<thead>
										<tr>
										<th>#</th>
									<th>Member ID</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Slip Amount</th>
                                    <th>Guest Count</th>
                                    <th>Slip No</th>
                                   <th>Submission Date</th>
                                    <th>Deposit Date</th>
                                    <th>Slip Image</th>
                                    <th>Graduation</th>
											
										</tr>
									</thead>";

$date= date('d-m-Y_h-i a');
$filename="PaymentList_Member"; 
$sql = "SELECT member.MemId, member.Image, member.Name, member.Email, member.Bachelor, participants.SlipAmount,participants.GuestCount,participants.SlipNo, participants.DipositDate, participants.SlipImage, participants.Serial, participants.status, participants.DateM, participants.Mobile  FROM participants  INNER JOIN
  member ON participants.id = member.id WHERE participants.CategoryM IN ('Member') AND participants.status IN ('1') AND participants.YearM >=CURDATE()-INTERVAL 1 Year ORDER by member.MemId ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$mem_id= $result->MemId.'</td> 
<td>'.	$name= $result->Name.'</td> 
<td>'.$mobile= $result->Mobile.'</td> 
<td>'.$slip_amount= $result->SlipAmount.'</td> 
<td>'.$guest_count= $result->GuestCount.'</td> 
 <td>'.$slip_no=$result->SlipNo.'</td>	
  <td>'.$datem=$result->DateM.'</td>	 
   <td>'.$deposit_date=$result->DipositDate.'</td>
   <td>https://member.ruaaa.org/img/slips/'.$slip_image=$result->SlipImage.'</td>	
  <td>'.$bachelor_year=$result->Bachelor.'</td>	 					
</tr>
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-".$date.".xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
