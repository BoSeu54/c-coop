<?php include('header.php'); ?>
<title>C-COOPERATION | View Credit Data</title>
<div class="right_col" role="main">

  <div class="space"></div>
  <a class="head_text">Financial Information</a>
  <table id="customers">
    <tr>
      <th>Name</th>
      <th>Credit</th>
    </tr>


    <?php
    $sql = "SELECT * FROM db_user WHERE 1";
    $result = $cls_conn->select_base($sql);


    $sql = "SELECT * FROM db_credit WHERE 1";
    $result2 = $cls_conn->select_base($sql);


    if ($result2->num_rows > 0) {
      while ($row1 = $result2->fetch_assoc()) {
    ?>

        <tr>
          <td><?php

              while ($r = $result->fetch_assoc()) {
                if ($r['user_id'] == $row1['credit_owner']) {
                  echo $r['user_name'] . " " . $r['user_lastname'];
                  break;
                }
              }



              ?></td>
          <td><?php echo $row1['credit_value'] ?></td>
        </tr>

    <?php
      }
    } else {
      echo "result 0";
    }
    ?>

  </table>
  <div class="space"></div>

</div>
<?php include('footer.php'); ?>

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