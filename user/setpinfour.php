<?php include('header.php'); ?>
<title>C-COOPERATION | Security Pin </title>
<style>
  body {
    background-color: #4B5282;
  }

  .headd {
    font-size: 40px;
    text-align: start;
    color: #4B5282;
    padding: 0 0 20px 0;
  }

  .bordie {
    font-size: 20px;
    text-align: start;
    color: #4B5282;
  }

  .statusBox {
    position: relative;
    max-width: auto;
    margin: auto;
    padding: 15px;
    height: 400px;
  }

  input[type=text] {
    border-radius: 15px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, .39), 0 -1px 1px #FFF, 0 1px 0 #FFF;
    border: none;
  }

  input[type=password] {
    border-radius: 15px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, .39), 0 -1px 1px #FFF, 0 1px 0 #FFF;
    border: none;
  }
  input[type=submit] {
    background-color: #4B5282;
    /* Green */
    border: none;
    color: white;
    border-radius: 15px;
    padding: 12px 28px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    width: 20%;
    cursor: pointer;
    -webkit-transition-duration: 0.4s;
    /* Safari */
    transition-duration: 0.4s;
  }
  input[type=submit]:hover {
    box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
  }
</style>
<div class="right_col" style="background-color: #EEE0B5; padding: 100px 100px 250px 100px">
  <div class="statusBox">
    <form method="post">
      <p class="headd">Set Security Pin</p>
      <p class="bordie">4 digit</p>
      <row>
        <?php
        error_reporting(error_reporting() & ~E_NOTICE);
        $sql = "SELECT * FROM db_user WHERE user_id = $_id";

        $result = $cls_conn->select_base($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <input type="text" id="pin" name="pin0" maxlength="1" size="1" value="<?php echo substr($row['user_pin'], 0, 1) ?>">
            <input type="text" id="pin" name="pin1" maxlength="1" size="1" value="<?php echo substr($row['user_pin'], -3, 1) ?>">
            <input type="text" id="pin" name="pin2" maxlength="1" size="1" value="<?php echo substr($row['user_pin'], -2, 1) ?>">
            <input type="text" id="pin" name="pin3" maxlength="1" size="1" value="<?php echo substr($row['user_pin'], -1, 1) ?>">

        <?php
          }
        } else {
          echo "result 0";
        }
        ?>
        <br><br>
      </row>
      <p class="bordie">Enter password to confirm security settings</p>
      <input type="password" id="password" name="password" maxlength="20" size="27"><br><br>
      <input type="submit" value="บันทึก" name="save">
    </form>
  </div>

</div>
<?php include('footer.php'); ?>
<?php

if (isset($_POST['save'])) {
  $pin0 = $_POST['pin0'];
  $pin1 = $_POST['pin1'];
  $pin2 = $_POST['pin2'];
  $pin3 = $_POST['pin3'];
  $password = $_POST['password'];

  $sql = "select * from db_user where user_id = '$_id' and user_password = '$password'";

  $res = $cls_conn->select_base($sql);

  $num = mysqli_num_rows($res);

  $pin = $pin0 . $pin1 . $pin2 . $pin3;
  if ($num >= 1) {
    $sql = "update db_user set `user_pin` = '$pin' where user_id = '$_id'";
    $res = $cls_conn->write_base($sql);
    echo $cls_conn->show_message("Pin Changed Complete");
    echo $cls_conn->goto_page(0, 'setpinfour.php');
  } else {
    echo $cls_conn->show_message("Incorrect Password");
  }
}


?>