<?php
session_start();
include '../db.php';


if (isset($_POST['petName'])) {

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
            $n = "pet_" . $random . ".png";
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

$petName = mysqli_real_escape_string($db, $_POST['petName']);
$dateOfBirth = mysqli_real_escape_string($db, $_POST['dateOfBirth']);
$breed = mysqli_real_escape_string($db, $_POST['breed']);
$gender = mysqli_real_escape_string($db, $_POST['gender']);
$spayed = mysqli_real_escape_string($db, $_POST['spayed']);
$vaccinationList = mysqli_real_escape_string($db, $_POST['vaccinationList']);
$medicalHistory = mysqli_real_escape_string($db, $_POST['medicalHistory']);
$sql = "INSERT INTO pets (userId,petName,dateOfBirth,image,breed,gender,spayed,vaccinationList,medicalHistory)
            VALUES ('{$_SESSION['loggedinuserid']}','{$petName}','{$dateOfBirth}','{$filepath}','{$breed}','{$gender}','{$spayed}','{$vaccinationList}','{$medicalHistory}')";
if (mysqli_query($db, $sql)) {
    header("Location: profile.php?addPet=true");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert.</p>";
}
}?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Pet</title>
        <link rel="stylesheet" type="text/css" href="../css/style-Addpet.css">
        <script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <img class="logo" src="../images/logo2.png" alt="logo" width="500">
        <div class="form">
            <div class="content">
                <h1>Give us your Pet's info!</h1>
                <div class="petphoto">
                    <img src="../images/PetPhoto.png" alt="pet image">
                    <p>Upload a photo</p>
                </div>
                <form method="post" action="" enctype="multipart/form-data">

                    <div class="first">
                        <p class="name"><label> Pet Name:<br>
                            <input name="petName" type="text" required >
                        </label></p>
                        <p class="Birthday"><label> Date Of Birth:<br>
                            <input name="dateOfBirth" type="date" required>
                        </label></p>
                    </div>
                    <p class="Breed"><label> Breed:<br>
                        <input name="breed" type="text" required>
                    </label></p>
                    <div class="second">
                        <p class="Gender"><label> Gender:
                            <select name="gender" required>
                                <option></option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </label></p>
                        <p class="spayed"> Spayed or Nutered:
                            <select name="spayed" required>
                            <option></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                        </p>
                    </div>
                    <div class="third">
                        <p class="vacc"><label>Vaccination List:<br>
                            <textarea required name="vaccinationList" rows="4" cols="23"></textarea>
                        </label></p>
                        <p class="history"><label>Medical History:<br>
                            <textarea required name="medicalHistory" rows="4" cols="23"></textarea>
                        </label></p>
                    </div>
                    <br>
                    <label>Upload a photo : </label>
                        <input required type="file" id="file" name="files" accept="image/*">
                    <p class="button">
                        <input type="submit" value="submit">
                    </p>
                </form>
            </div>
        </div>
        <div class="back">
            <a href="profile.php">
                <p><i class="fa-solid fa-arrow-left-long"></i></p>
            </a>
        </div>
        <?php
include '../partials/footer.php';
?>

        <input type="checkbox" id="check">
        
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel2"></i>
        </label>
        <?php
include '../partials/header-right.php';
?>
    </body>
</html>