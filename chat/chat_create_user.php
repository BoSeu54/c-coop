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

$sql="insert into chat_room(room_name) value ('$_user')";
$result = $cls_conn->write_base($sql);
if($result == true){
    
    $sql="SELECT * FROM chat_room WHERE room_name='$_user'";
    $result = $cls_conn->select_base($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount >=1) {
        $row = $result->fetch_assoc();
        $room_id=$row['room_id'];

        $sql="insert into chat_participants(cp_user_id, cp_room_id) value ('$_id','$room_id')";
        $result = $cls_conn->write_base($sql);

        $sql="update db_user set user_room = '$room_id' where user_id = '$_id'";
        $result = $cls_conn->write_base($sql);
        echo $cls_conn->goto_page(0,"../user/chat.php?rid=".$room_id);	
    }
}


?>