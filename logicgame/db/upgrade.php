<?php 

function xmldb_logicgame_upgrade($oldversion=0) {

    global $CFG, $THEME, $db;

    $result = true;

/// First example, some fields were added to the module on 20070400
    if ($result && $oldversion < 2007040100) {

        $table = new XMLDBTable('logicgame');
        $field = new XMLDBField('course');
        $field->setAttributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, '0', 'id');
    /// Launch add field course
        $result = $result && add_field($table, $field);

        $table = new XMLDBTable('logicgame');
        $field = new XMLDBField('intro');
        $field->setAttributes(XMLDB_TYPE_TEXT, 'medium', null, null, null, null, null, null, 'name');
    /// Launch add field intro
        $result = $result && add_field($table, $field);

        $table = new XMLDBTable('logicgame');
        $field = new XMLDBField('introformat');
        $field->setAttributes(XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, '0', 'intro');
    /// Launch add field introformat
        $result = $result && add_field($table, $field);
    }

///// "01" in the last two digits of the version
//    if ($result && $oldversion < 2007040101) {
//
//    /// Define field timecreated to be added to game
//        $table = new XMLDBTable('game');
//        $field = new XMLDBField('timecreated');
//        $field->setAttributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, '0', 'introformat');
//    /// Launch add field timecreated
//        $result = $result && add_field($table, $field);
//
//    /// Define field timemodified to be added to game
//        $table = new XMLDBTable('game');
//        $field = new XMLDBField('timemodified');
//        $field->setAttributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, '0', 'timecreated');
//    /// Launch add field timemodified
//        $result = $result && add_field($table, $field);
//
//    /// Define index course (not unique) to be added to game
//        $table = new XMLDBTable('game');
//        $index = new XMLDBIndex('course');
//        $index->setAttributes(XMLDB_INDEX_NOTUNIQUE, array('course'));
//    /// Launch add index course
//        $result = $result && add_index($table, $index);
//    }
//
///// Third example, the next day, 20070402 (with the trailing 00), some inserts were performed, related with the module
//    if ($result && $oldversion < 2007040200) {
//    /// Add some actions to get them properly displayed in the logs
//        $rec = new stdClass;
//        $rec->module = 'game';
//        $rec->action = 'add';
//        $rec->mtable = 'game';
//        $rec->filed  = 'name';
//    /// Insert the add action in log_display
//        $result = insert_record('log_display', $rec);
//    /// Now the update action
//        $rec->action = 'update';
//        $result = insert_record('log_display', $rec);
//    /// Now the view action
//        $rec->action = 'view';
//        $result = insert_record('log_display', $rec);
//    }
    return $result;
}

?>
