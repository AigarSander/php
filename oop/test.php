<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 11.01.2017
 * Time: 14:54
 */
require_once ('text.php');

$sentence = new text();
echo '<pre>';
print_r($sentence);
echo '</pre>';
$sentence ->setText('Hello text object!');
echo '<pre>';
print_r($sentence);
echo '</pre>';
$sentence ->showText();
echo '<hr/>';
$sentence2 = new text('Hello text by const.');
echo '<pre>';
print_r($sentence2);
echo '</pre>';
$sentence ->showText();
echo '<hr>';
?>