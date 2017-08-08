<?php
/**
 * Template Name: Home
 *
 * @package ds-blade
 *
 */

 get_header();

   if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

     <div class="ds-blade ds-blade-tertiary visible-md visible-lg">
      <div class="carousel slide" data-ride="carousel" id="ds-home-gallery">

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

          <?php
            $args = array(
              'post_type'       => 'slide',
              'post_status'     => 'publish',
              'order'           => 'ASC',
              'order_by'        => 'ID'
            );

            $slides = new WP_Query( $args );
            $c = 0;

            if ( $slides->have_posts() ) : while ( $slides->have_posts() ) : $slides->the_post();
              $class = '';
              $c++;
                if ( $c == 1 ) $class .= ' active'; ?>

                <div id="post-<?php the_ID(); ?>" class="item <?php echo $class; ?>">
                  <div class="container">

                    <div class="col-lg-7 col-md-8">
                      <?php $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                      <img alt="Slide" class="img-responsive" src="<?php echo $image; ?>">
                    </div>

                    <div class="ds-blade-slide-info col-lg-5 col-md-4">
                      <h3 class="slide-item-title"><?php echo get_the_title(); ?></h3>
                      <div class="slide-price">
                        <span class="price"><?php echo get_post_meta($post->ID, 'price', true); ?></span>
                        <span class="delivery"><?php echo get_post_meta($post->ID, 'desc', true); ?></span>
                      </div>
                      <div class="slide-car-info">
                        <span class="odd"><i class="icon icon-clock2"></i><?php echo get_post_meta($post->ID, 'distance', true); ?></span>
                        <span class="even"><i class="icon icon-cog"></i><?php echo get_post_meta($post->ID, 'transmission', true); ?></span>
                        <span class="odd"><i class="icon icon-truck"></i><?php echo get_post_meta($post->ID, 'petrol', true); ?></span>
                      </div>
                      <div class="slide-buttons">
                        <a class="btn btn-default" href="#">Enquire Now</a> <a class="btn btn-primary" href="#">View Details</a>
                      </div>
                    </div>

                  </div><!-- end container -->
                </div><!-- end item --><?php
              endwhile;
              wp_reset_postdata();
            endif; ?>


        </div><!-- end carousel inner -->

        <!-- Controls -->
         <a class="left carousel-control" data-slide="prev" href="#ds-home-gallery" role="button">
           <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
           <span class="sr-only">Previous</span>
         </a>

         <a class="right carousel-control" data-slide="next" href="#ds-home-gallery" role="button">
           <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
           <span class="sr-only">Next</span>
         </a>
      </div>
    </div>


    <!-- Galllery Slider -->
    <div class="ds-blade ds-blade-default ds-blade-gallery-slider ds-blade-has-top-border secondary-border-color">
    	<div class="container">
    		<h2 class="content-section-title top hidden-xs hidden-sm">Featured Cars</h2>

        <?php
          $featured_args = array(
            'post_type'       => 'slide',
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

          if ( $gallery->have_posts() ) : while ( $gallery->have_posts() ) : $gallery->the_post();

          $cat = get_terms( 'category', 'orderby=count&hide_empty=0');

          //print_r($cat);

          ?>

            <div class="col-md-3">
        			<div class="ds-blade-slider-car-item">

                <?php $gallery_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

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

     <?php endwhile;
   endif; ?>




 <?php get_footer(); ?>
