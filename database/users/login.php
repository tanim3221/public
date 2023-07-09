
	<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>

	 <h4 class="text-center text-bold mt-1x">Members Login<br>(GDM, DDM, GM, LM)</h4>
					    
	    <?php   $sql = "SELECT * from  activate WHERE id = '4'";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0)  {
                foreach($results as $result) {	?>	
    					
        <?php 
                $extime = date('d/m/Y - h:i a');
                $servertime= $result->expire;
                $text= $result->text;

            if($extime >= $servertime ) {
    
         if(empty($text)) { ?>
            
		<div class="expired" > Access Denied</div>
	
	<?php } else {?>
	
	<div class="expired" > <?php echo htmlentities($result->text);?></div>
	
	
	<?php } } else {?>
	<div class="col-md-8 col-md-offset-2 mt-3x">
						
			<form action="users/inc/authenticate.php" class="login" id="login" autocomplete="on" method="post">

				<label for="" class="text-uppercase text-sm">Email </label>
				<input type="email" placeholder="Email" name="Email" class="form-control mb">

				<label for="" class="text-uppercase text-sm">Password</label>
				<input type="password" placeholder="Password" name="Password" class="form-control mb">

			

				<button class="btn btn-primary btn-block " type="submit"  value="Login">LOGIN</button>
					<a href="check-email-reset-pass.php" class="btn btn-danger  btn-block " >Reset Password</a>

			</form>
</div>
            <?php } ?>
        <?php }} ?>
