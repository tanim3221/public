<?php 

error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');

echo "<table border='1'>
									<thead>
										<tr>
										<th>#</th>
											<th>Member ID</th>
											<th>Name</th>
											<th>Mailing Address</th>
											<th>Permanent Address</th>
											<th>Profession</th>
											<th>Designation</th>
											<th>Organization</th>
											<th>Mobile </th>
											<th>Email</th>
											<th>Bachelor Year</th>
											<th>Master Year</th>
											<th>Image</th>
											
										</tr>
									</thead>";


$filename="M";
$sql = "SELECT * From member WHERE YearM >=CURDATE() - INTERVAL 2 Year ORDER BY MemId";
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
<td>'.$mailing_add= $result->Mailing.'</td> 
<td>'.$permanent_add= $result->Permanent.'</td> 
<td>'.$profesion= $result->Profession.'</td> 
 <td>'.$designation=$result->Designation.'</td>	
  <td>'.$organization=$result->Organization.'</td>	 
   <td>'.$mobile=$result->Mobile.'</td>	
  <td>'.$email=$result->Email.'</td>	 					
  <td>'.$bachelor_year=$result->Bachelor.'</td>	 					
  <td>'.$master_year=$result->Master.'</td>	 
  <td>https://member.ruaaa.org/img/m/'.$image=$result->Image.'</td>
</tr>
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-list.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
