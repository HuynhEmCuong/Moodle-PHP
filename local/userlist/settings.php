<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Local plugin "userlist" - Settings
 *
 * @package   local_userlist
 * @copyright 2017 Soon Systems GmbH on behalf of Alexander Bias, Ulm University <alexander.bias@uni-ulm.de>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;



if ($hassiteconfig) {

    $ADMIN->add('root', new admin_category('userlist', 'User List'));
    // Our settings page.
    $settings = new admin_settingpage('local_userlist', 'Config Show Add User');

    if ($ADMIN->fulltree) {
        $settings->add(new admin_setting_configcheckbox(
                        'local_userlist/showbutton',
                        'showbutton',
                        'Accept show button or no', 0
        ));
    }
    $ADMIN->add('userlist', $settings);


// // Cấu hình nằm trong pluggin localplugins (plugin có sẵn)
//    $settingspage = new admin_settingpage('local_userlist', 'User List');
//
//    if ($ADMIN->fulltree) {
//        $settingspage->add(new admin_setting_configcheckbox(
//                        'local_userlist/showbutton',
//                        'showbutton',
//                        'Accept show button or no', 0
//        ));
//
//        $ADMIN->add('courses', new admin_externalpage('enrol_apply',
//                        'test',
//                        new moodle_url('/enrol/apply/manage.php')));
//    }
//    $ADMIN->add('localplugins', $settingspage);
}

