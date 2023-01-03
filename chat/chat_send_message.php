<?php session_start(); ?>
<?php include('../class_conn.php'); ?>
<?php include('../config.php') ?>
<?php

$cls_conn = new class_conn;

if($_SESSION['user_id']==null){
    echo $cls_conn->goto_page(0,'../logout.php');	
}

$_user = $_SESSION['user_name'];
$_id = $_SESSION['user_id'];
$room_id = $_GET['id'];
$message = $_GET['m'];
$dir = $_GET['dir'];

$sql="insert into chat_message(cm_room_id, cm_user_id,cm_message) value ('$room_id','$_id','$message')";
$result = $cls_conn->write_base($sql);

if($dir==0){
    $dir = "../user/chat.php?rid=$room_id";
    echo $cls_conn->goto_page(0,$dir);	

}else if($dir==1){
    $dir = "../admin/chat.php?rid=$room_id";
    echo $cls_conn->goto_page(0,$dir);	
}

?>