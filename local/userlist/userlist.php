<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * @package     local_userlist
 * @author      Kristian
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @var stdClass $plugin
 */
require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/userlist/locallib.php');
global $DB;

require_login();

//Seting 
$PAGE->set_pagelayout('standard');
$PAGE->set_title('User List');
$PAGE->set_url(new moodle_url('/local/userlist/userlist.php'));
$PAGE->set_context(\context_system::instance());

//Get data & varibal
$messages = array_values($DB->get_records('local_message'));
$url = new moodle_url('/local/userlist/edit.php');

//HTML
echo $OUTPUT->header();

show_data_display_table($messages);
$config = get_config('local_userlist', 'showbutton');
if ($config === '1') {
    echo "<button class='btn btn-primary' onclick=location.href='$url'> Add User </button>";
}
echo $OUTPUT->footer();
