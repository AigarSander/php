<?php

/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 11.01.2017
 * Time: 14:26
 */
class text
{//Class begin
    //class variables | Instance variables
    var $str = '';

    //constructor
    function __construct($s = '') {
        $this->setText($s);
    }

    //methods
    function setText($s) {
        $this->str = $s;
    }// set text

    function showText() {
        echo $this->str.'</br>';
    }// show text
}//Class end