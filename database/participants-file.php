
<?php $sql = "SELECT * from  activate WHERE id = '5'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	

<h2 class="GrayBlue22b"> <?php echo htmlentities($result->text);?> </h2>
	<?php }} ?>	
<div class="table-responsive">
    <table id="ruaaa_data" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th><b>Photo</th><th><b>Mermber ID</th> <th><b>Name</th>  <th><b>Mobile</th>  <th><b>Email</th><th><b>Bachelor Year</th><th><b>View</th></tr></thead>
<?php
		$sql="SELECT * FROM lifemembers WHERE participants = '1' AND active='1' ORDER BY Case LEFT (MemId, 2 )
                WHEN 'GD' Then 1
                WHEN 'DD' Then 2
                WHEN 'GM' Then 3
                WHEN 'LM' Then 4
                Else 5 End , MemId ";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
				if($query->rowCount() > 0)
				{
				foreach($results as $result)
				{				
?>	
                        <?php include('view-all.php'); ?>   
                     
             
                <?php }} ?>
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