<?php
/**
 * Created by PhpStorm.
 * User: Taranpreet Singh Ray
 * Date: 22-06-2021
 * Time: 17:34
 */

namespace App;


class Validator
{

    private $db = null, $_passed = false, $_errors = array();

    function __construct() {
        $this->db = \PDODb::getInstance();
    }

    private function addError($error){
        $this->_errors[] = $error;
    }

    public function errors(){
        return $this->_errors;
    }

    public function passed(){
        return $this->_passed;
    }

    public function validate($source,$items = array()){
        foreach ($items as $item => $rules){
            foreach ($rules as $rule => $ruleValue){
                $value = trim($source[$item]);
                $item = htmlentities($item,ENT_QUOTES,'UTF-8');

                if($rule == 'required' && empty($value)){
                    $this->addError("Error {$item} is required. \nPlease try again.");
                }elseif(!empty ($value)){
                    switch ($rule){
                        case 'min':
                            if(strlen($value) < $ruleValue){
                                $this->addError("Error {$item} must be minimum of {$ruleValue}. \nPlease try again.");
                            }
                            break;
                        case 'max':
                            if(strlen($value) > $ruleValue){
                                $this->addError("Error {$item} must be maximum of {$ruleValue}. \nPlease try again.");
                            }
                            break;
                        case 'matches':
                            if($value != $source[$ruleValue]){
                                $this->addError("Error {$ruleValue} must match {$item}. \nPlease try again.");
                            }
                            break;
                        case 'unique':
                            $check = $this->db->rawQuery("select * from {$ruleValue} where {$item} = '{$value}'");
                            if(!empty($check)){
                                $this->addError("Error {$item} already exists. \nPlease try again.");
                            }
                            break;
                        default:

                            break;
                    }
                }
            }
        }
        if(empty($this->_errors)){
            $this->_passed = true;
        }
        return $this;
    }

}