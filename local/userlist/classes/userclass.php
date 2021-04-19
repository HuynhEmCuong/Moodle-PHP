<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User {

    public $idnumber;
    public $username;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $confirmed = 1;
    public $mnethostid = 1;

    public static function Check_exits($email) {
        global $DB;
        $check = $DB->record_exists('user', array('email' => $email));
        return $check;
    }

    public static function Add_item($data) {
        global $DB;
        try {
            return $DB->insert_records('user', $data);
        } catch (Exception $ex) {
            echo 'Caught exception: ', $ex->getMessage(), "\n";
        }
    }

    public static function get_user_name($firstname, $lastname) {

        //convert_vi_to_en($user->firstname) . " '.' " . ($user->lastname);

        $firstname = convert_vi_to_en($firstname);

        $lastname = trim(convert_vi_to_en($lastname));

        $index = strripos($lastname, ' ');
        $test = substr($lastname, 0, strripos($lastname, ' '));

        return strtolower($firstname . "." . substr($lastname, 0, strripos($lastname, ' ')));
    }
}