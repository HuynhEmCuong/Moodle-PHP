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
require_once($CFG->dirroot . '/local/userlist/classes/formfileexcel.php');

$PAGE->set_pagelayout('incourse');
$PAGE->set_title('Add User');
$PAGE->set_url(new moodle_url('/local/userlist/userlist.php'));
$PAGE->set_context(\context_system::instance());
$mform = new addFile();

if ($mform->get_data()) {
    $nameFile = $mform->get_new_filename('userfile');
    $file = $CFG->dirroot . "\local\userlist\upload\\" . $nameFile;
    $checkSaveFile = $mform->save_file('userfile', $file);
    if ($checkSaveFile) {
        read_file_excel($file);
    }
} else if ($mform->is_cancelled()) {
    redirect($CFG->wwwroot . '/local/userlist/userlist.php');
}
echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();
