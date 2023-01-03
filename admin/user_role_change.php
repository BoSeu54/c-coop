<?php session_start(); ?>
  <?php include('../class_conn.php'); ?>
  <?php include('../config.php') ?>
<?php

echo "test";

$cls_conn = new class_conn;
error_reporting(error_reporting() & ~E_NOTICE);
$_user = $_SESSION['user_name'];
$_id = $_SESSION['user_id'];

$uid = $_GET['id'];
$role = $_GET['r'];

//update withdraw status
$sql = "update db_user set `user_priority` = '$role' where user_id = '$uid'";
$res = $cls_conn->write_base($sql);

echo $cls_conn->goto_page(0, 'user_info.php');

?>