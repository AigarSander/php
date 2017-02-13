<?php

/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 17.01.2017
 * Time: 12:48
 */

function fixHtml($val){
    return htmlentities($val);
}// fixHtml
class http
{
    var $server = array();
    var $vars = array();
    var $cookie = array();

    function __construct()
    {
        $this->init();
        $this->initConst();
    }

    function init()
    {
        $this->server = $_SERVER;
        $this->cookie = $_COOKIE;
        $this->vars = array_merge($_GET, $_POST, $_FILES);
    }

    function initConst()
    {
        $vars = array('REMOTE_ADDR', 'PHP_SELF', 'SCRIPT_NAME', 'HTTP_HOST');
        foreach ($vars as $var) {
            if (!defined($var) and isset($this->server[$var])) {
                define($var, $this->server[$var]);
            }
        }
    }

    function set($name, $val)
    {
        $this->vars[$name] = $val;
    }

    function get($name, $fix = true)
    {
        if (isset($this->vars[$name])) {
            if ($fix) {
                return fixHtml($this->vars[$name]);
            }
            return $this->vars[$name];
        }

        return false;
    }

    function del($name)
    {
        if (isset($this->vars[$name])) {
            unset($this->vars[$name]);
        }
    }

    function redirect($url = false){
        global $sess;
        $sess->flush();
        if($url == false){
            $url = $this->getLink();
        }
        $url = str_replace('&amp;', '&', $url);
        header('Location: '.$url);
        exit;
    }
}