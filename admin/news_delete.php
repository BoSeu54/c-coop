<?php session_start(); ?>
<?php include('../class_conn.php'); ?>
<?php
error_reporting(error_reporting() & ~E_NOTICE);
$id = $_GET['id'];

$cls_conn = new class_conn;



$sql = "select * from db_new where new_id = '$id'";
$res = $cls_conn->select_base($sql);
$row = $res->fetch_assoc();
unlink("../image/news/" . $row['new_img']);

$sql = "delete from db_new where new_id = '$id'";

$res = $cls_conn->write_base($sql);





if ($res == true) {
    echo $cls_conn->show_message("deleted successfully");
    echo $cls_conn->goto_page(0, 'news_manage.php');
} else {
    echo $cls_conn->show_message("An error occurred.");
}

?>