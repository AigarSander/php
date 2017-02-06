<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 12.01.2017
 * Time: 12:58
 */

require_once 'conf.php';

$tmpl = new template('main');
$tmpl->set('title', 'TITLE');

require_once 'menu.php';
$tmpl->set('menu', $menu->parse());

$tmpl->set('nav_bar', 'NAVIGATION');
$tmpl->set('lang_bar', 'LANGUAGE');
$tmpl->set('content', $http->get('content'));
echo $tmpl->parse();

require_once 'act.php';
?>