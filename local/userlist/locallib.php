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
defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/local/codeUtility/excel/PHPExcel.php');
require_once($CFG->dirroot . '/local/userlist/classes/userclass.php');
require_once($CFG->dirroot . '/local/userlist/lib.php');



/**
 * @param $dataShow is array  into the table
 * @return create table with input data(array)
 */
function show_data_display_table($dataShow) {

    global $OUTPUT;
    $data = array();
    if (!empty($dataShow)) {

        foreach ($dataShow as $item) {
            $row = array();
            $row = add_cell($row, $item->id);
            $row = add_cell($row, $item->username);
            $row = add_cell($row, $item->firstname);
            $row = add_cell($row, $item->lastname);
            $row = add_cell($row, $item->email);
            $data[] = $row;
        }
    }
    $table = new html_table();
    $table->head = array();
    $table->head[] = 'id';
    $table->head[] = 'User Name';
    $table->head[] = 'First Name';
    $table->head[] = 'Last  Name';
    $table->head[] = 'Email';
    $table->data = $data;
    echo $OUTPUT->heading('Message List');
    echo html_writer::tag('div', html_writer::table($table), array('class' => 'flexible-wrap'));
}


/** 
 * function used add cells to the row
 * @param $text is value of cell 
 * @param $row is array contains cell list 
 * @return $row has add cell
 */
function add_cell($row, $text) {
    $cell = new html_table_cell();
    $cell->text = $text;
    $row[] = $cell;
    return $row;
}

//
/** 
 * function save data from file excel
 * @param $file is path of file excel
 */
function read_file_excel($file) {
    //Read file excle
    $reader = PHPExcel_IOFactory::createReaderForFile($file);
    $excel_Obj = $reader->load($file);
    $worksheet = $excel_Obj->getSheet('0');

    //Get total row & colum
    $totalRow = $worksheet->getHighestRow();
    $totalColum = PHPExcel_Cell::columnIndexFromString($worksheet->getHighestColumn());

    
    $users = [];
    for ($i = 2; $i <= $totalRow; $i++) {
        $idNumber = $worksheet->getCellByColumnAndRow(0, $i)->getValue();
        if (!empty($idNumber)) {
            $user = new User();
            $user->idnumber = $idNumber;
            $user->lastname = $worksheet->getCellByColumnAndRow(1, $i)->getValue();
            $user->firstname = $worksheet->getCellByColumnAndRow(2, $i)->getValue();
            $user->email = $worksheet->getCellByColumnAndRow(8, $i)->getValue();
            $user->username = User::get_user_name($user->firstname, $user->lastname);
            //Set password default
            $user->password = hash_internal_user_password('Eiu@1234');
            if (!User::Check_exits($user->email)) {
                $users[] = $user;
            }
        }
    }
    
    //Used funciton add user in userclass.php
    User::Add_item($users);
}


