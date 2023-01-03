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


$sql="SELECT * FROM chat_participants WHERE cp_room_id='$room_id' AND cp_user_id='$_id'";


$result = $cls_conn->select_base($sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount==0) {
    $sql="insert into chat_participants(cp_user_id, cp_room_id) value ('$_id','$room_id')";
    $result = $cls_conn->write_base($sql);
}

//echo $cls_conn->goto_page(0,'../admin/chat.php?r='$room_id');	

?>