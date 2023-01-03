<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/thumbnail.js"></script>
  <link rel="stylesheet" href="../css/thumbnail.css">
  <title>C-COOPERATION | Credit adjustment</title>
  <style>
    select:required:invalid {
      color: gray;
    }

    option[value=""][disabled] {
      display: none;
    }

    option {
      color: black;

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
      font-size: 20px;
      background-color: #03c03c;
      color: white;
      font-weight: bold;
    }


    .center {
      margin: auto;
      width: 80%;
      height: 60%;
    }



    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4B5282;
      color: white;
    }



    input[type=text] {
      width: 100%;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      background-color: white;
      background-position: 10px 10px;
      background-repeat: no-repeat;
      padding: 12px 20px 12px 40px;
      -webkit-transition: width 0.4s ease-in-out;
      transition: width 0.4s ease-in-out;
    }

    input[type=text]:focus {
      outline: none;
      /*to remove the focus outline in chrome */
      width: 100%;
    }

    .has-search .form-control-feedback {
      position: absolute;
      z-index: 2;
      display: block;
      width: 2.375rem;
      height: 2.375rem;
      line-height: 2.375rem;
      text-align: center;
      pointer-events: none;
      color: #aaa;
    }

    .main_text {
      text-align: center;
      font-size: 64px;
      color: #4B5282;
    }

    .botright_text {
      text-align: right;
      position: absolute;
      bottom: 18px;
      right: 16px;
      font-size: 18px;
    }

    .sub_text1 {
      font-size: 18px;
      color: #4B5282;
    }

    .sub_text2 {
      font-size: 18px;
      color: #4B528277;
    }

    .space {
      height: 100px;
    }

    .space2 {
      height: 20px;
    }

    .statusBox {
      max-width: 2000px;
      margin: auto;
      height: 200px;
      padding: 15px;
      border-radius: 25px;
      background: #ffffff;
      box-shadow: 5px 5px 25px #4B5282;
    }

    .statusBox2 {
      position: relative;
      max-width: 2000px;
      margin: auto;
      padding: 15px;
      height: 200px;
      border-radius: 25px;
      background: #ffffff;
      box-shadow: 5px 5px 25px #4B5282;
    }

    .column {
      float: left;
      width: 60%;
      padding: 10px;
      background: #00000000;

    }

    .column2 {
      float: left;
      width: 40%;
      padding: 10px;
      background: #00000000;
    }

    .column3 {
      float: left;
      width: 40%;
      height: auto;
      padding: 10px;
      background: #00000000;
    }

    .column4 {
      float: left;
      width: auto;
      padding: 10px;
      background: #00000000;
    }

    .row {
      margin: 25px;
      padding-right: 50px;
      width: 100%;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
  </style>
</head>

<body>
  <div class="right_col" role="main">

    <div class="space"></div>

    <div class="center">
      <p class="main_text">Modify User Credits</p><br>
      <form method="post">
        <br><label for="no"><b class="text_color">Users</b></label><br>
        <select name="user" id="user" class="selectitem" required>
          <option value="" disabled selected hidden>---Select Users---</option>
          <div></div>
          <?php
          $sql = "SELECT * FROM db_user WHERE 1";

          $result = $cls_conn->select_base($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <option value="<?php echo $row['user_id'] ?>">
                <a class="sub_text1"><?php echo $row['user_name'] ?> <?php echo $row['user_lastname'] ?></a>
                (<a class="sub_text2"><?php echo $row['user_email'] ?></a>)
              </option>
          <?php
            }
          }
          ?>
        </select>
        <div></div>
        <br><label for="no"><b class="text_color">Select Edit Format</b></label><br>
        <select name="type" id="type" class="selectitem" required>
          <option value="" disabled selected hidden>---Select a Format---</option>
          <div></div>
          <option value="Add" data-thumbnail="https://img.icons8.com/color/30/plus-2-math.png" style=" font-size: 18px">Increase</option>
          <option value="Rem" data-thumbnail="https://img.icons8.com/fluency/30/null/minus-2-math.png" style="font-size: 18px;">Decrease</option>
        </select>
        <div></div>
        <br><label for="value"><b class="text_color">Amount</b></label>
        <input type="text" name="value" placeholder="0.00 Baht" required>
        <div class="space2"></div>
        <button type="submit" name="confirm" class="button button">Confirm</button><br><br>


      </form>

    </div>
    <div class="space2"></div>



  </div>

  <?php include('footer.php'); ?>




  <?php


  if (isset($_POST['confirm'])) {
    $user = $_POST['user'];
    $type = $_POST['type'];
    $value = $_POST['value'];



    $sql = "SELECT * FROM db_credit WHERE credit_owner='$user'";
    $result = $cls_conn->select_base($sql);
    $row = $result->fetch_assoc();

    $credit = $row['credit_value'];

    switch ($type) {
      case "Add":
        $credit = $credit + $value;
        $tt = "Increase";
        break;
      case "Rem":
        $credit = $credit - $value;
        $tt = "Decrease";
        break;
    }


    $sql = "update db_credit set `credit_value` = '$credit' where credit_owner = '$user'";
    $res = $cls_conn->write_base($sql);
    error_reporting(error_reporting() & ~E_NOTICE);
    $_id = $_GET['id'];
    $sql = "insert into db_payment_history(payhistory_owner_id,payhistory_type,payhistory_value,payhistory_by_id,payhistory_time) value ('$user','4','$tt$value','$_id',NOW())";
    $history = $cls_conn->write_base($sql);
  }



  ?>
</body>


</html>