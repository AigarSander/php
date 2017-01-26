<?php

/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 18.01.2017
 * Time: 8:48
 */
function fixUrl($val) {
    return urlencode($val);
}

require_once ('http.php');

class linkObject extends http{
    var $baseUrl = false;
    var $protocol = 'http://';
    var $delim = '&amp';
    var $eq = '=';
    var $aie = array('sid'=>'sid');

    function __construct() {
        parent::__construct();
        $this->baseUrl = $this->protocol.HTTP_HOST.SCRIPT_NAME;
    }

    function addToLink(&$link, $name, $val) {
        if($link != '') {
            $link .= $this->delim;
        }

        $link = $link.fixUrl($name).$this->eq.fixUrl($val);
    }

    function getLink($add = array(), $aie = array(), $not = array()) {
        $link = '';

        foreach ($add as $name => $val) {
            $this->addToLink($link, $name, $val);
        }

        foreach ($aie as $name) {
            $val = $this->get($name);
            if($val !== false) {
                $this->addToLink($link, $name, $val);
            }
        }

        foreach ($this->aie as $name) {
            $val = $this->get($name);
            if($val !== false and !in_array($name, $not)) {
                $this->addToLink($link, $name, $val);
            }
        }

        if($link != '') {
            $link = $this->baseUrl.'?'.$link;
        } else {
            $link = $this->baseUrl;
        }

        return $link;
    }
}