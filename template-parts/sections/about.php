<section class="about" id="about">
    <div class="about-container">
        <div class="about-left">
            <h1 class="about__title">
                <?php the_field('about_title'); ?> <!-- Campus Clinic, formation continue en médecine dentaire à Besançon -->
            </h1>
            <h2 class="about__subtitle">
                <?php the_field('about_subtitle'); ?>
            </h2>
            <p class="about__text">
                <?php the_field('about_text'); ?>
            </p>
        </div>
        <div class="about-right">
            <div class="about-right__descr">
                <?php the_field('about_text_right'); ?></p>
            </div>
            <div class="about-right__cards" id="cards">
                <?php
                    if( have_rows('card') ):
                        while( have_rows('card') ) : the_row(); ?>
                            <?php $card_text = get_sub_field('card_text');  ?>
                            <?php $card_image = get_sub_field('card_image');  ?>
                            
                            <div class="card">
                                <div class="card__img" >
                                    <img src="<?php echo $card_image;?>" alt="foto">
                                </div>
                                <div class="card__content">
                                    <?php echo $card_text;?>
                                </div>
                            </div>
                        <?php  endwhile;
                    endif;
                ?>
            </div>
        </div>  
    </div>
</section>
