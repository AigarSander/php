<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 26.01.2017
 * Time: 14:52
 */

function fixDB($val) {
    return '"'.addslashes($val).'"';
}

?>