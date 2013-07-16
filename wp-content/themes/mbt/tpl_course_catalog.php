<?php
/**
 * Template Name: Course Catalog Page
 */
get_header();
?>

<div id="body">
<div class="entry1">
<h2 class="ctitle">Course Catalog</h2>
<div class="crform">To register for a course or to see a brief description please click on the course title.<br />
	To inquire about other courses or custom course offerings, please fill out our 
	<a href="<?php echo bloginfo('siteurl'); ?>/register">contact request form</a>.<br /><br /></div>
	</div>
<?php

	$mypostsm = get_posts('category=6&numberposts=100000&orderby=post_date&order=ASC');
	$i = 0;
	foreach($mypostsm as $post)
	{
		
		setup_postdata($post);
		?>
		<h4><a style="color:#38A6DD;" href="<?php echo the_permalink(); ?>" ><?php echo the_title(); ?></a></h4>
		
		<?php
		$i++;
	} 
	?>
</div>        
<?php get_footer(); ?>