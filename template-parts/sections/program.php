<section class="program" id="program">
    <div class="container">
        <h2 class="program__title">Agenda de nos formations</h2>
        <div class="program-block">
            <div class="program-block__month">
                <h4 class="program-block__month--title">événements </h4>
                <a href='<?php echo home_url(); ?>/training_programs/' class="program-block__month--text">
                   <span>afficher les événements passés</span> 
                </a>
            </div>
            <div class="program-block__year">
                passés
                <!-- février 2020 -->
            </div>
        </div>
        <div class="calendar">
       
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
                
                $result .= "<div class=\"calendar-block\" >\n";
                $result .= "<h3 class=\"calendar-block__title\">\n";
                $result .= $text;
                $result .= "</h3>\n";
            
                $result .= "<ul class=\"calendar-block__list\">\n";
                foreach( $arcresults2 as $arcresult2 ){
                   
                    $ID = $arcresult2->ID;
                    $program_color = get_field('program_color', $ID);
                    $program_date_start = get_field('program_date_start', $ID);
                    $program_date_end = get_field('program_date_end', $ID);
                    $post_date = get_the_date() ;

                        
                    $program_thumb =  get_the_post_thumbnail($arcresult2->ID);
                    $url       =  get_permalink($arcresult2->ID); //$arcresult2->guid;
                    $arc_title = $arcresult2->post_title;
                    if( $program_date_start ) {
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
                    } else {
                        
                        $result .= "<li class=\"calendar-block__item calendar-block__item_no-item\">\n";
                        $result .= "<div class=\"calendar-block__date\">\n";
                        $result .= "<p class=\"calendar-block__text\">\n" ;
                        $result .= $arc_title;
                        $result .= "</p>\n";
                        $result .= "</div>\n";
                        $result .= "</li>\n";

                    }
                    
                }
                $result .= "</ul>\n";
                $result .= "</div>\n";
            } 
        }
    }

    return $result;
    }
?>

