<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 13.02.2017
 * Time: 12:14
 */
$form = new Template('login');
$form->set('error', $sess->get('login_error'));
$sess->del('login_error');
$form->set('submit', tr('Logi sisse'));
$form->set('username_str', tr('Kasutajanimi'));
$form->set('password_str', tr('Parool'));
$form->set('username', $http->get('username', true));
$link = $http->getLink(array('act' => 'login_do'));
$form->set('action', $link);
$tmpl->set('content', $form->parse());
?>