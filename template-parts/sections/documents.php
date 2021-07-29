<?php  if( have_rows('document') ): ?>

<section class="documents" id="documents">
    <div class="documents-container">
        <h2 class="documents__title">
            Documents
        </h2>
        <div class="slider-container">
            <div class="documents-slider swiper-container">
                <div class="documents-slider__wrapper swiper-wrapper">
                    <?php
                        while( have_rows('document') ) : the_row(); ?>
                            <?php $document_image = get_sub_field('document_image');  ?>
                            <?php $document_name = get_sub_field('document_name');  ?>
                            <?php $document_file = get_sub_field('document_file');  ?>
                            <div class="documents-slider__slide swiper-slide">
                                <div class="documents-slider__img">
                                    <img src="<?php echo $document_image;?>" alt="slide">
                                </div>
                                <h3 class="documents-slider__title">
                                    <?php echo $document_name;?>
                                </h3>
                                <a href="<?php echo $document_file['url']; ?>" class="documents-slider__btn" download>
                                    Télécharger
                                </a>
                            </div>
                        <?php  endwhile;
                    ?>
                </div>						
            </div>
            
            <div class="documents-slider__buttons">
                <button class="swiper-button-prev documents-prev" tabindex="0" aria-label="Previous slide">
                    <svg width="31" height="37" viewbox="0 0 31 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M29.8 36.4999C29.6 36.4999 29.5 36.4999 29.3 36.3999L-0.5 19.0999C-0.8 18.8999 -1 18.5999 -1 18.1999C-1 17.7999 -0.8 17.4999 -0.5 17.2999L29.3 0.0999384C29.8 -0.200062 30.4 -6.16312e-05 30.7 0.499938C31 0.999938 30.8 1.59994 30.3 1.89994L2 18.1999L30.3 34.5999C30.8 34.8999 30.9 35.4999 30.7 35.9999C30.5 36.2999 30.2 36.4999 29.8 36.4999Z" fill="none"/>
                    </svg>
                </button>
                <button class="swiper-button-next documents-next" tabindex="0" aria-label="Next slide">
                    <svg width="31" height="37" viewbox="0 0 31 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.2 0.500058C1.4 0.500058 1.5 0.500058 1.7 0.600057L31.5 17.9001C31.8 18.1001 32 18.4001 32 18.8001C32 19.2001 31.8 19.5001 31.5 19.7001L1.7 36.9001C1.2 37.2001 0.599998 37.0001 0.299999 36.5001C9.10031e-08 36.0001 0.200001 35.4001 0.700001 35.1001L29 18.8001L0.700004 2.40006C0.200004 2.10006 0.100002 1.50006 0.300002 1.00006C0.500003 0.700059 0.800004 0.500058 1.2 0.500058Z" fill="black"/>
                    </svg>
                </button>
            </div>
            <div class="documents-slider__bullets swiper-pagination"></div>	
        </div>
    </div>
</section>
<?php  endif; ?> 
