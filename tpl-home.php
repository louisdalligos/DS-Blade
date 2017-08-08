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
              'post_type'       => 'cars',
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

    <!-- car search form -->
    <div class="ds-blade ds-blade-primary ds-blade-has-top-border primary-border-color">
    	<div class="container">
    		<h2 class="content-section-title top">Search Cars</h2>
    		<form class="" id="search-form" name="search-form">
    			<div class="col-md-4">
    				<div class="form-group">
    					<label>Make</label> <select class="form-control">
    						<option>
    							All makes
    						</option>
    						<option>
    							Make 1
    						</option>
    					</select>
    				</div>
    				<div class="form-group">
    					<label>Model</label> <select class="form-control">
    						<option>
    							Select Model
    						</option>
    						<option>
    							Model 1
    						</option>
    					</select>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="form-group">
    					<label>Badge</label> <select class="form-control">
    						<option>
    							Select Badge
    						</option>
    						<option>
    							Badge 1
    						</option>
    					</select>
    				</div>
    				<div class="form-group">
    					<label>Body</label> <select class="form-control">
    						<option>
    							All Body Types
    						</option>
    						<option>
    							Body 1
    						</option>
    					</select>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="form-group ds-blade-search-slider">
    					<label>Year Range</label>
    					<div class="form-input">
    						<input class="left-value-column" id="year-min" readonly type="text">
    						<div class="slider" id="year-range"></div><input class="right-value-column" id="year-max" readonly type="text">
    					</div>
    				</div>
    				<div class="form-group ds-blade-search-slider">
    					<label>Price Range</label>
    					<div class="form-input">
    						<input class="left-value-column" id="amount-min" readonly type="text">
    						<div class="slider" id="price-range"></div><input class="right-value-column" id="amount-max" readonly type="text">
    					</div>
    				</div>
    			</div>
    		</form>
    	</div>
    	<div class="container">
    		<div class="col-md-4 col-md-push-8">
    			<button class="btn btn-primary btn-block" type="button">Search</button>
    		</div>
    		<div class="col-md-4 text-center">
    			<p><a class="text-uppercase" href="#">See All</a> | <a class="text-uppercase" href="#">Advanced Search</a></p>
    		</div>
    	</div>
    </div>


    <!-- Gallery -->
    <div class="ds-blade ds-blade-tertiary ds-blade-car-gallery has-bg">
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    		<div class="container">
    			<h2 class="content-section-title top">Gallery</h2>

    			<div class="col-md-8">
    				<!-- Wrapper for slides -->
    				<div class="carousel-inner" role="listbox">

              <?php
                $gallery_args = array(
                  'post_type'       => 'gallery',
                  'post_status'     => 'publish',
                  'order'           => 'ASC',
                  'order_by'        => 'ID'
                );

                $img_gallery = new WP_Query( $gallery_args );
                $x = 0;

                if ( $img_gallery->have_posts() ) : while ( $img_gallery->have_posts() ) : $img_gallery->the_post();
                  $gclass = '';
                  $x++;
                    if ( $x == 1 ) $gclass .= ' active'; ?>

          					<div class="item <?php echo $gclass; ?>">
                      <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
          						<img src="<?php echo $featured_image; ?>" alt="gallery" class="img-responsive">
          						<div class="caption">
          							<?php the_content(); ?>
          						</div>
          					</div><!-- end item --><?php
                  endwhile;
                wp_reset_postdata();
              endif; ?>
            </div><!-- end carousel inner -->

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

          </div><!-- end col -->

          <div class="col-md-4 visible-md visible-lg">
    				<!-- Indicators -->
    				<ul class="list-unstyled slide-navigation">

              <?php
                $gallery_thumbs_args = array(
                  'post_type'       => 'gallery',
                  'post_status'     => 'publish',
                  'order'           => 'ASC',
                  'order_by'        => 'ID'
                );

                $img_gallery_thumbs = new WP_Query( $gallery_thumbs_args );
                $x = 0;
                $z = 0;

                if ( $img_gallery_thumbs->have_posts() ) : while ( $img_gallery_thumbs->have_posts() ) : $img_gallery_thumbs->the_post();
                  $gclass = '';
                  $x++;
                  $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
                    if ( $x == 1 ) $gclass .= ' active'; ?>

                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $z; ?>" class="<?php echo $gclass; ?>"><a href="#"><img src="<?php echo $featured_image; ?>" alt="gallery" class="img-responsive"></a></li>

          				<?php
                  $z++;
                  endwhile;
                wp_reset_postdata();
              endif; ?>

    				</ul>
    			</div>

        </div><!-- end container -->
      </div><!-- end carousel slide -->
    </div><!-- end ds blade car gallery -->

     <?php endwhile;
   endif; ?>

   <!-- Map -->
   <div class="ds-blade ds-blade-default dealer-map-wrap">
   	<div data-address="Albion Rd, Box Hill VIC 3128, Australia" class="map" id="dealer-map"></div>
   </div>


 <?php get_footer(); ?>
