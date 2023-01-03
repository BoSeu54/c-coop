<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>C-COOPERATION | Report Problems</title>
  <style>
    body {
      background-color: #4B5282;
    }

    .headd {
      font-size: 40px;
      text-align: start;
      color: #4B5282;
      padding: 0 0 20px 0;
    }

    .bordie {
      font-size: 20px;
      text-align: start;
      color: #4B5282;
    }

    .bordiecenter {
      font-size: 20px;
      text-align: center;
      color: #4B5282;
    }

    .statusBox {
      position: relative;
      max-width: 2000px;
      margin: auto;
      padding: 15px;
      height: 500px;
    }

    input[type=text] {
      border-radius: 15px;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, .39), 0 -1px 1px #FFF, 0 1px 0 #FFF;
      border: none;
      width: 100%;
    }

    input[type=password] {
      border-radius: 15px;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, .39), 0 -1px 1px #FFF, 0 1px 0 #FFF;
      border: none;
    }

    .button1 {
      background-color: #4B5282;
      /* Green */
      border: none;
      color: white;
      border-radius: 15px;
      padding: 12px 28px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      width: 20%;
      cursor: pointer;
      -webkit-transition-duration: 0.4s;
      /* Safari */
      transition-duration: 0.4s;
      position: absolute;
      bottom: -15%;
      right: 1%;
    }

    .button1:hover {
      box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    textarea {
      width: 100%;
      height: 250px;
      padding: 12px 20px;
      box-sizing: border-box;
      border: none;
      border-radius: 4px;
      background-color: #ffffff;
      font-size: 16px;
      resize: none;
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, .39), 0 -1px 1px #ffffff, 0 1px 0 #ffffff;
    }

    .column1 {
      float: left;
      width: 70%;
      padding: 10px;
    }

    .column2 {
      float: right;
      width: 30%;
      padding: 10px;
    }

    .statusBox2 {
      border-radius: 25px;
      border: 2px dashed #4B5282;
      padding: 25px;
      width: 100%;
      height: 250px;
      text-align: center;
    }

    .submitbtn2 {
      background-color: #4B5282;
      /* Green */
      border: none;
      color: white;
      border-radius: 15px;
      padding: 12px 28px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      width: 50%;
      cursor: pointer;
      -webkit-transition-duration: 0.4s;
      /* Safari */
      transition-duration: 0.4s;
    }

    .submitbtn2:hover {
      box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }


    .custom-file-input::-webkit-file-upload-button {
      visibility: hidden;
    }

    .custom-file-input::before {
      content: 'Select some file';
      display: inline-block;
      background: linear-gradient(top, #f9f9f9, #e3e3e3);
      border-radius: 3px;
      padding: 16px 8px;
      outline: none;
      white-space: nowrap;
      -webkit-user-select: none;
      cursor: pointer;
      text-shadow: 1px 1px #fff;
      font-weight: 700;
      font-size: 10pt;
    }

    .custom-file-input:hover::before {
      border-color: black;
    }

    .custom-file-input:active::before {
      background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
    }
  </style>
</head>

<body>

  <div class="right_col" style="background-color: #EEE0B5; padding: 100px 100px 250px 100px">
    <div class="statusBox">


      <form method="post" enctype="multipart/form-data">
        <p class="headd">Report Problems</p>
        <div class="row">
          <div class="column1">
            <p class="bordie">Problem</p>
            <input type="text" id="text" name="problem" maxlength="500" size="100">
            <p class="bordie">Explain found problems </p>
            <textarea name="desc" maxlength="3000"></textarea>
          </div>
          <div class="column2">
            <p class="bordie">Location </p>
            <input type="text" id="text" name="place" maxlength="255" size="20">
            <p class="bordie">Attach image File</p>
            <input type="file" class="statusBox2 custom-file-input" name="images">
          </div>
        </div>

        <input type="submit" value="Submit report" class="button1" name="submit">
      </form>
    </div>

  </div>
  <?php include('footer.php'); ?>

  <?php
  error_reporting(0);

  if (isset($_POST['submit'])) {
    $problem = $_POST['problem'];
    $place = $_POST['place'];
    $desc = $_POST['desc'];

    $filename = $_FILES["images"]["name"];
    $tempname = $_FILES["images"]["tmp_name"];
    $folder = "../image/problem_img/" . $filename;

    if (move_uploaded_file($tempname, $folder)) {
      $sql = "INSERT INTO db_problem(prob_title, prob_desc, prob_place, prob_image, prob_time) VALUE ('$problem', '$desc','$place','$filename',NOW())";
      if ($cls_conn->write_base($sql) == TRUE) {
        echo $cls_conn->show_message("The problem report has been submitted successfully");
        echo $cls_conn->goto_page(0, 'dashboard.php');
      }
    } else {
      echo $cls_conn->show_message("Error");
    }
  }

  ?>
</body>

</html>