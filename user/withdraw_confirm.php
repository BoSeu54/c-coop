<?php
session_start();
include('../class_conn.php');
include('../config.php');

$cls_conn = new class_conn;
$_user = $_SESSION['user_name'];
$_id = $_SESSION['user_id'];
$value = $_GET['value'];
$bank = $_GET['bank'];
$wallet = $_GET['wallet'];


$sql = "select * from db_credit where credit_owner = '$_id'";
$resultss = $cls_conn->select_base($sql);
$rowss = $resultss->fetch_assoc();


$credit = $rowss['credit_value'];

$sql = "SELECT * FROM db_setting WHERE 1";
$result = $cls_conn->select_base($sql);
$row = $result->fetch_assoc();
if ($row['setting_minwit'] < $value) {
    if ($credit > $value) {
        $sql = "insert into db_withdraw(withdraw_owner,withdraw_value,withdraw_status,withdraw_target,withdraw_time,withdraw_wallet_id) value ('$_id','$value','0','$bank',NOW(),'$wallet')";
        if ($cls_conn->write_base($sql) == TRUE) {
            $sql = "insert into db_payment_history(payhistory_owner_id,payhistory_type,payhistory_value,payhistory_by_id,payhistory_time) value ('$_id','2','$value','$_id',NOW())";
            $history = $cls_conn->write_base($sql);

            $ups = $credit - $value;

            $sql = "UPDATE `db_credit` SET `credit_value`='$ups' WHERE credit_owner = $_id";
            $history2 = $cls_conn->write_base($sql);

            echo $cls_conn->show_message("Completed Confirm");
            echo $cls_conn->goto_page(0, 'report_withdraw.php');
        }
    } else {
        echo $cls_conn->show_message("Withdrawal amount is too high");
        echo $cls_conn->goto_page(0, 'withdrawn.php');
    }
} else {
    echo $cls_conn->show_message("The minimum withdrawal amount is " . $row['setting_minwit']);
    echo $cls_conn->goto_page(0, 'withdrawn.php');
}
