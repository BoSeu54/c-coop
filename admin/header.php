<?php session_start(); ?>
<?php include('../class_conn.php'); ?>
<?php

$cls_conn = new class_conn;

if ($_SESSION['user_id'] == null) {
    echo $cls_conn->goto_page(0, 'logout.php');
}

$_user = $_SESSION['user_name'];
$_id = $_SESSION['user_id'];

$sql = "select * from db_user where user_id='$_id'";
$result = $cls_conn->select_base($sql);
$row = $result->fetch_assoc();

$_room_id = $row['user_room'];
$priority = $row['user_priority'];

if ($priority == 0) {
    echo $cls_conn->show_message("คุณไม่มีสิทธ์เข้าถึงพื้นที่นี้");
    echo $cls_conn->goto_page(0, '../user/dashboard.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="../template/vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1748fb8467.js" crossorigin="anonymous"></script>
    <!-- NProgress -->
    <link href="../template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../template/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../template/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../template/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../template/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!--    มีการใช้งาน ajax ของ jquery-->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <link href="../template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../template/vendors/datatables.net-bs/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../template/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../template/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../template/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../template/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../template/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../template/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../template/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="customcss.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Athiti:300,400,700&amp;subset=thai" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="icon" type="image/png" href="../images/logo-coops.png" />

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="text-align: center;">
                        <a href="dashboard.php" class="site_title" style="padding:0px;"> <img src="../images/logo-coops.png" width="auto" height="48px" style="padding-top:2px;"> <span style="padding-left: 5px;"></span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix ">

                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">

                            <ul class="nav side-menu">

                                <li><a><i class="fa fa-database"></i>Data Management<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="user_info.php"><i class="fa fa-user"></i>User information</a></li>
                                        <li><a href="payment_history.php"><i class="fa fa-book"></i>Financial History</a></li>

                                    </ul>
                                </li>

                                <li><a><i class="fa fa-upload"></i>Insert Data<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <?php
                                        if ($priority == 2) {
                                        ?>
                                            <li><a href="payment_method.php"><i class="fa fa-credit-card"></i>Payment Method</a></li>
                                        <?php
                                        }
                                        ?>

                                        <li><a href="news_manage.php"><i class="fa fa-newspaper-o"></i>News</a></li>
                                    </ul>
                                </li>

                                <?php

                                $sql = "SELECT * FROM db_payment WHERE payment_status=0";

                                $result = $cls_conn->select_base($sql);
                                $no = $result->num_rows;

                                $sql = "SELECT * FROM db_withdraw WHERE withdraw_status=0";

                                $result = $cls_conn->select_base($sql);
                                $no2 = $result->num_rows;

                                if ($no2 == 0) {
                                    $no2 = "";
                                } else {
                                    $no2 = "(" . $no2 . ")";
                                }
                                if ($no == 0) {
                                    $no = "";
                                } else {
                                    $no = "(" . $no . ")";
                                }

                                ?>

                                <li><a><i class="fa fa-credit-card-alt"></i>Credit<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="credit_info.php"><i class="fa fa-file-text-o"></i>Show Credit</a></li>



                                        <li><a href="payment_confirm.php"><i class="fa fa-tags"></i>Deposit Confirmation <?php echo $no ?></a></li>
                                        <li><a href="withdraw_confirm.php"><i class="fa fa-money"></i>Withdraw Confirmation <?php echo $no2 ?></a></li>
                                        <?php
                                        if ($priority == 2) {
                                        ?>
                                            <li><a href="search.php"><i class="fa fa-pencil"></i>Credit management</a></li>
                                        <?php
                                        }
                                        ?>

                                    </ul>
                                </li>


                                <li><a><i class="fa fa-exclamation"></i>Problems reports<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="report.php"><i class="fa fa-envelope"></i>Problems reports</a></li>
                                        <li><a href="chat.php"><i class="fa fa-commenting-o"></i>Chat</a></li>
                                    </ul>
                                </li>

                                <li><a href="../user/dashboard.php"><i class="fa fa-user-secret"></i>Go to User page</a></li>

                                <li><a href="../logout.php"><i class="fa fa-sign-out"></i>Sign Out</a></li>

                            </ul>
                        </div>

                    </div>

                </div>

            </div>
            <!-- top navigation -->

            <div class="top_nav">
                <div class="nav_menu">
                    <nav>

                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars " style="float: inline-start;  padding-left: 5px;"></i></a>

                        </div>

                        <ul class="nav navbar-nav navbar-right">

                            <li class="">
                                <?php
                                ?>

                                <a href="javascript:;" class="user-profile dropdown-toggle" class="fa fa user" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $_SESSION['user_name'] ?>

                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li style="border: 2px solid #ccc; font-size: 18px;"><a href="setting.php">Settings&nbsp; <i class="fa fa-cogs" ></i></a></li>
                                    <li style="border: 2px solid #ccc; font-size: 18px;"><a href="../logout.php">Sign Out&nbsp; <i class="fa fa-sign-out" ></i></a></li>
                                </ul>

                            </li>
                            <!-- <span style="float: right; font-size: 16px; padding-top: 10px;">username</span> -->

                        </ul>
                    </nav>
                    <br><br>
                    <?php


                    ?>
                </div>

            </div>

            <!-- /top navigation -->
            <style>
                a {
                    font-family: 'Prompt', sans-serif;
                }
            </style>