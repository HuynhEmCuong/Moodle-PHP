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
global $DB;
require_login();


//Add js
$PAGE->requires->js(new moodle_url($CFG->wwwroot .'/local/userlist/main.js'));


$PAGE->set_pagelayout('standard');
$PAGE->set_title('User List');
$PAGE->set_url(new moodle_url('/local/userlist/time.php'));
$PAGE->set_context(\context_system::instance());


echo $OUTPUT->header();
echo '<div id="clock"></div>';
echo $OUTPUT->footer();
