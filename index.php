<?php include 'lib/action.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blood Donation</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light shadow p-3 mb-5 bg-white rounded">
		<a class="navbar-brand ml-5 logo text-danger" href="#">
			<img src="assets/img/blood.png" height="28" class="mr-2" alt="CoolBrand">Blood Donation System</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">

			</ul>
			<div class="mr-5">
				<img src="assets/img/man.png" height="36" class="mr-2" alt="CoolBrand">
				<!-- <a href="#myModal" class="btn btn-danger" data-toggle="modal">Login</a> -->
				<?php if (!isset($_SESSION['member'])) : ?>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#LoginModal">Login</button>
					<!-- <a href="#" class="btn btn-danger ml-2">Register</a> -->
					<button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#RegisterModal">Register</button>
				<?php else : ?>
					<a href="dashboard.php" class="btn btn-danger ml-2">Dashboard</a>
				<?php endif; ?>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-6 mt-lg-5 quotes_text text-center">
				<h2 class="text-center text-danger">Excuses never save a life.</h2>
				<h4 class="text-center">Blood Donation Does.</h4>
				<a href="#" class="btn btn-danger btn-lg mt-5" data-toggle="modal" data-target="#RegisterModal">Became a Donar</a>
			</div>
			<div class="col-md-6">
				<img src="assets/img/blood_doner.jpg" width="500px">
			</div>
		</div>

		<div class="row my-5 text-center btn-row">
			<a href="#">
				<div class="card btn-card shadow p-1 mb-2 bg-white rounded">
					<div class="card-body">
						<h5><img src="assets/img/help.png" width="42"><span class="text-danger">How to be a
								doner?</span></h5>
					</div>
				</div>
			</a>

			<a href="#">
				<div class="card btn-card ml-3 shadow p-1 mb-2 bg-white rounded">
					<div class="card-body">
						<h5><img src="assets/img/question.png" width="42"><span class="text-danger">Personal Care</span>
						</h5>
					</div>
				</div>
			</a>
			<a href="">
				<div class="card btn-card shadow p-1 mb-2 bg-white rounded">
					<div class="card-body">
						<h5><img src="assets/img/search.png" width="42"><span class="text-danger">How to find a
								doner?</span></h5>
					</div>
				</div>
			</a>

			<a href="#">
				<div class="card btn-card ml-3 shadow p-1 mb-2 bg-white rounded">
					<div class="card-body">
						<h5><img src="assets/img/user-experience.png" width="42"><span class="text-danger">Best
								Donner</span></h5>
					</div>
				</div>
			</a>

		</div>

		<!-- Doner Card -->
		<p class="text-center text-danger doner-title">You can Find Our Donar Below Section<br>And Contact With them</p>
		<hr class="donar_card_hr">
		<div class="row shadow my-5 pt-3 bg-white rounded text-center">
			<div class="col-md-3">
				<div class="form-group ">
					<select id="inputState" class="form-control">
						<option selected>... Select Blood Group...</option>
						<option>O+</option>
						<option>O-</option>
						<option>A+</option>
						<option>A-</option>
						<option>B+</option>
						<option>B-</option>
						<option>AB+</option>
						<option>AB-</option>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group ">
					<select id="inputState" class="form-control">
						<option selected>... Select District...</option>
						<option>Cumilla</option>
						<option>Dhaka</option>
						<option>Narayongonj</option>
						<option>Tangail</option>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group ">
					<select id="inputState" class="form-control">
						<option selected>... Select Upzilla...</option>
						<option>Monohorgonj</option>
						<option>Saddar Dakkhin</option>
						<option>Laksham</option>

					</select>
				</div>
			</div>
			<div class="col-md-3">
				<button type="button" class="btn btn-danger">Search Donar</button>

			</div>
		</div>

		<div class="row my-5" style="justify-content: center">
			<div class="card col-md-3 profile-card shadow p-3 mb-5 bg-white rounded">
				<div class="card-content">
					<div class="card-body p-0">
						<div class="profile"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583336/AAA/4.jpg" class="img-thumbnail img-fluid"> </div>
						<div class="card-title"> Angelina Frederic
						</div>
						<div class="card-subtitle">
							<p>
								<strong class="badge badge-success p-2 mr-2">Blood Group: </strong><span class="badge badge-danger p-2">O+</span><br>
								<strong>Phone Number: </strong><span>+8801679487265</span><br>
								<strong>Address: </strong><span>Nazrul Avenue,Cumilla</span><br>
								<strong>Last Donate</strong><span>13 Jan 2022</span>
							</p>
							<a href="#" class="btn btn-danger btn-block">Contact Me</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card col-md-3 profile-card shadow p-3 mb-5 bg-white rounded">
				<div class="card-content">
					<div class="card-body p-0">
						<div class="profile"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583319/AAA/3.jpg" class="img-thumbnail img-fluid"> </div>
						<div class="card-title"> Jackson Totham </div>
						<div class="card-subtitle">

							<p>
								<strong class="badge badge-success p-2 mr-2">Blood Group: </strong><span class="badge badge-danger p-2">O+</span><br>
								<strong>Phone Number: </strong><span>+8801679487265</span><br>
								<strong>Address: </strong><span>Nazrul Avenue,Cumilla</span><br>
								<strong>Last Donate</strong><span>13 Jan 2022</span>
							</p>
							<a href="#" class="btn btn-danger btn-block">Contact Me</a>

						</div>
					</div>
				</div>
			</div>
			<div class="card col-md-3 profile-card shadow p-3 mb-5 bg-white rounded">
				<div class="card-content">
					<div class="card-body p-0">
						<div class="profile"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583246/AAA/2.jpg" class="img-thumbnail img-fluid"> </div>
						<div class="card-title"> David Gregory </div>
						<div class="card-subtitle">

							<p>
								<strong class="badge badge-success p-2 mr-2">Blood Group: </strong><span class="badge badge-danger p-2">O+</span><br>
								<strong>Phone Number: </strong><span>+8801679487265</span><br>
								<strong>Address: </strong><span>Nazrul Avenue,Cumilla</span><br>
								<strong>Last Donate</strong><span>13 Jan 2022</span>
							</p>
							<a href="#" class="btn btn-danger btn-block">Contact Me</a>

						</div>
					</div>
				</div>
			</div>
			<div class="card col-md-3 profile-card shadow p-3 mb-5 bg-white rounded">
				<div class="card-content">
					<div class="card-body p-0">
						<div class="profile"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583336/AAA/4.jpg" class="img-thumbnail img-fluid"> </div>
						<div class="card-title"> Angelina Frederic
						</div>
						<div class="card-subtitle">
							<p>
								<strong class="badge badge-success p-2 mr-2">Blood Group: </strong><span class="badge badge-danger p-2">O+</span><br>
								<strong>Phone Number: </strong><span>+8801679487265</span><br>
								<strong>Address: </strong><span>Nazrul Avenue,Cumilla</span><br>
								<strong>Last Donate</strong><span>13 Jan 2022</span>
							</p>
							<a href="#" class="btn btn-danger btn-block">Contact Me</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card col-md-3 profile-card shadow p-3 mb-5 bg-white rounded">
				<div class="card-content">
					<div class="card-body p-0">
						<div class="profile"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583319/AAA/3.jpg" class="img-thumbnail img-fluid"> </div>
						<div class="card-title"> Jackson Totham </div>
						<div class="card-subtitle">

							<p>
								<strong class="badge badge-success p-2 mr-2">Blood Group: </strong><span class="badge badge-danger p-2">O+</span><br>
								<strong>Phone Number: </strong><span>+8801679487265</span><br>
								<strong>Address: </strong><span>Nazrul Avenue,Cumilla</span><br>
								<strong>Last Donate</strong><span>13 Jan 2022</span>
							</p>
							<a href="#" class="btn btn-danger btn-block">Contact Me</a>

						</div>
					</div>
				</div>
			</div>
			<div class="card col-md-3 profile-card shadow p-3 mb-5 bg-white rounded">
				<div class="card-content">
					<div class="card-body p-0">
						<div class="profile"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583246/AAA/2.jpg" class="img-thumbnail img-fluid"> </div>
						<div class="card-title"> David Gregory </div>
						<div class="card-subtitle">

							<p>
								<strong class="badge badge-success p-2 mr-2">Blood Group: </strong><span class="badge badge-danger p-2">O+</span><br>
								<strong>Phone Number: </strong><span>+8801679487265</span><br>
								<strong>Address: </strong><span>Nazrul Avenue,Cumilla</span><br>
								<strong>Last Donate</strong><span>13 Jan 2022</span>
							</p>
							<a href="#" class="btn btn-danger btn-block">Contact Me</a>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Doner Card -->
		<hr class="donar_card_hr">
		<div class="row my-5">
			<div class="col-md-6">
				<img src="assets/img/footer.jpg" alt="" width="400px">
			</div>
			<div class="col-md-6 mt-4">
				<form action="mail.php" method="post" class="shadow mb-5 bg-white rounded">
					<div class="card border-danger rounded-0">
						<div class="card-header p-0">
							<div class="bg-danger text-white text-center py-2">
								<h3><i class="fa fa-envelope"></i> Contact With Us</h3>
								<p class="m-0">If you have any query? Please sContact with us</p>
							</div>
						</div>
						<div class="card-body p-3">

							<!--Body-->
							<div class="form-group">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fa fa-user text-danger"></i></div>
									</div>
									<input type="text" class="form-control" id="name" name="name" placeholder="Name.." required>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fa fa-envelope text-danger"></i></div>
									</div>
									<input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com" required>
								</div>
							</div>

							<div class="form-group">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fa fa-comment text-danger"></i></div>
									</div>
									<textarea class="form-control" placeholder="Write your message Here" required></textarea>
								</div>
							</div>

							<div class="text-center">
								<input type="submit" value="Send Message" class="btn btn-danger btn-block rounded-0 py-2">
							</div>
						</div>

					</div>
				</form>
			</div>
		</div>

	</div>
	<footer id="dk-footer" class="dk-footer mt-4">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-4">
					<div class="dk-footer-box-info">
						<a href="index.html" class="footer-logo">
							<img src="assets/img/footer-logo.png" alt="footer_logo" class="img-fluid">
						</a>
						<p class="footer-info-text text-white">
							Reference site about Lorem Ipsum, giving information on its origins, as well as a random
							Lipsum generator.
						</p>
						<div class="footer-social-link">
							<h3>Follow us</h3>
							<ul>
								<li>
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-google-plus"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-linkedin"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-instagram"></i>
									</a>
								</li>
							</ul>
						</div>
						<!-- End Social link -->
					</div>
					<!-- End Footer info -->
					<div class="footer-awarad">
						<img src="assets/img/best.png" alt="" width="48px">
						<p>Best Blood Donation Agency</p>
					</div>
				</div>
				<!-- End Col -->
				<div class="col-md-12 col-lg-8">
					<div class="row">
						<div class="col-md-6">
							<div class="contact-us">
								<div class="contact-icon">
									<i class="fa fa-map-o text-white" aria-hidden="true"></i>
								</div>
								<!-- End contact Icon -->
								<div class="contact-info">
									<h3>Dhanmondi, Dhaka</h3>
									<p>Zigatola, Dhanmondi</p>
								</div>
								<!-- End Contact Info -->
							</div>
							<!-- End Contact Us -->
						</div>
						<!-- End Col -->
						<div class="col-md-6">
							<div class="contact-us contact-us-last">
								<div class="contact-icon">
									<i class="fa fa-volume-control-phone text-white" aria-hidden="true"></i>
								</div>
								<!-- End contact Icon -->
								<div class="contact-info">
									<h3>+8801679487265</h3>
									<p>Give us a call</p>
								</div>
								<!-- End Contact Info -->
							</div>
							<!-- End Contact Us -->
						</div>
						<!-- End Col -->
					</div>
					<!-- End Contact Row -->
					<div class="row">
						<div class="col-md-12 col-lg-6">
							<div class="footer-widget footer-left-widget">
								<div class="section-heading">
									<h3>Useful Links</h3>
									<span class="animate-border border-black"></span>
								</div>
								<ul>
									<li>
										<a href="#">About us</a>
									</li>
									<li>
										<a href="#">Campaigns</a>
									</li>
									<li>
										<a href="#">Projects</a>
									</li>
									<li>
										<a href="#">Our Team</a>
									</li>
								</ul>
								<ul>
									<li>
										<a href="#">Contact us</a>
									</li>
									<li>
										<a href="#">Blog</a>
									</li>
									<li>
										<a href="#">Testimonials</a>
									</li>
									<li>
										<a href="#">Faq</a>
									</li>
								</ul>
							</div>
							<!-- End Footer Widget -->
						</div>
						<!-- End col -->
						<div class="col-md-12 col-lg-6">
							<div class="footer-widget">
								<div class="section-heading">
									<h3>Subscribe</h3>
									<span class="animate-border border-black"></span>
								</div>
								<p class="text-white">
									Don’t miss to subscribe to our new feeds, kindly fill the form below.
									<!-- Reference site about Lorem Ipsum, giving information on its origins, as well. -->
								</p>
								<form action="#">
									<div class="form-row">
										<div class="col dk-footer-form">
											<input type="email" class="form-control" placeholder="Email Address">
											<button type="submit" style="height: 38px; right: 6px;">
												<i class="fa fa-send" style="position: absolute;top: 11px;right: 15px;"></i>
											</button>
										</div>
									</div>
								</form>
								<!-- End form -->
							</div>
							<!-- End footer widget -->
						</div>
						<!-- End Col -->
					</div>
					<!-- End Row -->
				</div>
				<!-- End Col -->
			</div>
			<!-- End Widget Row -->
		</div>
		<!-- End Contact Container -->


		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<span>Copyright © 2022, All Right Reserved By Md Iqbal | Developer By Iqbal</span>
					</div>
					<!-- End Col -->
					<div class="col-md-6">
						<div class="copyright-menu">
							<ul>
								<li>
									<a href="#">Home</a>
								</li>
								<li>
									<a href="#">Terms</a>
								</li>
								<li>
									<a href="#">Privacy Policy</a>
								</li>
								<li>
									<a href="#">Contact</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- End col -->
				</div>
				<!-- End Row -->
			</div>
			<!-- End Copyright Container -->
		</div>
		<!-- End Copyright -->
		<!-- Back to top -->
		<div id="back-to-top" class="back-to-top">
			<button class="btn btn-dark" title="Back to Top" style="display: block;">
				<i class="fa fa-angle-up"></i>
			</button>
		</div>
		<!-- End Back to top -->
	</footer>



	<!-- Login Modal -->
	<?php include 'include/login-modal.php'; ?>

	<!-- Login Modal end -->

	<!-- Register Modal -->
	<?php include 'include/register-modal.php'; ?>
	<!-- Register Modal -->


	<!-- Jquery File -->
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/js/all.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>

</html>