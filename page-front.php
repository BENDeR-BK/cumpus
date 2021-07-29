<?php /*Template Name: Front*/ get_header();?>
    <main class="td-main">
    <section class="first-block"></section>     

    <?php	get_template_part( 'template-parts/sections/about' );?>
    <?php	get_template_part( 'template-parts/sections/program' );?>
    <?php	get_template_part( 'template-parts/sections/slider' );?>
    <?php	get_template_part( 'template-parts/sections/trainers' );?>
    <?php	get_template_part( 'template-parts/sections/documents' );?>
    <?php	get_template_part( 'template-parts/sections/reviews' );?>
    <?php	get_template_part( 'template-parts/sections/partners' );?> 
    <?php	get_template_part( 'template-parts/sections/contact' );?> 

	

<?php get_footer(); ?>