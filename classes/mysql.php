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
}