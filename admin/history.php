<?php
include("nav.php");
?>
        
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1>Module and Topic </h1>
                        </div>
                        
                    </div>
                </div>
                <i class="fa fa-print" onclick="printDiv()"></i>
                <input type=button class="btn btn-primary btn-rounded" value="Copy to Clipboard" onClick="copytable('example')">
                <div id="printableTable">
                    <div class="table-responsive print-table" id="sessions">

                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Topic</th>
									<th align="center">Topic Data</th>
									<th>Delete Topic</th>
                                </tr>
                            </thead>
                            <tbody>
							
							<?php 
								  $ret=mysqli_query($con,"select * from topic ORDER BY module ASC");
								  $cnt=1;
								  while($row=mysqli_fetch_array($ret))
								  {
							?>
                                <tr>
                                    <td><?php echo $row['module'] ?></td>
									<td><?php echo $row['topic'] ?></td>
                                    
									<?php $count=mysqli_query($con,"select count(module) AS line from session WHERE module='".$row['module']."' AND Topic = '".$row['topic']."' ");
										$results = mysqli_fetch_array($count);
									?>
                                    <td> <?php echo $results['line'] ?></td>
									<td><span onClick= "return confirm('Do you really want to delete');"><a href="deleteTopic.php?id=<?php echo $row['id'];?>"><i class="fa fa-close" id="absent"></i></a></span></td>
                                </tr>
                           <?php } ?>
                            </tbody>
                        </table>

					



                    </div>
					<a href="addTopic.php">
													 <button class="btn btn-primary btn-rounded">Add Topic +</button></a>
                </div>
                <iframe name="print_frame" width:="0" height="0" frameborder="0" src="about:blank"></iframe>
                <hr>
            </div>
        </div>
    </div>

    <script>
        function printDiv() {
            window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/print.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>