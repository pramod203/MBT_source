<?php
if(is_user_logged_in())
{
	header("Location: ".esc_url(home_url('/')."my-profile"));
	exit();
}
?>
<?php
/**
 * Template Name: Login Page
 */
?>
<?php get_header(); ?>
<div id="body">
<div class="entry1">
<h2 class="ctitle">Login Form</h2>
</div>
<?php
global $user_ID;
global $user_login;
$messages_login[0] = "Please enter username";
$messages_login[1] = "Please enter password";
$messages_login[2] = "Login failed!";
$messages_login[3] = "Password successfully changed please log in again with new password.";
?>

<?php while ( have_posts() ) : the_post(); ?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
<?php endwhile; ?>

<div  id="ragister_page_op" class="ragister_op_one">
	<form action="<?php echo get_template_directory_uri(); ?>/auth.php" method="post" name="loginform" id="loginform">
		<?php
		if($_GET['msg'] != "")
		{
			echo "<div class='server_validation'>".$messages_login[$_GET['msg']]."</div>";
		}
		?>
		<input type="hidden" name="action" id="action" value="checkuser" />
		<table border="0" cellspacing="0" cellpadding="5" align="center" id='register_table'>
			<tr>
				<td class="formtext"><span class="required">*</span>Username:</td>
				<td>
					<input type="text" name="login_username" id="login_username" class="required" />
					<input type="hidden" name="redirect" id="redirect" value='<?php echo $_GET['redirect']; ?>' />
				<td>
			</tr>
			<tr>
				<td class="formtext"><span class="required">*</span>Password:</td>
				<td>
					<input type="password" style="width:320px" name="login_password" value="" class="required" />
				<td>
			</tr>
			<tr>
				<td style="text-align: right;" colspan="2">
					<input type="submit" value="Submit" name='submit' />
				<td>
			</tr>
		</table>
	</form>
</div>





</div>

<script type="text/javascript">
	jQuery("#loginform").validate();
</script>

<?php get_footer(); ?>