<?php
// echo '<pre>';
// print_r($_SERVER['REDIRECT_URL'].'?'.$_SERVER['QUERY_STRING']);
// exit;
if(!is_user_logged_in())
{
	header("Location: ".esc_url(home_url('/'))."login?redirect=".$_SERVER['QUERY_STRING']);
	exit();
}
session_start();
$_SESSION['catid'] = $_GET['catid'];
$querys = mysql_query("SELECT MAX(id) as mid FROM mbt_faq_subscribe_user");
$mid = mysql_fetch_assoc($querys);
$order_id 	= $mid['mid']+1;
$url = esc_url( home_url( '/' ) );
/**
 * Template Name: Purchase
 */
?>
<?php get_header(); ?>

<?php

$query = mysql_query("SELECT * FROM mbt_faq_data where id='".$_GET['catid']."'");
$row = mysql_fetch_array($query);

?>
<div id="body">
<div class="entry1">
<h2 class="ctitle"><?php echo $row['title']; ?></h2>
</div>
<p style='width:98%;'><?php echo $row['description']; ?></p>
<div id='ss'>
<script
  src="https://www.dwolla.com/scripts/button.min.js" class="dwolla_button" type="text/javascript"
  data-key="dS/MEab/c/LBA+W7x2w2qLL9lm+QJwtUcPvgxPXO0J6StnBfvF"
  data-redirect="<?php echo $url; ?>/redirect"
  data-label="Checkout With Dwolla"
  data-name="<?php echo $row['title']; ?>"
  data-description="<?php echo 'test'; ?>"
  data-amount="2"
  data-shipping="0"
  data-tax="0"
  data-type="simple"
>
</script>

<form id="frm_paypal" name="frm_paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input name="cmd" type="hidden" value="_xclick" />
<input name="business" type="hidden" value="info@medbizassociates.com" />
<input name="item_name" type="hidden" value="<?php echo $row['title']; ?>" />
<input name="amount" type="hidden" value="2" />
<input name="custom" type="hidden" value="<?php echo $_SESSION['catid']; ?>" />
<input name="currency_code" type="hidden" value="USD" />
<input name="quantity" type="hidden" value="1" />
<input name="return" type="hidden" value="<?php echo $url; ?>redirect" />
<input name="cancel" type="hidden" value="<?php echo $url; ?>cancel" />
<input name="notify_url" type="hidden" value="<?php echo $url; ?>notifyurl" />
<input  style="border: medium none; margin: 0px 0px 0px -5px; width: 208px; height: 50px;" name="submit" type="image" src="https://www.paypalobjects.com/webstatic/mktg/merchant/images/express-checkout-hero.png" />
</form>
</div>
<?php
//https://www.paypal.com/cgi-bin/webscr
//https://www.sandbox.paypal.com/cgi-bin/webscr
?>

<script>
//document.getElementById("frm_paypal").submit();
</script>

<style>
#ss 
{
padding:10px 0;
}
#ss a
{
width:200px;
}

</style>
</div> 
<?php get_footer(); ?>