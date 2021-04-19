<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * @package     local_courseimp
 * @author      HCe
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * 
 * 
 */
defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir . '/formslib.php');
require_once($CFG->libdir . '/completionlib.php');

class formimp extends moodleform {

    public function definition() {
        $mform = $this->_form; // Don't forget the underscore! 
        $displaylist = core_course_category::make_categories_list('moodle/course:create');
        $mform->addElement('select', 'category', get_string('coursecategory'), $displaylist);
        $mform->addHelpButton('category', 'coursecategory');
        $mform->setDefault('category', $category->id);

        $mform->addElement('filepicker', 'userfile', 'File', null,
                array('accepted_types' => '*'));

        $this->add_action_buttons();
    }

    function validation($data, $file) {
        return array();
    }

}
