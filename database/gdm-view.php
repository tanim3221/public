<h2 class="GrayBlue22b"> List of Grand Donor Members </h2>
<div class="table-responsive">
    <table id="ruaaa_data" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th><b>Photo</th><th><b>Mermber ID</th> <th><b>Name</th>  <th><b>Mobile</th>  <th><b>Email</th><th><b>Bachelor Year</th><th><b>View</th></tr></thead>
<?php
		$sql="SELECT * from  lifemembers WHERE CategoryM='GDM' AND active='1' ORDER BY MemId";
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