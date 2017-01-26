<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 18.01.2017
 * Time: 10:34
 */
$menu = new template('menu.menu');
$item = new template('menu.item');

$sql = 'select content_id, title from content where parent_id="0" AND show_in_menu="1" ORDER BY sort ASC;';
$res = $db->getArray($sql);

if($res != false) {
    foreach ($res as $page) {
        $item->set('name', $page['title']);
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $item->set('link', $link);

        $menu->add('items', $item->parse());
    }
}
?>