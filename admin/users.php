<?php
include("nav.php");
?>
       
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1>Manage Users</h1>
                            <div id="small-nav">
                                <ul id="inner-nav">
                                    <li><a href="add.php">Add User</a></li>
                                    
                                </ul>
                                <form method="post">
									<div class="form-group" align="right">
									    <div class="form-input">
											    <input class="btn btn-info" type="text" name="search" placeholder="SEARCH">
										</div>
									</div>
								</form>
                            </div>
                        </div>
                        <p></p>
                    </div>
                </div>
                <hr>
				
				<!--Table for users accounts-->
				<div id="tab">
				
				                          <table class="display" id="example" style="width:100%">
						  
											<thead>
											
												<tr>
													<th>Student Number</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Contact</th>
													<th>Email Address</th>
													<th>Registration Date</th>
													<th>update</th>
													
													<th>delete</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											
											if(empty($_POST['search']))
											{
												  $ret=mysqli_query($con,"select * from user ORDER BY stdNum");
												  $cnt=1;
												  while($row=mysqli_fetch_array($ret))
												  {
												?>
														<tr>
															<td><?php echo $row['stdNum'] ?></td>
															<td><?php echo $row['name'] ?></td>
															<td><?php echo $row['surname'] ?></td>
															
															<td><?php echo $row['cellNumber'] ?></td>
															<td><?php echo $row['studentEmail'] ?></td>
															
															<td><?php echo $row['account_date'] ?></td>
															<td><a href="updateUser.php?uid=<?php echo $row['studentEmail'];?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
															</td>
															
															<td><a href="deleteUser.php?id=<?php echo $row['studentEmail'];?>">
															 <button class="btn btn-danger btn-xs" onClick= "return confirm('Do You Really Want To Delete User');"> <i class="fa fa-trash-o "></i></button></a>
															 </td>
														</tr>
												<?php }
											}else{
												$search = $_POST['search'];
												
												
												$ret1=mysqli_query($con,"select * from user where stdNum LIKE '%". $_POST['search']."%' ");
												$cnt=1;
												
												
												$row_cnt = mysqli_num_rows($ret1);
												if($row_cnt>0)
												{
												  while($row = mysqli_fetch_array($ret1))
												  {
												?>
														<tr>
															<td><?php echo $row['stdNum'] ?></td>
															<td><?php echo $row['name'] ?></td>
															<td><?php echo $row['surname'] ?></td>
															
															<td><?php echo $row['cellNumber'] ?></td>
															<td><?php echo $row['studentEmail'] ?></td>
															
															<td><?php echo $row['account_date'] ?></td>
															<td><a href="updateUser.php?uid=<?php echo $row['studentEmail'];?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
															</td>
															
															<td><a href="deleteUser.php?id=<?php echo $row['studentEmail'];?>">
															 <button class="btn btn-danger btn-xs" onClick= "return confirm('Do you really want to delete');"> <i class="fa fa-trash-o "></i></button></a>
															 </td>
														</tr>
												<?php }
												}else{
													echo "<script>alert('Student Not found');</script>";
													$ret=mysqli_query($con,"select * from user");
												  $cnt=1;
												  while($row=mysqli_fetch_array($ret))
												  {
												?>
														<tr>
															<td><?php echo $row['stdNum'] ?></td>
															<td><?php echo $row['name'] ?></td>
															<td><?php echo $row['surname'] ?></td>
															
															<td><?php echo $row['cellNumber'] ?></td>
															<td><?php echo $row['studentEmail'] ?></td>
															
															<td><?php echo $row['account_date'] ?></td>
															
															<td><a href="updateUser.php?uid=<?php echo $row['studentEmail'];?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
															</td>
															
															<td><a href="deleteUser.php?id=<?php echo $row['studentEmail'];?>">
															    
															 <button class="btn btn-danger btn-xs" onClick= "return confirm('Do you really want to delete');"> <i class="fa fa-trash-o "></i></button></a>
															 </td>
														</tr>
												<?php }
													
													
													
												}
											}
													?>
											</tbody>
										
																				  
										</table>
				
				</div>
            </div>
			
			<p>
        <input type="button" class="btn btn-info" value="Create PDF" 
            id="btPrint" onclick="createPDF()" />
    </p>
			
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/preview.js"></script>
    <script src="assets/js/print.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>


<script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>USERS</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>


</html>