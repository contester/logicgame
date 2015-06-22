<?php
//Define access capbilities

$mod_logicgame_capabilities = array(

    'mod/logicgame:submit' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'legacy' => array(
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'admin' => CAP_ALLOW
        )
    ),
    'mod/logicgame:viewall' => array(

        'captype' => 'view',
        'contextlevel' => CONTEXT_MODULE,
        'legacy' => array(
            'student' => CAP_PREVENT,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'admin' => CAP_ALLOW
        )
    )
);

?>
