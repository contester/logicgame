<?php

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$a  = optional_param('a', 0, PARAM_INT);  // logicgame instance ID

if ($id) {
    if (! $cm = get_coursemodule_from_id('logicgame', $id)) {
        error('Course Module ID was incorrect');
    }

    if (! $course = get_record('course', 'id', $cm->course)) {
        error('Course is misconfigured');
    }

    if (! $logicgame = get_record('logicgame', 'id', $cm->instance)) {
        error('Course module is incorrect');
    }

} else if ($a) {
    if (! $logicgame = get_record('logicgame', 'id', $a)) {
        error('Course module is incorrect');
    }
    if (! $course = get_record('course', 'id', $logicgame->course)) {
        error('Course is misconfigured');
    }
    if (! $cm = get_coursemodule_from_instance('logicgame', $logicgame->id, $course->id)) {
        error('Course Module ID was incorrect');
    }

} else {
    error('You must specify a course_module ID or an instance ID');
}

require_course_login($course);

add_to_log($course->id, 'logicgame', 'view all', "index.php?id=$course->id", '');

if (! $logicgames = get_all_instances_in_course('logicgame', $course)) {
    notice(get_string('thereareno', 'moodle', $strlogicgames), "../../course/view.php?id=$course->id"); //changed
    die;
}

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
			logicgame_b.course = $course->id";

$responses = array() ;
if (!isguestuser() and $allresponses = get_records_sql($sql)) {
	foreach ($allresponses as $ra) {
		$responses[$ra->id] = $ra;
	}
	unset($allresponses);
}

//end Added

$timenow  = time();
$strname  = get_string('name');
$userquery = get_string('userquery', 'logicgame');
$username = get_string('username', 'logicgame');

$table->head  = array ($strname, $username, $userquery);
$table->align = array ('center', 'left');


//Swapped
foreach ($responses as $response) {
	
	if (!empty($response->response)) {
		$fa = $response->response;
	} else {
		$fa = "-";
	}
	
	$currentuser = get_field('user', 'username', 'id', $response->userid);
	
	$table->data[] = array ($logicgames[$response->logicgameid - 1]->name, $currentuser, $fa);
}

//End Swapped	
print_heading($strlogicgames);
print_table($table);

/// Finish the page
print_footer($course);
?>