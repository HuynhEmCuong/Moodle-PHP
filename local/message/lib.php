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
 */
function local_message_before_footer() {
    global $DB, $USER;

    $messages = $DB->get_records('local_message');
    foreach ($messages as $message) {
        switch ($message->messagetype) {
            case '0':
                $type = \core\output\notification::NOTIFY_WARNING;
                break;
            case '1':
                $type = \core\output\notification::NOTIFY_SUCCESS;
                break;
            case '2':
                $type = \core\output\notification::NOTIFY_ERROR;
                break;
            default :
                $type = \core\output\notification::NOTIFY_INFO;
        }
        //\core\notification::add($message->messagetext, $type);
    }
    // \core\notification::add('test message', \core\output\notification::NOTIFY_SUCCESS); 
}
