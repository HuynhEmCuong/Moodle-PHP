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
require_once("$CFG->libdir/formslib.php");

class edit extends moodleform {

    //Add elements to form
    public function definition() {
        global $CFG;

        $mform = $this->_form; // Don't forget the underscore! 

        $mform->addElement('text', 'messageText', 'Message Text'); // Add elements to your form
        $mform->setType('messageText', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('messageText', 'Please enter email');


        //Select options
        $options = array(
            \core\output\notification::NOTIFY_WARNING,
            \core\output\notification::NOTIFY_SUCCESS,
            \core\output\notification::NOTIFY_ERROR,
            \core\output\notification::NOTIFY_INFO,
        );
        $mform->addElement('select', 'messageType', 'Message Type', $options);
        $mform->setDefault('messageType', [1]);
        $this->add_action_buttons(); //Default value
    }

    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }

}
