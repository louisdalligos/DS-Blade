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
				<?php dynamic_sidebar( 'footer-1' ); ?>
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
