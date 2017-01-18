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
require_once (CLASSES_DIR.'linkObject.php');

$tmpl = new template('main.html');
$tmpl->set('Title', '.oOo.oOo.oOo.');
echo $tmpl->parse();
$http = new linkObject();
echo '<pre>';
print_r($http);
echo '</pre>';

echo '<hr/>';

$http->set('nimi', 'Aigar');
$http->set('pw', 'test');
echo '<pre>';
print_r($http->vars);
echo '</pre>';

$link = $http->getLink(array('kasutaja' => 'Aigar', 'parool' => 'qwerty'));
echo $link;
?>