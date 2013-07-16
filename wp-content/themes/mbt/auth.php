<?php
session_start();
include("../../../wp-config.php");
global $table_prefix;
global $wpdb;

if($_GET['action'] == "logout")
{
	wp_logout();
	header("Location: ".esc_url(home_url('/')));
	exit();
}
if($_POST['action'] == "forgot_password")
{
	$lost_user_email = trim($_POST['lost_user_email']);	
	$result=mysql_query($email_exist);
	if (email_exists($lost_user_email))
	{
		$password=rand();
		$pass_update="update mbt_users set user_pass=md5('".$password."'),user_pass_simple='".$password."' where user_email='".$lost_user_email."'";
		mysql_query($pass_update);
		$sub="your password:";
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		//$headers .= 'From: '.$_POST['c_name'].' <'.$_POST['c_email'].'>' . "\r\n";
		
		mail($lost_user_email, $sub ,$password,$headers);
	}
	else
	{
		header("Location: ".esc_url(home_url('/'))."register?mode=fp&msg=5");
		exit();
	}
}
if($_POST['action'] == "adduser")
{

	$_SESSION['user_fname'] = $_POST['user_fname'];
	$_SESSION['user_lname'] = $_POST['user_lname'];
	$_SESSION['user_email'] = $_POST['user_email'];
	$_SESSION['user_name'] = $_POST['user_email'];

	$user_login = trim($_POST['user_email']);
	$email = trim($_POST['user_email']);
	$pass1 = trim($_POST['user_password']);
	$pass2 = trim($_POST['user_cpassword']);
	$user_login_name = trim($_POST['user_fname'].' '.$_POST['user_lname']);
	if (username_exists($user_login))
	{
		header("Location: ".esc_url(home_url('/'))."register?msg=0");
		exit();
	}
	if (!is_email($email))
	{
		header("Location: ".esc_url(home_url('/'))."register?msg=1");
		exit();
	}
	if (email_exists($email))
	{
		header("Location: ".esc_url(home_url('/'))."register?msg=2");
		exit();
	}
	if($pass1 != $pass2)
	{
		header("Location: ".esc_url(home_url('/'))."register?msg=3");
		exit();
	}
	
	$sql_insert_foruser = "insert into ".$table_prefix."users (user_login,user_pass,user_pass_simple,user_nicename,user_email,user_registered,user_status,display_name)
		values ('".$user_login."','".md5($pass1)."','".$pass1."','".$user_login."','".$email."',now(),'0','".$display_name."') ";

	mysql_query($sql_insert_foruser);
	$lastuserid = mysql_insert_id();
	
	$sql_insert_forusermeta1 = "insert into ".$table_prefix."usermeta " .
			" (user_id,meta_key,meta_value) " .
			" values " .
			" ('".$lastuserid."','first_name','".$_POST['user_fname']."') ";
	mysql_query($sql_insert_forusermeta1);

	$sql_insert_forusermeta2 = "insert into ".$table_prefix."usermeta " .
			" (user_id,meta_key,meta_value) " .
			" values " .
			" ('".$lastuserid."','last_name','".$_POST['user_lname']."') ";
	mysql_query($sql_insert_forusermeta2);

	$sql_insert_forusermeta3 = "insert into ".$table_prefix."usermeta " .
			" (user_id,meta_key,meta_value) " .
			" values " .
			" ('".$lastuserid."','nickname','".$_POST['user_fname']."') ";
	mysql_query($sql_insert_forusermeta3);

	$sql_insert_forusermeta4 = "insert into ".$table_prefix."usermeta " .
			" (user_id,meta_key,meta_value) " .
			" values " .
			" ('".$lastuserid."','rich_editing','true') ";
	mysql_query($sql_insert_forusermeta4);

	$sql_insert_forusermeta5 = "insert into ".$table_prefix."usermeta " .
			" (user_id,meta_key,meta_value) " .
			" values " .
			" ('".$lastuserid."','comment_shortcuts','false') ";
	mysql_query($sql_insert_forusermeta5);

	$sql_insert_forusermeta6 = "insert into ".$table_prefix."usermeta " .
			" (user_id,meta_key,meta_value) " .
			" values " .
			" ('".$lastuserid."','admin_color','fresh') ";
	mysql_query($sql_insert_forusermeta6);

	$cap_array = array('subscriber'=>1);
	$cap_string =serialize($cap_array);

	$sql_insert_forusermeta7 = "insert into ".$table_prefix."usermeta " .
			" (user_id,meta_key,meta_value) " .
			" values " .
			" ('".$lastuserid."','mbt_capabilities','".$cap_string."') ";
	mysql_query($sql_insert_forusermeta7);

	$sql_insert_forusermeta8 = "insert into ".$table_prefix."usermeta " .
			" (user_id,meta_key,meta_value) " .
			" values " .
			" ('".$lastuserid."','mbt_usersettings','m0=c&m1=c&mfold=o') ";
	mysql_query($sql_insert_forusermeta8);

	$sql_insert_forusermeta9 = "insert into ".$table_prefix."usermeta " .
			" (user_id,meta_key,meta_value) " .
			" values " .
			" ('".$lastuserid."','mbt_usersettingstime','".strtotime("now")."') ";
	mysql_query($sql_insert_forusermeta9);
	
	$sql_insert_forusermeta9 = "insert into ".$table_prefix."usermeta " .
			" (user_id,meta_key,meta_value) " .
			" values " .
			" ('".$lastuserid."','show_admin_bar_front','true') ";
	mysql_query($sql_insert_forusermeta9);
	
	$res1 = "select * from mbt_users where ID='".$lastuserid."' ";
	$res = mysql_query($res1);
	$get_row = mysql_fetch_array($res);
	if(user_pass_ok($get_row['user_login'],$get_row['user_pass_simple']) == 1)
	{
		$creds = array();
		$creds['user_login'] = $get_row['user_login'];
		$creds['user_password'] = $get_row['user_pass_simple'];
		$creds['remember'] = false;
		wp_signon($creds, false);
		

		session_unset($_SESSION['user_fname']);
		session_unset($_SESSION['user_lname']);
		session_unset($_SESSION['user_email']);
		session_unset($_SESSION['user_name']);
	
				
		?>
		<script>
			window.location.href = "<?php echo esc_url(home_url('/'))?>my-profile";
		</script>
		<?php
		exit();
	}
}



if($_POST['action'] == "checkuser")
{
	$_SESSION['login_username'] = $_POST['login_username'];
	$login_username = trim($_POST['login_username']);
	$login_password = trim($_POST['login_password']);
	$redirect = '&redirect='.$_POST['redirect'];

	if($login_username == "")
	{
		header("Location: ".esc_url(home_url('/'))."login?msg=0".$redirect);
		exit();
	}
	if($login_password == "")
	{	
		header("Location: ".esc_url(home_url('/'))."login?msg=1".$redirect);
		exit();
	}
	
	$res1 = "select * from mbt_users where user_login='".$login_username."'";
	$res = mysql_query($res1);
	$get_row = mysql_fetch_array($res);
	$z = mysql_num_rows($res);
	if($z > 0)
	{
	
		if(user_pass_ok($login_username,$login_password) == 1)
		{
			session_unset($_SESSION['user_type']);
			session_unset($_SESSION['user_email']);
			session_unset($_SESSION['user_name']);

			$creds = array();
			$creds['user_login'] = $login_username;
			$creds['user_password'] = $login_password;
			$creds['remember'] = false;
			wp_signon($creds, false);
			if(user_pass_ok($login_username,$login_password) == 1)
			{
				if($_POST['redirect'] != '')
				{
					header("Location: ".esc_url(home_url('/')).'purchase?'.$_POST['redirect']);
				}
				else
				{
					header("Location: ".esc_url(home_url('/')).'my-profile');
				}
				exit();
			}
				
		}
		else
		{
			header("Location: ".esc_url(home_url('/'))."login?msg=2".$redirect);
			exit();
		}
	}
	else
	{
		header("Location: ".esc_url(home_url('/'))."login?msg=2".$redirect);
		exit();
	}
}







?>