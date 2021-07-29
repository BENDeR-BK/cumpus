<section class="program" id="program">
    <div class="container">
        <h2 class="program__title">Agenda de nos formations</h2>
        <div class="program-block">
            <div class="program-block__month">
                <h4 class="program-block__month--title">janvier</h4>
                <a href='<?php echo home_url(); ?>/training_programs/' class="program-block__month--text">
                   <span>afficher les événements passés</span> 
                </a>
            </div>
            <div class="program-block__year">
                février 2020
            </div>
        </div>
        <div class="calendar">
       
       
            <!-- <div class="calendar-block">
                <?php $td_posts = array(
                    'post_type' => 'training_programs',
                    'posts_per_page' => 9,
                    'post_status' => 'publish',
                    'order' => 'ASC',
                    );
                    $td_posts_list = new WP_Query( $td_posts );
                    $total = $td_posts_list->found_posts;
                ?>
               
                <?php if( $td_posts_list->have_posts() ):  ?>
                    <?php the_field('program_date_end'); ?>
                    <h3 class="calendar-block__title">
                        Mars 2020
                    </h3>
                    
               
               
                    <ul class="calendar-block__list">
                    <?php while( $td_posts_list->have_posts() ): $td_posts_list->the_post(); ?>
                        <li class="calendar-block__item">
                            <span class="calendar-block__color" style="background-color:<?php the_field('program_color'); ?>"></span>
                            <a class="calendar-block__link" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('apartment'); ?>
                            </a>
                            <div class="calendar-block__date">
                                <?php the_field('program_date_start'); ?> — <?php the_field('program_date_end'); ?>
                            </div>
                            <p class="calendar-block__text">
                                <?php the_title(); ?>
                            </p>
                        </li>
                        <?php endwhile;?>
                    </ul>
                    
                    
                <?php endif; wp_reset_postdata(); ?>
            </div>
            </div> -->
            <?php echo get_blix_archive(1, '<h3 class="calendar-block__title">', '</h3>', 0, 'training_programs'); ?>
        
        </div>
        
    </div>
</section>

<?php
function get_blix_archive( $show_comment_count=0, $before='<h4>', $after='</h4>', $year=0, $post_type='post', $limit=100 ){

    global $month, $wpdb;
    $result = '';

    $AND_year = $year ? $wpdb->prepare(" AND YEAR(post_date) = %s", $year) : '';
    $LIMIT    = $limit ? $wpdb->prepare(" LIMIT %d", $limit) : '';

    $arcresults = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts FROM " . $wpdb->posts . " WHERE post_type='$post_type' $AND_year AND post_status='future' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date ASC");

    $month_names = array(1=>'janvier','février','mars','avril','mai','juin','juillet','aout','septembre','octobre','novembre','decembre');
  
   
    if( $arcresults ){
        
        foreach( $arcresults as $arcresult ){
            $url  = get_month_link( $arcresult->year, $arcresult->month );            
            $text = sprintf('%s %d', $month_names[zeroise($arcresult->month,1)], $arcresult->year);
            
            $thismonth = zeroise( $arcresult->month, 2 );
            $thisyear = $arcresult->year;
        
            $arcresults2 = $wpdb->get_results("SELECT ID, post_title, comment_status, guid, comment_count FROM " . $wpdb->posts . " WHERE post_date LIKE '$thisyear-$thismonth-%' AND post_status='future' AND post_type='$post_type' AND post_password='' ORDER BY post_date ASC $LIMIT");
            
            if( $arcresults2){
                
                $result .= "<div class=\"calendar-block\">\n";
                $result .= "<h3 class=\"calendar-block__title\">\n";
                $result .= $text;
                $result .= "</h3>\n";
            
                $result .= "<ul class=\"calendar-block__list\">\n";
                foreach( $arcresults2 as $arcresult2 ){
                    // var_dump($arcresult2);
                   
                    $ID = $arcresult2->ID;
                    $program_color = get_field('program_color', $ID);
                    $program_date_start = get_field('program_date_start', $ID);
                    $program_date_end = get_field('program_date_end', $ID);
                    $post_date = get_the_date() ;

                    // $result .= $program_date_end . '<br>';
                    // $result .= $program_date_end . '<br>';
                        
                    $program_thumb =  get_the_post_thumbnail($arcresult2->ID);
                    $url       =  get_permalink($arcresult2->ID); //$arcresult2->guid;
                    $arc_title = $arcresult2->post_title;
                    // if( $arc_title ) $text = strip_tags($arc_title);
                    
                    $result .= "<li class=\"calendar-block__item\">\n";
                    $result .= "<span class=\"calendar-block__color\" style='background-color:\n";
                    $result .= $program_color ."'></span>\n";
                    $result .= "<a class=\"calendar-block__link\" href=\"$url\">\n";
                    $result .= $program_thumb ;
                    $result .= "</a>\n";
                    $result .= "<div class=\"calendar-block__date\">\n";
                    $result .= $program_date_start . " — " . $program_date_end ;
                    $result .= "</div>\n";
                    $result .= "<p class=\"calendar-block__text\">\n" .$arc_title;
                    $result .= "</p>\n";
                
            
                    
                    $result .= "</li>\n";
                   
                
                }
                $result .= "</ul>\n";
                $result .= "</div>\n";
            } 
        }
    }

    return $result;
    }
?>

