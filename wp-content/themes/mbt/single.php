<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); 
$slug_id =  $post->post_name;

?>
	<div id="body">
	<div class="entry1">
	<h2 class="ctitle">Course Catalog</h2>
	<div class="crform">To register for a course or to see a brief description please click on the course title.<br />
	To inquire about other courses or custom course offerings, please fill out our 
	<a href="<?php echo bloginfo('siteurl'); ?>/register">contact request form</a>.<br /><br />
	</div>
	</div>
	
	
	
	
<?php while ( have_posts() ) : the_post(); ?>
	<nav id="nav-single">
	<!--h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
	<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
	<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span -->
	</nav>
<!-- #nav-single -->

<?php get_template_part( 'content-single', get_post_format() ); ?>
<?php //echo do_shortcode('[faq faq_topic="'.$slug_id.'"]');?>



<div id="faq-block">
	<?php
		$querys = mysql_query("SELECT * FROM mbt_faq_cat_c where slug='".$slug_id."'");
		$rows = mysql_fetch_assoc($querys);
		$cid = $rows['id'];
		$query = mysql_query("SELECT * FROM mbt_faq_data");
		if(mysql_num_rows($query)>0)
		{
			while($row = mysql_fetch_array($query))
			{
				// echo '<pre>';
				// print_r($row);
				$cids = explode(',',$row['catids']);
				if (in_array($cid,$cids))
				{
				?>
				<div class="single-faq expand-faq">
				<h4 id="toglle_custom_<?php echo $row['id']; ?>" class="faq-question expand-title"><?php echo ucfirst($row['title']); ?></h4>
				<div id="faq-list_pera_<?php echo $row['id']; ?>" class="faq-answer faq-list_pera_class">
				<p>
				<?php 
				echo ucfirst($row['description']); 
				$uid		=  get_current_user_id();
				$querys = mysql_query("SELECT * FROM mbt_faq_subscribe_user where uid='".$uid."' and cid='".$row['id']."'");
				//$slug = str_replace(' ', '-',strtolower(preg_replace( "#[^a-zA-Z0-9 ]#", "", $row['title'])));
				$result = mysql_fetch_array($querys);
				
				$fromdate = $result['date'];
				$todate = date("y-m-d");
				
				$timestamp_start = strtotime($fromdate);
				$timestamp_end = strtotime($todate);
				$difference = abs($timestamp_end - $timestamp_start); // that's it!	
				$days_diff = floor($difference/(60*60*24));
			
				if(mysql_num_rows($querys) < 0 || $days_diff > 7 && $days_diff != 7)
				{
				?>
					<a href="<?php echo bloginfo('siteurl'); ?>/purchase?catid=<?php echo $row['id'];?>" class="formalink">Register</a>
				<?php
				}
				?>
				
				</p>
				<?php
				
				// if(mysql_num_rows($querys) > 0 && $days_diff < 7 || $days_diff == 7)
				// {
					// echo '<div class="player_opp">'.$row['code'].'</div>';
				// }
				?>
				</div>
				</div>

				<script> 
				$(document).ready(function(){
					$("#toglle_custom_<?php echo $row['id']; ?>").click(function()
					{
					$("#faq-list_pera_<?php echo $row['id']; ?>").slideToggle("fast");
					});
				});
				</script>
				<?php
				}
			}
		}
		else
		{
			$events = 0;
		}
		
	?>
</div>





<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
	

<?php get_footer(); ?>