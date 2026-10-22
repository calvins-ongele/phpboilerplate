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
							<li><a href="/blog/">Blog</a> </li>
							<li>-</li>
							<li><?php echo $this->blog['blog_title'] ?></li>
						</ul>
						<a class="mobile-back" href="javascript:history.back()"><img
								src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
								alt
								data-lazy-src="/public/assets/system/back.svg"><noscript><img
									src="/public/assets/system/back.svg"
									alt=""></noscript> Back</a>
						<h1><?php echo $this->blog['blog_title'] ?></h1>
					 
					</div>
					<div class="prediction-match preview">
						 
						<div class="col-12  featured-box">
						    <img style='min-width:300px; max-height:400px;' src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
											alt="<?php echo $this->blog['blog_title'] ?>- "
											data-lazy-src="/public/assets/uploads/<?php echo $this->blog['image_name'] ?>"><noscript><img
												src="/public/assets/uploads/<?php echo $this->blog['image_name'] ?>"
												alt="<?php echo $this->blog['home_team'] ?>-logo"></noscript>
							<a href>
							 
								<div class="stadium">
									<ul>
										<li><span class="timebx"><?php echo date('H:i', $this->blog['blog_date_edited']) ?></span><span class="datebx"><?php echo date('d.m.y', $this->blog['blog_date_edited']) ?></span>
										</li>
										<li><?php echo $this->blog['bc_name'] ?></li> 
									</ul>
								</div>
							</a>
						</div>
					 
						<div id="contentblock3">
						</div>
						<div id="contentblock1"></div>
						<div id="analysis" class="custom-box"> 
							<?php echo $this->blog['blog_body'] ?>
						</div>
					 
						<div id="form" class="bet">
							 
							<div class="bet">
							 
							 

								<div class="new-mob-list">
								 
								 
									 
								</div>
								<div class="sub-section prediction mr-tp-24">
									<h2>Similar Posts</h2>
									<div class="row prediction-ll">
									
									<?php $i = 0; foreach($this->moregames as $row) { $i++; //file_put_contents("ac$i.js", json_encode($row)); ?>
										<div class="col-12 col-lg-6 col-md-12 col-sm-12 prediction-box">
											<a href="/blog/view/<?php echo $row['blog_url_for_browser'] ?>"
												class="inner">
												<div class="team">
													<ul>
														<li><img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
																alt="<?php echo $row['home_team'] ?>"
																data-lazy-src="/public/assets/uploads/<?php echo $row['image_name'] ?>"><noscript><img
																	src="/public/assets/uploads/<?php echo $row['image_name'] ?>"
																	alt="<?php echo $row['blog_title'] ?>"></noscript><?php echo $row['blog_title'] ?></li>
													 
													</ul>
												</div>
												<!--<div class="time" data-date="<?php //echo $row['p_playing_date'] ?>">-->
												<!--	<div class="time-box">-->
												<!--		<p><span><?php //echo $row['p_day_of_the_week'] ?></span></p>-->
												<!--		<p><?php //echo $row['p_playing_time'] ?></p>-->
												<!--	</div>-->
												<!--</div>-->
											</a>
										</div>
										<?php } ?>
									 
										 
										<div class="col-12 btn-wrap">
											<a class="more-btn" href="/blog/">View All blog</a>
										</div>
									</div>
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