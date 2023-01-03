<?php include('header.php'); ?>
<title>C-COOPERATION | Payment</title>
<link rel="icon" type="image/png" href="../images/logo-coops.png" />
<div class="right_col" role="main">

  <div class="space"></div>
  <p class="main_text">Select payment method</p><br>
  <ul id="myUL">

    <?php
    $sql = "SELECT * FROM db_payment_method WHERE 1";
    $result = $cls_conn->select_base($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>

        <li>
          <a href="payment_confirm.php?id=<?php echo $row['paymethod_id'] ?>">
            <p class="sub_text2">Bank Name : <span class="sub_text"><?php echo $row['paymethod_bank'] ?></span></p>
            <p class="sub_text2">Account Name : <span class="sub_text"><?php echo $row['paymethod_name'] ?></span></p>
            <p class="sub_text2">Account No. : <span class="sub_text"><?php echo $row['paymethod_no'] ?></span></p>
          </a>
        </li>

      <?php
      }
    } else {
      ?>

      <li>
        <a>
          <p class="sub_text2">Payment method not found</p>
          <p class="sub_text2">Contact the administrator to report the problem</p>
        </a>
      </li>

    <?php
    }
    ?>

  </ul>


  <?php include('footer.php'); ?>


  <style>
    body {
      height: 100%;
    }

    .button {
      background-color: #4B5282;
      border: none;
      color: white;
      padding: 20px;
      width: 100%;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 12px;
    }

    .main_text {
      font-size: 32px;
      color: #4B5282;
      padding-left: 50px;
    }

    .botright_text {
      text-align: right;
      position: absolute;
      bottom: 18px;
      right: 16px;
      font-size: 18px;
    }

    .sub_text {
      font-size: 18px;
      color: #4B5282;
      font-weight: bold;;
    }

    .sub_text2 {
      font-size: 14px;
      color: #4B5282aa;
    }


    .space {
      height: 100px;
    }

    .statusBox {
      max-width: 2000px;
      margin: auto;
      height: 90%;
      padding: 15px;
      background: #4B5282;
      box-shadow: 5px 5px 25px #4B5282;
      border-top-left-radius: 25px;
      border-top-right-radius: 25px;
    }

    .statusBox2 {
      position: block;
      max-width: 2000px;
      margin: auto;
      height: 600px;
      background: #ffffff;
      box-shadow: 5px 5px 25px #4B5282;
    }

    .statusBox3 {
      max-width: 2000px;
      margin: auto;
      height: 90%;
      padding: 15px;
      background: #4B5282;
      box-shadow: 5px 5px 25px #4B5282;
      border-bottom-left-radius: 25px;
      border-bottom-right-radius: 25px;
    }

    .column {
      float: left;
      width: 20%;
      padding: 0px;
      background: #ffffff00;

    }

    .column2 {
      float: left;
      width: 80%;
      padding: 0px;
      background: #ffffff00;
    }



    .row {
      width: 100%;
      padding-left: 10px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }


    #myUL {
      list-style-type: none;
      padding: 12;
      margin: 0;
      overflow: hidden;
      height: 100%;

    }


    #myUL li {
      padding: 10px;

    }

    #myUL li a {
      border: 1px solid #ddd;
      margin-top: -1px;
      /* Prevent double borders */
      background-color: #f6f6f6;
      padding: 12px;
      text-decoration: none;
      font-size: 18px;
      color: black;
      display: block;
      border-radius: 10px;
      box-shadow: 5px 5px 10px #4B528277;
    }

    #myUL li a:hover:not(.header) {
      background-color: #eee;
    }


    .message {
      word-wrap: break-word;
      white-space: pre-wrap;
      font-size: 14px;
      color: #4B5282aa;
      padding-right: 25%;
    }

    .messageR {
      word-wrap: break-word;
      white-space: pre-wrap;
      font-size: 14px;
      color: #4B5282aa;
      padding-left: 25%;
      text-align-last: right;
    }

    .right {
      text-align-last: right;
    }
  </style>