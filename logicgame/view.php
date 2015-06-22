<?php

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');
global $CFG;

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

require_login($course, true, $cm);


if (count($_POST)) {
			add_to_log($course->id, "logicgame", "add response", "view.php?id=$cm->id", $logicgame->name, $cm->id);
			
			$response = new object();			
			$response->response = array(
				$_POST['step'] => $_POST['score'],
			);
			$response->logicgameid = $logicgame->id;
			$response->userid = $USER->id;
			$response->timemodified = time();
			if ($old_response = get_record('logicgame_responses', 'logicgameid', $response->logicgameid, 'userid', $USER->id)) {
				$response->id = $old_response->id;
				$oldresponse = explode(", ", $old_response->response);
				foreach($response->response as $key => $value) {
					$oldresponse[(int)$key] = $value;
				}
				$response->response = implode(", ", $oldresponse);
				
				if(! update_record('logicgame_responses', $response)) {
					echo get_string('errorupdateresponse','logicgame');
				}
			}
			else { 
			$newresponse = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
			
			foreach($response->response as $key => $value) {
				$newresponse[(int)$key] = $value;
			}
			$response->response = implode(", ", $newresponse);
			
	      	if(!insert_record('logicgame_responses', $response)) echo get_string('errorinsertresponse','logicgame');
	      }      
		  // Set grades
	    logicgame_grade($logicgame, $USER->id, explode(", ", $response->response));		  
}
		
add_to_log($course->id, "logicgame", "view", "view.php?id=$cm->id", "$logicgame->id");

/// Print the page header
$strlogicgames = get_string('modulenameplural', 'logicgame');
$strlogicgame  = get_string('modulename', 'logicgame');

$navlinks = array();
$navlinks[] = array('name' => $strlogicgames, 'link' => "index.php?id=$course->id", 'type' => 'activity');
$navlinks[] = array('name' => format_string($logicgame->name), 'link' => '', 'type' => 'activityinstance');

$navigation = build_navigation($navlinks);

print_header_simple(format_string($logicgame->name), '', $navigation, '', '', true,
              update_module_button($cm->id, $course->id, $strlogicgame), navmenu($course, $cm));

/// Print the main part of the page

$logicgame_response = get_record('logicgame_responses', 'logicgameid', $logicgame->id, 'userid', $USER->id);

if (!$logicgame_response) {
	$logicgame_response = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
} else {
	$logicgame_response = explode(", ", $logicgame_response->response);
}

?>

<div style="margin: 45px 100px;">Большинство заданий содержит подсказки. Их количество может быть разным и указано на кнопке "Подсказки (n)". 
За использование каждой подсказки снимается 1 балл. Если вы дали неправильный ответ на задачу, то также будет вычтен 1 балл.</div>

<div class="logicgame-frame">
	<div class="control-container">
		<div class="control btn btn-default" id="condition">Условие</div>
		<div class="control btn btn-default" id="helpBtn"></div>
	</div>
	<div id="logicgameContent" class="inherit-size"></div>
</div>

<script>window.logicgame_response = <?php echo json_encode($logicgame_response)?>;</script>
<script type="text/javascript" src="<?php echo $CFG->httpswwwroot ?>/mod/logicgame/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="<?php echo $CFG->httpswwwroot ?>/mod/logicgame/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $CFG->httpswwwroot ?>/mod/logicgame/tasks.js"></script>
<script type="text/javascript" src="<?php echo $CFG->httpswwwroot ?>/mod/logicgame/logicgame.js"></script>

<div class="modal fade" id="gameModal" tabindex="-1" role="dialog" aria-labelledby="gameModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="gameModalLabel"></h4>
      </div>
      <div class="modal-body">
        <span id="gameModalBody"></span>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnModal" class="btn btn-default" data-dismiss="modal"></button>
      </div>
    </div>
  </div>
</div>

<?php
/// Finish the page
print_footer($course);
?>


