<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @package     local_courseimp
 * @author      Kristian
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @var stdClass $plugin
 */
require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/courseimp/classes/form/formimp.php');
global $DB;

//Seting 
$PAGE->set_pagelayout('admin');
$PAGE->set_title('Course import');
$PAGE->set_url(new moodle_url('/local/courseimp/index.php'));
$PAGE->set_context(\context_system::instance());
require_login();
//Get data & varibal
//
//HTML

$mform = new formimp();

echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();

