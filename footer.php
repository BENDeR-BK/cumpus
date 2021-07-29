<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package campus
 */
?>
</main>
<footer class="footer">
	<div class="container footer-container">
		<a href="<?php echo home_url(); ?>" class="footer__logo">
			<img src="<?php echo SD_THEME_IMAGE_URI; ?>/footer-logo.png" alt="Campus clinic">
		</a>
		<div class="footer__mobile">
			<p class="footer__text">
			
			
				 © <?php echo esc_html( date('Y') );  the_field('footer_copy', 'option'); ?> 

			</p>
			<div class="footer__content">
				<p class="footer__product">
					<?php the_field('design_and_production_text', 'option'); ?> 
					<a href="<?php the_field('design_and_production_link', 'option'); ?> " class="footer__product--link" target="_blank">
						<?php the_field('design_and_production_name', 'option'); ?> 
					</a>
				</p>
				<a href="<?php the_field('legal_notice_link', 'option'); ?>" class="footer__link"><?php the_field('legal_notice_text', 'option'); ?></a>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
