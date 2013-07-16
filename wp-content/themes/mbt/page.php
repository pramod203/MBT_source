<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	<div id="body">
		<div id="left_menu">	
			<?php
			$left_menu_args = array
			(
				'theme_location'  => 'primary',
				'menu'            => 'Left Menu',
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
			wp_nav_menu($left_menu_args);
			?> 
		</div>

		<div id="page_content">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>
					

				<?php endwhile; // end of the loop. ?>
		</div>
		<div id="right_menu">	
			<?php
			$right_menu_args = array
			(
				'theme_location'  => 'primary',
				'menu'            => 'Right Menu',
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
			wp_nav_menu($right_menu_args);
			?> 
		</div>
	</div>
	

<?php get_footer(); ?>