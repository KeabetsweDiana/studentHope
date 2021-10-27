<?php
include("nav.php");

?>

    <div id="hero">
        <div id="hero-content">
            <div id="content">
			<h1>
			
			<?php
								if(empty($_SESSION['name']))
								{	
								
									echo('<br>Welcome To Student Online Support</h1>');
									//echo("<p>Sign Up in order for you to apply for residence.</p>");
									
									//echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="#"><button class="btn btn-primary" data-toggle="modal" data-target="#signup" type="button">Sign Up</button></a></li>';
								}else{
									echo ucwords($_SESSION['name'])." ".ucwords($_SESSION['SName']);
									echo('<br>Welcome To Student Online Support</h1>');
									
									
									
								}
								
							
							?>
			
			
                <?php
				
				
				if(empty($_SESSION['stdNum']))
				{
					echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="signin.php"><button class="btn btn-primary" data-toggle="modal" type="button">Sign in</button></a></li>';
				}else{
				    
					$select ="SELECT * FROM user WHERE stdNum = ".$_SESSION['stdNum']. " AND role = 'tutor' ";
					$ret=mysqli_query($con,$select);
					$num =  mysqli_fetch_array($ret);	
					
					if( mysqli_num_rows($ret) > 0)
					{
						echo('<p><a class="btn btn-primary"  href="pages/appointments.php" role="button">Accept sessions</a></p>');
					}
								
				}
							?>
                <p>Kick start your learning path with a convenient academic booking system</p>
            </div>
        </div>
    </div>
    <div id="news">
        <div class="container">
            <div id="latest-news">
                <h1>Latest ICT news</h1>
                <div class="row">
                    <?php
					
						$news = "SELECT * FROM notification";
						$quiry = mysqli_query($con,$news);
						
						while($row = mysqli_fetch_array($quiry))
						{
							echo'<div class="col-lg-4" >';
								echo '<a id="news-link" href="articles.php?id='.$row['notID'].'">';
									echo'<div id="news-preview"><img class="img-fluid" id="article-img" src="admin/'.$row['img'].'">';
										echo '<div id="article-prev">';
											echo '<b><h4 id="article-topic">'.$row['topic'].'</h4></b>';
											echo '<p id="article-short">'.substr($row['article'],0,9).' Read more...</p>';
										echo '</div>';
									echo '</div>';
								echo '</a>';
								
							echo '</div>';
						}
					?>
				
				
                </div>
                <hr>
                <div id="quick-updates">
                    <?php
                    date_default_timezone_set("Africa/Johannesburg");
							echo date('l') .' '.date("H:i").' '.date("Y-m-d");
							$run = mysqli_query($con,"select * from session where status = 'ACCEPTED' AND date = CURDATE() AND time = '".date("H")."' AND stdNum=".$_SESSION['stdNum']);
							
							$date = date("Y-m-d");
						    if(!empty($_SESSION['login']))
						    {
							$data = mysqli_fetch_array($run);
						    }
							echo "<br>";
							//echo $data['date'];$data['date'] == date("Y-m-d") && $data['time'] == date("h")
							if($data['date'] == date("Y-m-d") && $data['time'] == date("H"))
							{
							
							?>
								<h3 align ="center">Quick Updates</h3>
								<div class="table-responsive">
								
									<table class="table">
										<thead>
											<tr>
											<th>Student Number</th>
											<th>Name</th>
											<th>Surname</th>
											<th>Module</th>
											<th>Topic</th>
											<th>Date</th>
											<th>Time</th>
											<th>Cell No.</th>
											<th>join Session</th>
										</tr>
										</thead>
										<tbody>
											<?php 
													
													
													$ret=mysqli_query($con,"select * from session where status = 'ACCEPTED' AND date = CURDATE() AND time = '".date("H")."' AND stdNum=".$_SESSION['stdNum']);
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
													<td><?php echo $row['date'] ?></td>
													<td><?php echo $row['time'].':00' ?></td>
													<td><?php echo $row['cellNumber'] ?></td>
													<td><a href="<?php echo $row['url'];?>" target="_blank"><button class="btn" onClick= "return confirm('Do you really want to join the session??');"><i class="fa fa-arrow-right"></i></button></a></td>
													
														
													   
														
													</tr> <?php } ?>
										</tbody>
									</table>	
									
								</div>
					
					<?php
							}
					?>
                    <hr>
                </div>
            </div>
        </div>
    </div>
  
      <footer>
          
          <div id="footer-content">
          <div  sytle="float:right;" class="social"><a href=" https://twitter.com/studenthope2"><i class="fa fa-twitter"></i></a><a href="https://web.facebook.com/StudentHope-104266935086555"><i class="fa fa-facebook"></i></a>
          
          
            <font color="black"><span >©</span><span class="current-year">Year</span><span > TUT 
                <?php 
                if(empty($_SESSION['login']))
        		{
        			echo '<a href="admin">ADMIN</a>';
        		}
                
                ?></span></font>
                
                
             
          
          </div>
         </div>
        
        
    </footer>
    
    
    
    
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>