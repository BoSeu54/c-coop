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


$sql="select * from chat_message where cm_room_id = '$room_id'";
$result = $cls_conn->select_base($sql);

//echo $cls_conn->goto_page(0,'../admin/chat.php?r='$room_id');	

?>