<?php include('header.php'); ?>
<title>C-COOPERATION | Withdrawal</title>
<link rel="stylesheet" href="../css/user_thumpnail.css">
<?php
error_reporting(error_reporting() & ~E_NOTICE);
$sql = "select * from db_user where user_id = '$_id'";
$resultss = $cls_conn->select_base($sql);
$rowss = $resultss->fetch_assoc();
$pinCode = $rowss['user_pin'];
if ($pinCode == null) {
  echo $cls_conn->show_message("Please set security pin");
  echo $cls_conn->goto_page(0, 'setpinfour.php');
}
$check = true;
$sql = "select * from db_credit where credit_owner = '$_id'";
$resultss = $cls_conn->select_base($sql);
$rowss = $resultss->fetch_assoc();


$credit = $rowss['credit_value'];
?>


<div class="right_col" role="main">

  <div class="space"></div>

  <div class="center">
    <p class="main_text">Withdrawal</p>
    <p class="sub_text">Wallet Balance : <?php echo $credit ?></p><br>
    <form>
      <br><label for="value" required><b class="text_color" >Amount :</b></label>
      <input type="text" name="value" id="value" placeholder="0.00 Baht">
      <div></div>
      <br><label for="value" required><b class="text_color" >Bank Name :</b></label>
      <div style="height:8px"></div>
            <select name="bank" id="bank" class="selectitem" required>
              <option value="" disabled selected hidden>---Select a Bank---</option>
              <div></div>
              <option value="Bangkok Bank (ฺBBL)" data-thumbnail="../image/banks/bbl.png">Bangkok Bank (ฺBBL) </option>
              <option value="Krungthai Bank (KTB)" data-thumbnail="../image/banks/ktb.png">Krungthai Bank (KTB) </option>
              <option value="Kasikorn Bank (KBank)" data-thumbnail="../image/banks/kbank.png">Kasikorn Bank (KBANK)</option>
              <option value="Bank of Ayudhya (BAY)" data-thumbnail="../image/banks/bay.png">Bank of Ayudhya (BAY) </option>
              <option value="The Siam Commercial Bank (SCB)" data-thumbnail="../image/banks/scb.png">The Siam Commercial Bank (SCB)</option>
              <option value="Government Savings Bank (GSB)" data-thumbnail="../image/banks/gsb.png">Government Savings Bank (GSB) </option>
              <option value="Kiatnakin Bank (KKP)" data-thumbnail="../image/banks/kk.png">Kiatnakin Bank (KKP)</option>
              <option value="Citi Bank (CITI) " data-thumbnail="../image/banks/citi.png">Citi Bank (CITI) </option>
              <option value="CIMB Thai Bank (CIMBT)" data-thumbnail="../image/banks/cimb.png">CIMB Thai Bank (CIMBT) </option>
              <option value="TMB Bank (TMB)" data-thumbnail="../image/banks/tmb.png">TMB Bank (TMB)</option>
              <option value="TISCO Bank (TISCO)" data-thumbnail="../image/banks/tisco.png">TISCO Bank (TISCO) </option>
              <option value="Thai credit Bank (TCR)" data-thumbnail="../image/banks/tcrb.png">Thai credit Bank (TCR)</option>
              <option value="Bank for Agriculture and Agricultural Cooperatives (BAAC)" data-thumbnail="../image/banks/baac1.png"> Bank for Agriculture and Agricultural Cooperatives (BAAC)</option>
              <option value="Thanachart Bank (ttb)" data-thumbnail="../image/banks/ttb.png">Thanachart Bank (TTB)</option>
              <option value="Islamic Bank of Thailand (IBank)" data-thumbnail="../image/banks/ibank.png">Islamic Bank of Thailand (IBANK) </option>
              <option value="United Overseas Bank Limited (UOB)" data-thumbnail="../image/banks/uob.png">United Overseas Bank Limited (UOB) </option>         
              <option value="Government Housing Bank (GHB)" data-thumbnail="../image/banks/ghb.png">Government Housing Bank (GHB) </option>
              
            </select>
      <div></div>
      <br><label for="wallet"><b class="text_color">Account No. :</b></label>
      <input type="text" name="wallet" id="wallet" placeholder="Enter Account No.">
      <div class="space2"></div>



    </form>

    <button name="confirm" class="button button" onclick="pin_get()">Confirm</button><br><br>

  </div>
  <div class="space2"></div>
  <script type="text/JavaScript">
    function pin_get(){
    var pin = "<?php echo $pinCode ?>";
    let out = prompt("Please enter security pin");
    if (out == pin) {
      var id = "<?php echo $_id ?>";
      var value = document.getElementById("value");
      var bank = document.getElementById("bank");
      var wallet = document.getElementById("wallet");
      window.location = "withdraw_confirm.php?id="+id+"&value="+value.value+"&bank="+bank.options[bank.selectedIndex].text+"&wallet="+wallet.value;
    } else {
      alert("Security pin incorrect! Please try again"); 
    }
    return ;
  }
</script>
<script src="../js/user_thumpnail.js"></script>
</div>

<?php include('footer.php'); ?>

<style>


  .button {
    background-color: #ffffff;
    border: none;
    color: #4B5282;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
    box-shadow: 5px 5px 25px #00000066;
  }

  .button:hover {
    font-size: 20px;
    background-color: #7CFC00;
    color: white;
    font-weight: bold;
  }


  .center {
    margin: auto;
    width: 80%;
    height: 60%;
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

  input[type=text] {
    width: 100%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    border-radius: 12px;
  }

  input[type=text]:focus {
    outline: none;
    /*to remove the focus outline in chrome */
    width: 100%;
  }

  .has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
  }

  .main_text {
    text-align: center;
    font-size: 64px;
    color: #4B5282;
  }

  .botright_text {
    text-align: right;
    position: absolute;
    bottom: 18px;
    right: 16px;
    font-size: 18px;
  }

  .sub_text1 {
    font-size: 18px;
    color: #4B5282;
  }

  .sub_text {
    text-align: center;
    font-size: 18px;
    color: #4B5282;
  }

  .sub_text2 {
    font-size: 18px;
    color: #4B528277;
  }

  .space {
    height: 100px;
  }

  .space2 {
    height: 20px;
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