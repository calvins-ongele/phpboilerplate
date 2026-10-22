<!doctype html>
<html lang="en">

<head>
<?php require 'public/includes/header.inc.php' ?>
</head>

<body class="page-template-default page page-id-78">

<?php $page_id='accum'; require 'public/includes/navbar.inc.php' ?>

	<section class="mob-add"></section>
	<section class="top-section predictions">
		<div class="container">
			<div class="row main-row">
				 
			<?php require 'public/includes/sidebar.php' ?>

				<div class="col-12 col-xl-6 col-lg-8 col-md-7 col-sm-12 middle-section">
					<div class="page-top">
						<ul class="breadcrumbs">
							<li><a href>Home</a></li>
							<li>-</li>
							<li>Blog</li>
						</ul>
						<a class="mobile-back" href="javascript:history.back()"><img
								src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
								alt
								data-lazy-src="/public/assets/system/back.svg"><noscript><img
									src="/public/assets/system/back.svg"
									alt=""></noscript> Back</a>
						<h1> All Blog </h1>
					</div>
					<div class="prediction-match tips">
							  <?php foreach ($this->blog as $row) { ?>
						<div class="tip-wrap">
							<div class="date-bar"><i class="fa fa-calendar"></i><?php echo date('d-m-Y', $row['blog_date_edited']) ?> </div>
							<div class="tip-box-wrap">
							 
								
								<div class="tip-box">
									<div class="icons">
										<ul>
											<li><img decoding="async"
													src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
													alt="<?php echo $row['blog_title'] ?>"
													data-lazy-src="/public/assets/uploads/<?php echo $row['image_name'] ?>"><noscript><img
														decoding="async"
														src="/public/assets/uploads/<?php echo $row['image_name'] ?>"
														alt="<?php echo $row['blog_title'] ?>"></noscript></li>
										 
										</ul>
									</div>
									<div> 
										<h2><a href="/blog/view/<?php echo $row['blog_url_for_browser'] ?>"><?php echo $row['blog_title'] ?> </a></h2>
										<p><a href="/blog/view/<?php echo $row['blog_url_for_browser'] ?>"><b><?php echo CustomFunctions::trimTitle($row['blog_body'], 8) ?></b></a></p>
									</div>
									<div class="arrow"><a href="/blog/view/<?php echo $row['blog_url_for_browser'] ?>">
											<img decoding="async"
												src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
												alt="goto-fix"
												data-lazy-src="/public/assets/system/tip-arrow.svg"><noscript><img
													decoding="async"
													src="/public/assets/system/tip-arrow.svg"
													alt="goto-fix"></noscript></a>
									</div>
								</div>
								
								
							</div>
						 
						</div>
								<?php } ?>
					</div>
					<div>
					</div>
					<div id="contentblock3">
					</div>
					<div id="contentblock1"></div>

				 
					<div class="custom-box">
						 
 
					</div>
				 
				</div>
				<div class="col-12 col-xl-3 col-lg-12 col-md-12 col-sm-12 right-section" id="sidebarleft">
					<?php //require 'public/includes/offers.php' ?>
				</div>
			</div>
		</div>
	</section>

	<?php require 'public/includes/footer.inc.php' ?>
</body>

</html>