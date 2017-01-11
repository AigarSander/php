<?php

/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 11.01.2017
 * Time: 15:14
 */
require_once('text.php');

class ctext extends text{
    var $color = false;

    function setColor($c) {
        $this->color = $c;
    }

    function showText() {
        if($this->color === false) {
            parent::showText();
        } else {
            echo '<font color="'.$this->color.'">'.$this->str.'</font><br/>';
        }
    }
}