<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 12.01.2017
 * Time: 12:58
 */
require_once ('conf.php');
require_once ('menu.php');

$tmpl = new template('main');

$tmpl->set('Title', '.oOo.oOo.oOo.');
$tmpl->set('menu', $menu->parse());
$tmpl->set('nav_bar', 'NAVIGATION');
$tmpl->set('lang_bar', 'LANGUAGE');
$tmpl->set('content', 'CONTENT');

echo $tmpl->parse();

$db->connect();
$res = $db->getArray('SELECT NOW();');
echo '<pre>';
print_r($res);
echo '</pre>';

echo $db->showHistory();
?>