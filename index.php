<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 12.01.2017
 * Time: 12:58
 */
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
require_once (CLASSES_DIR.'template.php');

$tmpl = new template('main.html');
echo '<pre>';
print_r($tmpl);
echo '</pre>';
?>