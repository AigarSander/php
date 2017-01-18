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
require_once (CLASSES_DIR.'http.php');
require_once (CLASSES_DIR.'linkObject.php');

$http = new linkObject();
require_once ('menu.php');

$tmpl = new template('main');

$tmpl->set('Title', '.oOo.oOo.oOo.');
$tmpl->set('menu', $menu->parse());

echo $tmpl->parse();
echo $http->get('act');
?>