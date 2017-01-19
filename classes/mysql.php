<?php

/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 19.01.2017
 * Time: 12:31
 */
class mysql {
    var $conn = false;
    var $host = false;
    var $user = false;
    var $pass = false;
    var $dbname = false;
    var $history = array();

    function __construct($h, $u, $p, $dbn) {
        $this->host = $h;
        $this->user = $u;
        $this->pass = $p;
        $this->dbname = $dbn;
    }

    function connect() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->conn ) {
            echo 'There was a problem connecting to the database!< /br>';
            exit;
        }
    }

    function getMicroTime() {
        list($usec, $sec) = explode(' ', microtime());
        return ((float)$usec + (float)$sec);
    }

    function query($sql) {
        $begin = $this->getMicroTime();
        $res = mysqli_query($this->conn, $sql);
        if($res === FALSE) {
            echo 'Incorrect query <b>' . $sql . '</b><br /> ';
            echo mysqli_error($this->conn).'<br />';
            exit;
        }
        echo $time = $this->getMicroTime() - $begin;
        $this->history[] = array('sql' => $sql, 'time' => $time);
        return $res;
    }

    function getArray($sql) {
        $res = $this->query($sql);
        $data = array();
        while($record = mysqli_fetch_assoc($res)) {
            $data[] = $record;
        }
        if(count($data) == 0) {
            return false;
        } else {
            return $data;
        }
    }

    function showHistory() {
        if(count($this->history) > 0) {
            echo '<hr />';
            foreach ($this->history as $key=>$value) {
                echo '<li>'.$value['sql'].' ('.round($value['time'], 8).') </li><br />';
            }
        }
    }
}