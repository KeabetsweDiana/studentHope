<?php
include("nav.php");
?>
        
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1>Add a user</h1>
                            <div id="small-nav">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="users.php"><span class="bread-link">Manage Users</span></a></li>
                                    
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <div class="col-lg-12 col-xl-12 add-col">
							 <?php $ret=mysqli_query($con,"select * from user WHERE  studentEmail='".$_GET['uid']."'");
							  while($row=mysqli_fetch_array($ret))
							  
							  {?>
                                <form id="add-user" method="POST">
                                    <h3>UPDATE USER</h3>
                                    <div>
                                        <label>NAME<input class="form-control name add" type="text"  name="name" pattern="[A-Za-z]{1,32}" value="<?php echo $row['name'];?>" ></label>
                                    </div>
									
									<div>
                                        <label>SURNAME<input class="form-control name add" type="text"  name="surname" pattern="[A-Za-z]{1,32}"  value="<?php echo $row['surname'];?>"></label>
                                    </div>
									
									<div>
                                        <label>STUDENT NUMBER<input class="form-control name add" type="stdNum"  name="stdNum" minlenght="9" maxlength="9"  value="<?php echo $row['stdNum'];?>"></label>
                                    </div>
                                    <div>
                                        <label>STUDENT EMAIL<input class="form-control surname add" type="text" name="studentEmail" value="<?php echo $row['studentEmail'];?>"  readonly></label>
                                    </div>
                                    
                                    <div>
                                        <label>Cellphone number<input class="form-control cell-no add" type="tel" pattern = "(\+27|0)[6-8][0-9]{8}" title="Must be a south African Number starting with a zero(0) followed by 6-8" minlenght="10" maxlength="10"  name="cell_no" value="<?php echo $row['cellNumber'];?>"  ></label>
                                    </div>
                                    <div>
                                        <label>Role
                                            <select name="role" class="form-control" required>
                                                
                                                <option value="<?php echo $row['role']; ?>"><?php echo $row['role']; ?></option><?php
                                                    if($row['role'] == "student")
                                                    {
                                                        echo '<option value="tutor">Tutor</option>';
                                                    }else{
                                                        echo'<option value="student">Student</option>';
                                                    }
                                                    
                                                ?>
                                                
                                             
                                            </select>
                                        </label>
                                    </div>
									
									<div>
                                        <label>Password<input class="form-control cell-no add" type="password"  name="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   title="Must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters"></label>
                                    </div>
                                    
                                    <input class="btn btn-primary add-btn btn-submit" type="submit" name="Update_Profile" value="UPDATE">

                                </form>
								
								<?php } ?>
								<?php
									if(isset($_POST['Update_Profile']))
									{
									    $role = $_POST['role'];
										$id = $_GET['uid'];
										$stdNum = $_POST['stdNum'];
										
										$password = $_POST['password'];
										$contact=$_POST['cell_no'];
								    	$date = $_POST['date'];
								    	$name = $_POST['name'];
								    	$surname = $_POST['surname'];
									
									
									if(substr($stdNum,0,3) <=221)
									{	
									    $email_address = $stdNum."@tut4life.ac.za";
										if(!empty($password))
										{
											
											$enc_password = md5($password);
											
                                            $test = "UPDATE user SET stdNum ='$stdNum', name='$name', surname='$surname', studentEmail='$email_address', role='$role', password='$enc_password', cellNumber='$contact' where studentEmail='".$_GET['uid']."'";
											$line= mysqli_query($con, $test);
											if($line)
											{
												echo '<script>alert("Profile Updated successfully")</script>';
													echo '<script language="javascript">
												document.location="users.php";
												</script>';
											}else{
												echo '<script>alert("Update Error")</script>';
												echo '<script language="javascript">
														document.location="users.php";
														</script>';
											}
										}else{
										    
											$line= mysqli_query($con,"UPDATE user SET stdNum='$stdNum', name='$name', surname='$surname', studentEmail='$email_address', role='$role', cellNumber='$contact' where studentEmail='".$_GET['uid']."'");
											if($line)
											{
												echo '<script>alert("Profile Updated successfully WITHOUT PASSWORD")</script>';
													echo '<script language="javascript">
												document.location="users.php";
												</script>';
											}else{
												echo '<script>alert("Update Error")</script>';
												echo '<script language="javascript">
														document.location="users.php";
														</script>';
											}
										}
										
										
										
										
										
									}else{
									    echo '<script>alert("this is not a TUT student number")</script>';
									}
									
									}
								?>
                            </div>
                        </div>
                    </div>
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