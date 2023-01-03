<?php session_start(); ?>
<?php include('../class_conn.php'); ?>
<?php
error_reporting(error_reporting() & ~E_NOTICE);
$id = $_GET['id'];

$cls_conn = new class_conn;

$sql = "DELETE FROM `db_payment_method` WHERE `paymethod_id` = '$id'";

$res = $cls_conn->write_base($sql);

if ($res == true) {
    echo $cls_conn->show_message("Deleted Complete");
    echo $cls_conn->goto_page(0, 'payment_method.php');
} else {
    echo $cls_conn->show_message("An error occurred.");
}

?>