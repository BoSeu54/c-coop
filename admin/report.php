<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>C-COOPERATION | Problem Report</title>
  
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

    .button-read {
        color: black;
        background-color: #7CFC00;
        border: 0;
        border-radius: 4px;
        font-weight: bold !important;
    }

    .button-read:hover {
        background-color: #FFC000;
        color: white;
    }

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
</head>

<body>
  <div class="right_col" role="main">
    <div class="space"></div>
    <a class="head_text">Problem reported from users</a>
    <table id="customers">
      <tr>
        <th>Topics</th>
        <th>Date Time</th>
        <th>Location</th>
        <th></th>
      </tr>
      <?php
      $sql = "SELECT * FROM db_problem WHERE 1";

      $result = $cls_conn->select_base($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>

          <tr>
            <td><?php echo $row['prob_title'] ?></td>
            <td><?php echo $row['prob_time'] ?></td>
            <td><?php echo $row['prob_place'] ?></td>
            <td><button onclick="viewreport(<?= $row['prob_id'] ?>);" class="button-read">Read more</button><button class="button-delete" onclick="yourConfirm(<?= $row['prob_id'] ?>);">Delete</button></td>
          </tr>

      <?php
        }
      }
      ?>
    </table>
    <div class="space"></div>
    <div class="space"></div>
  </div>
  <?php include('footer.php'); ?>

  <script type="text/javascript">
    function yourConfirm(id) {
      var r = confirm("Are you sure?");
      if (r == true) {
        window.location = "report_delete.php?id=" + id;
      }
    }

    function viewreport(id) {
      window.location = "report_viewmore.php?id=" + id;
    }
  </script>
</body>

</html>