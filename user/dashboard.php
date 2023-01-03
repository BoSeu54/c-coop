<?php include('header.php'); ?>
<title>C-COOPERATION | Homepage</title>


<body>
  <?php
  error_reporting(error_reporting() & ~E_NOTICE);
  $sql = "SELECT * FROM db_user WHERE user_id = $_id";
  $result = $cls_conn->select_base($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>

      <div class="right_col" role="main" style="padding-top:10%">
  
        <div class="row">
          <div class="column">
            <div class="statusBox">
              <div class="row">
                <p class="main_text">Welcome <?php echo $row['user_name'] ?></p><br><br>
                <div class="botleft_text">
                  <p class="subtitle_text">Wallet Balance</p>

                  <?php
                  $sql = "SELECT * FROM db_credit WHERE credit_owner = $_id";

                  $result2 = $cls_conn->select_base($sql);
                  if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                      $creditoutput = number_format($row2['credit_value'], 2)
                  ?>

                      <p class="subsubtitle_text"><?php echo $creditoutput ?> ฿</p>

                  <?php
                    }
                  }
                  ?>
                </div>
                <div class="botright_text">
                  <img src="../images/logo-coops.png" width="35%" height="auto">
                </div>
              </div>

            </div>
          </div>
          <div class="column2">
            <div class="statusBox2">
              <p class="main_text2">News update</p>

              <div class="slideshow-container">


                <?php
                $sql = "SELECT * FROM db_new WHERE 1";

                $result = $cls_conn->select_base($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                ?>

                    <div class="mySlides">
                      <img src="../image/news/<?php echo $row['new_img'] ?>" class="advimg">
                    </div>

                <?php
                  }
                } else {
                }
                ?>

              </div>

            </div>
          </div>
        </div>
          <div stlye="height: 25px;"></div>
        </div>
  <?php
    }
  } else {
    echo "result 0";
  }
  ?>
</body>
<?php include('footer.php'); ?>

<style>
  .space {
    height: 50px;
  }



  .statusBox {
    max-width: 2000px;
    margin: auto;
    height: 350px;
    padding: 15px;
    border-radius: 25px;
    background: #4B5282;
    box-shadow: 5px 5px 25px #4B5282;
    position: relative;
  }

  .statusBox2 {
    position: relative;
    max-width: 2000px;
    margin: auto;
    padding: 5px;
    height: 350px;
    border-radius: 25px;
    background: #ffffff;
    box-shadow: 5px 5px 25px #4B5282;  
  }

  .column {

    float: left;
    width: 40%;
    padding: 10px;
    background: #00ff0000;

  }

  .column2 {
    float: left;
    width: 60%;
    padding: 10px;
    background: #ff000000;
  }

  .column3 {
    float: left;
    width: 70%;
    padding: 10px;
    background: #ff000000;
  }

  .column4 {
    float: right;
    width: 30%;
    padding: 10px;
    background: #ff000000;
  }

  .column5 {
    float: left;
    width: 48%;
    padding: 10px;
    background: #ff000000;
  }

  .main_text {
    font-size: 2.5vw;
    color: #ffffff;
    padding: 10px;
  }

  .statusBox3 {
    position: relative;
    max-width: 2000px;
    margin: auto;
    padding: 15px;
    height: auto;
    border-radius: 25px;
    background: #ffffff;
    box-shadow: 5px 5px 25px #4B5282;
  }

  .subtitle_text {
    font-size: 1.5vw;
    color: #ffffff;
  }

  .subsubtitle_text {
    font-size: 1.8vw;
    color: #ffffff;
  }

  .main_text2 {
    font-size: 30px;
    text-align: center;
    color: #4B5282;
  }

  .statusBox4 {
    position: relative;
    max-width: 2000px;
    margin: auto;
    height: 100px;
    background: grey;
  }

  .main_text3 {
    font-size: 20px;
    color: #ffffff;
    padding: 5px;
    -webkit-text-stroke-width: 0.75px;
    -webkit-text-stroke-color: black;
  }

  .subtitle_text2 {
    font-size: 10px;
    color: #ffffff;
    padding: 5px;
  }


  .botright_text {
    text-align: right;
    position: absolute;
    bottom: 18px;
    right: 16px;
    font-size: 18px;
  }

  .botleft_text {
    text-align: left;
    position: absolute;
    bottom: 18px;
    left: 16px;
    font-size: 18px;
  }

  .sub_text2 {
    text-align: left;
    font-size: 32px;
  }




  .advimg {
    height: 275px;
    width: 100%;
    object-fit: contain;
    border-radius: 0px 0px 25px 25px;
  }

  * {
    box-sizing: border-box
  }

  .mySlides {
    display: none
  }

  img {
    vertical-align: middle;
  }

  .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
  }

  /* Next & previous buttons */
  .prev,
  .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
  }

  /* Position the "next button" to the right */
  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

  /* On hover, add a black background color with a little bit see-through */
  .prev:hover,
  .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }

  /* Caption text */
  .text {
    color: #ffffff;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #ffffff;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  /* The dots/bullets/indicators */
  .dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #999999;
    border-radius: 50%;
    display: inline-block;
  }

  @media only screen and (max-width: 300px) {

    .prev,
    .next,
    .text {
      font-size: 11px
    }
  }
</style>

<script>
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
      slideIndex = 1
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
  }
</script>