<?php
if (!is_user_logged_in())
{
	header("location:".esc_url( home_url( '/' ) )."wp-login.php");
}
session_start();
$_SESSION['catid'] = $_GET['catid'];
/**
 * Template Name: Register Page
 */
get_header();
?>
<?php
$key 		= "CPd5qpFZTvHeGZmpnyGFXUXxImpw7/LJTvKz3fuwaVp6tTG86Z";
$secret 	= "k377Jk1Gyafi/IMLCRhGTqkqHPP3A6ESmKoX6I5bM4O75ifpcG";
$timestamp 	= time();
$querys = mysql_query("SELECT MAX(id) as mid FROM mbt_faq_subscribe_user");
$mid = mysql_fetch_assoc($querys);
$order_id 	= $mid['mid']+1;
$destinationid = "812-476-7938";//"812-713-9234";//
$signature 	= hash_hmac('sha1', "{$key}&{$timestamp}&{$order_id}", $secret);
$url = esc_url( home_url( '/' ) );
?>
<div id="body">
<div class="entry1">
<h2 class="ctitle">Contact</h2>
<p> Please fill out the form below to contact the Institute about any of our services and/or offerings. </p>
<div id="alert" class="redbold" align="center" name="alert"> </div>

<p>An asterisk(*) denotes a required field.</p>
</div>
<div  id="ragister_page_op" class="ragister_op_one">
<!--form class="form_ragister" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="contactform" onsubmit="return formcheck();"-->
<form accept-charset="UTF-8" action="https://www.dwolla.com/payment/pay" method="post" name="contactform" onsubmit="return formcheck();">
<input id="key" name="key" type="hidden" value="<?php echo $key; ?>" />
<input id="signature" name="signature" type="hidden" value="<?php echo $signature; ?>" />
<input id="callback" name="callback" type="hidden" value="<?php echo $url; ?>" />
<input id="redirect" name="redirect" type="hidden" value="<?php echo $url; ?>redirect" />
<input id="test" name="test" type="hidden" value="true" />
<input id="name" name="name" type="hidden" value="Purchase" />
<input id="description" name="description" type="hidden" value="Description" />
<input id="destinationid" name="destinationid" type="hidden" value="<?php echo $destinationid; ?>" />
<input id="amount" name="amount" type="hidden" value="2.00" />
<input id="shipping" name="shipping" type="hidden" value="0.00" />
<input id="tax" name="tax" type="hidden" value="0.00" />
<input id="orderid" name="orderid" type="hidden" value="<?php echo $order_id; ?>" />
<input id="timestamp" name="timestamp" type="hidden" value="<?php echo $timestamp; ?>" />
<table border="0" cellspacing="0" cellpadding="5" align="center" id='register_table'>
<tbody>
<tr>
<td colspan="2" ></td>
</tr>
<tr>
<td class="formtext" style="width:220px;">Fixed Price:</td>
<td class="stwo">$2</td>
</tr>
<tr>
<td class="formtext">*First and Last Name:</td>
<td><input id="Name" style="width: 200px;" type="text" name="Name" value="" /></td>
</tr>
<tr>
<td class="formtext">*Company:</td>
<td><input id="Company" style="width: 200px;" type="text" name="Company" value="" /></td>
</tr>
<tr>
<td class="formtext">Address:</td>
<td><input style="width: 180px;" type="text" name="Address" value="" /></td>
</tr>
<tr>
<td class="formtext">City:</td>
<td><input style="width: 150px;" type="text" name="City" value="" /></td>
</tr>
<tr>
<td class="formtext">State:</td>
<td><input style="width: 20px;" type="text" name="State" value="" /></td>
</tr>
<tr>
<td class="formtext">Zip:</td>
<td><input style="width: 50px;" type="text" name="Zip" value="" /></td>
</tr>
<tr>
<td colspan="2"></td>
</tr>
<tr>
<td class="formtext">*Phone:</td>
<td><input id="Phone" style="width: 125px;" type="text" name="Phone" value="" /></td>
</tr>
<tr>
<td class="formtext">Mobile:</td>
<td><input style="width: 125px;" type="text" name="Mobile" value="" /></td>
</tr>
<tr>
<td class="formtext">Fax:</td>
<td><input style="width: 125px;" type="text" name="Fax" value="" /></td>
</tr>
<tr>
<td colspan="2"></td>
</tr>
<tr>
<td class="formtext">Website:</td>
<td><input style="width: 150px;" type="text" name="Website" value="" /></td>
</tr>
<tr>
<td class="formtext">*Email:</td>
<td><input id="Email" style="width: 150px;" type="text" name="Email" value="" /></td>
</tr>
<tr>
<td class="formtext" style="vertical-align: top;">*Information Request:</td>
<td>
<table border="0" cellspacing="0" cellpadding="3">
<tbody class="provide">
<tr>
<td id="kol"><input id="information[]" style="border: none;" type="checkbox" name="information[]" value="Provider Training" /> Provider Training</td>
<td id="kol"><input id="information[]" style="border: none;" type="checkbox" name="information[]" value="Employer Training" /> Employer Training</td>
</tr>
<tr>
<td id="kol"><input id="information[]" style="border: none;" type="checkbox" name="information[]" value="Payer Training" /> Payer Training</td>
<td id="kol"><input id="information[]" style="border: none;" type="checkbox" name="information[]" value="Patient Training" /> Patient Training</td>
</tr>
<tr>
<td id="kol"><input id="information[]" style="border: none;" type="checkbox" name="information[]" value="Attorney Training" /> Attorney Training</td>
<td id="kol"><input id="information[]" style="border: none;" type="checkbox" name="information[]" value="Government Training" /> Government Training</td>
</tr>
<tr>
<td id="kol"><input id="information[]" style="border: none;" type="checkbox" name="information[]" value="Faculty" /> Faculty</td>
<td id="kol"><input id="information[]" style="border: none;" type="checkbox" name="information[]" value="Speaking Engagements" /> Speaking Engagements</td>
</tr>
<tr>
<td id="kol"><input id="information[]" style="border: none;" type="checkbox" name="information[]" value="Publications" /> Publications</td>
<td id="kol"><input id="information[]" style="border: none;" type="checkbox" checked="checked" name="information[]" value="Specific Course" /> Specific Course</td>
</tr>
<tr>
<td id="kol"><input id="information[]" style="border: none;" type="checkbox" name="information[]" value="Presentations" /> Presentations</td>
<td id="kol"><input id="information[]" style="border: none;" type="checkbox" name="information[]" value="Other" /> Other</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td class="formtext" colspan="2">Additional Information:</td>
</tr>
<tr>
<td colspan="2"><textarea id="More" name="More"><?php echo $_GET['catid'];//echo str_replace('-',' ',$_GET['catid']); ?>
</textarea></td>
</tr>
<tr>
<td style="text-align: right;" colspan="2">
<!--input class="formbutton" style="margin: 9px 0 0;float:left" type="submit" name="Submit" value="Submit" /-->
<button class="formbutton" style="margin: 9px 0px 0px; float: left; padding: 5px; border-radius: 5px 5px 5px 5px; border: medium none;" type="submit" name="Submit">Submit Order</button>
</td>
</tr>
</tbody>
</table>
</form>
</div>
</div>        
<?php get_footer(); ?>