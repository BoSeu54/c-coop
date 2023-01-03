<?php include('header.php'); ?>
<title>C-COOPERATION | Payment Method</title>
<div class="right_col" role="main">

  <div class="space"></div>


  <ul id="myUL">

    <li>
      <form method="post" enctype="multipart/form-data">
        <a>
          <label for="uname"><b class="text_color">Add news</b></label><br>
          <input type="file" name="img" required placeholder="Choose File">
          <button type="submit" name="add" class="button button">Add</button>
        </a>
      </form>
    </li>

    <?php
    $sql = "SELECT * FROM db_new WHERE 1";

    $result = $cls_conn->select_base($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>

        <li>
          <a>
            <img src="../image/news/<?php echo $row['new_img'] ?>" height="250px" width="auto">&emsp;
            <button type="submit" name="remove" onclick="yourConfirm(<?= $row['new_id'] ?>);" class="button-delete">Delete</button>
          </a>
        </li>

    <?php
      }
    }
    ?>

  </ul>




</div>
<?php include('footer.php'); ?>

<?php
error_reporting(0);
if (isset($_POST['add'])) {
  $filename = $_FILES["img"]["name"];
  $tempname = $_FILES["img"]["tmp_name"];
  $folder = "../image/news/" . $filename;
  if (move_uploaded_file($tempname, $folder)) {
    $sql = "INSERT INTO db_new(new_img) VALUE ('$filename')";
    $res = $cls_conn->write_base($sql);
    echo $cls_conn->show_message("Insert data successfully");
    echo $cls_conn->goto_page(0, 'news_manage.php');
  }
}
?>

<script>
  function yourConfirm(id) {
    var r = confirm("Are you sure?");
    if (r == true) {
      window.location = "news_delete.php?id=" + id;
    }
  }
</script>

<style>
  .selectitem {
    box-shadow: 2px 2px 4px #00000066 inset;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 10px;
    font-family: 'Prompt', sans-serif;
  }

  input[type=text],
  input[type=file] {
    box-shadow: 2px 2px 4px #00000066 inset;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 10px;
    font-family: 'Prompt', sans-serif;
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
    padding: 10px;
    width: 100%;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
    font-weight: bold;
  }

  .button:hover {
    font-size: 20px;
    background-color: #0BDA51;
    color: white;
    font-weight: bold;
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
    font-size: 14px;
    color: #4B5282;
  }

  .sub_text_low {
    font-size: 14px;
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

  #myUL {
    list-style-type: none;
    padding: 12;
    margin: 0;
    overflow: hidden;
    height: 100%;

  }


  #myUL li {
    padding: 10px;

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
    display: block;
    border-radius: 10px;
    box-shadow: 5px 5px 10px #4B528277;
  }

  #myUL li a:hover:not(.header) {
    background-color: #eee;
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

  .button-delete {
    color: black;
    background-color: #FFBF00;
    border: 0;
    border-radius: 4px;
    font-weight: bold !important;
    ;
  }

  .button-delete:hover {
    background-color: #FF4433;
    color: white;
  }
</style>