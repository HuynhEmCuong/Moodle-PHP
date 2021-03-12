<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @package     local_message
 * @author      Kristian
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * 
 * 
 */
require_once(__DIR__ . '/../../config.php');
$PAGE->set_pagelayout('incourse');
$PAGE->set_url(new moodle_url('/local/message/manage.php'));
$PAGE->set_title('test manage');
$PAGE->set_context(\context_system::instance());
global $DB;

$messages = array_values($DB->get_records('local_message'));


$data = (object) [
            "message" => $messages,
            "editUrl" => new moodle_url('/local/message/edit.php'),
];


//HTML
echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_message/manage', $data);
echo $OUTPUT->footer();
