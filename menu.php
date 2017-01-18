<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 18.01.2017
 * Time: 10:34
 */
$menu = new template('menu.menu');
$menuItem = new template('menu.item');

$link = $http->getLink(array('act'=>'first'));
$menuItem->set('name', 'Esimene leht');
$menuItem->set('link', $link);
$menu->set('items', $menuItem->parse());

$link = $http->getLink(array('act'=>'second'));
$menuItem->set('name', 'Teine leht');
$menuItem->set('link', $link);
$menu->add('items', $menuItem->parse());

?>