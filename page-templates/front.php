<?php
/*
Template Name: Front
*/
get_header(); ?>

<header class="front-hero" role="banner">
	<video autoplay muted loop id="reelVideo">
		<source src="/wp-content/themes/rightbrained/video/rb-reel.mp4" type="video/mp4">
	</video>
	<div class="marketing position-absolute top-50 start-50 translate-middle text-center text-uppercase text-light">
		<div class="tagline">
			<h1 class="front-heading display-3"><?php bloginfo( 'name' ); ?></h1>
			<h4 class="subheader display-6"><?php bloginfo( 'description' ); ?></h4>
		</div>
	</div>

</header>

<div class="bar-divider bg-dark py-1 text-light text-center" style="position:relative;margin-top:-6px;">
	<h2 class="text-uppercase h5 mb-0">Our Work</h2>
</div>

<section class="our-work" id="ourWork">
	<div class="container-fluid px-0">
		<div class="row gx-0">
		<?php if (have_rows('our_work')):
				$cols = 2;
				$i = 0;

				while (have_rows('our_work')) : the_row(); ?>
					<?php 
						$vimeo = get_sub_field('video_url');
						$gallery = get_sub_field('image_gallery');
					?>
					<div class="video-panel col-12 col-lg-6 px-0 bg-dark">
						<div class="position-relative">
							<a href="#video<?php echo $i; ?>" data-bs-toggle="modal" data-inc="<?= $i; ?>" data-src="https://player.vimeo.com/video/<?php echo $vimeo; ?>" role="button" class="stretched-link video-btn text-decoration-none text-light">
								<h3 class="work-title position-absolute top-50 start-50 translate-middle text-light text-uppercase">
									<?php the_sub_field('name'); ?>
								</h3>
							</a>
							<img src="<?php the_sub_field('thumbnail'); ?>" alt="" class="w-100">
						</div>
					</div>

					<div class="modal fade video-modal" id="video<?php echo $i; ?>">
						<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl bg-dark text-light p-3">
							<div class="modal-content bg-dark">
								<div class="modal-header border-0">
     								<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
     							</div>
     							<div class="modal-body">
								
								  <?php if($vimeo): ?><div class="mb-4" style="padding:56.25% 0 0 0;position:relative;"><iframe class="video<?= $i; ?>" src="" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script><?php endif; ?>
			
								  <?php if($gallery): ?>
									<div id="carousel<?= $i; ?>" class="mb-4 imageslider carousel slide" data-bs-ride="carousel">
										<div class="carousel-inner"> 
											<?php $ii = 1; foreach ($gallery as $image):  ?>
											<div class="carousel-item <?php if ($ii == 1) { echo 'active'; } ?>">
												<?php echo wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'w-100 d-block')); ?>
											</div>
											<?php $ii++; endforeach; ?>
										</div>
										<button class="carousel-control-prev" type="button" data-bs-target="#carousel<?= $i; ?>" data-bs-slide="prev">
										  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
										  <span class="visually-hidden">Previous</span>
										</button>
										<button class="carousel-control-next" type="button" data-bs-target="#carousel<?= $i; ?>" data-bs-slide="next">
										  <span class="carousel-control-next-icon" aria-hidden="true"></span>
										  <span class="visually-hidden">Next</span>
										</button>
									</div>
								  <?php endif; ?>
			
								  <div class="reveal-info">
									<h3><?php the_sub_field('name'); ?></h3>
									<p><?php the_sub_field('description'); ?></p>
								  </div>
			
								  <div class="spinner">
								  	<div class="sp sp-circle"></div>
								  </div>
								</div>
							</div>
						</div>
					</div>
				
				<?php $i++;
				endwhile;
		endif; ?>
		<script src="https://player.vimeo.com/api/player.js"></script>
		</div>
	</div>
</section>

<?php while ( have_posts() ) : the_post(); ?>
<section class="main-intro py-5" role="main" id="aboutUs">
	<div class="intro container-fluid py-5">
		<div class="row">
			<div class="fp-intro col-12 col-sm-12 col-lg-9 col-xl-5">
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; ?>

<div class="bar-divider text-center bg-dark text-light mb-n2">
	<h2 class="arrow-down text-light"><a class="text-decoration-none text-light" href="#services">></a></h2>
</div>


<section class="services" id="services">
	<div class="container-fluid px-0 py-0">
		<div class="row gx-0">
			<?php if (have_rows('services')): 
				while (have_rows('services')): the_row(); ?>
			<div class="col-12 col-lg-4">
				<div class="service-box w-100 h-100 bg-dark position-relative text-center">
					<h4 class="h5 position-absolute top-50 start-50 translate-middle fw-bold text-light text-uppercase text-center"><?php the_sub_field('service_name'); ?></h4>
					<img class="w-100" src="<?php the_sub_field('background_image'); ?>" alt="<?php the_sub_field('service_name'); ?>">
				</div>
			</div>
			<?php $i++;
			endwhile; endif; ?>
		</div>
	</div>
</section>

<section class="clients py-5 mb-n2" id="clients">
	<div class="client-content container-fluid px-lg-5 py-5">
		<div class="row align-items-center">
		<?php if (have_rows('clients')):
				$cols = 5;
				$i = 0;

				while (have_rows('clients')) : the_row(); ?>
					
					<div class="col-12 col-lg my-5 py-3 text-center">
						<img class="slide-in-up" src="<?php the_sub_field('client_logo'); ?>" alt="">
					</div>
				
				<?php $i++; 
				if ($i % $cols == 0) { echo '</div><div class="row">'; }
				endwhile;
		endif; ?>
		</div>
	</div>
</section>

<section class="contact py-5" id="contact" style="background-position:center;">
	<div class="section-content container-fluid px-0">
		<div class="row">
			<div class="col-lg-5">
				<?php echo the_field('contact_content'); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
