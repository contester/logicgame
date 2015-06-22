<?php 

require_once($CFG->dirroot.'/course/moodleform_mod.php');

class mod_logicgame_mod_form extends moodleform_mod {

    function definition() {
		global $COURSE, $CFG;

		// Create form instance
		$mform	=& $this->_form;

		$mform->addElement('header', 'general', get_string('general', 'form'));
		
		// Set activity name
		$mform->addElement('text', 'name', get_string('logicgamename', 'logicgame'), array('size'=>'64'));
		$mform->setType('name', PARAM_TEXT);
		$mform->addRule('name', null, 'required', null, 'client');
		
		// Instructions text area
		$mform->addElement('htmleditor', 'instructions', get_string('instructions', 'logicgame'));
		$mform->setType('instructions', PARAM_RAW);
		$mform->addRule('instructions', get_string('required'), 'required', null, 'client');
		$mform->setHelpButton('instructions', array('questions', 'richtext'), false, 'editorhelpbutton');

		// Grading
		$mform->addElement('modgrade', 'scale', get_string('grade'), false);
		$mform->disabledIf('scale', 'assessed', 'eq', 0);

		// Common module settings
		$features = array('groups'=>true, 'groupings'=>true, 'groupmembersonly'=>true,
						  'outcomes'=>false, 'gradecat'=>false, 'idnumber'=>false);
		$this->standard_coursemodule_elements($features);

		// Form buttons
		$this->add_action_buttons();
	}
}

?>
