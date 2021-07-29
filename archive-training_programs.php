<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mo
 */
get_header(); ?>
<section class="program program_arhive_wrapper" id="program">
	<div class="container">
		<h2 class="program__title">Agenda de nos formations</h2>
		
		<div class="calendar">
			<!-- <div class="calendar-block">
				<h3 class="calendar-block__title">
					Mars 2020
				</h3>
				<ul class="calendar-block__list">
				<?php
					if ( have_posts() ) :
					while ( have_posts() ) : the_post();
					$category = get_the_category(); ?>
					<li class="calendar-block__item">
						<span class="calendar-block__color" style="background-color:#f14942"></span>
						<div class="calendar-block__link" >
							<?php the_post_thumbnail('apartment'); ?>
						</div>
						<div class="calendar-block__date">
							<?php the_field('program_date_start'); ?> — <?php the_field('program_date_end'); ?>
						</div>
						<p class="calendar-block__text">
							<?php the_title(); ?>
						</p>
					</li>
					<?php endwhile; endif;?>
				</ul>
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

$arcresults = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts FROM " . $wpdb->posts . " WHERE post_type='$post_type' $AND_year AND post_status='publish' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date ASC");

$month_names = array(1=>'janvier','février','mars','avril','mai','juin','juillet','aout','septembre','octobre','novembre','decembre');


if( $arcresults ){
	
	foreach( $arcresults as $arcresult ){
	
		$url  = get_month_link( $arcresult->year, $arcresult->month );
		
		$text = sprintf('%s %d', $month_names[zeroise($arcresult->month,1)], $arcresult->year);
		// $result .= get_archives_link($url, $text, '', $before, $after);

		$thismonth = zeroise( $arcresult->month, 2 );
		$thisyear = $arcresult->year;
	
		$arcresults2 = $wpdb->get_results("SELECT ID, post_title, comment_status, guid, comment_count FROM " . $wpdb->posts . " WHERE post_date LIKE '$thisyear-$thismonth-%' AND post_status='publish' AND post_type='$post_type' AND post_password='' ORDER BY post_date ASC $LIMIT");
		
		if( $arcresults2){
			
			$result .= "<div class=\"calendar-block\">\n";
			$result .= "<h3 class=\"calendar-block__title\">\n";
			$result .= $text;
			$result .= "</h3>\n";
		
			$result .= "<ul class=\"calendar-block__list\">\n";
			foreach( $arcresults2 as $arcresult2 ){
				$ID = $arcresult2->ID;
				$program_color = get_field('program_color', $ID);
				$program_date_start = get_field('program_date_start', $ID);
				$program_date_end = get_field('program_date_end', $ID);

		
				if(  $arcresult2 ){
					
					$program_thumb =  get_the_post_thumbnail($arcresult2->ID);
					$url       =  get_permalink($arcresult2->ID); //$arcresult2->guid;
					$arc_title = $arcresult2->post_title;
					if( $arc_title ) $text = strip_tags($arc_title);
					

					$result .= "<li class=\"calendar-block__item\">\n";
					$result .= "<span class=\"calendar-block__color\" style='background-color:\n";
					$result .= $program_color ."'></span>\n";
					$result .= "<div class=\"calendar-block__link\">\n";
					$result .= $program_thumb ;
					$result .= "</div>\n";
					$result .= "<div class=\"calendar-block__date\">\n";
					$result .= $program_date_start . " — " . $program_date_end ;
					$result .= "</div>\n";
					$result .= "<p class=\"calendar-block__text\">\n" .$arc_title;
					$result .= "</p>\n";
				
					if( $show_comment_count ){
						$cc = $arcresult2->comment_count;
						if( $arcresult2->comment_status == "open" OR $comments_count > 0) $result .= " ($cc)";
					}
					
					$result .= "</li>\n";
				}
				
				
			}
			$result .= "</ul>\n";
			$result .= "</div>\n";
		}  else {
			$result =  '<h3 >no post test</h3>';
		}
	}
}

return $result;
}
?>


<?php get_footer();