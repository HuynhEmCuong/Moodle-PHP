<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * @package     local_message
 * @author      HCe
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * 
 * 
 */
require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/message/class/form/edit.php');
require_login();
global $DB;
$PAGE->set_pagelayout('incourse');
$PAGE->set_url(new moodle_url('/local/message/edit.php'));
$PAGE->set_title('Edit Message');

$mform = new edit();

if ($mform->is_cancelled()) {
    //Go  page
    redirect($CFG->wwwroot . '/local/message/manage.php', 'you can back');
} else if ($fromform = $mform->get_data()) {
    $recordMessage = new stdClass();

    $recordMessage->messagetext = $fromform->messageText;
    $recordMessage->messagetype = $fromform->messageType;

    $DB->insert_record('local_message', $recordMessage);

    redirect($CFG->wwwroot . '/local/message/manage.php', 'you save message success', $fromform->messageText);
}

echo $OUTPUT->header();

$mform->display();

echo $OUTPUT->footer();
