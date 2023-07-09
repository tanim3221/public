<h2 class="GrayBlue22b">RUAAA Committee</h2>

<div class="table-responsive">  
   <table id="ruaaa_data" class="table table-striped" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th><b>Photo</th><th><b>Mermber ID</th> <th><b>Name</th><th><b>Committee Designation</th> <th><b>Bachelor Year</th><th><b>Master Year</th><th><b>Details</th>
										</tr>
									</thead>
									<tbody>

<?php $sql = "SELECT * from  lifemembers  WHERE status IN ('1') ORDER BY Case RuaaaPost
    WHEN 'President' Then 1
    WHEN 'Vice President (1)' Then 2
    WHEN 'Vice President (2)' Then 3
    WHEN 'Vice President (3)' Then 4
	WHEN 'General Seretary' Then 5
    WHEN 'Tresurer' Then 6
    WHEN 'Joint Seretary (1)' Then 7
	WHEN 'Joint Seretary (2)' Then 8
	WHEN 'Organizing Secretory (1)' Then 9
	WHEN 'Organizing Secretary (2)' Then 10
    WHEN 'Office and Press Secretary' Then 11
    Else 12 End ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
	<tr>
			<td><?php echo htmlentities($cnt);?></td>
		<td><div class="avatar"><img width="70px" class="img-rounded" src='../img/lm/<?php echo htmlentities($result->Image);?>'></div></td>
		<td data-label="Member ID"><?php echo htmlentities($result->MemId);?></td>
		<td data-label="Name"><?php echo htmlentities($result->Name);?></td>
		<td data-label="RUAAA Post"><?php echo htmlentities($result->RuaaaPost);?></td>
		<td data-label="Bachelor Year"><?php echo htmlentities($result->Bachelor);?></td>
		
		<td data-label="Master Year"><?php echo htmlentities($result->Master);?></td>
			<td>
			
			<a type="button" class="btn btn-primary" href="details-life-members.php?id=<?php echo htmlentities($result->id);?>">  Details View </a> 

			</td>
			
</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

					</div>

	
		 <script>  
$(document).ready(function() {
    var table = $('#ruaaa_data').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} ); 
 </script> 
</body>

