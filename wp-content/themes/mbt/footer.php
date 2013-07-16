<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	
	<!--footer_start -->
<div class="footer">
			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>
	<div class="copy_right">
    <p>&copy; 2002-2013 Medical Business Associates, Inc.</p>
    <?php
			$footer_menu_args = array
			(
				'theme_location'  => 'primary',
				'menu'            => 'Footer Menu',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id=\"%1$s\" class=\"%2$s\">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu($footer_menu_args);
			?> 
    </div>
    
    <div class="foot">
   <?php  dynamic_sidebar( 'sidebar-7' ); ?>
    </div>
	

</div>
	
</div>

<?php wp_footer(); ?>

</body>
</html>