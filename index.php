<?php 
	//include auth.php file on all secure pages
	require_once 'dbconf.php';
	include 'header.html';
?>
		<!-- start of about-section -->		
		<div class="noselect" id="about">
			<div class="container-fluid">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 text-center">
							<div id="intro"><b>Deepen Classes</b> is one of the best tuition center in Delhi, 
							which provides quality and focused teaching for its student 
							to perfectly aim towards their career goal. 
							We also provide Home Tuitions at affordable prices.
							</div>
						</div>
					</div>
					<div class="row social text-center">
						<div class="col-md-12 col-xs-12">
							<!-- Add font awesome icons -->
							<a href="https://www.facebook.com/DeepenClasses/" target="_blank" class="fa fa-facebook iconf"></a>
							<a href="https://twitter.com/deepenclasses" target="_blank" class="fa fa-twitter iconf"></a>
							<a href="https://plus.google.com/+PradeepSinghRajputOfficial/" target="_blank"
							class="fa fa-google-plus iconf">
							</a>
							<a href="https://www.linkedin.com/company/deepenclasses/" target="_blank" class="fa fa-linkedin iconf"></a>
							<a href="https://www.instagram.com/deepenclasses/" target="_blank" class="fa fa-instagram iconf"></a>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end of about-section -->	

		<!-- start of Expertise-section -----------------------------------------------------------------
		----------------------------------------------------------------------------------------------------------------->		
		<div class="container-fluid text-center noselect" id="expertise">
			<h1 class="h1Text">Expertise</h1>
			<hr id="lineStyleE">
			<div id="contentE">
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<div id="trying1">
							<span class="expertiseText">Biology</span>
						</div>
					</div>
					
					<div class="col-sm-4 col-xs-12">
						<div id="trying2">
							<span class="expertiseText">Mathematics</span>
						</div>
					</div>
					
					<div class="col-sm-4 col-xs-12">
						<div id="trying3">
							<span class="expertiseText">Science (PCM)</span>
						</div>
					</div>
					
					<div class="col-sm-4 col-xs-12">
						<div id="trying4">
							<span class="expertiseText">Chemistry</span>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div id="trying5">
							<span class="expertiseText">Physics</span>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div id="trying6">
							<span class="expertiseText">English</span>
						</div>
					</div>
				</div>
			</div>
		</div><!-- End of Expertise-section -->		

		<!-- start of contact-section -->					
		<div class="text-center noselect parallax2" id="contact">
			<div class="container-fluid">
				<div class="row ">
					<div class="col-md-12">
						<h1 id="contactheading">Contact</h1>
						<hr id="lineStyle3">
					</div>
				</div>
			</div>
			<div id="formStyle">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 text-left">
							<form onsubmit="return validateForm()" 
								action="https://formspree.io/viveksingh12126@gmail.com"
								method="POST">
								<label for="fname">Full Name</label>
								<input aria-required="true" type="text" id="fname" name="fullname" 
									placeholder="Your name ..." pattern="^[a-zA-Z ]+$" required="required" size="20" spellcheck="false">
								<label for="email">Email ID</label>
								<input aria-required="true" type="email" id="email" name="email" 
									placeholder="example@abc.com" 
									pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$" required="required" size="30" spellcheck="false" >
								<label for="country">Country</label>
								<select id="country" name="country">  
									<option value="" disabled>Select</option>
									<option value="australia">Australia</option>
									<option value="canada">Canada</option>
									<option value="USA">USA</option>
									<option value="India">India</option>
									<option value="Other">Other</option>	
								</select>
								<label for="message" id="messageTop">Message</label>			
								<textarea id="message" name="message" 
									placeholder="Your message ..." minlength="15" maxlength="300" required="required"></textarea>
								<input id="designSubmit" type="submit" value="Submit" name = "submit">			
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end of contact-section -->	
<?php	
	include 'footer.html';

?>