<?php
get_header();

 // $target_audience = get_post_meta( $product->get_id(), 'target_audience', true );
                            $target_audience = get_field('target_audience');
                            $full_date =  get_field('full_date');
                            $training_site = get_field('training_site');
                            $training_site_link = get_field('training_site_link');
							?>
<!-- <section class="first"></section>  -->


<div class='single-product__wrapper' style='border-color: <?php the_field('program_color'); ?>'>

    <?php while ( have_posts() ) : the_post(); ?>
        <section id="post-<?php the_ID(); ?>" >
            <div class="single-product__content" style='border-color: <?php the_field('program_color'); ?>'>
                <div class="single-product__image">
                    <div class="single-product__thumb">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="single-product__btn-chekout">
						<form id = "main_top_inscr" class="" method="post" action="https://flyfox.us/campus/checkout/">
							<input id="traning_title" name="traning_title" type="hidden" value=" <?php the_title(); ?>">
							<input id="traning_price" name="traning_price" type="hidden" value="<?php echo get_field('program_price');?>">
							
							<input id="traning_date" name="traning_date" type="hidden" value="<?php echo get_field('full_date');?>">
							
					<?php
						$mod_num = 0;
                        while( have_rows('modules') ) : the_row(); 
						$mod_num++;
                        $module_title = get_sub_field('module_title'); 
                        $module_price = get_sub_field('module_price'); 
                        ?>
                      <input id="module_title<? echo $mod_num; ?>" name="module_title<? echo $mod_num; ?>" type="hidden" value="<?php echo $module_title;?>">
					  <input id="module_price<? echo $mod_num; ?>" name="module_price<? echo $mod_num; ?>" type="hidden" value="<?php echo $module_price;?>">
                    <?php  endwhile; ?>
					
						<button type="submit" name="" value="" class="btn_black">INSCRIPTION</button>
						</form>
                    </div>
                </div>
                
                <div class="single-product__summary">
                    <div class="single-product__label">
                        <img src="<?php echo SD_THEME_IMAGE_URI; ?>/svg/tp.svg" alt="Campus Clinic">
                    </div>
                    <div class="single-product__back-link">
                        <a href="#" onclick="javascript:history.back(); return false;">revenir en arrière</a>
                    </div>
                    <div class="single-product__icon">
                        <img src="<?php echo SD_THEME_IMAGE_URI; ?>/svg/card-1.svg" alt="Campus Clinic">
                    </div>
                    <div class="single-product__title">
                        <?php the_title(); ?>
                    </div>
                    <div class="product_meta">
                        <?php if ( $target_audience ) { ?>
                            <div class="product_meta__item">
                                <p class='product_meta__name'><?php _e('Public visé:','campus') ;?></p>
                                <ul class='product_meta__list'>
                                    <li><?php echo $target_audience;?></li>
                                </ul>
                            </div>
                        <?php } ?>
                        <?php if ( $full_date ) { ?> 
                            <div class="product_meta__item">
                                <p class='product_meta__name'><?php _e('Date:','campus') ;?></p>
                                <ul class='product_meta__list'>
                                    <li><?php echo the_field('full_date'); ?></li>
                                </ul>
                            </div>
                        <?php } ?>
                        <?php if ( $training_site ) { ?>
                            <div class="product_meta__item">
                                <p class='product_meta__name'><?php _e('Lieu de formation:','campus') ;?></p>
                                <ul class='product_meta__list'>
                                    <li>
                                        </span><a href="<?php echo $training_site_link; ?>"><?php echo $training_site;?></a>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                        
                    </div>
                    <div class="single-product__desc">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>                 
        </section><!-- #post-<?php the_ID(); ?> -->

        <?php
            $featured_posts = get_field('relationship');
            if( $featured_posts ): ?>
            
        <section class='single-product-trainers'>
            <div class="single-product-trainers__title">Formateurs</div>
           
            
                <ul class='single-product-trainers__list'>
                    <?php foreach( $featured_posts as $featured_post ):
                
                        $permalink = get_permalink( $featured_post->ID );
                        $title = get_the_title( $featured_post->ID );
                        $content = get_the_content( $featured_post->ID );
                        $custom_field = get_field( 'specialization', $featured_post->ID );
                        $trainer_image = get_field( 'trainer_image', $featured_post->ID );
                        $trainer_text = get_field( 'trainer_text', $featured_post->ID );
                    ?>

                    <li class="trainer single-product-trainers__trainer">
                        <div class="trainer__img">
                            <img  src="<?php echo $trainer_image;?>" alt="slide">
                        </div>
                        <div class="trainer__content">
                            <h3 class="trainer__title">
                                <?php echo esc_html( $title ); ?>
                            </h3>
                            <div class="trainer__specialization">
                                <?php echo esc_html( $custom_field ); ?>
                            </div>
                            <p class="trainer__text">
                                <?php echo  $trainer_text ; ?>
                            </p>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
        </section>
        <?php endif; ?>          
        <section class='single-product__price-wrapper'>
            <?php if( get_field('program_price') ): ?>
                <div class="single-product__price">
                    <p><?php _e('Programme Formation complete','campus') ;?> —  <?php the_field('program_price');  ?>  €</p>
                </div>
            <?php endif; ?> 
            <?php if( get_field('modules') ): ?>

                <div class="single-product__price-title">Ou à la carte</div>
                <div class="single-product__cards">
                    <?php
                        while( have_rows('modules') ) : the_row(); 
                        $module_title = get_sub_field('module_title'); 
                        $module_price = get_sub_field('module_price'); 
                        $module_text = get_sub_field('module_text'); 
                        ?>
                        <div class="single-product__cards-item">
                            <div class="single-product__cards-item--price">
                                <?php echo $module_price;?> €
                            </div>
                            <div class="single-product__cards-item--title">
                                <?php echo $module_title;?>
                            </div>
                            <div class="single-product__cards-item--text">
                                <?php echo $module_text;?>
                            </div>
                        </div>
                    <?php  endwhile; ?>
                    
                </div>
            <?php  endif; ?> 
        </section>
        <?php if( get_field('bottom_image') ): ?>
            <section class="single-product_img">
                <img src="<?php the_field('bottom_image')?>" alt="slide">
            </section>
        <?php  endif; ?> 
        <section class="single-product-map">
            <div class="single-product-map__row">
                <div class="single-product-map__col">
                    <div class="single-product-map__map">
                        <div id="td-map"></div>
                    </div>
                </div>
                <div class="single-product-map__col">
                    <div class="single-product-map__address">
                        <div class="single-product-map__title"><?php echo the_field('program_address_title');  ?></div>
                        <?php $program_address = the_field('program_address');  ?>
                        <?php echo $program_address;?>


<form id = "main_top_inscr" class="" method="post" action="https://flyfox.us/campus/checkout/">
							<input id="traning_title" name="traning_title" type="hidden" value=" <?php the_title(); ?>">
							<input id="traning_price" name="traning_price" type="hidden" value="<?php echo get_field('program_price');?>">
							
							<input id="traning_date" name="traning_date" type="hidden" value="<?php echo get_field('full_date');?>">
							
					<?php
						$mod_num = 0;
                        while( have_rows('modules') ) : the_row(); 
						$mod_num++;
                        $module_title = get_sub_field('module_title'); 
                        $module_price = get_sub_field('module_price'); 
                        ?>
                      <input id="module_title<? echo $mod_num; ?>" name="module_title<? echo $mod_num; ?>" type="hidden" value="<?php echo $module_title;?>">
					  <input id="module_price<? echo $mod_num; ?>" name="module_price<? echo $mod_num; ?>" type="hidden" value="<?php echo $module_price;?>">
                    <?php  endwhile; ?>
					 <div class="single-product-map__btn">
						<button type="submit" name="" value="" class="btn_black">INSCRIPTION</button>
						</div>
						</form>
						
                            
                        
                    </div>
                </div>          
            </div>   
        </section>
        
        <script>
            // ////////////  map init /////////
            <?php $coordinates= get_field('program_location'); ?>

            function initMap(){
                var styleMap = [
                    {
                        "featureType": "administrative",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": "-100"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.province",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 65
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": "50"
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": "-100"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "all",
                        "stylers": [
                            {
                                "lightness": "30"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "all",
                        "stylers": [
                            {
                                "lightness": "40"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "hue": "#ffff00"
                            },
                            {
                                "lightness": -25
                            },
                            {
                                "saturation": -97
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "lightness": -25
                            },
                            {
                                "saturation": -100
                            }
                        ]
                    }
                ]
                setTimeout(function(){
                    var element = document.getElementById('td-map');

                    var options = {
                        styles: styleMap,
                        zoom: 15,
                        center:{
                            lat:<?php echo $coordinates['lat'];?>,
                            lng:<?php echo $coordinates['lng'];?>
                        }
                    };

                    var myMap = new google.maps.Map(element, options);

                    var markers = [
                        {
                            coordinates:{
                                lat:<?php echo $coordinates['lat'];?>,
                                lng:<?php echo $coordinates['lng'];?>
                            },
                            image:"<?php echo SD_THEME_IMAGE_URI; ?>/svg/marker.svg",
                        }
                    ];
                    
                    function addMarker(properties){
                        var marker = new google.maps.Marker({
                            position: properties.coordinates,
                            map: myMap,
                            icon:properties.image
                        });							
                    }
                    for(var i = 0; i < markers.length; i++){
                        addMarker(markers[i]);
                    }
                },100)
                
            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApj8qSzyO4DqXeQtFQPKI4mi6p-MBwlpo&amp;callback=initMap"></script>

    <?php endwhile; // End of the loop. ?>	


    
</div>


<?php
    get_footer();
