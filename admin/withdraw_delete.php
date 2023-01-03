<?php session_start(); ?>
  <?php include('../class_conn.php'); ?>
  <?php include('../config.php') ?>
<?php

echo "test";

$cls_conn = new class_conn;
error_reporting( error_reporting() & ~E_NOTICE );
$_user = $_SESSION['user_name'];
$_id = $_SESSION['user_id'];

$pid = $_GET['id'];

//update withdraw status
$sql = "update db_withdraw set `withdraw_status` = '7' where withdraw_id = '$pid'";
$res = $cls_conn->write_base($sql);

//get credit to remove
$sql = "select * from db_withdraw where withdraw_id = '$pid'";
$result = $cls_conn->select_base($sql);
$row = $result->fetch_assoc();

$pay_owner = $row['withdraw_owner'];
$pay_value = $row['withdraw_value'];


$sql = "SELECT * FROM db_credit WHERE credit_owner='$pay_owner'";
$result = $cls_conn->select_base($sql);
$row = $result->fetch_assoc();

$credit = $row['credit_value'];
$credit = $credit + $pay_value;

$sql = "update db_credit set `credit_value` = '$credit' where credit_owner = '$pay_owner'";
$res = $cls_conn->write_base($sql);


$sql = "insert into db_payment_history(payhistory_owner_id,payhistory_type,payhistory_value,payhistory_by_id,payhistory_time) value ('$pay_owner','7','$pay_value','$_id',NOW())";
$history = $cls_conn->write_base($sql);



echo $cls_conn->goto_page(0, 'withdraw_confirm.php');










?>