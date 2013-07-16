<?php
	$cid = $_GET['cid']; 
	$url = plugins_url().'/simple-event-schedule';
	
	if($_POST['submit'])
	{
		$name = $_POST['tag-name'];
		$description = $_POST['description'];
		$slug = str_replace(' ', '-',strtolower(preg_replace( "#[^a-zA-Z0-9 ]#", "", $_POST['tag-name'])));
		 mysql_query("INSERT INTO mbt_faq_cat_c (name, description,slug) VALUES ('".$name."','".$description."','".$slug."')");
	}
	
	if($_POST['update'])
	{
		$name = $_POST['tag-name'];
		$description = $_POST['description'];
		$slug = str_replace(' ', '-',strtolower(preg_replace( "#[^a-zA-Z0-9 ]#", "", $_POST['tag-name'])));
		mysql_query("update mbt_faq_cat_c set name='".$name."', description='".$description."', slug='".$slug."' where id='".$cid."'");
	}
	
	if($cid != '' && $_GET['mode'] == 'del')
	{
		mysql_query("DELETE FROM mbt_faq_cat_c WHERE id='".$cid."'");
	}
	
	if($_POST['del'])
	{
		foreach($_POST['delete_tags'] as $cid){
			mysql_query("DELETE FROM mbt_faq_cat_c WHERE id='".$cid."'");
		}
	}
	
	
?>
<link rel='stylesheet' id='colors-css'  href='<?php echo $url; ?>/timetable.css' type='text/css' media='all' />

<div class="wrap nosubsub">
<div id="icon-edit_me"></div></div><h2>FAQ Topics</h2>
<div id="ajax-response"></div>
<br class="clear">
<div id="col-container">
<div id="col-right">
<div class="col-wrap">
<form method="post" action="" id="posts-filter">
<div class="tablenav top">
<div class="alignleft actions"></div>
<div class="tablenav-pages one-page"></div>
<br class="clear">
</div>
<table cellspacing="0" class="wp-list-table widefat fixed tags">
	<thead>
	<tr>
		<th style="" class="manage-column column-cb check-column" id="cb" scope="col">
		<label for="cb-select-all-1" class="screen-reader-text">Select All</label>
		<input type="checkbox" id="cb-select-all-1">
		</th>
		<th style="" class="manage-column column-name sortable desc" id="name" scope="col">
			<a href="#"><span>Name</span><span class="sorting-indicator"></span></a>
		</th>
		<th style="" class="manage-column column-description sortable desc" id="description" scope="col">
			<a href="#"><span>Description</span><span class="sorting-indicator"></span></a>
		</th>
		<th  class="manage-column column-posts num sortable desc" id="posts" scope="col">
			<a href="#"><span>FAQs</span><span class="sorting-indicator"></span></a>
		</th>	
	</tr>
	</thead>

	<tfoot>

	</tfoot>

	<tbody data-wp-lists="list:tag" id="the-list">
	<?php
	$query = mysql_query("SELECT * FROM mbt_faq_cat_c");
		if (mysql_num_rows($query) >0)
		{
			while($row = mysql_fetch_assoc($query))
			{
				
			?>
			<tr class="alternate" id="tag-<?php echo $row['id']; ?>">
				<th class="check-column" scope="row">
				<input type="checkbox" id="cb-select-<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>" name="delete_tags[]">
				</th>
				<td class="name column-name">
				<strong><a title="Edit “Course Catalog Category”" href="#" class="row-title"><?php echo $row['name']; ?></a></strong><br>
				<div class="row-actions">
					<span class="edit">
						<a href="admin.php?page=faq_cat_add&cid=<?php echo $row['id']; ?>&mode=edit">Edit</a> | <span class="delete"><a href="admin.php?page=faq_cat_add&cid=<?php echo $row['id']; ?>&mode=del" class="delete-tag">Delete</a>
					</span>
				</div>
				</td>
				<td class="description column-description"><?php echo $row['description']; ?></td>
				<td style="text-align:left;padding:0 0 0 2%;" class="posts column-posts"><a href="#">0</a></td>
			</tr>	
			<?php
			}
			
		}
		else
		{
		?>
			<tr class="alternate" id="tag" >
				<th class="check-column" scope="row" colspan="4" style="text-align:center">
				You have not added any Topic.
				</th>
				</tr>	
			<?php
		}
	?>
	</tbody>
</table>
	<div class="tablenav bottom">
	<div class="alignleft actions"><input type="submit" value="Delete" class="button action" id="doaction" name="del"></div>
	<div class="tablenav-pages one-page"><span class="displaying-num"></span></div>
	<br class="clear">
	</div>

<br class="clear">
</form>

</div>
</div><!-- /col-right -->


<?php
$query = mysql_query("SELECT * FROM mbt_faq_cat_c where id='".$cid."'");
$row = mysql_fetch_assoc($query);
?>




<div id="col-left">
<div class="col-wrap">
<div class="form-wrap">
<h3>FAQ Topics</h3>
	<form class="validate" action="" method="post" id="addtag">
	<div class="form-field form-required">
		<label for="tag-name">Name</label>
		<input type="text" aria-required="true" size="40" value="<?php echo $row['name']; ?>" id="tag-name" name="tag-name">
		<p>The name is how it appears on your site.</p>
	</div>
	<div class="form-field">
		<label for="tag-description">Description</label>
		<textarea cols="40" rows="5" id="tag-description" name="description"><?php echo $row['description']; ?></textarea>
		<p>The description is not prominent by default; however, some themes may show it.</p>
	</div>
	<p class="submit">
	<?php 
	if($cid != '' && $_GET['mode'] == 'edit')
	{
		$b =  'update';
		$bname =  'Update';
	}
	else
	{
		$b = 'submit';
		$bname =  'Add new';
	}
	?>
	<input type="submit" value="<?php echo $bname;?> FaQ" class="button button-primary" id="submit" name="<?php echo $b; ?>">
	</p>
	</form>
</div>

</div>
</div><!-- /col-left -->

</div><!-- /col-container -->
</div>