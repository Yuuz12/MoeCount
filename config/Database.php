<?php
include_once('../config/class.php');

$db = new db;

$name = '';
if(empty($_GET['name'])){
    $name = 'DEFAULT_NAME';
}else{
    $name = $_GET['name'];
}

$pdo = new PDO('mysql:host='.$db->__db('hostname').';dbname='.$db->__db('database'), $db->__db('username') , $db->__db('password'));
$stmt = $pdo->prepare('SELECT * FROM `count` WHERE `name` = "'.$name.'"');
$stmt->execute();
$name_ = $stmt->fetchAll();

if(empty($name_)) {
    $INSERT_NAME = $pdo->prepare('INSERT INTO `count`(`name`, `count`)VALUES("'.$name.'",1)');// 新建账号
    $INSERT_NAME->execute();
    $NAME_COUNT_F = $INSERT_NAME->fetchAll();
    $NAME_COUNT = array(
        "name" => $name,
        "count" => 1,
    );
} else {
    $count_F = $name_[0][1] + 1;
    $UPDATE_COUNT = $pdo->prepare('UPDATE `count` SET `count`="'.$count_F.'" WHERE `name` = "'.$name.'"');// 更新数据
    $UPDATE_COUNT->execute();
    $COUNT_ = $UPDATE_COUNT->fetchAll();
    
    $SELECT_NAME = $pdo->prepare('SELECT * FROM `count` WHERE `name` = "'.$name.'"');
    $SELECT_NAME->execute();
    $_name_ = $SELECT_NAME->fetchAll();
    $NAME_COUNT = array(
        "name" => $_name_[0][0],
        "count" => $_name_[0][1],
    );
}