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
//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");

class addFile extends moodleform {

    public function definition() {
        global $CFG;

        $mform = & $this->_form; // Don't forget the underscore! 

        $mform->addElement('filepicker', 'userfile', 'File', null,
                array('accepted_types' => '*'));

        $this->add_action_buttons(); 
    }

    function validation($data, $files) {
        return array();
    }

}
