<?php
/**
 * Template Name: Home Page
 */
get_header();
?>
<div id="body_home">
<div class="top_sec">
    
    <div class="Register">
    <div class="Register_text">
    <h1>Course Catalog</h1>
    <p>There are currently no courses available for open
     enrollment at this time. Please review our <a href="<?php echo bloginfo('siteurl'); ?>/course-catalog">course catalog</a>
      for more information on any of our specific courses. </p>
    </div>
    
    <a href="<?php echo bloginfo('siteurl'); ?>/course-catalog"><div class="learn"><p>Learn More</p></a></div>    
    </div>
    
    
     <div class="Register">
    <div class="Register_text">
    <h1>Popular Topics</h1>
    <p>Please click on the category title for a list of the available course offerings.
To inquire about courses or custom course offerings, please fill out our <a href="<?php echo bloginfo('siteurl'); ?>/register">contact request form.</a></p>
    </div>
    
    <a href="#">
    <div class="learn">
    <p>Learn More</p>
    </a> 
    </div>    
    </div>
    
    
    
     <div class="Register">
    <div class="Register_text">
    <h1>Register for Courses</h1>
    <div class="link">
    <ul >
    <li><a href="#">Continuing Legal Education</a></li>
    <li><a href="#">Healthcare Fraud Auditing and Detection</a></li>
    <li><a href="#">Electronic Health Records: Audit and</a></li>
    <li><a href="#"> Internal Control</a></li>
    </ul>
    </div>
    </div>
    
    <a href="<?php echo bloginfo('siteurl'); ?>/register">
    <div class="learn">
    <p>Learn More</p>
    </a> 
    </div>    
    </div>
    



	<?php
	/*$mypostsm = get_posts('category=2&numberposts=3&orderby=post_date&order=DESC');
	$i = 0;
	foreach($mypostsm as $post)
	{
		setup_postdata($post);
		?>
			<div class="Register">
				<div class="Register_text">
					<h1 class='post_heading'><a href="<?php echo the_permalink(); ?>" ><?php echo the_title(); ?></a></h1>
					<?php echo the_excerpt(); ?>	
				</div>
				<a href="<?php echo the_permalink(); ?>"><div class="learn"><p>Learn More</p></div></a> 
			</div>
		<?php
		$i++;
	} */
	?>
</div>
<div class="second_sec">
   <div class="upcoming">
   <h1>Upcoming Presentations</h1>
   <p>To inquire about booking a presentation at your next event, please fill out our <a href="<?php echo bloginfo('siteurl'); ?>/contact">contact request form.</a></p>
   </div>
		<?php 
		$sql = "Select * from mbt_simple_events";
		$sql_result = mysql_query($sql);
		?>   
		<div id="liquid1" class="liquid">
			<span class="previous"></span>
			<div class="wrapper_slider">
			<ul>
				<?php while($row = mysql_fetch_array($sql_result))
				{ 
				$year = date('Y',$row['event_start']);
				$day = date('d',$row['event_start']);
				$month = date('M',$row['event_start']);
				?>
					<li style="margin:0;">
						<div class="play_img">
						   <div class="april"><h1><?php echo $month; ?> </h1><h2><?php echo $year; ?></h2></div>
						   <div class="ten"><h3><?php echo $day; ?></h3></div>
						</div>
						<div class="play_txt">
							
							<div class="city"> 
								<p>Title:  "<?php 
											if(strlen(strip_tags($row['event_title'])) > 50)
											{
												echo strip_tags(substr($row['event_title'],0,50))."...";
											}
											else
											{
												echo $row['event_title'];
											} 
								 ?>"</p>
								<h1> City: </h1> <h2><?php echo $row['city']; ?></h2>
							</div>
							<div class="website"><h1> Website: </h1> <a href="<?php echo $row['website']; ?>"><?php echo $row['website']; ?> </a></div>
						</div>
					</li>
				<?php 
				} 
				?>
			</ul>
			</div>
			<span class="next"></span> 
		</div>
	
</div> 
			
<div class="third_sec">
   <div class="news">
   <a href="<?php echo bloginfo('siteurl'); ?>/newsletter">
   <ul>
   <li>Newsletter</li><li><img src="<?php echo bloginfo('template_url'); ?>/images/icon_link_13.png" /></li>
   </ul>
   </a>
   
    <a href="<?php echo bloginfo('siteurl'); ?>/calendar">
   <ul>
   <li>Calendar</li><li><img src="<?php echo bloginfo('template_url'); ?>/images/third_13.png" /></li>
   </ul>
   </a>
   
   <a href="<?php echo bloginfo('siteurl'); ?>/publications">
   <ul>
   <li>Publications</li><li><img src="<?php echo bloginfo('template_url'); ?>/images/third_15.png" /></li> 
   </ul>
   </a>
   
    <a href="<?php echo bloginfo('siteurl'); ?>/contact">
   <ul>
   <li>Contact</li><li><img src="<?php echo bloginfo('template_url'); ?>/images/third_17.png" /></li> 
   </ul>
   </a>
   </div>
   </div>
</div>        
<?php get_footer(); ?>