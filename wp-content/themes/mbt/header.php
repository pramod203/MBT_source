<?php
// $key 		= "CPd5qpFZTvHeGZmpnyGFXUXxImpw7/LJTvKz3fuwaVp6tTG86Z";
// $secret 	= "k377Jk1Gyafi/IMLCRhGTqkqHPP3A6ESmKoX6I5bM4O75ifpcG";
// $timestamp 	= time();
// $order_id 	= 1;
// $destinationid = "812-476-7938";
// $signature 	= hash_hmac('sha1', "{$key}&{$timestamp}&{$order_id}", $secret);
// $url = esc_url( home_url( '/' ) );
?>

<!--form accept-charset="UTF-8" action="https://www.dwolla.com/payment/pay" method="post">
<input id="key" name="key" type="hidden" value="<?php echo $key; ?>" />
<input id="signature" name="signature" type="hidden" value="<?php echo $signature; ?>" />
<input id="callback" name="callback" type="hidden" value="<?php echo $url; ?>" />
<input id="redirect" name="redirect" type="hidden" value="<?php echo $url; ?>redirect" />
<input id="test" name="test" type="hidden" value="true" />
<input id="name" name="name" type="hidden" value="Purchase" />
<input id="description" name="description" type="hidden" value="Description" />
<input id="destinationid" name="destinationid" type="hidden" value="<?php echo $destinationid; ?>" />
<input id="amount" name="amount" type="hidden" value="1.00" />
<input id="shipping" name="shipping" type="hidden" value="0.00" />
<input id="tax" name="tax" type="hidden" value="0.00" />
<input id="orderid" name="orderid" type="hidden" value="<?php echo $order_id; ?>" />
<input id="timestamp" name="timestamp" type="hidden" value="<?php echo $timestamp; ?>" />
<button type="submit">Submit Order</button>
</form--->

<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/liquidcarousel.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo bloginfo('template_url')?>/css/south-street/jquery-ui-1.9.0.custom.css" />
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js" type="text/javascript"></script>
<!--script src="<?php echo get_template_directory_uri(); ?>/js/validation.js" type="text/javascript"></script-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.liquidcarousel.pack.js"></script>


<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/faq.init.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui-1.9.0.custom.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
	
	<!--
		$(document).ready(function() {
			$('#liquid1').liquidcarousel({height:50,padding:0,duration:1200,margin:0, hidearrows:false});
		});
	-->
	</script>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body>

<div class="container">

<!--header_start -->
<div class="header">

<!--head_start -->
<div class="head">

	<div class="logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo bloginfo('template_url'); ?>/images/logo_03.png" />  </a>
    </div>
   	
    <div class="icon">
    <?php  dynamic_sidebar( 'sidebar-6' ); ?>

    </div>
    <div class="login_sec">
    <div class="log">
	<?php
	if ( is_user_logged_in() )
	{
		?>
		<a class="login" href="<?php echo esc_url( home_url( '/' ) ); ?>my-profile">My Account</a> <a class="register" href="<?php echo get_template_directory_uri(); ?>/auth.php?action=logout">Logout</a> 
		<?php
	}
	else
	{
		?>
		<a class="login" href="<?php echo esc_url( home_url( '/' ) ); ?>login">Login</a>
		<a class="register" href="<?php esc_url( home_url( '/' ) ); ?>register">Register</a>
		<?php
	}
	?>
    </div>
    </div>
</div>


	<div class="head_nav">
    <div class="nav">
 
	<?php
			$top_menu_args = array
			(
				'theme_location'  => 'primary',
				'menu'            => 'Top Menu',
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
			wp_nav_menu($top_menu_args);
			?>
	
    </div>
    
    <div class="search">
	<!--script	  src="https://www.dwolla.com/scripts/button.min.js" class="dwolla_button" type="text/javascript"
	  data-key="vqi+z5gG4BdJ9p/i1TdibnJh5tV6YRc9rsRFlQC4yjqMQERvzu"
	  data-redirect="http://192.168.1.220:8086/mbt/thanks"
	  data-label="Pay Now"
	  data-name="Test"
	  data-description="Test Description"
	  data-amount="2"
	  data-type="simple"
	-->
	</script>
    <?php //get_search_form(); ?>

    </div>
  
    </div>
    
	<div class="banner">
   	<?php
			if(function_exists('vslider'))
			{
				vslider('vslider_options');
			}
			?>
    </div>
<!--head_end -->

</div>