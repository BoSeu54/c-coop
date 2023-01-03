<?php include('header.php'); ?>
<title>C-COOPERATION | Add proof of payment</title>
<form method="post" action="" enctype="multipart/form-data">
  <div class="right_col" style="background-color: #EEE0B5" role="main">
    <div style="height: 50px;"></div>
    <div class="center">
      <p class="main_text">Transfer Information</p><br>
      <?php
      error_reporting(error_reporting() & ~E_NOTICE);
      $pid = $_GET['id'];
      $sql = "SELECT * FROM db_payment_method WHERE paymethod_id = '$pid'";
      $result = $cls_conn->select_base($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <a class="box">
            <p class="sub_text2">Bank : <span class="sub_text"><?php echo $row['paymethod_bank'] ?></span></p>
            <p class="sub_text2">Account Name : <span class="sub_text"><?php echo $row['paymethod_name'] ?></span></p>
            <p class="sub_text2">Account No. : <span class="sub_text"><?php echo $row['paymethod_no'] ?></span></p>
          </a>
      <?php
        }
      }
      ?>
      <div class="space2"></div>
      <label for="no"><b class="text_color">Ref.No.</b></label>
      <input type="text" name="no" placeholder="Please Enter Ref No." required>
      <label for="value"><b class="text_color">Amount</b></label>
      <input type="text" name="value" placeholder="0.00 Baht" required>
      <label for="image"><b class="text_color">Attach File</b></label>
      <input type="file" name="image" required>
      <div style="height:25px ;"></div>
      <button type="submit" name="confirm" class="button button">Confirm</button><br><br>
      <?php
      error_reporting(0);
      if (isset($_POST['confirm'])) {

        $code = $_POST['no'];
        $value = $_POST['value'];

        if ($value <= 1000000) {
          $sql = "SELECT * FROM db_setting WHERE 1";
          $result = $cls_conn->select_base($sql);
          $row = $result->fetch_assoc();
          if ($row['setting_minadd'] <= $value) {
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "../image/payment_confirm/" . $filename;
            if (move_uploaded_file($tempname, $folder)) {
              $sql = "insert into db_payment(payment_owner,payment_value,payment_img,payment_status,payment_target,payment_time,payment_no) value ('$_id','$value','$filename','0','$pid',NOW(),'$code')";
              if ($cls_conn->write_base($sql) == TRUE) {
                $sql = "insert into db_payment_history(payhistory_owner_id,payhistory_type,payhistory_value,payhistory_by_id,payhistory_time) value ('$_id','0','$value','$_id',NOW())";
                $history = $cls_conn->write_base($sql);
                echo $cls_conn->show_message("Completed");
                echo $cls_conn->goto_page(0, 'report.php');
              }
            }
          } else {
            echo $cls_conn->show_message("The minimum deposit amount is " . $row['setting_minadd']);
          }
        } else {
          echo $cls_conn->show_message("The maximum amount for deposit / 1 time is 1,000,0000");
        }
      }
      ?>
    </div>
  </div>
</form>
<?php include('footer.php'); ?>
<style>
  .text_color {
    color: #4B5282;
    font-size: 16px;
  }

  .center {
    margin: auto;
    width: 50%;
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



  input[type=text],
  input[type=file] {
    box-shadow: 2px 2px 4px #00000066 inset;
    background-color: #fff;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 10px;
    font-family: 'Prompt', sans-serif;
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
    font-size: 55px;
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
    font-size: 18px;
    color: #4B5282;
    font-weight: bold;
    ;
  }

  .sub_text2 {
    font-size: 18px;
    color: #4B5282aa;
  }

  .sub_text_low {
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
  }

  .button:hover {
    font-size: 20px;
    background-color: #03c03c;
    color: white;
  }

  .box {
  
    background-color: #ffffff;
    border: none;
    color: #4B5282;
    width: 100%;
    padding: 12px 20px;
    margin: 15px 0;
    text-align: left;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
    box-shadow: 5px 5px 25px #00000066;
  }
</style>