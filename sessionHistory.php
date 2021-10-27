<?php
include("nav.php");
?>
    <div id="structure-div">
        <div class="container">
            <div id="quick-updates">
                <h3>PENDING SESSION BOOKINGS</h3>
                <div class="table-responsive">
                    <table class="table">
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
								<th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
						
						
						<?php 
							$ret=mysqli_query($con,"select * from session where status = 'PENDING' AND stdNum=".$_SESSION['stdNum']);
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
											echo '<span>Pending&nbsp;<i class="fa fa-warning" id="pending"></i></span><br>';?>
											<a href="deleteSession.php?id=<?php echo $row['sessionID'];?>">
													 <button class="btn btn-danger btn-xs" onClick= "return confirm('Do you really want to delete');"> <i class="fa fa-trash-o "></i></button></a>
											<?php
										}else{
										echo'<span>Accepted&nbsp;<i class="fa fa-thumbs-up" id="accepted"></i></span>By&nbsp;<span>'.$row['tutor'].'</span>';
										}
							
							?></td>
							<td><a href="updateSession.php?id=<?php echo $row['sessionID'];?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
													</td>
                                
                               
                                
                            </tr> <?php } ?>
                        </tbody>
                    </table>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <div id="spacing-div"></div>
    <footer>
        <div id="footer-content"><span>©</span><span id="current-year" class="current-year"></span><span>TUT</span></div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>