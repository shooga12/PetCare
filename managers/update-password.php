<?php
session_start();
include '../db.php';

if (isset($_POST['newPassword'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $newPassword = mysqli_real_escape_string($db, $_POST['newPassword']);
        $confirmPassword = mysqli_real_escape_string($db, $_POST['confirmPassword']);

        if($newPassword==$confirmPassword){
            $updateQuery = "UPDATE users SET `password` = '" . $newPassword . "' WHERE `id` = '" . $_SESSION['loggedinuserid'] . "'";

            if (mysqli_query($db, $updateQuery)) {
            
                ?>
                <script>
                  alert(" Password update successfully!")
                  </script>
                            <?php
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($db);
                echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
            }
        }else{
            ?>
  <script>
    alert(" Password and Confirm Password is not same")
    </script>
              <?php
        }



    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Change Password</title>
        <link rel="stylesheet" type="text/css" href="../css/style-changePass.css">
        <script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <img class="logo" src="../images/logo2.png" alt="logo" width="500">
        <div class="form">
            <div class="content">
                <h1>Change Password!</h1>
                <form method="post" action="">
                    <p class="Pass" id="pass1"><label> New Password:<br>
                        <input  name="newPassword" type="password" width="283px">
                    </label></p>
                    <p class="Pass"><label> Confirm New Password:<br>
                        <input  name="confirmPassword" type="password" width="283px">
                    </label></p>
                    <p class="button">
                        <input type="submit" value="submit">
                    </p>
                </form>
            </div>
        </div>
        <div class="back">
            <a href="about-us.php">
                <p><i class="fa-solid fa-arrow-left-long"></i></p>
            </a>
        </div>
        
        <?php
include '../partials/footer.php';
?>
    </body>
</html>