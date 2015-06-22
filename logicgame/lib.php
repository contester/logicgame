<?php 

$logicgame_EXAMPLE_CONSTANT = 42; 

function logicgame_add_instance($logicgame) {

    $logicgame->timecreated = time();

    return insert_record('logicgame', $logicgame);
}

function logicgame_update_instance($logicgame) {

    $logicgame->timemodified = time();
    $logicgame->id = $logicgame->instance;

    return update_record('logicgame', $logicgame);
}

function logicgame_delete_instance($id) {

    if (!$logicgame = get_record('logicgame', 'id', $id)) {
        return false;
    }

    $result = true;

    if (!delete_records('logicgame', 'id', $logicgame->id)) {
        $result = false;
    }

    return $result;
}

function logicgame_user_outline($course, $user, $mod, $logicgame) {
     	if ($response = get_record('logicgame_responses', "logicgameid", $logicgame->id, "userid", $user->id)) {
		$result->info = "'".$response->response."'";
		$result->time = $response->timemodified;
		return $result;
	}
	else {
		return NULL;
	}
}

function logicgame_print_recent_activity($course, $isteacher, $timestart) {
    return false;  //  True if anything was printed, otherwise false
}

function logicgame_cron () {
    return true;
}

function logicgame_get_participants($logicgameid) {
    return false;
}

function logicgame_scale_used($logicgameid, $scaleid) {
    $return = false;
    $rec = get_record("logicgame","id","$logicgameid","scale","-$scaleid");
    
    if (!empty($rec) && !empty($scaleid)) {
        $return = true;
    }
    return $return;
}

function logicgame_scale_used_anywhere($scaleid) {
    if ($scaleid and record_exists('logicgame', 'grade', -$scaleid)) {
        return true;
    } else {
        return false;
    }
}

function logicgame_install() {
    return true;
}

function logicgame_uninstall() {
    return true;
}

function logicgame_reset_course_form_definition(&$mform) {
    $mform->addElement('header', 'logicgameheader', get_string('modulenameplural', 'logicgame'));
    $mform->addElement('advcheckbox', 'reset_logicgame', get_string('removeresponses','logicgame'));
}

function logicgame_reset_course_form_defaults($course) {
    return array('reset_logicgame'=>1);
}

function logicgame_reset_userdata($data) {
    global $CFG;

    $componentstr = get_string('modulenameplural', 'logicgame');
    $status = array();

    if (!empty($data->reset_logicgame)) {
        $logicgamesql = "SELECT l.id
                         FROM {$CFG->prefix}logicgame l
                        WHERE l.course={$data->courseid}";

        delete_records_select('logicgame_responses', "logicgameid IN ($logicgamesql)");
        $status[] = array('component'=>$componentstr, 'item'=>get_string('removeresponses', 'logicgame'), 'error'=>false);
    }

    if ($data->timeshift) {
        shift_course_mod_dates('logicgame', array('timeopen', 'timeclose'), $data->timeshift, $data->courseid);
        $status[] = array('component'=>$componentstr, 'item'=>get_string('datechanged'), 'error'=>false);
    }
	
    return $status;
}

function logicgame_grade($logicgame, $userid, $response) {
    global $CFG;
    if (!function_exists('grade_update')) {
        require_once($CFG->libdir.'/gradelib.php');
    }
    if($response == "") {
    	$grade = 0;
    }
    else {
		$result = 0;
		foreach ($response as $val)
		{
			$result = $result +	$val;		
		}	
    	$grade = $result;
    }
	$grades = array('userid'=>$userid, 'rawgrade'=>$grade);
    $params = array('itemname'=>$logicgame->name, 'idnumber'=>$logicgame->id);

    if ( $logicgame->scale == 0) {
        $params['gradetype'] = GRADE_TYPE_NONE;

    } else if ($logicgame->scale > 0) {
        $params['gradetype'] = GRADE_TYPE_VALUE;
        $params['grademax']  = $logicgame->scale;
        $params['grademin']  = -50;

    } else if ($logicgame->scale < 0) {
        $params['gradetype'] = GRADE_TYPE_SCALE;
        $params['scaleid']   = -$logicgame->scale;
    }

    if ($grades  === 'reset') {
        $params['reset'] = true;
        $grades = NULL;
    }
	
    return grade_update('mod/logicgame', $logicgame->course, 'mod', 'logicgame', $logicgame->id, 0, $grades, $params);
}
?>
