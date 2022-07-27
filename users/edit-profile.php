<?php
session_start();
include '../db.php';


if (isset($_POST['firstName'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      //print_r($_FILES['files']['size']);
//print_r($_FILES['files']['size']);
if (isset($_FILES['files']) && $_FILES['files']['size'] != 0) {
    

    $j = 0; //Variable for indexing uploaded image

    $file_name_all = "";

        $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
        $ext = explode('.', basename($_FILES['files']['name'])); //explode file name from dot(.)
        $file_extension = end($ext); //store extensions in the variable
        $basename = basename($_FILES['files']['name']);

        $j = $j + 1; //increment the number of uploaded images according to the files in array

        if (($_FILES["files"]["size"] < (1024 * 1024)) //Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)
        ) {
            $random = rand(10000, 1000000);
            $n = "profile_" . $random . ".png";
            $cd = $n;
            if (move_uploaded_file($_FILES['files']['tmp_name'], "../images/Profile Page_files/" . $cd)) {
                $file_name_all .= $cd . ",";
                $filepath = rtrim($file_name_all, ',');
            } else { //echo "Please try again";
            }
        } else { //if file size and file type was incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    
}

if ($_FILES['files']['size'] != 0) {

    $updateQuery = "UPDATE users SET `first_name` = '" . $_POST['firstName'] . "', `last_name` = '" . $_POST['lastName'] . "' , `image` = '$filepath',`email` = '" . $_POST['email'] . "', `phone` = '" . $_POST['phone'] . "',gender ='" . $_POST['gender'] . "' WHERE `id` = '" . $_SESSION['loggedinuserid'] . "'";
            

    if (mysqli_query($db, $updateQuery)) {

        $_SESSION['loggedin_first_name']= $_POST['firstName'];
        $_SESSION['loggedin_last_name']= $_POST['lastName'];
        $_SESSION['loggedinusername']= $_POST['firstName']." ".$_POST['lastName'];
        $_SESSION['loggedinuseremail'] = $_POST['email'];
        $_SESSION['loggedinuserphone'] = $_POST['phone'];
        $_SESSION['loggedinusergender'] = $_POST['gender'];
        $_SESSION['loggedinuserimage'] = $filepath;
    
        ?>
        <script>
          alert("User update successfully!")
          </script>
                    <?php
    } else {
        echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
    }



  
} else {
    $updateQuery = "UPDATE users SET `first_name` = '" . $_POST['firstName'] . "', `last_name` = '" . $_POST['lastName'] . "' ,`email` = '" . $_POST['email'] . "', `phone` = '" . $_POST['phone'] . "',gender ='" . $_POST['gender'] . "' WHERE `id` = '" . $_SESSION['loggedinuserid'] . "'";
            

            if (mysqli_query($db, $updateQuery)) {

                $_SESSION['loggedin_first_name']= $_POST['firstName'];
                $_SESSION['loggedin_last_name']= $_POST['lastName'];
                $_SESSION['loggedinusername']= $_POST['firstName']." ".$_POST['lastName'];
                $_SESSION['loggedinuseremail'] = $_POST['email'];
                $_SESSION['loggedinuserphone'] = $_POST['phone'];
                $_SESSION['loggedinusergender'] = $_POST['gender'];
            
                ?>
                <script>
                  alert("User update successfully!")
                  </script>
                            <?php
            } else {
                echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
                echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
            }
}


        



    }
}

if (isset($_GET['delete'])) {
	$query = "DELETE FROM `users` WHERE `id` = ".$_SESSION['loggedinuserid']."";
				if ($db->query($query)) {
                    session_destroy();
					?>

<script>
	alert("User Successfully Deleted");

	window.location.href = "../index.php";

</script>

<?php
	
//header("location: cart.php");			
			}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit profile</title>
        <link rel="stylesheet" type="text/css" href="../css/style-EditProfile.css">
        <script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <img class="logo" src="../images/logo2.png" alt="logo" width="500">
        <div class="form">
            <div class="content">
                <h1>Edit your info!</h1>
                <div class="photo">
                    <img src="../images/Profile Page_files/<?php echo $_SESSION['loggedinuserimage']; ?>" alt="profile image">
                   
                </div>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="first">
                        <p class="FirstName"><label> First Name:<br>
                            <input  name="firstName" type="text" value="<?php echo $_SESSION['loggedin_first_name']; ?>">
                        </label></p>
                        <p class="LastName"><label> Last Name:<br>
                            <input type="text" name="lastName" value="<?php echo $_SESSION['loggedin_last_name']; ?>">
                        </label></p>
                    </div>
                    <p class="Email"><label> Email:<br>
                        <input name="email" type="text" value="<?php echo $_SESSION['loggedinuseremail']; ?>" width="283px">
                    </label></p>
                    <p class="phone"><label> Phone Number:<br>
                        <input name="phone" type="text" value="<?php echo $_SESSION['loggedinuserphone']; ?>" width="283px">
                    </label></p>
                        <p class="Gender"><label> Gender:
                            <select name="gender">
                                <option></option>
                                <option <?php if($_SESSION['loggedinusergender']=="male"){
                                    echo "selected";
                                } ?> value="male">Male</option>
                                <option  <?php if($_SESSION['loggedinusergender']=="female"){
                                    echo "selected";
                                } ?> value="female">Female</option>
                            </select>
                        </label></p></br>
                        <label>Upload a photo : </label>
                        <input type="file" id="file" name="files" accept="image/*">
                        <p id="changePass"><a href="update-password.php">Change Password</a></p>
                    <p class="button">
                        <input type="submit" value="submit">
                        <a href="edit-profile.php?delete=true" class="deletbtn" title="Delete Pet"> <i class="fa-solid fa-trash-can"></i></a>
                    </p>
                </form>
            </div>
        </div>
        <div class="back">
            <a href="profile.php">
                <p><i class="fa-solid fa-arrow-left-long"></i></p>
            </a>
        </div>
        
        <div class="footer">
            <div class="social">
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div>
            <div class="rights">
                <p>Copyright &copy 2022 SelfipediA All right reserved.</p>
            </div>
        </div>
    </body>
</html>