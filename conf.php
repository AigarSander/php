<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 19.01.2017
 * Time: 12:19
 */
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
define('STYLE_DIR', 'css/');
define('ACTS_DIR', 'acts/');
define('DEFAULTACT', 'default');

require_once (CLASSES_DIR.'template.php');
require_once (CLASSES_DIR.'http.php');
require_once (CLASSES_DIR.'linkObject.php');
require_once (CLASSES_DIR.'mysql.php');
require_once ('dbconf.php');

$http = new linkObject();
$db = new mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>