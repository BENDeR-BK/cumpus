<?php  if( have_rows('partners') ): ?>
<section class="partners" id="partners">
    <div class="container partners-container">
        <div class="partners__block">
            <h2 class="partners__title">Partners</h2>
            <ul class="partners__list">
                <?php
                    while( have_rows('partners') ) : the_row(); 
                    $partners_logo = get_sub_field('partners_logo'); 
                    $partners_link = get_sub_field('partners_link'); 
                    ?>
                    <li class="partners__item">
                        <a href="<?php echo $partners_link;?>" target="_blank">
                            <img src="<?php echo $partners_logo;?>" alt="slide">
                        </a>
                    </li>
                <?php  endwhile; ?>
            </ul>
        </div>
    </div>
</section>
<?php  endif; ?> 