<?php
	/*if($_POST['add']){
		$error = 0;
		if($_POST['title']==""||$_POST['day']==""||$_POST['month']==""||$_POST['year']==""||$_POST['sh']==""||$_POST['sm']==""||$_POST['eh']==""||$_POST['em']==""){
			$error = 1;
		}else{
			$eventdate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
			$eventtime = $_POST['sh'].':'.$_POST['sm'].' - '.$_POST['eh'].':'.$_POST['em'];
			$eventtitle = $_POST['title'];
			$eventlocation = $_POST['location'];
			
			mysql_query("INSERT INTO wp_ses (title, eventdate, eventtime, location) VALUES ('$eventtitle','$eventdate', '$eventtime', '$eventlocation')");
		}
	}*/
	
	if($_POST['del']){
		foreach($_POST['delete'] as $id){
			mysql_query("DELETE FROM mbt_faq_data WHERE id='$id'");
		}
	}
	function get_simple_event_schedule(){
		$query = mysql_query("SELECT * FROM mbt_faq_data");
		if (mysql_num_rows($query)>0){
			while($row = mysql_fetch_assoc($query)){
				$events[] = $row;
			}
			
		}else{
			$events = 0;
		}
		return $events;
	}
	$events = get_simple_event_schedule();
	$url = plugins_url().'/simple-event-schedule';
?>
<link rel='stylesheet' id='colors-css'  href='<?php echo $url; ?>/timetable.css' type='text/css' media='all' />

<div class="wrap">
<div id="icon-edit_me"></div><h2>FAQs  <a href="<?php echo get_settings('siteurl')."/wp-admin/admin.php?page=SimpleEventScheduleAddNew"; ?>" class="button-secondary">Add New</a></h2>
<p></p>
<form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <table class="widefat tablenav-pages">
    	<thead>
    		<tr>
        		<th>Delete</th><th>Title</th><th>Description</th><th>Topics</th><th>Action</th>
        	</tr>
	    </thead>
        <tfoot>
        	<tr>
        		<th>Delete</th><th>Title</th><th>Description</th><th>Topics</th><th>Action</th>
        	</tr>
        </tfoot>
        <tbody>
        <?php if($events=="0")
		{ 
		?>
        	<tr>
            	<td colspan="5" align="center"><h4>You have not added any FAQs.</h4></td>
            </tr>
        <?php 
		}
		else
		{ 
		foreach($events as $event)
			{
			?>
	        <tr>
            	<td><input type="checkbox" name="delete[]" value="<?php echo $event['id'];?>" /></td>
				<td style="font-weight:bold"><a style='text-decoration:none;border:none;font-weight:bold' href="admin.php?page=SimpleEventScheduleAddNew&fid=<?php echo $event['id']; ?>&mode=edit"><?php echo ucfirst($event['title']); ?></a></td>
				<td >
				<?php 
					if(strlen(strip_tags($event['description'])) > 60)
					{
						echo strip_tags(substr($event['description'],0,60))."..";
					}
					else
					{
						echo strip_tags($event['description']);
					} 
				?>
				</td>
				<td>
				<?php 
				$cname ='';
				$cids = explode(',',$event['catids']);
				foreach($cids as $cid)
				{
					$querys = mysql_query("SELECT * FROM mbt_faq_cat_c where id='".$cid."'");
					$rows = mysql_fetch_assoc($querys);
					$cname .= ', '.ucfirst($rows['name']);
				}
				$cname = substr($cname,1);
				echo $cname;
				?>
				</td>
				<td><a style='text-decoration:none;border:none;font-weight:normal' href="admin.php?page=SimpleEventScheduleAddNew&fid=<?php echo $event['id']; ?>&mode=edit">Edit</a></td>
            </tr>
			<?php
			}
		} 
		?>
        </tbody>
    </table>
    <br />
    <input type="submit" name="del" class="button-primary" value="Delete" />
</form>