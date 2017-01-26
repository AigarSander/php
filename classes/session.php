<?php

/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 26.01.2017
 * Time: 14:38
 */
class session {
    var $sid = false;
    var $vars = false;
    var $http = false;
    var $db = false;
    var $anonymous = true;
    var $timeout = 1000;

    function __construct(&$http, &$db) {
        $this->http = &$http;
        $this->db = &$db;
        $this->sid = $http->get('sid');
        $this->createSession();
    }

    function createSession($user = false) {
        if($user == false) {
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonymous'
            );
        }

        $sid = md5(uniqid(time().mt_rand(1, 10000), true));
        $sql = 'insert into session SET '.
                'sid='.fixDB($sid).', '.
                'user_id='.fixDB($user['user_id']).', '.
                'user_data='.fixDB(serialize($user)).', '.
                'login_ip='.fixDB(REMOTE_ADDR).', '.
                'created=NOW();';

        $this->db->query($sql);
        $this->sid = $sid;
        $this->http->set('sid', $sid);
    }

    function clearSessions() {
        $sql = 'delete from session where '.
                time().'- UNIX_TIMESTAMP(changed) > '.
                $this->timeout;

        $this->db->query($sql);
    }

    function
}