<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 12.01.2017
 * Time: 12:58
 */

require_once 'conf.php';

$tmpl = new template('main');
$tmpl->set('title', 'Tiitel');

require_once 'menu.php';

$tmpl->set('nav_bar', $sess->user_data['username']);

require_once('lang.php');

require_once 'act.php';
$tmpl->set('content', $http->get('content'));

echo $tmpl->parse();
?>