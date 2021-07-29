<section class="contact" id="contact">
    <div class="container contact-container">
        <h2 class="contact__title">
            Contact
        </h2>
        <div class="contact-block">
            <p class="contact__text">
                <?php the_field('contacts_form_text', 'option'); ?>
                
            </p>
            <div  class="form contact-form">
                <?php  echo do_shortcode('[contact-form-7 id="142" title="Contact form"]');  ?>
            </div>
           
            <img src="<?php echo SD_THEME_IMAGE_URI; ?>/contact-bg.jpg" class="contact-bg" alt="image">
        </div>
        
    </div>
</section>
