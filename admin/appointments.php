<?php
include("nav.php");






?>
        
				   <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1 align="center">All Appointments</h1>
                            <div id="small-nav">
                                <ul id="inner-nav">
                                    <li><a href="group.php">GROUP</a></li>
                                    <li><a href="individual.php">INDIVUDUAL</a></li>
                                    
                                </ul>
                                   <form method="post">
									<div class="form-group" align="right">
									    <div class="form-input">
											<select  name="search" class="btn btn-info">
												<option value="">ALL</option>
												<option value="GROUP">GROUP</option>
												<option value="Individual">INDIVIDUAL</option>
											</select>
												<input class="btn btn-info" type="submit" name="find" value="SEARCH">
											
										</div>
									</div>
								    </form>
                                
                                
                                
                                <button class="btn btn-info"  style="float: right;" id="btnExport" onclick="fnExcelReport();"> EXPORT EXCEL</button>
                            </div>
                            
                        </div>
                        <p></p>
                    </div>
                </div>
           
                <iframe id="txtArea1" style="display:none"></iframe>

                
                <div class="table-responsive" id="sessions">
                    <table class="table" id="example" style="width:100%">
                        <thead>
                            <tr>
							<th>Student Number</th>
                                <th>Name</th>
								<th>Surname</th>
                                <th>Module</th>
								<th>Topic</th>
								<th>Session Type</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Cell No.</th>
								<th>Status</th>
                            </tr>
                        </thead>
						
						
                        <tbody>
						
						<?php 
						
						if(empty($_POST['search']))
					    {
						  
							$ret=mysqli_query($con,"select * from session");
								$cnt=1;
								 while($row=mysqli_fetch_array($ret))
								{
						?>
											<tr>
											
											<td><?php echo $row['stdNum'] ?></td>
											<td><?php echo $row['name'] ?></td>
											<td><?php echo $row['surname'] ?></td>
											<td><?php echo $row['module'] ?></td>
											<td><?php echo $row['Topic'] ?></td>
											
											<td><?php echo $row['sessionType'] ?></td>
											
											<td><?php echo $row['date'] ?></td>
											<td><?php echo $row['time'].':00' ?></td>
											<td><?php echo $row['cellNumber'] ?></td>
											<td><?php if($row['status'] =='PENDING')
														{
															echo '<span>Pending&nbsp;<i class="fa fa-warning" id="pending"></i></span><br>';

														}else if($row['status'] =='ACCEPTED'){
														echo'<span>Accepted&nbsp;<i class="fa fa-thumbs-up" id="accepted"></i></span>By&nbsp;<span>'.$row['tutor'].'</span>';
														}else{
														    echo '<span>Cancelled&nbsp;<i class="fa fa-times-circle" aria-hidden="true" style="font-size:20px;color:red"></i></span><br>';
														}
											
											?></td>
							
                                
                               
                                
                            </tr> <?php 
								} 
								
						}else{
							$ret=mysqli_query($con,"select * from session WHERE sessionType='".$_POST['search']."'");
								$cnt=1;
								 while($row=mysqli_fetch_array($ret))
									{
						?>
											<tr>
											
											<td><?php echo $row['stdNum'] ?></td>
											<td><?php echo $row['name'] ?></td>
											<td><?php echo $row['surname'] ?></td>
											<td><?php echo $row['module'] ?></td>
											<td><?php echo $row['Topic'] ?></td>
											<td><?php echo $row['sessionType'] ?></td>
											<td><?php echo $row['date'] ?></td>
											<td><?php echo $row['time'].':00' ?></td>
											<td><?php echo $row['cellNumber'] ?></td>
											<td><?php if($row['status'] =='PENDING')
														{
															echo '<span>Pending&nbsp;<i class="fa fa-warning" id="pending"></i></span><br>';

														}else{
														echo'<span>Accepted&nbsp;<i class="fa fa-thumbs-up" id="accepted"></i></span>By&nbsp;<span>'.$row['tutor'].'</span>';
														}
											
											?></td>
							
                                
                               
                                
						


						<?php
									}
						}
							?>
                         
                        </tbody>
                    </table>
                </div>
                <hr>
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