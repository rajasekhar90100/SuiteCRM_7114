<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="style.css"/>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8  col-sm-offset-2">
        	<div class="panel panel-default">
        		<div class="panel-heading">
						<img src="logo.png" alt="Smiley face" class="panel-title"  width="auto" height="auto" style="padding-top: 35px;">
			    		<h2 class="panel-title">Registration Form</h2>
			 			</div>
			 			<div class="panel-body">
						<div class="panel-heading">
							<h3 class="panel-title1" style="background-color: #f8981d;color: #fff;">Personal Details</h3>
			 			</div>
			    		<form role="form" enctype="multipart/form-data" method="post" action="second.php">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input required type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input required="required" type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" data-error="Firstname is required.">
										<div class="help-block with-errors"></div>
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="father_name" id="father_name" class="form-control input-sm" placeholder="Father Name">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input required placeholder="Date of Birth" name="dob" id="dob" class="form-control input-sm" type="text" onfocus="(this.type='date')"> 
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input pattern="^\d{10}$" required type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Contact Number" >
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input pattern="^\d{10}$" type="text" name="alternativephone" id="alternativephone" class="form-control input-sm" placeholder="Alternative Contact Number">
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<input required type="text" name="email" id="email" class="form-control input-sm" placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<div class="form-group">
										<p class="radio-inline" style="font-weight: bold;font-size: 16px;margin-left: -15px;">Gender</p>
										<select required name="gender" id="gender" >	
											<option value=""></option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
									  </select>
			    					</div>
			    					</div>
			    				</div>
			    			</div>
							
							<div class="panel-heading">
							<h3 class="panel-title1" style="background-color: #f8981d;color: #fff;">Education Details</h3>
			 			</div>
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="ssc_score" id="ssc_score" class="form-control input-sm" placeholder="X STD % / CGPA">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="ssc_year" id="ssc_year" class="form-control input-sm" placeholder="X STD Year of Pass
">
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="inter_score" id="inter_score" class="form-control input-sm" placeholder="XII STD / Diploma % / CGPA">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="inter_year" id="inter_year" class="form-control input-sm" placeholder="XII STD / Diploma Year of Pass">
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="ug_score" id="ug_score" class="form-control input-sm" placeholder="UG % / CGPA">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="ug_year" id="ug_year" class="form-control input-sm" placeholder="UG Year of Pass">
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="ug_degree" id="ug_degree" class="form-control input-sm" placeholder="UG Degree">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="ug_specialization" id="ug_specialization" class="form-control input-sm" placeholder="UG Specialization">
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="ug_collegename" id="ug_collegename" class="form-control input-sm" placeholder="UG College Name">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="ug_university" id="ug_university" class="form-control input-sm" placeholder="UG University">
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="pg_score" id="pg_score" class="form-control input-sm" placeholder="PG % / CGPA">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="pg_year" id="pg_year" class="form-control input-sm" placeholder="PG Year of Pass">
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="pg_degree" id="pg_degree" class="form-control input-sm" placeholder="PG Degree">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="pg_specialization" id="pg_specialization" class="form-control input-sm" placeholder="PG Specialization">
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="pg_college" id="pg_college" class="form-control input-sm" placeholder="PG College">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="pg_university" id="pg_university" class="form-control input-sm" placeholder="PG  University">
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input required type="text" name="highest_degree" id="highest_degree" class="form-control input-sm" placeholder="Highest Degree">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input required type="text" name="highest_degree_regnumber" id="highest_degree_regnumber" class="form-control input-sm" placeholder="Highest Degree Registration Number">
			    					</div>
			    				</div>
			    			</div>
							
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="highest_degree_score" id="highest_degree_score" class="form-control input-sm" placeholder="Highest Degree% / CGPA">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input required type="text" name="highest_degree_year" id="highest_degree_year" class="form-control input-sm" placeholder="Highest Degree Year">
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
										<p class="radio-inline" style="font-weight: bold;font-size: 16px;margin-left: -15px;">Provisional Availability</p>
										<select required name="provreq" id="provreq" >	
											<option value=""></option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
									  </select>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
										<input required type="file" name="data" />
			    					</div>
			    				</div>
			    			</div>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
										<div class="g-recaptcha" data-sitekey="6LekJCcUAAAAADSzqvKWArDwF4CjN1gZiQOhVzEg"></div>
									</div>
			    				</div>
			    			</div>
							
			    			<br/><br/>
			    			<input type="submit" value="Register" name="submit" class="btn btn-info btn-block" id="submit">
			    		
			    		</form>
						<?php include "second.php";?>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>