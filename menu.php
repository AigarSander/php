<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 18.01.2017
 * Time: 10:34
 */
$menu = new template('menu.menu');
$menuItem = new template('menu.item');

$menuItem->add('name', 'Esimene leht');
$link = $http->getLink(array('page'=>'first'));
$menuItem->add('link', $link);

$menu->add('items', $menuItem->parse());
?>