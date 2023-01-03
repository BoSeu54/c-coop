<?php include('header.php'); ?>
<title>C-COOPERATION | Homepage</title>
<div class="right_col" role="main">


  <div class="space"></div>

  <div class="row">

    <div class="column">

      <div class="statusBox">
        <p class="main_text">Server Status</p>

        <div class="row2">
          <?php
          $sql = "SELECT * FROM db_setting WHERE 1";
          $result = $cls_conn->select_base($sql);
          $row = $result->fetch_assoc();
          ?>
          <div class="column_small">
            <div class="statusBox_small">
              <?php if ($row['setting_webstatus'] == 0) {
              ?>
                <p class="main_text2" style="color:	#0BDA51;">Already Website</p>
              <?php
              } else {
              ?>
                <p class="main_text2" style="color:	#FF5733;">Temporarily closed Website</p>
              <?php
              }
              ?>

            </div>
          </div>
          <div class="column_small">
            <div class="statusBox_small">
              <p class="main_text2" style="color:	#0BDA51;">Good Database</p>
            </div>
          </div>

        </div>


      </div>

    </div>
    <div class="column2">

      <div class="statusBox2">
        <p class="main_text">The total number of users is </p><br>
        <div class="botright_text">
          <?php
          $sql = "SELECT * FROM db_user WHERE 1";
          $result = $cls_conn->select_base($sql);
          $row = mysqli_num_rows($result);
          ?>
          <span class="sub_text"><?php echo $row ?></span><span class="sub_text_low"> person</span><br>
        </div>
      </div>

    </div>

  </div>


  <div class="row">

    <div class="column3">

      <div class="statusBox2">
        <p class="main_text">Reporting problems</p><br>
        <form action="report.php">
          <button class="button button" type="submit">Problem reported from users</button>
        </form>
      </div>

    </div>
    <div class="column4">



    </div>

  </div>

</div>
<?php include('footer.php'); ?>

<style>
  .button {
    background-color: #FF4433;
    border: none;
    color: white;
    padding: 20px;
    width: 100%;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
  }

  .button:hover {
    font-size: 20px;
    background-color: #FFC000;
    color: white;
    font-weight: bold;
  }

  .main_text {
    font-size: 30px;
    color: #4B5282;
  }

  .main_text2 {
    text-align: center;
    vertical-align: middle;
    font-size: 2vw;
    line-height: 2.2vw;
    color: #4B5282;
    font-size: 26px;
    padding: 10px 10px 10px 10px;
  }


  .botright_text {
    text-align: right;
    position: absolute;
    bottom: 50px;
    right: 16px;
    font-size: 30px;
  }

  .sub_text {
    font-size: 35px;
    color: #4B5282;
  }

  .sub_text_low {
    font-size: 25px;
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
    background: #00ff0000;

  }

  .column2 {
    float: left;
    width: 40%;
    padding: 10px;
    background: #ff000000;
  }

  .column3 {
    float: left;
    width: 60%;
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


  .row2 {
    margin: 5px;
    padding-right: 15px;
    width: 100%;
  }

  .column_small {
    float: left;
    width: 45%;
    padding: 10px;
    background: #00ff0000;

  }

  .statusBox_small {
    max-width: 2000px;
    margin: auto;
    height: 70px;
    padding: 5px 5px 5px 5px;
    border-radius: 15px;
    background: #ffffff;
    box-shadow: 5px 5px 25px #4B5282;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
</style>