<?php
/**
 * Created by PhpStorm.
 * User: B50-50
 * Date: 11.01.2017
 * Time: 14:54
 */
require_once ('text.php');
require_once ('ctext.php');

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
$sentence2 ->showText();
echo '<hr>';
$sentence3 = new ctext('Hello text by const.(colored)');
$sentence3->setColor('#FF0000');
echo '<pre>';
print_r($sentence3);
echo '</pre>';
$sentence3 ->showText();
?>