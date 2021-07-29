<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package campus
 */

get_header(); ?>
	<section class="error-page">	
		<div class="page-message__wrapper">
			<div class="page-message__label">
				<img src="<?php echo SD_THEME_IMAGE_URI; ?>/svg/tp.svg" alt="Campus Clinic">
			</div>
			<div class="page-message__container">
				<h1><span>404.</span> <?php _e('Désolé, une telle page n\'existe pas!', 'campus'); ?> </h1>
				<?php the_content(); ?>
				<div class="page-message__btn">
					<a href="<?php echo site_url();?>" class="message__btn message__btn_black">home</a>
				</div>
			</div>
		</div>
    </section>

<?php get_footer();
