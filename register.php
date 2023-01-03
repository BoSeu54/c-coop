<link href="https://fonts.googleapis.com/css?family=Athiti:300,400,700&amp;subset=thai" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="images/logo-coops.png">

<title>C-COOPERATION | Register</title>

<body style="background: #4B5282;">
  <div class="row">
    <div class="column">
      <div class="center">
        <div class="space"></div>
        <div class="center2">
          <img src="images/logo-coops.png" class="img_center">
          <div class="row" width="5vw">
            <div class="column2">
              <img src="images/spon_logo/Apple.png" style="width:3vw;">
            </div>
            <div class="column2">
              <img src="images/spon_logo/Kasikorn.png" style="width:3vw;">
            </div>
            <div class="column2">
              <img src="images/spon_logo/Facebook.png" style="width:3vw;">
            </div>
            <div class="column2">
              <img src="images/spon_logo/Twitter.png" style="width:3vw;">
            </div>
          </div>
        </div>


      </div>


    </div>
    <div class="column">
      <div class="center">
        <div class="space2"></div>
        <div class="center">
          <form action="" method="post">
            <div class="row">
              <div class="column">
                <div class="text_R">
                  <label for="uname"><b class="text_color">Firstname</b></label><br>
                  <input type="text" name="fname" required><br><br>
                </div>
              </div>
              <div class="column">
                <div class="text_L">
                  <label for="uname"><b class="text_color">Lastname</b></label><br>
                  <input type="text" name="lname" required><br><br>
                </div>

              </div>
            </div>
            <label for="uname"><b class="text_color">Username</b></label><br>
            <input type="text" name="uname" required><br><br>
            <label for="uname"><b class="text_color">Password</b></label><br>
            <input type="password" name="passw" required><br><br>
            <label for="uname"><b class="text_color">Confirm Password</b></label><br>
            <input type="password" name="passw2" required><br><br>
            <label for="uname"><b class="text_color">Email</b></label><br>
            <input type="text" name="email" required><br><br>
            <button type="submit" class="button button" name="regis">Register</button><br><br>
            <div class="center_text"><span class="text_color">Already on C-COOPERATION? <a class="text_color2" href="login.php">Sign In</a></span></div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
<style>
  .space {
    height: 27%;
  }

  .space2 {
    height: 15%;
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
    font-weight: bold;
  }
  .button:hover{
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
    width: 75%;
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
    width: 80%;
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


  .column {
    float: left;
    width: 50%;

  }

  .column2 {
    float: left;
    width: 25%;

  }


  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }



  .text_L {
    padding-left: 5px;
  }

  .text_R {
    padding-right: 5px;
  }
</style>



<?php
// session_start();
include('class_conn.php');
include('config.php')
?>
<?php

$cls_conn = new class_conn;


if (isset($_POST['regis'])) {
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $username = $_POST['uname'];
  $password = $_POST['passw'];
  $email = $_POST['email'];

  $sql = "INSERT INTO db_user(user_username, user_password, user_email, user_name, user_lastname, user_priority, user_regis_at, user_login_at) VALUE ('$username', '$password','$email','$firstname','$lastname','0',NOW(),NOW())";
  if ($cls_conn->write_base($sql) == TRUE) {


    echo "New record created successfully";
    sleep(1);

    $sql = "SELECT * FROM db_user WHERE user_username='$username' AND user_password='$password'";

    $result = $cls_conn->select_base($sql);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount >= 1) {
      session_start();
      $row = $result->fetch_assoc();
      error_reporting(error_reporting() & ~E_NOTICE);
      $_SESSION['user_id'] = $row['user_id'];
      $user_id = $row['user_id'];
      $_SESSION['user_name'] = $row['user_name'];
      $user_name = $row['user_name'];
      $user_lastname = $row['user_lastname'];

      $sqll = "INSERT INTO db_credit(credit_owner, credit_value) VALUE ('$user_id','0')";
      $res = $cls_conn->write_base($sqll);
      $word = "Register Successfully Welcome $user_name  $user_lastname Log In";


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
      exit();
    }
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn2);
  }
  $conn2->close();
  exit();
}

?>