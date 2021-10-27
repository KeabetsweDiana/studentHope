<?php
include("nav.php");
?>
       
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1>ADD High Risk Module</h1>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form method="POST">
                            <div class="form-row">
                                
                                <div class="col-md-7 col-lg-8 col-xl-9">
                                    <div><label>MODULE<input class="form-control" type="text" name="module" required></label></div>
									
                                   
                                   
                                    
                                    
                                </div>
                            </div>
							<input type="submit" class="btn btn-primary btn-submit profile-update"  name ="addTopic" Value="ADD MODULE">
						</form>
						
						<?php
						if(isset($_POST['addTopic']))
						{
							 
							 
							 $module = $_POST['module'];
							
							
											$ret1=mysqli_query($con,"select * from module Where Module = '$module'");
											$lineNo = mysqli_num_rows($ret1);
											if($lineNo > 0)
											{
												echo '<script type="text/javascript"> alert("This this module : '.$module.' already exists.. try another Module") </script>';
											}else{
											
													$query1= "insert into mdule values('$module')";
													$query_run1 = mysqli_query($con,$query1);
													
													if($query_run1)
													{
														echo '<script type="text/javascript"> alert("Module Added successfully") </script>';
														
													}
													else
													{
														echo '<script type="text/javascript"> alert("Error!") </script>';
													}
											}
									
									
								 
						 }
						?>
                    </div>
                </div>
				
				
				
				
				<?php
					 /*$ret1=mysqli_query($con,"select * from module Where module='".."'");
							 if(){	 
								 }else{*/
				?>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/preview.js"></script>
    <script src="assets/js/print.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>