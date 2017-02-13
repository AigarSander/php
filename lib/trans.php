<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 06.02.2017
 * Time: 9:43
 */

function tr($txt) {
    static $trans = false;

    if(LANG_ID == DEFAULT_LANG) {
        return $txt;
    }

    if(LANG_ID !== false) {
        $fn = LANG_DIR.'lang_'.LANG_ID.'.php';
        if(file_exists($fn) and is_file($fn) and is_readable($fn)) {
            require ($fn);
            $trans = $_trans;
        } else {
            $trans = array();
        }
    }

    if(isset($trans[$txt])) {
        return $trans[$txt];
    }

    return $txt;
}
?>