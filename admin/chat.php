<?php include('header.php'); ?>
<title>C-COOPERATION | Chat</title>

<body>
  <div class="right_col" role="main">

    <div class="space"></div>


    <div class="statusBox">

      <p class="main_text">Message</p><br>

    </div>
    <div class="statusBox2">

      <div class="row">
        <div class="column">

          <ul id="myUL">

            <?php
            $sql = "SELECT * FROM chat_room WHERE 1";

            $result = $cls_conn->select_base($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
            ?>

                <li><a href="chat.php?rid=<?php echo $row['room_id'] ?>"><?php echo $row['room_name'] ?></a></li>

            <?php
              }
            }
            ?>

          </ul>

        </div>
        <div class="column2">

          <ul id="myUL">

            <?php
            error_reporting(error_reporting() & ~E_NOTICE);
            $room_id = $_GET['rid'];
            $sql = "SELECT * FROM chat_room WHERE room_id='$room_id'";
            $result = $cls_conn->select_base($sql);
            $res = $result->fetch_assoc();
            $room_name = isset($res["room_name"]);

            $sql = "SELECT * FROM chat_message WHERE cm_room_id='$room_id'";

            $result = $cls_conn->select_base($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {


                if ($row['cm_user_id'] != $_id) {
                  $sid = $row['cm_user_id'];

                  $sql = "SELECT * FROM db_user WHERE user_id='$sid'";

                  $results = $cls_conn->select_base($sql);
                  $rowss = $results->fetch_assoc();
            ?>

                  <li><a href="#" class="a1">
                      <p class="sub_text"><?php echo $rowss['user_name'] ?></p>
                      <p class="message"><?php echo $row['cm_message'] ?></p>
                    </a></li>

                <?php
                } else {
                ?>

                  <li><a href="#" class="a1">
                      <p class="sub_text right">you</p>
                      <p class="messageR"><?php echo $row['cm_message'] ?></p>

                    </a></li>

            <?php
                }
              }
            }
            ?>


          </ul>

        </div>
      </div>

    </div>
    <div class="statusBox3">
      <div class="row3">
        <div class="column11">
          <input type="text" id="chat" name="chat">
        </div>
        <div class="column22">
          <button class="button2" onclick="send_messages(<?php echo $room_id ?>);">Send</button>
        </div>
      </div>
    </div>
    <script>
      function send_messages(id) {
        var msg = document.getElementById("chat").value;
        console.log(msg);
        window.location = "../chat/chat_send_message.php?id=" + id + "&m=" + msg + "&dir=1";
      }
    </script>
</body>


<?php include('footer.php'); ?>




<style>
  .button2 {
    border: none;
    background: #4B5282aa;
    color: #fff;
    text-align: center;
    text-decoration: none;
    font-size: 16x;
    border-bottom-right-radius: 10px;
    border-top-right-radius: 10px;
    padding: 9.5px 30px;
    width: 100%;
    margin: 8px 0;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-family: 'Prompt', sans-serif;
  }

  .button2:hover {
    border: none;
    background: #fff;
    color: #4B5282aa;
    text-align: center;
    text-decoration: none;
    font-size: 16x;
    border-bottom-right-radius: 10px;
    border-top-right-radius: 10px;
    padding: 9.5px 30px;
    width: 100%;
    margin: 8px 0;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-family: 'Prompt', sans-serif;
  }

  input[type=text] {
    box-shadow: 2px 2px 4px #00000066 inset;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-family: 'Prompt', sans-serif;
    height: 40px;
    border-bottom-left-radius: 10px;
    border-top-left-radius: 10px;
  }

  body {
    height: 100%;
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
    color: #ffffff;
  }

  .botright_text {
    text-align: right;
    position: absolute;
    bottom: 18px;
    right: 16px;
    font-size: 18px;
  }

  .sub_text {
    font-size: 16px;
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
    height: 90%;
    padding: 15px;
    background: #4B5282;
    box-shadow: 5px 5px 25px #4B5282;
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;
  }

  .statusBox2 {
    position: block;
    max-width: 2000px;
    margin: auto;
    height: 600px;
    background: #ffffff;
    box-shadow: 5px 5px 25px #4B5282;
  }

  .statusBox3 {
    max-width: 2000px;
    margin: auto;
    height: 90%;
    padding: 15px;
    background: #4B5282;
    box-shadow: 5px 5px 25px #4B5282;
    border-bottom-left-radius: 25px;
    border-bottom-right-radius: 25px;
  }

  .column {
    float: left;
    width: 20%;
    padding: 0px;
    background: #ffffff00;

  }

  .column2 {
    float: left;
    width: 80%;
    padding: 0px;
    background: #ffffff00;
  }



  .row {
    width: 100%;
    padding-left: 10px;
  }

  .column11 {
    float: left;
    width: 80%;
    padding: 0px;
    background: #ffffff00;
  }

  .column22 {
    float: left;
    width: 20%;
    padding: 0px;
    background: #ffffff00;
  }

  .row3 {
    width: 98%;
    height: 60px;
    padding-left: 10px;
  }


  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }


  #myUL {
    list-style-type: none;
    padding: 0;
    margin: 0;
    overflow: hidden;
    overflow-y: scroll;
    height: 600px;
  }

  #myUL li a {
    border: 1px solid #ddd;
    margin-top: -1px;
    /* Prevent double borders */
    background-color: #f6f6f6;
    padding: 12px;
    text-decoration: none;
    font-size: 18px;
    color: black;
    display: block
  }

  #myUL li a:hover:not(.header) {
    background-color: #eee;
  }

  #myUL li .a1 {
    margin-top: -1px;
    /* Prevent double borders */
    background-color: #ffffff;
    padding: 12px;
    text-decoration: none;
    font-size: 18px;
    display: block;
    border: 0px solid #ddd;
  }

  #myUL li .a1:hover:not(.header) {
    background-color: #ffffff;
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
</style>