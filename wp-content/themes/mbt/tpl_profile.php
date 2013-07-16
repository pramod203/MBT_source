<?php
if(!is_user_logged_in())
{
	header("Location: ".esc_url(home_url('/')));
	exit();
}
?>

<?php
/**
 * Template Name: My Profile Page
 */
?>

<?php get_header(); ?>
<div id="body">
<div class="entry1">
<h2 class="ctitle">Welcome to Medical Business Associates</h2>
</div>


<div id="faq-block">
	<?php
		$uid		=  get_current_user_id();	
		$query = mysql_query("SELECT * FROM mbt_faq_subscribe_user where uid='".$uid."'");
		if(mysql_num_rows($query)>0)
		{
			while($result = mysql_fetch_array($query))
			{
				//echo ucfirst($row['description']); 
				$querys = mysql_query("SELECT * FROM mbt_faq_data where id='".$result['cid']."'");
				//$slug = str_replace(' ', '-',strtolower(preg_replace( "#[^a-zA-Z0-9 ]#", "", $row['title'])));
				$row = mysql_fetch_array($querys);
				
				$fromdate = $result['date'];
				$todate = date("y-m-d");
				
				$timestamp_start = strtotime($fromdate);
				$timestamp_end = strtotime($todate);
				$difference = abs($timestamp_end - $timestamp_start); // that's it!	
				$days_diff = floor($difference/(60*60*24));
			
				?>
			
				
				<?php 
				if(mysql_num_rows($querys) > 0 && $days_diff < 7 || $days_diff == 7)
				{
				?>
				<div class="single-faq expand-faq">
				<h4 id="toglle_custom_<?php echo $result['id']; ?>" class="faq-question expand-title"><?php echo ucfirst($row['title']); ?></h4>
				<div id="faq-list_pera_<?php echo $result['id']; ?>" class="faq-answer faq-list_pera_class">
				<p><?php echo $row['description']; ?></p>
				<?php
					echo '<div class="player_opp">'.$row['code'].'</div>';
				?>
				</div>
				</div>
				<?php
				}
				?>
				

				<script> 
				jQuery(document).ready(function(){
					$("#toglle_custom_<?php echo $result['id']; ?>").click(function()
					{
					$("#faq-list_pera_<?php echo $result['id']; ?>").slideToggle("fast");
					});
				});
				</script>
				<?php
			}
		}
		else
		{
			echo '<div style="font:bold 18px/11px arail;color:#4B92AA;padding:20px;">No course available..</div>';
		}
		
	?>
</div>





 </div>   
<?php get_footer(); ?>