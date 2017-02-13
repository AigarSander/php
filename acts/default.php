<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 18.01.2017
 * Time: 15:13
 */

$page_id = $http->get('page_id');
$sql = 'SELECT * FROM content WHERE content_id="'.$page_id.'";';
$res = $db->getArray($sql);

if($res !== FALSE) {
    $page = $res[0];
    $tmpl->set('content', $page['content']);
}

?>