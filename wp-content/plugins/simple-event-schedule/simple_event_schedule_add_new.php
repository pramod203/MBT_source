<?php
	$fid = $_GET['fid']; 
	$url = plugins_url().'/simple-event-schedule';
	if($_POST['submit'])
	{	
		$catids = '';
		foreach($_POST['catids'] as $id)
		{
			$catids .= ','.$id;
		}
		
		$title = $_POST['post_title'];
		$description = $_POST['editor'];
		$code = $_POST['code'];
		$catids = substr($catids,1);
		
		mysql_query("INSERT INTO mbt_faq_data (title, description,catids,code) VALUES ('".$title."','".$description."','".$catids."','".$code."')");
		$id = mysql_insert_id();	
	}
	
	if($_POST['update'])
	{
		$catids = '';
		foreach($_POST['catids'] as $id)
		{
			$catids .= ','.$id;
		}
		$title = $_POST['post_title'];
		$description = $_POST['editor'];
		$catids = substr($catids,1);
		$code = $_POST['code'];
		 mysql_query("update mbt_faq_data set title='".$title."', description='".$description."', catids='".$catids."', code='".$code."' where id='".$fid."'");
	}

	
	
	$querys = mysql_query("SELECT * FROM mbt_faq_data where id='".$fid."'");
	$rows = mysql_fetch_assoc($querys);
?>
<link rel='stylesheet' id='colors-css'  href='<?php echo $url; ?>/timetable.css' type='text/css' media='all' />

<div class="wrap">
<div id="icon-edit_me"><br></div><h2>Add New FAQ</h2>
<form id="post" method="post" action="" name="post" enctype="multipart/form-data">
<div id="poststuff">
<div class="metabox-holder columns-2" id="post-body">
<div id="post-body-content">
<div id="titlediv">
<div id="titlewrap" >	
	<input type="text" autocomplete="off" id="title" onfocus="if(this.value=='Enter Question Title Here') this.value='';" onblur="if(this.value=='') this.value='Enter Question Title Here';" value="<?php if($rows['title'] != ''){ echo $rows['title']; }else { echo 'Enter Question Title Here';} ?>" size="30" name="post_title" >
</div>

<div class="inside">
	<div class="hide-if-no-js" id="edit-slug-box">
		</div>
</div>
</div><!-- /titlediv -->
<div class="postarea" id="postdivrich">
<?php 

$args = array(
    'textarea_rows' => 15,
    'teeny' => true,
    'quicktags' => true,
	'media_buttons' => false
);

echo wp_editor( $rows['description'], 'editor', $args ); 

?>
<table cellspacing="0" id="post-status-info"><tbody><tr>
	<td id="wp-word-count">Word count: <span class="word-count">0</span></td>
	<td class="autosave-info">
	<span class="autosave-message">&nbsp;</span>
	</td>
</tr></tbody></table>

</div>

</div><!-- /post-body-content -->

<div class="postbox-container" id="postbox-container-1">
<div class="meta-box-sortables ui-sortable" id="side-sortables">
		
		
		
	<!----------------PUBLISH-------------->		
		<div class="postbox " id="submitdiv">
		<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>Publish</span></h3>
			<div class="inside">
			<div id="submitpost" class="submitbox">
				<div id="major-publishing-actions">
				<div id="publishing-action">
				<?php 
					if($fid != '' && $_GET['mode'] == 'edit')
					{
						$b =  'update';
						$bname =  'Update';
					}
					else
					{
						$b = 'submit';
						$bname =  'Publish';
					}
				?>
				<input type="submit" accesskey="p" value="<?php echo $bname;?>" class="button button-primary button-large" id="publish" name="<?php echo $b;?>"></div>
				<div class="clear"></div>
				</div>
			</div>
			</div>
		</div>
		
		
		<div id="submitdiv" class="postbox ">
		<div class="handlediv" title="Click to toggle"><br></div><h3 class="hndle"><span>PPT/Audio</span></h3>
			<div class="inside">
			<div class="submitbox" id="submitpost">
				<div id="major-publishing-actions">
				<div id="publishing-action" style="float:none;">
				<textarea name='code' style="width: 257px;"><?php echo $rows['code']; ?></textarea>
				
				</div>
				<div class="clear"></div>
				</div>
			</div>
			</div>
		</div>
		
		
		
		
		
	<!----------------FAQ CAT-------------->	
		<div class="postbox " id="faq-topicdiv">
			<div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>FAQ Topics</span></h3>
			<div class="inside">
				<div class="categorydiv" id="taxonomy-faq-topic">
				<ul class="category-tabs" id="faq-topic-tabs"><li class="tabs"><a href="#faq-topic-all">All FAQ Topics</a></li></ul>
				<div class="tabs-panel" id="faq-topic-pop">
					<ul class="categorychecklist form-no-clear" id="faq-topicchecklist-pop">	
					<?php
					$catids = $rows['catids'];
					$catids = explode(',',$catids);
					
					$query = mysql_query("SELECT * FROM mbt_faq_cat_c");
					if (mysql_num_rows($query) >0)
					{
						while($row = mysql_fetch_assoc($query))
						{
							if (in_array($row['id'],$catids))
							{
								?>
								<li>
									<label class="selectit">
									<input id='checkcat' type="checkbox" checked="checked" value="<?php echo $row['id']; ?>" name='catids[]'>
									<?php echo ucfirst($row['name']); ?>
									</label>
								</li>
								<?php
							}
							else
							{
								?>
								<li>
									<label class="selectit">
									<input id='checkcat' type="checkbox"  value="<?php echo $row['id']; ?>" name='catids[]'>
									<?php echo ucfirst($row['name']); ?>
									</label>
								</li>
								<?php
							}
						}
					}
					?>
					</ul>
				</div>
				<div class="wp-hidden-children" id="faq-topic-adder">
					<h4><a class="hide-if-no-js" href="admin.php?page=faq_cat_add" id="faq-topic-add-toggle">+ Add New FAQ Topics</a></h4>
				</div>
				</div>
			</div>
		</div>
		
		
		
</div>
</div>
</div><!-- /post-body -->
<br class="clear">
</div><!-- /poststuff -->
</form>
</div>






















<!--div class="wrap">
<div id="icon-edit_me"></div><h2>FAQ</h2>

    <h2>Add FAQ</h2>
    <br />
    <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <?php
		// $category_ids = get_all_category_ids();
		// foreach($category_ids as $cat_id) 
		// {
		  // $cat_name = get_cat_name($cat_id);
		  // echo $cat_id . ': ' . $cat_name;
		// }
		?>
		
		
		
		<ul>
	        <li><label for="title">Title<span> *</span>: </label>
            <input type="text" id="title" name="title" value="" /></li>    
            
            <li><label for="eventdate">Date<span> *</span>: </label>
            day<input type="text" id="day" name="day" maxlength="2" size="2" value="" /> month<input type="text" id="month" name="month" maxlength="2" size="2" value="" /> year<input type="text" id="year" name="year" maxlength="4" size="4" value="" /></li>
     
            <li><label for="starttime">Time<span> *</span>: </label>
            <input type="text" id="sh" name="sh" maxlength="2" size="2" value="" />:<input type="text" id="sm" name="sm" maxlength="2" size="2" value="" /> ~ <input type="text" id="eh" name="eh" maxlength="2" size="2" value="" />:<input type="text" id="em" name="em" maxlength="2" size="2" value="" /></li>

            <li><label for="location">Location: </label>
			<input type="text" id="location" name="location" size="50" value="" /></li>
			</li>
        </ul>
        <br />
        <input type="submit" name="add" class="button-primary" value="Add"/>
    </form>
    <?php if($updated): ?>
    <div class="updated">Event added to <a href="<?php echo get_settings('siteurl')."/wp-admin/admin.php?page=SimpleEventSchedule"; ?>">here</a></div>
    <?php endif; ?>
</div-->