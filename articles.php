<?php
include("nav.php");

?><!
	
	
	
    <div id="article-div">
	
	 <?php $ret=mysqli_query($con,"select * from notification WHERE notID='".$_GET['id']."'");
		while($row=mysqli_fetch_array($ret))
		{
        echo '<div class="container">';
            echo '<div id="article-picture"><img class="img-fluid" src="admin/'.$row['img'].'"></div>';
            echo '<div id="article">';
                echo '<b><h1 id="article-heading">'.$row['topic'].'</h1></b>';
            echo'</div>';
            echo '<div id="araticle-content">';
                echo '<p>'.$row['article'].'</p>';
            echo '</div>';
            echo '<hr>';
            echo '<div></div>';
           
       echo '</div>';
				} ?>
    </div>
    <footer>
        <div id="footer-content"><span>©</span><span class="current-year">Year</span><span>TUT</span></div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>