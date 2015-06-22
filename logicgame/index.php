<?php

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = required_param('id', PARAM_INT);   // course

if (! $course = get_record('course', 'id', $id)) {
    error('Course ID is incorrect');
}

require_course_login($course);

add_to_log($course->id, 'logicgame', 'view all', "index.php?id=$course->id", '');

/// Get all required stringslogicgame

$strlogicgames = get_string('modulenameplural', 'logicgame');
$strlogicgame  = get_string('modulename', 'logicgame');

/// Print the header

$navlinks = array();
$navlinks[] = array('name' => $strlogicgames, 'link' => '', 'type' => 'activity');
$navigation = build_navigation($navlinks);

print_header_simple($strlogicgames, '', $navigation, '', '', true, '', navmenu($course));

/// Get all the appropriate data

if (! $logicgames = get_all_instances_in_course('logicgame', $course)) {
    notice(get_string('thereareno', 'moodle', $strlogicgames), "../../course/view.php?id=$course->id"); //changed
    die;
}

/// Print the list of instances (your module will probably extend this)

//Added
$sql = "SELECT logicgame_a.*
		  FROM {$CFG->prefix}logicgame logicgame_b, {$CFG->prefix}logicgame_responses logicgame_a
			WHERE logicgame_a.logicgameid = logicgame_b.id AND
			logicgame_b.course = $course->id AND logicgame_a.userid = $USER->id";

$responses = array() ;
if (isloggedin() and !isguestuser() and $allresponses = get_records_sql($sql)) {
	foreach ($allresponses as $ra) {
		$responses[$ra->logicgameid] = $ra;
	}
	unset($allresponses);
}

//end Added

$timenow  = time();
$strname  = get_string('name');
$strweek  = get_string('week');
$strtopic = get_string('topic');
$userquery = get_string('userquery', 'logicgame');

if ($course->format == 'weeks') {
    $table->head  = array ($strweek, $strname, $userquery);
    $table->align = array ('center', 'left');
} else if ($course->format == 'topics') {
    $table->head  = array ($strtopic, $strname, $userquery);
    $table->align = array ('center', 'left', 'left', 'left');
} else {
    $table->head  = array ($strname, $userquery);
    $table->align = array ('left', 'left', 'left');
}

//Swapped
foreach ($logicgames as $logicgame) {
	if (!empty($responses[$logicgame->id])) {
		$response = $responses[$logicgame->id];
	} else {
		$response = "";
	}
	
	if (!empty($response->response)) {
		$fa = $response->response;
	} else {
		$fa = "-";
	}
	$printsection = "";
	if ($logicgame->section !== $currentsection) {
		if ($logicgame->section) {
			$printsection = $logicgame->section;
		}
		if ($currentsection !== "") {
			$table->data[] = 'hr';
		}
		$currentsection = $logicgame->section;
	}
	
	//Calculate the href
	if (!$logicgame->visible) {
		$tt_href = "<a class=\"dimmed\" href=\"view.php?id=$logicgame->coursemodule\">".format_string($logicgame->name,true)."</a>";
	} else {
		$tt_href = "<a href=\"view.php?id=$logicgame->coursemodule\">".format_string($logicgame->name,true)."</a>";
	}
	if ($course->format == "weeks" || $course->format == "topics") {
		$table->data[] = array ($printsection, $tt_href, $fa);
	} else {
		$table->data[] = array ($tt_href, $fa);
	}
}
//End Swapped	
print_heading($strlogicgames);
print_table($table);

/// Finish the page
print_footer($course);
?>
