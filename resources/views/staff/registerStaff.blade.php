<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<title>MORUWASA BILLING SYSTEM</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-bootstrap-wizard"/>

    <meta name="keywords" content="wizard, bootstrap wizard, creative tim, long forms, 3 step wizard, sign up wizard, beautiful wizard, long forms wizard, wizard with validation, paper design, paper wizard bootstrap, bootstrap paper wizard">
    <meta name="description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors.">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Paper Bootstrap Wizard by Creative Tim">
    <meta itemprop="description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors.">
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/49/opt_pbw_thumbnail.jpg">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Paper Bootstrap Wizard by Creative Tim">
    <meta name="twitter:description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/49/opt_pbw_thumbnail.jpg">

    <!-- Open Graph data -->
    <meta property="og:title" content="Paper Bootstrap Wizard by Creative Tim | Free Boostrap Wizard" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://demos.creative-tim.com/paper-bootstrap-wizard/wizard-list-place.html" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/49/opt_pbw_thumbnail.jpg" />
    <meta property="og:description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors." />
    <meta property="og:site_name" content="Creative Tim" />

	<!-- CSS Files -->
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />


	<!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="{{url('assets/css/themify-icons.css')}}" rel="stylesheet">
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
	<!-- End Google Tag Manager -->

	<style>
		/**
  Default Markup
**/

body {
  background: #F0E5E1 ;
}

.container {
  max-width: 900px;
  margin: 0 auto;
}


/**
  Component
**/

label {
    width: 100%;
}

.card-input-element {
    display: none;
}

.card-input {
    margin: 10px;
    padding: 00px;
}

.card-input:hover {
    cursor: pointer;
}

.card-input-element:checked + .card-input {
     box-shadow: 0 0 1px 1px orange;
 }



	</style>
	</head>

	<body>
		<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div class="image-container set-full-height" style="background-image: url('assets/img/paper-1.jpeg')">
	    
	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">

		            <!--      Wizard container        -->
		            <div class="wizard-container">

		                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <form method="POST" action="{{ url('/registerStaff') }}" enctype="multipart/form-data">
                            @csrf
		                <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->

		                    	<div class="wizard-header text-center">
		                        	<h3 class="wizard-title">Create your profile</h3>
									<p class="category">This information will let us know more about you.</p>
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
									</div>
									<ul>
			                            <li>
											<a href="#about" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-user"></i>
												</div>
												About
											</a>
										</li>
			                            <li>
											<a href="#more" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-user"></i>
												</div>
												More
											</a>
										</li>
			                            <li>
											<a href="#account" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-settings"></i>
												</div>
												Work
											</a>
										</li>
			                            <li>
											<a href="#address" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-map"></i>
												</div>
												Others
											</a>
										</li>
			                        </ul>
								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                            	<div class="row">
											<h5 class="info-text"> Please tell us about yourself.</h5>
											<div class="col-sm-4 col-sm-offset-1">
												<div class="picture-container">
													<div class="picture">
														<img src="assets/img/default-avatar.jpg" class="picture-src" id="wizardPicturePreview" title="" />
														<input id="wizard-picture" type="file" class="form-control" name="image" accept=".png, .jpg, .jpeg" autocomplete="image">
													</div>
													<h6>Choose Picture</h6>
												</div>
												@error('image')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>First Name <small>(required)</small></label>
													<input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" autofocus>

                                                @error('firstname')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
												</div>
												<div class="form-group">
													<label>Last Name <small>(required)</small></label>
													<input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="name" autofocus>

                                                @error('lastname')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
												</div>
											</div>
											<div class="col-sm-10 col-sm-offset-1">
												<div class="form-group">
													<label>Email <small>(required)</small></label>
													<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
												</div>
											</div>
										</div>
		                            </div>
		                            <div class="tab-pane" id="more">
		                            	<div class="row">
											<h5 class="info-text"> Please tell us more about yourself.</h5>
											
											<div class="col-sm-8 col-sm-offset-1">
												<div class="form-group">
													<label>Phone Number <small>(required)</small></label>
													<input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                                            id="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="+255123456789">
                                                    
                                                    @error('phone')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
												</div>
												<div class="form-group">
													<label>Username <small>(required)</small></label>
                                                    <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" required placeholder="Smith...">
                                                    
                                                    @error('username')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
												</div>
											</div>
										</div>
		                            </div>
		                            <div class="tab-pane" id="account">
		                                <h5 class="info-text"> Select the occupation </h5>
		                                <div class="row">
												<div class="col-md-4 col-lg-4 col-sm-4">
        
													<label>
													<input type="radio" name="occupation" value="bill officer" class="card-input-element" />

														<div class="panel panel-default card-input">
														<div class="panel-heading">occupation</div>
														<div class="panel-body">
															Bill Officer
														</div>
														</div>

													</label>
													
												</div>
												<div class="col-md-4 col-lg-4 col-sm-4">
													
													<label>
													<input type="radio" name="occupation" value="bill manager" class="card-input-element" />

														<div class="panel panel-default card-input">
														<div class="panel-heading">occupation</div>
														<div class="panel-body">
															Bill Manager
														</div>
														</div>
													</label>
													
												</div>
												<div class="col-md-4 col-lg-4 col-sm-4">
													
													<label>
													<input type="radio" name="occupation" value="accountant" class="card-input-element" />

														<div class="panel panel-default card-input">
														<div class="panel-heading">occupation</div>
														<div class="panel-body">
															<p>Accountant</p>
														</div>
														</div>
													</label>
													
												</div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="address">
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h5 class="info-text"> Other details </h5>
		                                    </div>
		                                    <div class="col-sm-7 col-sm-offset-1">
		                                    	<div class="form-group">
		                                            <label>Permission</label>
		                                            <select name="permission" class="form-control">
		                                                <option value=""> choose.. </option>
		                                                <option value="superuser"> super user </option>
		                                                <option value="user"> user </option>
                                                    </select>
                                                    
                                                    <div class="custom-control-input  @error('permission') is-invalid @enderror col-md-6"></div>
                                                @error('permission')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-3">
		                                        <div class="form-group">
                                                <label>Gender</label><br>
		                                            <select name="gender" class="form-control">
		                                                <option value=""> choose.. </option>
		                                                <option value="M"> Male </option>
		                                                <option value="F"> Female </option>
                                                    </select>
                                                    
                                                    <div class="custom-control-input  @error('gender') is-invalid @enderror col-md-6"></div>
                                                @error('gender')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                                
		                                    </div>
		                                    <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group">
		                                            <label>Password</label>
		                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group">
		                                            <label>Confirm Password</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Next' />
		                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Finish' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div><!-- end row -->
		</div> <!--  big container -->

	    
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="{{url('assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
	<script src="{{url('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{url('assets/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/demo.js" type="text/javascript"></script>
	<script src="{{url('assets/js/paper-bootstrap-wizard.js')}}" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="{{ url('assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>

</html>
