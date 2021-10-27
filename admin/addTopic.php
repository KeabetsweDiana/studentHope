<?php
include("nav.php");
?>
      
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1>ADD Module and Topic</h1>
                        </div>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form method="POST">
                            <div class="form-row">
                                
                                <div class="col-md-7 col-lg-8 col-xl-9">
                                    <div><label>Topic<input class="form-control" type="text" name="topic" required></label></div>
									
                                   
                                   
                                    <div><label>Module<select class="form-control" name="module">
									<optgroup label="Select Module">
									
									
									
									<?php 
										  $ret=mysqli_query($con,"select * from module");
										  $cnt=1;
										  while($row=mysqli_fetch_array($ret))
										  {
							
									echo '<option value="'.$row['Module'].'">'.$row['Module'].'</option>';
									
									
									
									} ?>
									</optgroup></select></label></div>
                                    
                                </div>
                            </div>
							<input type="submit" class="btn btn-primary btn-submit profile-update"  name ="addTopic" Value="ADD TOPIC">
						</form>
						
						<?php
						if(isset($_POST['addTopic']))
						{
							 
							 $topic = $_POST['topic'];
							 $module = $_POST['module'];
							echo '<script type="text/javascript"> alert("This Topic: '.$topic.' for this module : '.$module.'") </script>';
							
											$ret1=mysqli_query($con,"select * from topic Where module = '$module' AND topic = '$topic'");
											$lineNo = mysqli_num_rows($ret1);
											if($lineNo > 0)
											{
												echo '<script type="text/javascript"> alert("This Topic: '.$topic.' for this module : '.$module.' already exists.. try another Topic") </script>';
											}else{
											
													$query1= "insert into topic values('','$module','$topic')";
													$query_run1 = mysqli_query($con,$query1);
													
													if($query_run1)
													{
														echo '<script type="text/javascript"> alert("Topic Added successfully") </script>';
														
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