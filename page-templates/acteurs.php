<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

$args = array(
	'post_type' => 'acteur',
	'post_status' => 'publish',
	'posts_per_page' => 10
);

$acteurs = new WP_Query($args);

?>

<div class="wrapper bg-light" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">
					<?php if($acteurs->have_posts()): ?>
						<div class="row">
							<h1 class="text-uppercase fw-bold py-5"><?php the_title(); ?></h1>
						</div>

						<div class="row actor-row p-3 mb-5">
							<div class="col-12">
								<form action="#" method="get" id="filterForm" class="actor-filters">
									<div class="row">
										<div class="col-lg-5">
											<div class="row">
												<div class="col-6">
													<label for="minage" class="form-label">Min Age</label>
													<input type="text" class="form-control" id="minage" placeholder="-">
												</div>
												<div class="col-6">
													<label for="maxage" class="form-label">Max Age</label>
													<input type="text" class="form-control" id="maxage" placeholder="-">
												</div>
											</div>
										</div>
										<div class="col-lg-5">
											<div class="row">
												<div class="col-6">
													<label for="minlength" class="form-label">Min Length</label>
													<input type="text" class="form-control" id="minlength" placeholder="-">
												</div>
												<div class="col-6">
													<label for="maxlength" class="form-label">Max Length</label>
													<input type="text" class="form-control" id="manlength" placeholder="-">
												</div>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="row">
												<div class="col-12">
													<label for="" class="form-label"></label>
													<button type="submit" class="btn btn-large btn-primary d-block w-100">Filter</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							
						</div>

						<div class="row">
							<div class="col-lg-12">
								<?php while($acteurs->have_posts()): $acteurs->the_post(); ?>
									<?php 
										$email = get_field('email');
										$age = get_field('age');
										$height = get_field('height');
										$website = get_field('website');
										$photos = get_field('photos');
										$avail = get_field('availability');
									?>
									<div class="row actor-row shadow-inset mb-3 px-3 py-4">
										<div class="col-12 col-lg-3">
											<div class="actor-info">
												<h2 class="fw-bold lh-1 mb-3"><?php the_title(); ?></h2>
												<div class="mb-3">
													<?php if($age): ?><p class="mb-0 h5">Age: <?= $age; ?></p><?php endif; ?>
													<?php if($height): ?><p class="mb-0 h5">Length: <?php echo $height . 'cm'; ?></p><?php endif; ?>
												</div>
											<?php if($email): ?><p class="mb-0"><i class="me-1 fa fa-envelope"></i> <a class="text-decoration-none" href="mailto:<?= $email; ?>"><?= $email; ?></a></p> <?php endif; ?>
											<?php if($website): ?><i class="me-1 fa fa-globe"></i><a class="text-decoration-none" href="<?= $website; ?>" target="_blank"><?= $website; ?></a><?php endif; ?>
											</div>
										</div>
										<div class="col-12 col-lg-3">
											<?php if(have_rows('videos')): $videonum = 1; ?>
												<div class="actor-videos mb-3">
													<h3 class="h4"><i class="fa fa-youtube-play me-1"></i> Showreels</h3>
													<?php while(have_rows('videos')): the_row(); ?>
														<a target="_blank" class="text-decoration-none" href="<?php the_sub_field('video_url'); ?>">Video <?= $videonum; ?></a>
													<?php $videonum++; endwhile; ?>
												</div>
											<?php endif; ?>
											<?php if($avail): ?>
												<h3 class="h4 mb-0">Availability:</h3>
												<?php echo $avail; ?>
											<?php endif; ?>
										</div>
										<div class="col-12 col-lg-6">
											<?php if($photos): ?>
												<div class="actor-photos text-end">
													<?php foreach($photos as $photo): ?>
														<a href="<?php echo wp_get_attachment_image_url($photo, 'full'); ?>" data-toggle="lightbox" data-gallery="<?php echo 'gallery-' . get_the_ID(); ?>">
															<?php echo wp_get_attachment_image($photo, 'thumbnail'); ?>
														</a>
													<?php endforeach; ?>
												</div>
											<?php endif; ?>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>

					<?php endif; ?>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();