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

        if($this->content === false) {
            echo 'Template\'s content doens\'t excist or is corrupted!';
            exit;
        }
    }

    function readFile($f) {
        $this->content = file_get_contents($f);
    }
}