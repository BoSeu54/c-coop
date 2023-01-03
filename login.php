<link href="https://fonts.googleapis.com/css?family=Athiti:300,400,700&amp;subset=thai" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="images/logo-coops.png">
<script src="alert/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="alert/dist/sweetalert.css">
<title>C-COOPERATION | Sign In</title>

<body style="background: #4B5282;">
  <div class="center">
    <div class="center2">
      <img src="images/logo-coops.png" class="img_center">
      <div style="height: 20px"></div>
      <div class="row" width="4vw">
        <div class="column">
          <img src="images/spon_logo/Apple.png" style="width:3vw;">
        </div>
        <div class="column">
          <img src="images/spon_logo/Kasikorn.png" style="width:3vw;">
        </div>
        <div class="column">
          <img src="images/spon_logo/Facebook.png" style="width:3vw;">
        </div>
        <div class="column">
          <img src="images/spon_logo/Twitter.png" style="width:3vw;">
        </div>
      </div>
    </div>

    <div class="space"></div>

    <div class="center">
      <form action="" method="post">
        <label for="uname"><b class="text_color">Username</b></label><br>
        <input type="text" name="uname" required><br>

        <label for="uname"><b class="text_color">Password</b></label><br>
        <input type="password" name="passw" required><br><br>

        <button type="submit" name="login" class="button">Sign In</button><br><br>
        <div style="height: 20px"></div>

        <div class="center_text"><span class="text_color">New to C-COOPERATION &nbsp;<a class="text_color2" href="register.php">Sign Up</a></span></div>
      </form>
    </div>
  </div>
</body>


<style>
  .space {
    height: 50px;
  }

  .column {
    float: left;
    width: 25%;

  }


  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  .button {
    background-color: #ffffff;
    border: none;
    color: #4B5282;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
    box-shadow: 5px 5px 25px #00000066;
    font-weight: bold;
  }

  .button:hover {
    background-color: #0FFF50;

  }

  .text_color {
    color: #ffffff;
  }

  .text_color2 {
    color: #ffffff;
    font-weight: bold;
    font-size: 20px;
  }

  .text_color2:hover {
    color: #0FFF50;
  }

  .img_center {
    width: 35%;
    height: auto;
    margin: auto;
    padding: 15px;

  }

  .center_text {
    margin: auto;
    text-align: center;
  }

  .center2 {
    margin: auto;
    width: 100%;
    text-align: center;
  }

  .center {
    margin: auto;
    width: 50%;
    height: 60%;
  }

  input[type=text],
  input[type=password] {
    box-shadow: 2px 2px 4px #00000066 inset;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 10px;
    font-family: 'Prompt', sans-serif;
  }

  html,
  body {
    font-family: 'Prompt', sans-serif;
    height: 100%;
    margin: 0;
  }
</style>



<?php session_start(); ?>
<?php include('class_conn.php'); ?>
<?php include('config.php') ?>
<?php

$cls_conn = new class_conn;

if (isset($_POST['login'])) {

  $username = $_POST['uname'];
  $password = $_POST['passw'];


  $sql = "select * from db_user where user_username = '$username' and user_password = '$password'";

  $num = $cls_conn->select_base($sql);
  // if($num > 0)
  if (mysqli_num_rows($num) > 0) {
    $rs = $cls_conn->select_base($sql);
    while ($row = mysqli_fetch_array($rs)) {
      $user_id = $row['user_id'];
      $user_name = $row['user_name'];
      $user_lastname = $row['user_lastname'];
      $user_pio = $row['user_priority'];
    }
    $word = "Welcome $user_name  $user_lastname  login";
    $sql = "update db_user set `user_login_at` = NOW() where user_id = '$user_id'";
    $res = $cls_conn->write_base($sql);
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_lastname'] = $user_lastname;

    if ($user_pio == "2") {
      echo $cls_conn->goto_page(0, 'admin/dashboard.php');
    } else if ($user_pio == "0") {
      $sql = "SELECT * FROM db_setting WHERE 1";
      $result = $cls_conn->select_base($sql);
      $row = $result->fetch_assoc();
      if ($row['setting_webstatus'] == 0) {
        echo $cls_conn->show_message($word);
        echo $cls_conn->goto_page(0, 'user/dashboard.php');
      } else {
        echo $cls_conn->show_message("The website is being updated.");
        echo $cls_conn->goto_page(0, 'login.php');
      }
    } else if ($user_pio == "1") {
      $sql = "SELECT * FROM db_setting WHERE 1";
      $result = $cls_conn->select_base($sql);
      $row = $result->fetch_assoc();
      if ($row['setting_webstatus'] == 0) {
          echo $cls_conn->show_message($word);
        echo $cls_conn->goto_page(0, 'user/dashboard.php');
      } else {
        echo $cls_conn->show_message("The website is being updated.");
        echo $cls_conn->goto_page(0, 'admin/dashboard.php');
      }
    }
  } else {
    echo $cls_conn->show_message("Incorrect Password");
  }
}

?>
