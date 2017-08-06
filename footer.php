<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ds-blade
 */

?>

	<footer class="ds-blade-footer">
		<!-- Footer top -->
		<div class="ds-blade-footer-top">
			<div class="container">
				<div class="col-md-4 col-md-push-8 ds-blade-widget">
					<h4 class="text-uppercase">Contact</h4><span>Smiths Super Car<br>
					Emporium</span> <span>1800 000 000</span>
					<address>
						100 Address Street<br>
						SUBURB, 0000
					</address><a class="btn btn-primary" href="#">Contact</a>
				</div>
				<div class="col-md-4 ds-blade-widget">
					<h4 class="text-uppercase">Trading Hours</h4>
					<ul class="list-unstyled">
						<li>Mon: 9am-5pm</li>
						<li>Tue: 9am-5pm</li>
						<li>Wed: 9am-5pm</li>
						<li>Thu: 9am-5pm</li>
						<li>Fri: 9am-5pm</li>
						<li>Sat: 9am-5pm</li>
						<li>Sun: Closed</li>
					</ul>
				</div>
				<div class="col-md-4 col-md-pull-8 ds-blade-widget">
					<h4 class="text-uppercase">Quick Links</h4>
					<ul class="list-unstyled">
						<li>
							<a href="#">Used Vehicles</a>
						</li>
						<li>
							<a href="#">Servicing</a>
						</li>
						<li>
							<a href="#">Finance</a>
						</li>
						<li>
							<a href="#">About Us</a>
						</li>
						<li>
							<a href="#">Contact Us</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Footer bottom -->
		<div class="ds-blade-footer-bottom">
			<div class="container">
				<div class="col-md-12">
					<div class="site-copyright">
						<span><?php echo get_theme_mod('copyright_text'); ?></span> <span class="sitemap-link"><a href="#">Sitemap</a></span> <span class="dealer-link">Dealer Website by <a href="#">Dealer Solutions</a></span>
					</div>
				</div>
			</div>
		</div>
	</footer>
<?php wp_footer(); ?>

</body>
</html>
