<?php include('header.php'); ?>
<title>C-COOPERATION | Withdrawal status</title>
<div class="right_col" role="main">

  <div class="space"></div>
  <a class="head_text">Withdrawal confirm</a>
  <table id="customers">
    <tr>
      <th>ID</th>
      <th>From</th>
      <th>Amount</th>
      <th>To</th>
      <th>Transaction date</th>
      <th>Status</th>
    </tr>

    <?php
    $sql = "SELECT * FROM db_user WHERE 1";
    $res = $cls_conn->select_base($sql);
    while ($datas = $res->fetch_assoc()) {
      $userinfo[] = $datas;
    }
    $sql = "SELECT * FROM db_withdraw WHERE 1";



    $result = $cls_conn->select_base($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>

        <tr>
          <td><?php echo $row['withdraw_id'] ?></td>

          <?php
          foreach ($userinfo as $usrinfo) {
            if ($usrinfo['user_id'] == $row['withdraw_owner']) {
          ?><td><?php echo $usrinfo['user_name'] . " " . $usrinfo['user_lastname'] ?></td><?php
                                                                                        }
                                                                                      }

                                                                                          ?>
          <td><?php echo $row['withdraw_value'] ?></td>
          <td><?php echo $row['withdraw_target'] ?><br><?php echo $row['withdraw_wallet_id'] ?></td>
          <td><?php echo $row['withdraw_time'] ?></td>
          <?php

          if ($row['withdraw_status'] == 0) {
          ?>
            <td><b style="color:blue">Pending</b>&emsp;<button class="button-con" type="button" onclick="yourConfirm(<?= $row['withdraw_id'] ?>);">Confirm</button><button class="button-can" type="button" onclick="yourConfirm2(<?= $row['withdraw_id'] ?>);">Cancel</button></td>
          <?php
          } else if ($row['withdraw_status'] == 7) {
          ?>
            <td style="color:red"><b>Unsuccessful</b></td>
          <?php
          } else {
          ?>
            <td style="color:green"><b>Successfully</b></td>
          <?php
          }

          ?>

        </tr>

    <?php
      }
    }
    ?>

  </table>
  <div class="space"></div>

</div>
<?php include('footer.php'); ?>


<script type="text/javascript">
  function yourConfirm(id) {
    var r = confirm("Are you sure? After you click OK, the system will add a credit to the user.");
    if (r == true) {
      window.location = "withdraw_confirmed.php?id=" + id;
    }
  }

  function yourConfirm2(id) {
    var r = confirm("Are you sure? After you click OK, the system will add a credit to the user.");
    if (r == true) {
      window.location = "withdraw_delete.php?id=" + id;
    }
  }
</script>



<style>
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

  .button-con {
    color: black;
    background-color: #AAFF00;
    border: 0;
    border-radius: 4px;
    font-weight: bold !important;
    ;
  }

  .button-con:hover {
    background-color: #0BDA51;
    color: white;
  }

  .button-can {
    color: black;
    background-color: #FAFA33;
    border: 0;
    border-radius: 4px;
    font-weight: bold !important;
    ;
  }

  .button-can:hover {
    background-color: #F28C28;
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
</style>