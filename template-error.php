<?php /*Template Name: error*/ get_header();?>
    <main class="td-main">
    <div class="page-message__wrapper">
      <div class="page-message__container">
        <?php the_content(); ?>
        <div class="page-message__btn">
            <a href="#" class="message__btn message__btn_grey">revenir à l'accueil</a>
            <a href="#" class="message__btn message__btn_black">réessayer</a>
        </div>
      </div>
    </div>
    

	

<?php get_footer(); ?>