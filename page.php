<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ds-blade
 */

get_header(); ?>

<?php

	$page_banner_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 

	if ( has_post_thumbnail() ) {
		$page_banner_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<div class="ds-blade ds-blade-tertiary ds-blade-page-banner visible-md visible-lg" style="background: url('<?php echo $page_banner_img; ?>')"></div><?php
	} else { ?>
		<div class="ds-blade ds-blade-tertiary ds-blade-page-banner page-banner-default visible-md visible-lg"></div><?php
	} ?>

<!-- Breadcrumbs -->
<div class="ds-blade ds-blade-primary ds-blade-breadcrumbs visible-md visible-lg">
	<div class="container">
		<div class="col-md-12">
			<span><?php the_breadcrumb(); ?></span>
		</div>
	</div>
</div>

<!-- Page content -->
<div class="ds-blade ds-blade-default ds-blade-page-content">
	<div class="container">
		<div class="col-md-4 col-md-push-8">

			<div class="page-sidebar-navigation visible-md visible-lg">
				<?php get_sidebar(); ?>
			</div>
		</div>
		<div class="col-md-8 col-md-pull-4">
			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>
		</div>
	</div>
</div>

<!-- Book service form -->
<div class="ds-blade ds-blade-primary">
	<div class="container">
		<h2 class="content-section-title">Book a service online</h2>
		<form class="" id="book-service-form" name="book-service-form">
			<div class="col-md-4">
				<div class="form-group">
					<label for="book-service-input-full-name">Full Name</label> <input class="form-control" id="book-service-input-full-name" placeholder="Full Name" required="" type="text">
				</div>
				<div class="form-group">
					<label for="book-service-input-phone">Phone</label> <input class="form-control" id="book-service-input-phone" placeholder="Phone" required="" type="text">
				</div>
				<div class="form-group">
					<label for="book-service-input-make">Email</label> <input class="form-control" id="book-service-input-email" placeholder="Email Address" required="" type="email">
				</div>
				<div class="form-group">
					<label>Service Type</label> <select class="form-control">
						<option>
							Logbook Service
						</option>
						<option>
							Service 1
						</option>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="book-service-input-make">Make</label> <input class="form-control" id="book-service-input-make" placeholder="Make" type="text">
				</div>
				<div class="form-group">
					<label for="book-service-input-model">Model</label> <input class="form-control" id="book-service-input-model" placeholder="Model" type="text">
				</div>
				<div class="form-group">
					<label for="book-service-input-vin">Vin</label> <input class="form-control" id="book-service-input-vin" placeholder="VIN" type="text">
				</div>
				<div class="form-group">
					<label for="book-service-input-rego">Rego</label> <input class="form-control" id="book-service-input-rego" placeholder="Rego" type="text">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Drop Off</label> <select class="form-control">
						<option>
							Drop off date
						</option>
						<option>
							Date
						</option>
					</select>
				</div>
				<div class="form-group">
					<label>Pickup</label> <select class="form-control">
						<option>
							Pickup date
						</option>
						<option>
							Body 1
						</option>
					</select>
				</div><label for="book-service-input-comment">Comments</label>
				<textarea id="book-service-input-comment" placeholder="Comments" rows="3"></textarea>
			</div>
		</form>
	</div>
	<div class="container">
		<div class="col-md-4 col-md-push-8">
			<button class="btn btn-primary btn-block" type="button">Submit</button>
		</div>
		<div class="col-md-8 col-md-pull-4">
			<p class="font-weight-300 margin-top-10">We will confirm booking time with you as soon as possible</p>
		</div>
	</div>
</div>


<?php
get_footer();
