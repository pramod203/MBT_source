<?php
/*
	Plugin Name: Simple event schedule
	Plugin URI: http://www.yaofong.com/projects/simple-event-schedule
	Description: Plugin for displaying scheduled events
	Author: yaofong
	Version: 0.2
	Author URI: http://www.yaofong.com/portfolio.html
*/

/*  Copyright 2011 yaofong (email : yaofong@hotmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

	function ses_add_new() {
		include('simple_event_schedule_add_new.php');
	}
	
	function ses_list(){
		include('simple_event_schedule_list.php');
	}

	function ses_list_cat(){
		include('faq_cat_add.php');
	}
			
	function ses_admin_actions() {
		$icon_path = get_option('siteurl').'/wp-content/plugins/'.basename(dirname(__FILE__));
		add_menu_page("Event Schedule", "FAQs", "read", "SimpleEventSchedule", "ses_list",$icon_path."/Calendar.png");
		add_submenu_page("SimpleEventSchedule", "Add New FAQ", "Add New FAQ", "read", "SimpleEventScheduleAddNew", "ses_add_new");
		add_submenu_page("SimpleEventSchedule", "FAQ Topics", "FAQ Topics", "read", "faq_cat_add", "ses_list_cat");
	}
	
	global $ses_db_version;
	$ses_db_version = "1.0";
	
	function ses_db_install() {
	   global $wpdb;
	   global $ses_db_version;
	
	   $table_name = $wpdb->prefix . "ses";
	   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
		  
		  $sql = "CREATE TABLE " . $table_name . " (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  eventdate date NOT NULL,
		  eventtime VARCHAR(15) NOT NULL,
		  title VARCHAR(55) NOT NULL,
		  location text NULL,
		  UNIQUE KEY id (id)
		);";
	
		  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		  dbDelta($sql);
	
		  //$rows_affected = $wpdb->insert( $table_name, array( 'time' => current_time('mysql'), 'name' => $welcome_name, 'text' => $welcome_text ) );
	 
		  add_option("ses_db_version", $ses_db_version);
	
	   }
	}
	
	function getevents(){
		$query = mysql_query("SELECT * FROM mbt_ses ORDER BY eventdate");
		if (mysql_num_rows($query)>0){
			while($row = mysql_fetch_assoc($query)){
				$events[] = $row;
			}
			
			$b = time (); 
			$today = date("Y-m-d",$b);
			$html = "<table id=\"timetable\">";
			$html .= "<thead>";
			$html .= "<tr>";
			$html .= "<th>Date</th><th>Time</th><th>Title</th><th>Location</th>";
			$html .= "</tr>";
			$html .= "</thead>";
			$html .= "<tfoot>";
			$html .= "<tr>";
			$html .= "<th>Date</th><th>Time</th><th>Title</th><th>Location</th>";
			$html .= "</tr>";
			$html .= "</tfoot>";
			$html .= "<tbody>";
			foreach($events as $event){
				$when = "";
				if($event['eventdate']==$today){
					$when = "today";
				}elseif($event['eventdate']<$today){
					$when = "past_event";
				}else{
					$when = "future_event";
				}
			$html .= "<tr class=".$when.">";
			$html .= "<td class=\"eventdate\">".$event['eventdate']."</td><td>".$event['eventtime']."</td><td>".$event['title']."</td><td>".$event['location']."</td>";
			$html .= "</tr>";
			}
			$html .= "</tbody>";
			$html .= "</table>";
		}else{
			$html = "Sorry, we are currently updating the timetable.<br>";
		}
		
		if ( current_user_can('manage_options') ) {
			$html .= "<a href=\"".get_settings('siteurl')."/wp-admin/admin.php?page=SimpleEventSchedule\">Update</a>";
		}
		return $html;
	}
	
	function addHeaderCode() {
		 echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/simple-event-schedule/timetable.css" />' . "\n";
	}

	register_activation_hook(__FILE__,'ses_db_install');
	add_action('wp_head', 'addHeaderCode');
	add_action('admin_menu', 'ses_admin_actions');
	add_shortcode('simpleevent', 'getevents');


?>