<!doctype html>
<html lang="en">

<head>
	<?php require 'public/includes/header.inc.php' ?>
	<style>
	    table img {
	        height: 40px;
	    }
	</style>
</head>

<body class="prediction-template-default single single-prediction postid-262047">


	<?php require 'public/includes/navbar.inc.php' ?>
	
	<section class="mob-add"></section>
	<section class="top-section predictions">
		<div class="container">
			<div class="row main-row">
			    
				<?php require 'public/includes/sidebar.php' ?>
				
				<div class="col-12 col-xl-6 col-lg-8 col-md-7 col-sm-12 middle-section">
					<div class="page-top">
						<ul class="breadcrumbs">
							<li><a href="/">Home </a></li> 
							<li>-</li>
							<li><?php echo $this->_content[$this->pid]['title'] ?></li>
						</ul>
						<a class="mobile-back" href="javascript:history.back()"><img
								src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
								alt
								data-lazy-src="/public/assets/system/back.svg"><noscript><img
									src="/public/assets/system/back.svg"
									alt=""></noscript> Back</a>
						<h1><?php echo $this->_content[$this->pid]['title'] ?><?php if ((Session::get('userid')!=null)&&( Session::get('role')=='Admin')) { ?>
						 <button type='button' class='editbtn' rel='<?php echo $this->pid ?>' ><img src='/public/assets/system/edit1.png' style='height:19px;'> Edit</button><?php }?></h1>
					 
					</div>
					<div class="prediction-match preview">
						 
						<div class="col-12  featured-box">
						     
						</div>
					 
						<div id="contentblock3">
						</div>
						<div id="contentblock1"></div>
						<div id="analysis" class="custom-box"> 
							<?php echo $this->_content[$this->pid]['body'] ?>
						</div>
					 
						<div id="form" class="bet">
							 
							<div class="bet">
							 
							 

								<div class="new-mob-list">
								 
								 
									 
								</div>
							 
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-xl-3 col-lg-12 col-md-12 col-sm-12 right-section" id="sidebarleft">
					<?php require 'public/includes/offers.php' ?>
				</div>
			</div>
		</div>
	</section>
<?php require 'public/includes/footer.inc.php' ?>
<script>
    $(function() {
        $('table').addClass('table status')
    })
</script>
</script>