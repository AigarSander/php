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

    function __construct() {
        parent::__construct();
        $this->baseUrl = $this->protocol.HTTP_HOST.SCRIPT_NAME;
    }

    function addToLink($link, $name, $val) {
        $link = $link.fixUrl($name).$this->eq.fixUrl($val);
        echo $link;
    }
}