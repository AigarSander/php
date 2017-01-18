<?php

/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 12.01.2017
 * Time: 12:28
 */

if(!defined('TMPL_DIR')) {
    define('TMPL_DIR', '../tmpl/');
}

class template {
    var $file = '';
    var $content = false;
    var $vars = array();

    function __construct($f){
        $this->file = $f;
        $this->loadFile();
    }

    function loadFile() {
        $f = $this->file;
        if(!is_dir(TMPL_DIR)) {
            echo 'Unable to find template directory!';
            exit;
        }

        if(file_exists($f) and is_file($f) and is_readable($f)) {
                $this->readFile($f);
        }

        $f = TMPL_DIR.$this->file;
        if(file_exists($f) and is_file($f) and is_readable($f)) {
            $this->readFile($f);
        }

        $f = TMPL_DIR.$this->file.'.html';
        if(file_exists($f) and is_file($f) and is_readable($f)) {
            $this->readFile($f);
        }

        $f = TMPL_DIR.str_replace('.', '/', $this->file).'.html';
        if(file_exists($f) and is_file($f) and is_readable($f)) {
            $this->readFile($f);
        }

        if($this->content === false) {
            echo 'Template\'s content does not exist or is corrupted!('.$this->file.')';
            exit;
        }
    }

    function readFile($f) {
        $this->content = file_get_contents($f);
    }

    function set($name, $val){
        $this->vars[$name] = $val;
    }

    function add($name, $val) {
        if(!isset($this->vars[$name])) {
            $this->set($name, $val);
        } else {
            $this->vars[$name] .= $val;
        }
    }

    function parse(){
        $str = $this->content;
        foreach ($this->vars as $name=>$val){
            $str = str_replace('{'.$name.'}', $val, $str);
        }
        return $str;
    }
}