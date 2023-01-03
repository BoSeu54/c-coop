<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/pay_thumbnail.css">
  <title>C-COOPERATION | Payment Method</title>


  <style>
    .button-delete {
      color: black;
      background-color: #FFBF00;
      border: 0;
      border-radius: 4px;
      font-weight: bold !important;
    }

    .button-delete:hover {
      background-color: #FF4433;
      color: white;
    }

    input[type=text] {
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


  .li-account {
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


    .button {
      background-color: #4B5282;
      border: none;
      color: white;
      padding: 10px;
      width: 100%;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 20px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 12px;
      font-weight: bold;
    }

    .button:hover {
      font-size: 20px;
      background-color: #03c03c;
      color: white;
      font-weight: bold;

    }

    .main_text {
      font-size: 32px;
      color: #4B5282;
    }

    .botright_text {
      text-align: right;
      position: absolute;
      bottom: 18px;
      right: 16px;
      font-size: 18px;
    }

    .sub_text {
      font-size: 14px;
      color: #4B5282;
    }

    .sub_text_low {
      font-size: 14px;
      color: #4B528277;
    }

    .space {
      height: 50px;
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

    .text_color {
      font-size: 25px;
    }
  </style>
</head>

<body>
  <div class="right_col" role="main">
    <div class="space"></div>
    <ul id="myUL">
      <li>
        <form method="post">
          <a>
            <label for="uname"><b class="text_color">Add Bank Account</b></label><br>
            <input type="text" name="name" required placeholder="Account Name">
            <input type="text" name="wallet" required placeholder="Account No.">
            <div style="height:8px"></div>
            <select name="bank" id="bank" class="selectitem" required>
              <option value="" disabled selected hidden>---Select a Bank---</option>
              <div></div>
              <option value="Bangkok Bank (ฺBBL)" data-thumbnail="../image/banks/bbl.png">Bangkok Bank (ฺBBL) </option>
              <option value="Krungthai Bank (KTB)" data-thumbnail="../image/banks/ktb.png">Krungthai Bank (KTB) </option>
              <option value="Kasikorn Bank (KBank)" data-thumbnail="../image/banks/kbank.png">Kasikorn Bank (KBANK)</option>
              <option value="Bank of Ayudhya (BAY)" data-thumbnail="../image/banks/bay.png">Bank of Ayudhya (BAY) </option>
              <option value="The Siam Commercial Bank (SCB)" data-thumbnail="../image/banks/scb.png">The Siam Commercial Bank (SCB)</option>
              <option value="Government Savings Bank (GSB)" data-thumbnail="../image/banks/gsb.png">Government Savings Bank (GSB) </option>
              <option value="Kiatnakin Bank (KKP)" data-thumbnail="../image/banks/kk.png">Kiatnakin Bank (KKP)</option>
              <option value="Citi Bank (CITI) " data-thumbnail="../image/banks/citi.png">Citi Bank (CITI) </option>
              <option value="CIMB Thai Bank (CIMBT)" data-thumbnail="../image/banks/cimb.png">CIMB Thai Bank (CIMBT) </option>
              <option value="TMB Bank (TMB)" data-thumbnail="../image/banks/tmb.png">TMB Bank (TMB)</option>
              <option value="TISCO Bank (TISCO)" data-thumbnail="../image/banks/tisco.png">TISCO Bank (TISCO) </option>
              <option value="Thai credit Bank (TCR)" data-thumbnail="../image/banks/tcrb.png">Thai credit Bank (TCR)</option>
              <option value="Bank for Agriculture and Agricultural Cooperatives (BAAC)" data-thumbnail="../image/banks/baac1.png"> Bank for Agriculture and Agricultural Cooperatives (BAAC)</option>
              <option value="Thanachart Bank (ttb)" data-thumbnail="../image/banks/ttb.png">Thanachart Bank (TTB)</option>
              <option value="Islamic Bank of Thailand (IBank)" data-thumbnail="../image/banks/ibank.png">Islamic Bank of Thailand (IBANK) </option>
              <option value="United Overseas Bank Limited (UOB)" data-thumbnail="../image/banks/uob.png">United Overseas Bank Limited (UOB) </option>
              
              <option value="Government Housing Bank (GHB)" data-thumbnail="../image/banks/ghb.png">Government Housing Bank (GHB) </option>
              
            </select>
            <div style="height: 10px;"></div>
            <button type="submit" name="add" class="button button">Confirm</button>
          </a>
        </form>
      </li>
<div style="height: 30px;"></div>
      <?php
      $sql = "SELECT * FROM db_payment_method WHERE 1";

      $result = $cls_conn->select_base($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>

          <li class="li-account">
            <a>
              <p class="sub_text2">Bank Name : <span class="sub_text"><?php echo $row['paymethod_bank'] ?></span></p>
              <p class="sub_text2">Account name : <span class="sub_text"><?php echo $row['paymethod_name'] ?></span></p>
              <p class="sub_text2">Account No. : <span class="sub_text"><?php echo $row['paymethod_no'] ?></span></p>
              <button onclick="deleteMethod(<?php echo $row['paymethod_id'] ?>);" class="button-delete">Delete</button>
            </a>
          </li>
          <br>

      <?php
        }
      }
      ?>

    </ul>




  </div>

  <script src="../js/pay_thumbnail.js"></script>
  <script>
    function deleteMethod(id) {
      var r = confirm("Are you sure?");
      if (r == true) {
        window.location = "delete_payment.php?id=" + id;
      }
    }
  </script>


  <?php include('footer.php'); ?>

  <?php
  if (isset($_POST['add'])) {
    $bank = $_POST['bank'];
    $wallet = $_POST['wallet'];
    $name = $_POST['name'];


    $sql = "insert into db_payment_method(paymethod_bank,paymethod_name,paymethod_no) value ('$bank','$name','$wallet')";
    if ($cls_conn->write_base($sql) == TRUE) {
      echo $cls_conn->show_message("Insert Successfully");
      echo $cls_conn->goto_page(0, 'payment_method.php');
    }
  }
  ?>
</body>

</html>