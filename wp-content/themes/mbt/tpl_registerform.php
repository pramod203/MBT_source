<?php
session_start();
if(is_user_logged_in())
{
	header("Location: ".esc_url(home_url('/')."my-profile"));
	exit();
}
/**
 * Template Name: Register Page
 */
get_header();
?>
<?php
$messages_register[0] = "This username is already registered";
$messages_register[1] = "The email address is not correct";
$messages_register[2] = "This email is already registered";
$messages_register[3] = "Passwords are not match";
$messages_register[5] = "Email does not exits!";
?>
<div id="body">
<div class="entry1">
<h2 class="ctitle">Registration Form</h2>
<?php
if($_GET['msg'] != "")
{
	echo "<div id='alert' class='redbold' align='center' name='alert'>".$messages_register[$_GET['msg']]."</div>";
}
?>
</div>
<div  id="ragister_page_op" class="ragister_op_one">
<!--form class="form_ragister" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="contactform" onsubmit="return formcheck();"-->
<form action="<?php echo get_template_directory_uri(); ?>/auth.php" method="post" name="registration_form" id="registration_form" >
<input type="hidden" name="action" id="action" value="adduser" />
<table border="0" cellspacing="0" cellpadding="5" align="center" id='register_table'>
<tbody>
<tr>
<td colspan="2" ></td>
</tr>
<tr>
<td class="formtext"><span class="required">*</span>First Name:</td>
<td><input class="required" type="text" name="user_fname" id="user_fname" value="<?php echo $_SESSION['user_fname']; ?>" /></td>
</tr>
<tr>
<td class="formtext"><span class="required">*</span>Last Name:</td>
<td><input class="required" type="text" name="user_lname" id="user_lname" value="<?php echo $_SESSION['user_lname']; ?>" /></td>
</tr>
<tr>
<td class="formtext"><span class="required">*</span>Email:</td>
<td><input class="required email" type="text" name="user_email" id="user_email" value="<?php echo $_SESSION['user_email']; ?>" /></td>
</tr>
<tr>
<td class="formtext"><span class="required">*</span>Password:</td>
<td><input class="required" type="password" style="width:320px" name="user_password" id="user_password" minlength="6" /></td>
</tr>
<tr>
<td class="formtext"><span class="required">*</span>Confirm Password:</td>
<td><input class="required" type="password" style="width:320px" name="user_cpassword" id="user_cpassword" minlength="6" /></td>
</tr>
<tr>
<td style="text-align: right;" colspan="2"><input type="submit" name="register" value="Register" /></td>
</tr>
</tbody>
</table>
</form>
</div>
</div>      

<script type="text/javascript">
	jQuery("#registration_form").validate(
	{
		rules:
		{
			user_cpassword:
			{
				equalTo: "#user_password"
			}
		}
	});
</script>  
<?php get_footer(); ?>