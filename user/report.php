<?php include('header.php'); ?>
<title>C-COOPERATION | Deposit status</title>
<div class="right_col" role="main">

  <div class="space"></div>

  <a class="head_text">Deposit History</a>

  <table id="customers">
    <tr>
      <th>Transaction Date</th>
      <th>Amount</th>
      <th>Ref.No.</th>
      <th>Status</th>
    </tr>

    <?php
    error_reporting(error_reporting() & ~E_NOTICE);
    $sql = "SELECT * FROM db_payment WHERE payment_owner='$_id'";

    $result = $cls_conn->select_base($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>

        <tr>
          <td><?php echo $row['payment_time'] ?></td>
          <td><?php echo $row['payment_value'] ?></td>
          <td><?php echo $row['payment_no'] ?></td>
          <?php

          if ($row['payment_status'] == 0) {
          ?>
            <td> <b style="color:blue">Pending</b></td>
          <?php
          } else if ($row['payment_status'] == 7) {
          ?>
            <td> <b style="color:red">Unsuccesful</b></td>
          <?php
          } else {
          ?>
            <td> <b style="color:green">Successfully</b></td>
          <?php
          }

          ?>

        </tr>

    <?php
      }
    }
    ?>
  </table>

  <?php
  if ($result->num_rows == 0) {
  ?> <div class="center"><a class="center_text" style="color:red">Information is Currently Unavailable</a></div> <?php
                                                                        }
                                                                          ?>


</div>
<?php include('footer.php'); ?>

<style>
  .center_text {
    font-size: 24px;
    color: #4B5282;
  }

  .center {
    margin: auto;
    width: 100%;
    padding: 10px;
    padding-top: 50px;
    text-align: center;
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
  }

  .sub_text_low {
    font-size: 18px;
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

  #customers tr:nth-child(even) {
    background-color: #E9E9E9;
  }

  #customers tr:nth-child(odd) {
    background-color: #C0C0C0;
  }
</style>