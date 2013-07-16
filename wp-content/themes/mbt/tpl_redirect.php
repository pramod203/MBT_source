<?php
session_start();
/**
 * Template Name: Redirect
 */
get_header();
?>
<div id="body_home">
<div class="top_sec">

<?php
// Array
// (
    // [signature] => 078cd67a48aac9011dc65a873a9195d3a19f2cde
    // [orderId] => 1
    // [amount] => 1.00
    // [checkoutId] => 77275544-1cb8-431b-9843-553bc1a0ac40
    // [status] => Completed
    // [clearingDate] => 1/1/1970 12:00:00 AM
    // [postback] => success
    // [test] => true
// )
//529189825W812454W
	// echo '<pre>';
	// print_r($_SESSION);
	// print_r($_REQUEST); 
	// echo '</pre>';

	if($_REQUEST['error'] == 'failure')
	{
		$msg = $_REQUEST['error_description'];
	}
	
	
	
	if($_REQUEST['txn_id'] != '')
	{
	
		$orderid 	= $_REQUEST['txn_id'];
		$checkoutid = $_REQUEST['txn_id'];
		$uid		=  get_current_user_id();
		$cid 		= $_REQUEST['custom'];	
		$date		=  date("y-m-d");
		$str = "INSERT INTO mbt_faq_subscribe_user (uid, orderid, checkoutid,  date, cid) VALUES ('".$uid."','".$orderid."','".$checkoutid."','".$date."','".$cid."')";	
		$res = mysql_query($str);
		// echo $str;
		// exit;
		$msg = "Thanks for register..";
	
	}


	
	if($_REQUEST['status'] == 'Completed')
	{
		$orderid 	= $_REQUEST['orderId'];
		$checkoutid = $_REQUEST['checkoutId'];
		$uid		=  get_current_user_id();
		$cid 		= $_SESSION['catid'];	
		$date		=  date("y-m-d");
		mysql_query("INSERT INTO mbt_faq_subscribe_user (uid, orderid, checkoutid, txn_id, date, cid) VALUES ('".$uid."','".$orderid."','".$checkoutid."','".$date."','".$cid."')");	
		$msg = "Thanks for register..";
	
	}
		echo '<div style="margin: 0px 0px 0px 31px; font: bold 14px/16px arial; color: #187493;">'.$msg.'</div>';
?>     


<?php get_footer(); ?>