<?php include('header.php');

// $filterIn = isset($_GET['f']);
// $filterIn=$_GET["f"];
error_reporting(error_reporting() & ~E_NOTICE);
$filterIn = $_GET['f'];

if ($filterIn == "") {
  $filterIn = "11111000";
}
$filter = str_split($filterIn);

?>
<title>C-COOPERATION | Payment History</title>
<div class="right_col" role="main">

  <div class="space"></div>

  <a class="head_text">Financial History</a>

  <form method="POST" style="padding: 15px;">

    <div class="btn">
      <label for="vehicle1">Transfer funds</label>
      <?php if ($filter[0] == 1) {
      ?>
        <input type="checkbox" id="vehicle1" name="s0" value="1" checked>
      <?php
      } else {
      ?>
        <input type="checkbox" id="vehicle1" name="s0" value="0">
      <?php
      } ?>

    </div>

    <div class="btn">
      <label for="vehicle1">Transfer Confirm</label>
      <?php if ($filter[1] == 1) {
      ?>
        <input type="checkbox" id="vehicle1" name="s1" value="1" checked>
      <?php
      } else {
      ?>
        <input type="checkbox" id="vehicle1" name="s1" value="0">
      <?php
      } ?>
    </div>
    <div class="btn">
      <label for="vehicle1">Withdrawal request</label>
      <?php if ($filter[2] == 1) {
      ?>
        <input type="checkbox" id="vehicle1" name="s2" value="1" checked>
      <?php
      } else {
      ?>
        <input type="checkbox" id="vehicle1" name="s2" value="0">
      <?php
      } ?>
    </div>
    <div class="btn">
      <label for="vehicle1">Approve withdrawal</label>
      <?php if ($filter[3] == 1) {
      ?>
        <input type="checkbox" id="vehicle1" name="s3" value="1" checked>
      <?php
      } else {
      ?>
        <input type="checkbox" id="vehicle1" name="s3" value="0">
      <?php
      } ?>
    </div>
    <div class="btn">
      <label for="vehicle1">Ejected</label>
      <?php if ($filter[7] == 1) {
      ?>
        <input type="checkbox" id="vehicle1" name="s7" value="1" checked>
      <?php
      } else {
      ?>
        <input type="checkbox" id="vehicle1" name="s7" value="0">
      <?php
      } ?>
    </div>

    <input type="submit" value="Filter" class="btn2" name="Filter">
    <input type="submit" value="Clear" class="btn2" name="Clear">
  </form>

  <table id="customers">
    <tr>
      <th>ID</th>
      <th>Topic</th>
      <th>Transaction date</th>
      <th>Account</th>
      <th>Amount</th>
      <th>By</th>
    </tr>


    <?php



    $sql = "SELECT * FROM db_user WHERE 1";
    $res = $cls_conn->select_base($sql);
    while ($datas = $res->fetch_assoc()) {
      $userinfo[] = $datas;
    }




    $sql = "SELECT * FROM db_payment_history WHERE 1";

    $result = $cls_conn->select_base($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if ($filter[$row['payhistory_type']] == 1) {
    ?>

          <tr>

            <td><?php echo $row['payhistory_id'] ?></td>


            <?php

            switch ($row['payhistory_type']) {
              case "0":
            ?> <td>Transfer funds</td> <?php
                                        break;
                                      case "1":
                                        ?> <td>Transfer Confirm</td> <?php
                                                      break;
                                                    case "2":
                                                      ?> <td>Withdrawal request</td> <?php
                                                              break;
                                                            case "3":
                                                              ?> <td>Approve withdrawal</td> <?php
                                                              break;
                                                            case "4":
                                                            ?> <td>Ejected</td> <?php
                                                              break;
                                                          }

                                        ?>
            <td><?php echo $row['payhistory_time'] ?></td>

            <?php

            foreach ($userinfo as $usrinfo) {
              if ($usrinfo['user_id'] == $row['payhistory_owner_id']) {
            ?><td><?php echo $usrinfo['user_name'] . " " . $usrinfo['user_lastname'] ?></td><?php
                                                                                          }
                                                                                        }
                                                                                            ?>
            <td><?php echo $row['payhistory_value'] ?></td>


            <?php
            if ($row['payhistory_by_id'] == -1) {
            ?><td>Server</td><?php
                            } else {


                              foreach ($userinfo as $ussrinfo) {
                                if ($ussrinfo['user_id'] == $row['payhistory_by_id']) {
                              ?><td><?php echo $ussrinfo['user_name'] . " " . $ussrinfo['user_lastname'] ?></td><?php
                                                                                                        }
                                                                                                      }
                                                                                                    }
                                                                                                          ?>
          </tr>

    <?php
        }
      }
    }
    ?>

    <?php

    if (isset($_POST['Filter'])) {
      $s0 = isset($_POST['s0']) ? 1 : 0;
      $s1 = isset($_POST['s1']) ? 1 : 0;
      $s2 = isset($_POST['s2']) ? 1 : 0;
      $s3 = isset($_POST['s3']) ? 1 : 0;
      $s4 = isset($_POST['s4']) ? 1 : 0;
      $s5 = isset($_POST['s5']) ? 1 : 0;
      $s6 = isset($_POST['s6']) ? 1 : 0;
      $s7 = isset($_POST['s7']) ? 1 : 0;

      $ff = $s0 . $s1 . $s2 . $s3 . $s4 . $s5 . $s6 . $s7;

      echo $cls_conn->goto_page(0, 'payment_history.php?f=' . $ff);
    }

    if (isset($_POST['Clear'])) {
      echo $cls_conn->goto_page(0, 'payment_history.php?f=11111000');
    }



    ?>


  </table>
  <div class="space"></div>

</div>
<?php include('footer.php'); ?>

<style>
  .btn {
    box-shadow: 2px 2px 4px #00000066;
    margin: 8px 8px;
    display: inline;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 10px;
    font-family: 'mitr', sans-serif;
    white-space: nowrap;
    color: #4B5282;
  }

  .btn2 {
    box-shadow: 2px 2px 4px #00000066;
    margin: 8px 8px;
    padding: 8px;
    display: inline;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 10px;
    font-family: 'mitr', sans-serif;
    white-space: nowrap;
    color: #4B5282;
  }

  input[type=checkbox] {
    box-shadow: 2px 2px 4px #00000066 inset;
    margin: 8px 8px;
    display: inline;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 5px;
    font-family: 'mitr', sans-serif;
    white-space: nowrap;
    color: #4B5282;
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
</style>