<?php
	echo display_nav(4); ?>

	<div class="container">
		<div class="starter-template">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Please enter course information.</h3>
					</div>
					<div class="panel-body">
						<form accept-charset="UTF-8" role="form" name="register" method="post" action="">
						<fieldset>
							<div class="form-group">
								<select type="text" class="form-control multiselect multiselect-icon" role="multiselect" placeholder="Department" name="CollegeID">          
								  <option value="-1">Select Department</option>  
								  <?php
									$arraySize = count($this->registry->template->departments);
									echo $arraySize;
									for($x=0;$x<$arraySize;$x++){
										echo $this->registry->template->departments[$x];
									}
								  ?>
								</select> 
							</div>   
							<div class="form-group">
								<input class="form-control" placeholder="Course Number" name="CourseNumber" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Course Section (Optional)" name="CourseSection" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Course Name" name="CourseName" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Course Description (Optional)" name="CourseDescription" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Remaining Seats" name="CourseSeats" type="number">
							</div>
							<input class="btn btn-lg btn-primary btn-block" type="submit" value="Create Course" name="submit-course">
						</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php		session_start();
		if (isset($_SESSION['success']))
		{
			if($_SESSION['success']==1){
				echo "The new course was stored successfully.";
				$_SESSION['success']=0;
			}
		}
		?>
		</div>
	</div>