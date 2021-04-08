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
class button extends moodleform {

    public function definition() {
        global $CFG;

        $mform = $this->_form; // Don't forget the underscore! 
        
        $mform->addElement('text', 'username', 'User Name'); // Add elements to your form
        $mform->setType('username', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('username', 'Please enter username');
    }

}
