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
											<th>Subject</th>
											<th>Message</th>
																					
										</tr>
									</thead>";


$filename="Complaints";
$sql = "SELECT * FROM complaints";
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
<td>'.$subject= $result->Subject.'</td> 
<td>'.$message= $result->Message.'</td> 	
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
