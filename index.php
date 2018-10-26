<?php
	#start session
	session_start();

	error_reporting(0);

	// call the main class
	require_once('include/config.php');
  ?>
<?php
	 //logout
	if(isset($_GET['user']) && $_GET['user'] == "logout"){
	   // Unset all of the session variables.
		$_SESSION['user'] = null;
		unset($_SESSION['user']);
		unset($_SESSION['level']);
		unset($_SESSION['id']);
		// remove all session variables
		session_unset();
		// destroy the session
		session_destroy(); 
	}
?>
		<!-- Header Start -->
		  <?php require_once('include/header.php');?>
		<!-- Header End -->
		  
		  <!-- Body start -->
		     <div class="wrapper">
			 
			      <!-- main content Start-->
				  <div class="row" >
					<!-- nav Start-->
					 <?php require_once('include/nav.php');?>
					<!-- nav end-->
				    
					<!-- Banner Start -->
				    <div class="row" >
					   <div class="col-xs-12 col-md-12 banner">
					       <img class="img-responsive" src="images/banner.png" alt="">
					   </div>
					</div>
					<!-- Banner End -->
					
					<!-- content Start -->
					<div class="row" >
					   <!-- sidebar Start -->
					   <div class="col-xs-12 col-md-3">
					        <div class="panel panel-default">
							  <div class="panel-body sidebar">
								  <ul class="list-group">
								      <li class="list-group-item" style="background:#00923f;color:#fff;text-align:center;font-weight:bold;">CAREER TYPE</a></li>
								      <?php
										 
										  $sql=mysqli_query($conn,"SELECT DISTINCT `career_type`,`dept_num` FROM `articles` WHERE `status`='active' LIMIT 4");
										 
										 while($fetch=mysqli_fetch_array($sql)){
									  ?>
									   <li class="list-group-item"><a href="<?php echo 'index.php?action=312301456&location='.$fetch['dept_num'];?>" class="list-group-item"><?php echo $fetch['career_type'];?></a></li>
									 <?php }?>
								  </ul>
								  
								  <ul class="list-group">
								      <li class="list-group-item" style="background:#00923f;color:#fff;text-align:center;font-weight:bold;">DEPARTMENT</a></li>
								      <?php
										 
										  $sql=mysqli_query($conn,"SELECT DISTINCT `dept`,`dept_num` FROM `articles` WHERE `status`='active' LIMIT 4");
										 
										 while($fetch=mysqli_fetch_array($sql)){
									  ?>
									   <li class="list-group-item"><a href="<?php echo 'index.php?action=312301456&location='.$fetch['dept_num'];?>" class="list-group-item"><?php echo $fetch['dept'];?></a></li>
									 <?php }?>
								  </ul>
								  
							  </div>
							</div>
					   </div>
					   <!-- sidebar end -->
					   
					   <!-- inner content Start -->
					   
					   <?php
						   $action="";
						   $action=$_GET['action'];
						   if ($action==312301456){
						?>
						  <!-- Category Contents-->
						  <div class="col-xs-12 col-md-9 content">
						        <h4 class="option-heading"><?php echo $row['category'];?></h4>
								
								<?php
								  $user=$_GET['location'];
								  $query=mysqli_query($conn,"SELECT * FROM `articles` WHERE `dept_num`=$user AND `status`='active'")or die(mysql_error());
								  while($row=mysqli_fetch_array($query)){
								?>
								<div class="media" style="width:100%;">
								  <div class="heading"><?php echo $row['career_type'];?></div>
								  <div class="media-left">
									<a href="#">
									  <img class="media-object" src="<?php echo 'admin_careerguide/'.$row['image_location'];?>" alt="article image" width="180px" height="180px" />
									</a>
								  </div>
								  <div class="media-body">
								  
									<p>
									   <?php echo $row['body'];?>
									   ...<a href="login.php?id=<?php echo $row['id'];?>">Read more</a>
									</p>
								  </div>
								  
								</div>
								  <?php } ?>
						  </div><br />
						
						<?php
						   }elseif(isset($_POST['search'])){
						?>
						  <!-- Search Results -->
						    
							<div class="col-xs-12 col-md-9 content">
							    <?php
								  $topic=$_POST['topic'];
								  #echo $topic.'<br>';
								  
								  $sql=mysqli_query($conn,"SELECT * FROM `articles` WHERE `career_type` LIKE '%$topic%' AND `status`='active' LIMIT 3");
								  
								  #$row=mysqli_fetch_array($sql);
								  #echo 'The result is '.$row['career_type'].'<br>';
								  
								  while($row=mysqli_fetch_array($sql)){
								     if(!empty($row['career_type']) && $row['career_type']!=" "){
								?>
									<h6 style="text-decoration:underline;text-align:center;font-size:20px;width:100%;">Search Results</h6>
									<div class="media" style="width:100%;">
									  <div class="heading"><?php echo $row['career_type'];?></div>
									  <div class="media-left">
										<a href="#">
										  <img class="media-object" src="<?php echo 'admin_careerguide/'.$row['image_location'];?>" alt="article image" width="180px" height="180px" />
										</a>
									  </div>
									  <div class="media-body">
									  
										<p>
										   <?php echo $row['body'];?>
										   ...<a href="login.php?id=<?php echo $row['id'];?>">Read more</a>
										</p>
									  </div>
									  
									</div>
								<?php 
									  }elseif(empty($row['career_type']) && $row['career_type']==" "){
										 echo '<h3 style="color:red;text-align:center;">No Search Result Found!</h3>';
									  }
								  }
								?>
						  </div><br />
						  
						<?php
						   }else{
						?>
						   <div class="col-xs-12 col-md-9 content">
							    <div class="media home-intro" id="Courses">
								  <div class="media-left">
									<a href="#">
									  <img class="media-object" src="images/content3.png" alt="...">
									</a>
								  </div>
								  <div class="media-body">
									<h4 class="media-heading">Course Advising</h4>
									 <p>
									   Course advising is an intricate and elaborate task for academic advisors and 
									   students to sit together to select the course sequence throughout the academic
									   life that would be most appropriate for a student In other words, academic advising
									   is a unique resource for students, aimed at ensuring each individual’s academic 
									   path has both direction and purpose 
									 </p>
								  </div>
								</div>
								
								<div class="media" id="Career">
								  <div class="media-left">
									<a href="#">
									  <img class="media-object" src="images/content2.png" alt="...">
									</a>
								  </div>
								  <div class="media-body">
									<h4 class="media-heading">Career Guidance</h4>
									 <p>
									    Career guidance and counselling is a comprehensive, developmental
										program designed to assist students in making and implementing informed
										educational and occupational choices. It is a program that develops a 
										student's competencies in self-knowledge, educational and occupational 
										exploration, and career planning. 
									 </p>
								  </div>
								</div>
								
						   </div>
						<?php }?>
					   
					</div><br />
					<!-- inner content end-->
					
			      <!-- main content end-->
				  
			      <!-- footer container Start-->
					 <?php require_once('include/footer.php');?>
				  <!-- footer End -->
			 </div>
		  
		  
		 <!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Script to Activate the Carousel -->
		<script>
		$('.carousel').carousel({
			interval: 5000 //changes the speed
		})
		</script>

	</body>
</html>	<?php
	#start session
	session_start();

	error_reporting(0);

	// call the main class
	require_once('include/config.php');
  ?>
<?php
	 //logout
	if(isset($_GET['user']) && $_GET['user'] == "logout"){
	   // Unset all of the session variables.
		$_SESSION['user'] = null;
		unset($_SESSION['user']);
		unset($_SESSION['level']);
		unset($_SESSION['id']);
		// remove all session variables
		session_unset();
		// destroy the session
		session_destroy(); 
	}
?>
		<!-- Header Start -->
		  <?php require_once('include/header.php');?>
		<!-- Header End -->
		  
		  <!-- Body start -->
		     <div class="wrapper">
			 
			      <!-- main content Start-->
				  <div class="row" >
					<!-- nav Start-->
					 <?php require_once('include/nav.php');?>
					<!-- nav end-->
				    
					<!-- Banner Start -->
				    <div class="row" >
					   <div class="col-xs-12 col-md-12 banner">
					       <img class="img-responsive" src="images/banner.png" alt="">
					   </div>
					</div>
					<!-- Banner End -->
					
					<!-- content Start -->
					<div class="row" >
					   <!-- sidebar Start -->
					   <div class="col-xs-12 col-md-3">
					        <div class="panel panel-default">
							  <div class="panel-body sidebar">
								  <ul class="list-group">
								      <li class="list-group-item" style="background:#00923f;color:#fff;text-align:center;font-weight:bold;">CAREER TYPE</a></li>
								      <?php
										 
										  $sql=mysqli_query($conn,"SELECT DISTINCT `career_type`,`dept_num` FROM `articles` WHERE `status`='active' LIMIT 4");
										 
										 while($fetch=mysqli_fetch_array($sql)){
									  ?>
									   <li class="list-group-item"><a href="<?php echo 'index.php?action=312301456&location='.$fetch['dept_num'];?>" class="list-group-item"><?php echo $fetch['career_type'];?></a></li>
									 <?php }?>
								  </ul>
								  
								  <ul class="list-group">
								      <li class="list-group-item" style="background:#00923f;color:#fff;text-align:center;font-weight:bold;">DEPARTMENT</a></li>
								      <?php
										 
										  $sql=mysqli_query($conn,"SELECT DISTINCT `dept`,`dept_num` FROM `articles` WHERE `status`='active' LIMIT 4");
										 
										 while($fetch=mysqli_fetch_array($sql)){
									  ?>
									   <li class="list-group-item"><a href="<?php echo 'index.php?action=312301456&location='.$fetch['dept_num'];?>" class="list-group-item"><?php echo $fetch['dept'];?></a></li>
									 <?php }?>
								  </ul>
								  
							  </div>
							</div>
					   </div>
					   <!-- sidebar end -->
					   
					   <!-- inner content Start -->
					   
					   <?php
						   $action="";
						   $action=$_GET['action'];
						   if ($action==312301456){
						?>
						  <!-- Category Contents-->
						  <div class="col-xs-12 col-md-9 content">
						        <h4 class="option-heading"><?php echo $row['category'];?></h4>
								
								<?php
								  $user=$_GET['location'];
								  $query=mysqli_query($conn,"SELECT * FROM `articles` WHERE `dept_num`=$user AND `status`='active'")or die(mysql_error());
								  while($row=mysqli_fetch_array($query)){
								?>
								<div class="media" style="width:100%;">
								  <div class="heading"><?php echo $row['career_type'];?></div>
								  <div class="media-left">
									<a href="#">
									  <img class="media-object" src="<?php echo 'admin_careerguide/'.$row['image_location'];?>" alt="article image" width="180px" height="180px" />
									</a>
								  </div>
								  <div class="media-body">
								  
									<p>
									   <?php echo $row['body'];?>
									   ...<a href="login.php?id=<?php echo $row['id'];?>">Read more</a>
									</p>
								  </div>
								  
								</div>
								  <?php } ?>
						  </div><br />
						
						<?php
						   }elseif(isset($_POST['search'])){
						?>
						  <!-- Search Results -->
						    
							<div class="col-xs-12 col-md-9 content">
							    <?php
								  $topic=$_POST['topic'];
								  #echo $topic.'<br>';
								  
								  $sql=mysqli_query($conn,"SELECT * FROM `articles` WHERE `career_type` LIKE '%$topic%' AND `status`='active' LIMIT 3");
								  
								  #$row=mysqli_fetch_array($sql);
								  #echo 'The result is '.$row['career_type'].'<br>';
								  
								  while($row=mysqli_fetch_array($sql)){
								     if(!empty($row['career_type']) && $row['career_type']!=" "){
								?>
									<h6 style="text-decoration:underline;text-align:center;font-size:20px;width:100%;">Search Results</h6>
									<div class="media" style="width:100%;">
									  <div class="heading"><?php echo $row['career_type'];?></div>
									  <div class="media-left">
										<a href="#">
										  <img class="media-object" src="<?php echo 'admin_careerguide/'.$row['image_location'];?>" alt="article image" width="180px" height="180px" />
										</a>
									  </div>
									  <div class="media-body">
									  
										<p>
										   <?php echo $row['body'];?>
										   ...<a href="login.php?id=<?php echo $row['id'];?>">Read more</a>
										</p>
									  </div>
									  
									</div>
								<?php 
									  }elseif(empty($row['career_type']) && $row['career_type']==" "){
										 echo '<h3 style="color:red;text-align:center;">No Search Result Found!</h3>';
									  }
								  }
								?>
						  </div><br />
						  
						<?php
						   }else{
						?>
						   <div class="col-xs-12 col-md-9 content">
							    <div class="media home-intro" id="Courses">
								  <div class="media-left">
									<a href="#">
									  <img class="media-object" src="images/content3.png" alt="...">
									</a>
								  </div>
								  <div class="media-body">
									<h4 class="media-heading">Course Advising</h4>
									 <p>
									   Course advising is an intricate and elaborate task for academic advisors and 
									   students to sit together to select the course sequence throughout the academic
									   life that would be most appropriate for a student In other words, academic advising
									   is a unique resource for students, aimed at ensuring each individual’s academic 
									   path has both direction and purpose 
									 </p>
								  </div>
								</div>
								
								<div class="media" id="Career">
								  <div class="media-left">
									<a href="#">
									  <img class="media-object" src="images/content2.png" alt="...">
									</a>
								  </div>
								  <div class="media-body">
									<h4 class="media-heading">Career Guidance</h4>
									 <p>
									    Career guidance and counselling is a comprehensive, developmental
										program designed to assist students in making and implementing informed
										educational and occupational choices. It is a program that develops a 
										student's competencies in self-knowledge, educational and occupational 
										exploration, and career planning. 
									 </p>
								  </div>
								</div>
								
						   </div>
						<?php }?>
					   
					</div><br />
					<!-- inner content end-->
					
			      <!-- main content end-->
				  
			      <!-- footer container Start-->
					 <?php require_once('include/footer.php');?>
				  <!-- footer End -->
			 </div>
		  
		  
		 <!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Script to Activate the Carousel -->
		<script>
		$('.carousel').carousel({
			interval: 5000 //changes the speed
		})
		</script>

	</body>
</html>	
