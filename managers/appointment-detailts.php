<?php
session_start();
include '../db.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>View Pet Details</title>
        <link rel="stylesheet" type="text/css" href="../css/style-viewDetails.css">
        <script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <img class="logo" src="../images/logo2.png" alt="logo" width="500">
        <?php
$pets="";
 $sql = "SELECT * from pets  where id='" . $_GET['id'] . "' ";
$query = mysqli_query($db, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row1 = mysqli_fetch_assoc($query)) {


        $pets = $pets.' <div class="pets">
              <div class="pet-name">
                <p class="pet-subject">Pet:</p>
                <img src="../images/pet/'.$row1['image'] .'" alt="pet image" />
                <p class="pet-details">'.$row1['petName'] .'</p>
                <p class="pet-more-details">('. $row1['breed']  .')</p>
              </div>
              <div class="dateOfBirth">
                <p class="pet-subject">Date of Birth:</p>
                <p class="pet-details">'. $row1['dateOfBirth']  .'</p>
              </div>
              <div class="gender">
                <p class="pet-subject">Gender:</p>
                <p class="pet-details">'. $row1['gender']  .'</p>
              </div>
              <div class="spayed">
                <p class="pet-subject">Spayed or Nutered:</p>
                <p class="pet-details">'. $row1['spayed']  .'</p>
              </div>
              <hr />
              <div class="left">
                <div class="vaccine">
                  <p class="pet-subject">Vaccination List:</p>
                  '. $row1['vaccinationList']  .'
                </div>
                <div class="history">
                  <p class="pet-subject">Medical History:</p>
                  '. $row1['medicalHistory']  .'
                </div>
              </div>
             
            </div> ';
    }
}
echo $pets;

?>



        
        <div class="back">
            <a href="reqlist.php">
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
        <input type="checkbox" id="check">
        
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel2"></i>
        </label>
        <?php
include '../partials/admin-header-right.php';
?>
    </body>
</html>