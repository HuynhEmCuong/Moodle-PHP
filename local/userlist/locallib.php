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
require_once($CFG->dirroot . '/local/userlist/classes/excel/PHPExcel.php');

function show_data_display_table($dataShow) {

    global $OUTPUT;
    $data = array();
    if (!empty($dataShow)) {

        foreach ($dataShow as $item) {
            $row = array();
            $row = add_cell($row, $item->id);
            $row = add_cell($row, $item->messagetext);
            $row = add_cell($row, $item->messagetype);
            $data[] = $row;
        }
    }
    $table = new html_table();
    $table->head = array();
    $table->head[] = 'id';
    $table->head[] = 'Message Text';
    $table->head[] = 'Message Type';
    $table->data = $data;
    echo $OUTPUT->heading('Message List');
    echo html_writer::tag('div', html_writer::table($table), array('class' => 'flexible-wrap'));
}

function add_cell($row, $text) {
    $cell = new html_table_cell();
    $cell->text = $text;
    $row[] = $cell;
    return $row;
}

//Save data from file excel
function read_file_excel($file) {
    $reader = PHPExcel_IOFactory::createReaderForFile($file);
    $excel_Obj = $reader->load($file);
    $worksheet = $excel_Obj->getSheet('0');

    $totalRow = $worksheet->getHighestRow();
    $totalColum = PHPExcel_Cell::columnIndexFromString($worksheet->getHighestColumn());

    $data = [];
    for ($i = 2; $i <= $totalRow; $i++) {
        $id = $worksheet->getCellByColumnAndRow(0, $i)->getValue();
        $messageText = $worksheet->getCellByColumnAndRow(1, $i)->getValue();
        $messageType = $worksheet->getCellByColumnAndRow(2, $i)->getValue();

        if (!Message::Check_exits($messageText)) {
            $data[] = new Message($messageText, $messageType);
        }
    }
    Message::Add_item($data);
}

class Message {

    public $messagetext;
    public $messagetype;

    function __construct($messageText, $messageType) {
        $this->messagetext = $messageText;
        $this->messagetype = $messageType;
    }

    public static function Check_exits($messagetext) {
        global $DB;
        $check = $DB->record_exists('local_message', array('messagetext' => $messagetext));
        return $check;
    }

    public static function Add_item($data) {
        global $DB;
        try {
            return $DB->insert_records('local_message', $data);
        } catch (Exception $ex) {
            echo 'Caught exception: ', $ex->getMessage(), "\n";
        }
    }

}