<?php
/**
 * Template Name: Contact
 *
 * @package ds-blade
 *
 */

 get_header(); ?>

 <!-- Map -->
 <div class="ds-blade ds-blade-default dealer-map-wrap">
   <div data-address="Albion Rd, Box Hill VIC 3128, Australia" class="map" id="dealer-map"></div>
 </div>

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


 <!-- Enquiry form -->
 <div class="ds-blade ds-blade-primary">
 	<div class="container">
 		<h2 class="content-section-title top">Enquiry</h2>

 		<form id="enquiry-form" class="">
 			<div class="col-md-4">
 				<div class="form-group">
 					<label for="enquiry-input-full-name">Full Name</label>
 					<input type="text" class="form-control" id="enquiry-input-full-name" placeholder="Full Name" required>
 				</div>
 				<div class="form-group">
 					<label for="enquiry-input-phone">Phone</label>
 					<input type="text" class="form-control" id="enquiry-input-phone" placeholder="Phone" required>
 				</div>
 			</div>

 			<div class="col-md-4">
 				<div class="form-group">
 					<label for="enquiry-input-make">Email</label>
 					<input type="email" class="form-control" id="enquiry-input-make" placeholder="Email Address" required>
 				</div>
 				<div class="form-group">
 					<label>Enquiry Type</label>
 					<select class="form-control">
 						<option>General Enquiry</option>
 						<option>Date</option>
 					</select>
 				</div>
 			</div>

 			<div class="col-md-4">
 				<label for="enquiry-input-comment">Comments</label>
 				<textarea id="enquiry-input-comment" placeholder="Comments" rows="3"></textarea>
 			</div>
 		</form>
 	</div>

 	<div class="container">
 		<div class="col-md-4 col-md-push-8">
 			<button type="button" class="btn btn-primary btn-block">Submit</button>
 		</div>
 		<div class="col-md-8 col-md-pull-4">
 			<p class="font-weight-300 margin-top-10">We will confirm booking time with you as soon as possible</p>
 		</div>
 	</div>
 </div>


 <!-- Galllery Slider -->
 <div class="ds-blade ds-blade-default ds-blade-gallery-slider ds-blade-has-top-border secondary-border-color">
   <div class="container">
     <h2 class="content-section-title top hidden-xs hidden-sm">See Our Cars</h2>

     <?php
       $featured_args = array(
         'post_type'       => 'cars',
         'post_status'     => 'publish',
         'order'           => 'ASC',
         'order_by'        => 'ID',
         'tax_query'       => array(
           array(
             'taxonomy'    => 'category',
             'field'       => 'slug',
             'terms'       => 'featured'
           )
         )
       );

       $gallery = new WP_Query( $featured_args );

       //print_r($gallery);

       if ( $gallery->have_posts() ) : while ( $gallery->have_posts() ) : $gallery->the_post(); ?>

         <div class="col-md-3">
           <div class="ds-blade-slider-car-item">

             <?php $gallery_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>

             <img src="<?php echo $gallery_img; ?>" alt="car" class="img-responsive center-block">

             <div class="ds-blade-slider-car-details">
               <div class="car-name-wrapper">
                 <span class="car-name"><?php echo get_the_title(); ?></span>
               </div>
               <span class="price"><?php echo get_post_meta($post->ID, 'price', true); ?></span>
               <span class="delivery"><?php echo get_post_meta($post->ID, 'desc', true); ?></span>
               <span class="odd"><i class="icon icon-clock2"></i><?php echo get_post_meta($post->ID, 'distance', true); ?></span>
               <span class="even"><i class="icon icon-cog"></i><?php echo get_post_meta($post->ID, 'transmission', true); ?></span>
               <span class="odd"><i class="icon icon-truck"></i><?php echo get_post_meta($post->ID, 'petrol', true); ?></span>
             </div>

             <div class="ds-blade-slider-car-buttons">
               <a href="#" class="btn btn-default">Enquire</a>
               <a href="#" class="btn btn-primary">View</a>
             </div>
           </div>
         </div><?php
         endwhile;
       wp_reset_postdata();
     endif; ?>
   </div>


   <div class="container">
     <div class="col-md-12">
       <div class="ds-blade-slider"></div>
       <a href="#" class="btn btn-primary text-uppercase visible-md visible-lg view-all-btn">View All</a>
     </div>
   </div>
 </div>

 <?php get_footer(); ?>
