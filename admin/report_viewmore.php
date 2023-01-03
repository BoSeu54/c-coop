<?php include('header.php'); ?>
<title>C-COOPERATION | Read the problem report</title>
<div class="right_col" role="main">

  <div class="space"></div>

  <div style="height: auto">


    <?php
    error_reporting(error_reporting() & ~E_NOTICE);
    $id = $_GET['id'];

    $sql = "SELECT * FROM db_problem WHERE prob_id = '$id'";

    $result = $cls_conn->select_base($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <p class="main_text">Problem reports</p>
        <div align="right"> <button onclick="viewreport();" class="button-go">Go to Homepage</button><button onclick="yourConfirm(<?= $id ?>);" class="button-delete">Delete</button><br></div>
        <div style="height:15px ;"></div>
        <div class="statusBox">
          <p class="sub_text">Topic <?php echo $row['prob_title'] ?></p><br>
          <textarea readonly><?php echo $row['prob_desc'] ?></textarea><br>
          <a target="_blank" href="../image/problem_img/<?php echo $row['prob_image'] ?>"><img src="../image/problem_img/<?php echo $row['prob_image'] ?>" width="20%" height="auto"></a>

        </div>
        <div class="space"></div>


    <?php
      }
    }
    ?>
  </div>



  <?php include('footer.php'); ?>


  <script>
    function yourConfirm(id) {
      var r = confirm("Are you sure?");
      if (r == true) {
        window.location = "report_delete.php?id=" + id;
      }
    }

    function viewreport() {
      window.location = "report.php";
    }
  </script>

  <style>
    textarea,
    textarea:focus {
      width: 90%;
      min-height: 500px;
      max-height: 1500px;
      height: auto;
      padding: 12px 20px;
      box-sizing: border-box;
      border: none;
      border-radius: 4px;
      background-color: #ffffff;
      font-size: 16px;
      resize: none;
      outline: none;
    }

    .button-go {
      color: black;
      background-color: #7CFC00;
      border: 0;
      border-radius: 4px;
      font-weight: bold !important;
      height: 25px;
    }

    .button-go:hover {
      background-color: #FFC000;
      color: white;
    }

    .button-delete {
      color: black;
      background-color: #FFBF00;
      border: 0;
      border-radius: 4px;
      font-weight: bold !important;
      height: 25px;
    }

    .button-delete:hover {
      background-color: #FF4433;
      color: white;
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
      font-size: 22px;
      color: #4B5282;
      padding: 15px;
    }



    .space {
      height: 50px;
    }

    .statusBox {
      max-width: 2000px;
      margin: auto;
      height: auto;
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