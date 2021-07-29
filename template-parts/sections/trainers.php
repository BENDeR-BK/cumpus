<section class="trainers" id="trainers">
    <div class="trainers-container">
        <h2 class="trainers__title">
            Formateurs
        </h2>
        <ul class="trainers__list">
            <?php $tr_posts = array(
                'post_type' => 'trainers',
                'posts_per_page' => 99,
                'post_status' => 'publish',
                'order' => 'ASC',
                );
                $tr_posts_list = new WP_Query( $tr_posts );
                $total = $tr_posts_list->found_posts;
                if( $tr_posts_list->have_posts() ):  ?>
                <?php while( $tr_posts_list->have_posts() ): $tr_posts_list->the_post(); 
                $trainer_image = get_field( 'trainer_image' );
                ?>
                <li class="trainer">
                    <div class="trainer__img">
                        <img  src="<?php echo $trainer_image;?>" alt="slide">
                    </div>
                    <h3 class="trainer__title">
                        <?php the_title(); ?>
                    </h3>
                    <div class="trainer__specialization">
                        <?php the_field('specialization'); ?>
                    </div>
                    <p class="trainer__text">
                        <?php the_field('trainer_text'); ?>
                    </p>
                </li>
                <?php endwhile;?>
            <?php endif; wp_reset_postdata(); ?>
         
        </ul>
    </div>
</section>