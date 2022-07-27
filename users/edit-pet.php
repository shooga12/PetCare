<?php
session_start();
include '../db.php';


if (isset($_POST['petName'])) {
   
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
            if (move_uploaded_file($_FILES['files']['tmp_name'], "../images/pet/" . $cd)) {
                $file_name_all .= $cd . ",";
                $filepath = rtrim($file_name_all, ',');
            } else { //echo "Please try again";
            }
        } else { //if file size and file type was incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    
}

if ($_FILES['files']['size'] != 0) {

    $updateQuery = "UPDATE pets SET `petName` = '" . $_POST['petName'] . "', `dateOfBirth` = '" . $_POST['dateOfBirth'] . "' , `image` = '$filepath',`breed` = '" . $_POST['breed'] . "', `gender` = '" . $_POST['gender'] . "',spayed ='" . $_POST['spayed'] . "',vaccinationList ='" . $_POST['vaccinationList'] . "',medicalHistory ='" . $_POST['medicalHistory'] . "' WHERE `id` = '" . $_GET['id'] . "'";
            

    if (mysqli_query($db, $updateQuery)) {

    
        ?>
        <script>
          alert("Pet update successfully!")
          </script>
                    <?php
    } else {
        echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
    }



  
} else {
    $updateQuery = "UPDATE pets SET `petName` = '" . $_POST['petName'] . "', `dateOfBirth` = '" . $_POST['dateOfBirth'] . "',`breed` = '" . $_POST['breed'] . "', `gender` = '" . $_POST['gender'] . "',spayed ='" . $_POST['spayed'] . "',vaccinationList ='" . $_POST['vaccinationList'] . "',medicalHistory ='" . $_POST['medicalHistory'] . "' WHERE `id` = '" . $_GET['id'] . "'";
            

            if (mysqli_query($db, $updateQuery)) {

            
                ?>
                <script>
                  alert("Pet update successfully!")
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
	$query = "DELETE FROM `pets` WHERE `id` = ".$_GET['delete']."";
				if ($db->query($query)) {
                  
					?>

<script>
	alert("Pet Successfully Deleted");

    window.location.href = "profile.php";


</script>

<?php
	
			}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Pet</title>
        <link rel="stylesheet" type="text/css" href="../css/style-Editpet.css">
        <script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <img class="logo" src="../images/logo2.png" alt="logo" width="500">
        <div class="form">
            <div class="content">
                <h1>Edit your Pet's info!</h1>
                <?php

$sql = "SELECT * from pets  where id='" . $_GET['id'] . "' ";
$query = mysqli_query($db, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row1 = mysqli_fetch_assoc($query)) {
?>
                <div class="petphoto">
                    <img src="../images/pet/<?php echo $row1['image'] ?>" alt="pet image">
                   
                </div>
                <form method="post" action="" enctype="multipart/form-data">
             
                  <div class="first">
                        <p class="name"><label> Pet Name:<br>
                            <input name="petName" type="text" value="<?php echo $row1['petName'] ?>" required >
                        </label></p>
                        <p class="Birthday"><label> Date Of Birth:<br>
                            <input name="dateOfBirth" value="<?php echo $row1['dateOfBirth'] ?>" type="date" required>
                        </label></p>
                    </div>
                    <p class="Breed"><label> Breed:<br>
                        <input name="breed" value="<?php echo $row1['breed'] ?>" type="text" required>
                    </label></p>
                    <div class="second">
                        <p class="Gender"><label> Gender:
                            <select name="gender" required>
                                <option></option>
                                <option <?php if($row1['gender']=="Male"){
                                    echo "selected";
                                } ?> value="Male">Male</option>
                                <option  <?php if($row1['gender']=="Female"){
                                    echo "selected";
                                } ?> value="Female">Female</option>
                            </select>
                        </label></p>
                        <p class="spayed"> Spayed or Nutered:
                            <select name="spayed" required>
                            <option></option>
                            <option <?php if($row1['spayed']=="Yes"){
                                    echo "selected";
                                } ?> value="Yes">Yes</option>
                                <option  <?php if($row1['spayed']=="No"){
                                    echo "selected";
                                } ?> value="No">No</option>
                        </select>
                        </p>
                    </div>
                    <div class="third">
                        <p class="vacc"><label>Vaccination List:<br>
                            <textarea required name="vaccinationList" rows="4" cols="23"><?php echo $row1['vaccinationList'] ?></textarea>
                        </label></p>
                        <p class="history"><label>Medical History:<br>
                            <textarea required name="medicalHistory" rows="4" cols="23"><?php echo $row1['medicalHistory'] ?></textarea>
                        </label></p>
                    </div>
                    <br>
                    <label>Upload a photo : </label>
                        <input type="file" id="file" name="files" accept="image/*">
                    <p class="button">
                        <input type="submit" value="submit">
                        <a href="edit-pet.php?delete=<?php echo $_GET['id'] ?>" class="deletbtn" title="Delete Pet"> <i class="fa-solid fa-trash-can"></i></a>

                    </p>
                    
                </form>

                <?php
    }
}
                ?>
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