<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 18.01.2017
 * Time: 10:34
 */
$menu = new template('menu.menu');
$menu->set('items', false);
$item = new template('menu.item');

$sql = 'select content_id, title from content where parent_id="0" AND show_in_menu="1"';

if(ROLE_ID != ROLE_ADMIN) {
    $sql .= 'AND is_hidden = 0';
}
$sql .= ' ORDER BY sort ASC';
$res = $db->getArray($sql);

if($res != false) {
    foreach ($res as $page) {
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $item->set('link', $link);
        $item->set('name', $tr($page['title']));
        $menu->add('items', $item->parse());
    }
}

if(USER_ID != ROLE_NONE) {
    $link = $http->getLink(array('act' => 'logout'));
    $item->set('link', $link);
    $item->set('name', tr('Logi v&aum;lja'));
    $menu->add('items', $item->parse());
}
$tmpl->set('menu', $menu->parse());
?>