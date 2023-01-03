<?php include('header.php'); ?>
<title>C-COOPERATION | Edit Data</title>

<style>
    body {
        background-color: #4B5282;
    }

    input[type=text],
    input[type=password] {
        box-shadow: 2px 2px 4px #00000066 inset;
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        border-radius: 10px;
        font-family: 'Prompt', sans-serif;
        height: 40px;
    }

    input[type=text]:disabled {
        box-shadow: 2px 2px 4px #00000000 inset;
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        border-radius: 10px;
        font-family: 'Prompt', sans-serif;
        height: 40px;
    }

    .contaner {
        float: center;
        margin: auto;
        padding-left: 15px;
        background-color: #EEE0B5;
        margin-right: 150px;
    }

    .col {
        float: left;
        width: 50%;
        padding: 18px;
        margin-top: 50px;
    }

    .col_pic {
        float: left;
        width: 50%;
        padding-left: 190px;
        margin-top: 50px;
    }

    .col_user {
        float: left;
        width: 50%;
        padding-right: 140px;
        margin-top: 50px;
    }

    .col_name {
        float: left;
        width: 50%;
        padding-left: 140px;
        margin-top: 50px;
    }

    .col_lname {
        float: left;
        width: 50%;
        padding-right: 140px;
        margin-top: 50px;
    }

    .col_1 {
        float: left;
        width: 100%;
        padding-left: 150px;
        margin-top: 10px;
    }

    .col_2 {
        float: left;
        width: 60%;
        padding-left: 150px;
        margin-top: 10px;
    }

    .col_3 {
        float: left;
        width: 40%;
        padding-right: 260px;
        margin-top: 55px;
    }

    .col_4 {
        float: right;
        width: 45%;
        padding-right: 250px;
        margin-top: 10px;
    }

    h1 {
        font-size: 20px;
        color: #4B5282;
    }


    .button {
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
        width: 100%;
        cursor: pointer;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
    }

    .button:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    hr {
        border: 1px solid black;
        border-radius: 2px;
    }

    .center {
        margin: auto;
        width: 1000px;
        padding: 10px;

    }


    .custom-file-input::-webkit-file-upload-button {
        visibility: hidden;
    }

    .custom-file-input::before {
        content: 'Select some files';
        display: inline-block;
        background: linear-gradient(top, #f9f9f9, #e3e3e3);
        border: 1px solid #999;
        border-radius: 3px;
        padding: 5px 8px;
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

    .rounded-circle {
        border-radius: 50%;
        padding: 5px;
        object-fit: cover;
    }
</style>

<div class="right_col" style="background-color: #EEE0B5" role="main">
    <!--รูปภาพและชื่อผู้ใช้-->
    <div class="center" width="auto">

        <?php
        error_reporting(error_reporting() & ~E_NOTICE);
        $sql = "SELECT * FROM db_user WHERE user_id = $_id";

        $result = $cls_conn->select_base($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>

                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col_pic">
                            <img src="<?php
                                        if ($row['user_pic'] != "") {
                                            echo "../image/user_image/" . $row['user_pic'];
                                        } else {
                                            echo "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOx1T1z0ppMeTCewwIsuhaaRVQnWUloCnv0H7WCZW3Rr3_4cWddxXoGLpwcihEVsXVx64&usqp=CAU";
                                        }

                                        ?>" width="150px" height="150px" class="rounded-circle" alt="Cinque Terre">
                            <input type="file" class="custom-file-input" name="uimg">
                        </div>
                        <div class="col_user">
                            <h1>Username</h1>
                            <div class="form-floating" width="2000px">
                                <input type="text" class="form-control" id="username" placeholder="username" name="username" width="2000px" value="<?php echo $row['user_username'] ?>">
                                <label for="username"></label>
                            </div>
                        </div>
                    </div>
                    <!--ชื่อและนามสกุล-->
                    <div class="row" w3-panel>

                        <div class="col_name">
                            <h1>Firstname</h1>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="name" name="name" value="<?php echo $row['user_name'] ?>" required>
                                <label for="name"></label>
                            </div>
                        </div>
                        <div class="col_lname">
                            <h1>Lastname</h1>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="lname" placeholder="lastname" name="lname" value="<?php echo $row['user_lastname'] ?>" required>
                                <label for="lname"></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col_1">
                                <h1>Old Email</h1>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="omail" placeholder="old mail" name="omail" value="<?php echo $row['user_email'] ?>" disabled>
                                    <label for="omail"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col_1">
                                <h1>New Email</h1>
                                <div class="form-floating mb-5 mt-3">
                                    <input type="text" class="form-control" id="nmail" placeholder="new mail" name="nmail" value="<?php echo $row['user_email'] ?>" required>
                                    <label for="nmail"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col_2">
                                <h1>Password</h1>
                                <div class="form-floating mb-5 mt-3">
                                    <input type="password" class="form-control" id="password" placeholder="password" name="password">
                                    <label for="password"></label>
                                </div>
                            </div>

                            <div class="col_3">
                                <button class="button" name="data_change">Save</button>
                            </div>
                        </div>

                </form>

                <hr>

                <div class="row">
                    <div class="col_1">
                        <h1>Old Password</h1>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="opassword" placeholder="old password" name="opassword">
                            <label for="opassword"></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col_1">
                        <h1>New Password</h1>
                        <div class="form-floating mb-5 mt-3">
                            <input type="password" class="form-control" id="npassword" placeholder="new password" name="npassword">
                            <label for="npassword"></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col_1">
                        <h1>Confirm New Password</h1>
                        <div class="form-floating mb-5 mt-3">
                            <input type="password" class="form-control" id="repassword" placeholder="re password" name="repassword">
                            <label for="repassword"></label>
                        </div>
                    </div>
                </div>
                <div class="col_4">
                    <button class="button" name="pass_change">Change Password</button>
                </div>


                </form>
    </div>

</div>
</div>

<?php
            }
        }
?>

<?php include('footer.php'); ?>

<?php
// error_reporting(0);
if (isset($_POST['data_change'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $mailo = $_POST['omail'];
    $mailn = $_POST['nmail'];
    $password = $_POST['password'];

    $filename = $_FILES["uimg"]["name"];
    $tempname = $_FILES["uimg"]["tmp_name"];
    $folder = "../image/user_image/" . $filename;

    if ($mailn == "") {
        $mailn = $mailo;
    }

    $sql = "select * from db_user where user_id = '$_id' and user_password = '$password'";

    $results = $cls_conn->select_base($sql);
    $r = $results->fetch_assoc();
    if ($results->num_rows > 0) {
        if ($_FILES['uimg']['name'] == "") {
            $sql = "update db_user set `user_username` = '$username',`user_email` = '$mailn', `user_name` = '$name', `user_lastname`='$lname' where user_id = '$_id'";
            $res = $cls_conn->write_base($sql);
            echo $cls_conn->show_message("Edit complete");
            echo $cls_conn->goto_page(0, 'user_edit.php');
        } else {
            if (move_uploaded_file($tempname, $folder)) {
                unlink("../image/user_image/" . $r['user_pic']);
                $sql = "update db_user set `user_username` = '$username',`user_email` = '$mailn', `user_name` = '$name', `user_lastname`='$lname', `user_pic` = '$filename' where user_id = '$_id'";
                $res = $cls_conn->write_base($sql);
                echo $cls_conn->show_message("Edit complete");
                echo $cls_conn->goto_page(0, 'user_edit.php');
            }
        }
    } else {
        echo $cls_conn->show_message("Please enter Password");
    }
}

if (isset($_POST['pass_change'])) {
    $passwordo = $_POST['opassword'];
    $passwordn = $_POST['npassword'];
    $passwordr = $_POST['repassword'];

    if ($passwordn == $passwordr) {
        $sql = "select * from db_user where user_id = '$_id' and user_password = '$passwordo'";
        $result = $cls_conn->select_base($sql);
        if ($result->num_rows > 0) {
            $sql = "update db_user set `user_password` = '$passwordn' where user_id = '$_id'";
            $res = $cls_conn->write_base($sql);
            echo $cls_conn->show_message("Edit complete");
            echo $cls_conn->goto_page(0, 'user_edit.php');
        } else {
            echo $cls_conn->show_message("Please enter Password");
        }
    } else {
        echo $cls_conn->show_message("Password does not match.");
    }
}

?>