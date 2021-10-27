<?php
include("nav.php");
?>
      
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1>Post an Update</h1>
                        </div>

                    </div>
                </div>
                <div class="row spacing">
                    <div class="col">
                        <form id="post-form" method="POST"  enctype="multipart/form-data">
                            <div>
                                
                                <div><label>Select Image</label>
									<div class="col-sm-10">
										
										<input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
									</div>
                                </div>
                                
                                <div>
                                    <input class="form-control topic-input" type="text" name="topic" placeholder="Topic">
                                </div>
                                <div class="textEditor">
                                    <textarea name="article" id="summernote" ></textarea>
                                </div>
                            </div>
							
							<div style="margin-left:100px;">
                          <input type="submit" name="post" value="POST" class="btn btn-primary btn-submit post-btn"></div>
                            
						</form>
						
						<?php
							if(isset($_POST['post']))
							{
								
								$topic =$_POST['topic'];
								$article = $_POST['article'];
								$date = date("yy-m-d");
							
							$img_name = $_FILES['imglink']['name'];
							$img_size =$_FILES['imglink']['size'];
							$img_tmp =$_FILES['imglink']['tmp_name'];
							
							$directory = 'images/';
							$target_file = $directory.$img_name;
							
								$query= "select * from notification WHERE topic='$topic'";
								$query_run = mysqli_query($con,$query);
								$lineNo = mysqli_num_rows($query_run);
								if($lineNo>0)
								{
									// there is already a user with the same username
									echo '<script type="text/javascript"> alert("Topic already exists.. try another Topic") </script>';
								}
								else if(file_exists($target_file))
								{
									echo '<script type="text/javascript"> alert("Image file already exists.. Try another image file") </script>';
								}
								
								else if($img_size>2097152)
								{
									echo '<script type="text/javascript"> alert("Image file size larger than 2 MB.. Try another image file") </script>';
								}
								
								else
								{
									move_uploaded_file($img_tmp,$target_file); 	
									$query1= "insert into notification values('','$topic','$article','$target_file','$date')";
									$query_run1 = mysqli_query($con,$query1);
									
									if($query_run1)
									{
										echo '<script type="text/javascript"> alert("Update Inserted Successfully ") </script>';
										
									}
									else
									{
										echo '<script type="text/javascript"> alert("Error!") </script>';
									}
								}	
							}
						?>
                    </div>
                    <div class="spacing"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/summernote/summernote-bs4.js"></script>
    <script src="assets/js/preview.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>

    <script>
        $('#summernote').summernote({
            height: 300,
            disableResizeEditor: true,

            defaultFontName: 'Open Sans',

            fontNames: ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times', 'Times New Roman', 'Verdana', 'Open Sans'],
        });
    </script>
</body>

</html>