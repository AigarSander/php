<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 13.02.2017
 * Time: 12:50
 */

$username = $http->get('username');
$password = $http->get('password');
$sql = 'SELECT * FROM user WHERE '.
    'username='.fixDb($username).' AND '.
    'password='.fixDb(md5($password)).' AND '.
    'is_active=1';
$res = $db->getArray($sql);
if($res === false) {
    $sess->set('login_error', tr('Viga sisselogimisel'));
    $link = $http->getLink(array('act' => 'login'), array('username'));
    $http->redirect($link);
}
else {
    $sess->createSession($res[0]);
    $http->redirect();
}

?>