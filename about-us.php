<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<style>
  .sidebar ul {
    
    padding-left: 0;
}
</style>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>about us</title>
    <link rel="stylesheet" href="css/aboutStyle.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <script
      src="https://kit.fontawesome.com/dcebed6e8d.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <img class="logo" src="images/logo3.png" alt="lock pass" />

    <div class="page">
      <div class="up">
        <div class="aboutUs">
         
          <h1>About Us</h1>
          <p>
            Our goal is to make a positive difference in the lives of pets as
            well as their owners or guardians. <br />
            Our facility offers a wide range of services including
            consultations, preventive care, vaccinations, dental care, routine
            and complex surgeries, x-ray and laboratory services, boarding and
            grooming, ultrasound and endoscopy.
          </p>
        </div>
      </div>

      <h2 style="text-align: center"></h2>
      <?php

$sql = "SELECT * from aboutUs";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
        ?>
        

    <div class="row">
      <div class="column">
        <div class="card">
        <img src="images/about-us/<?php echo $row1["vision_img"] ?>" alt="cat" style="width: 100%" />
          <div class="container">
            <div id="editVision">
            <?php echo $row1["vision"] ?>
            </div>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
        <img src="images/about-us/<?php echo $row1["mission_img"] ?>" alt="services" style="width: 100%" />
          <div class="container">
            <div id="editMission">
            <?php echo $row1["mission"] ?>
            </div>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <div >
          <img src="images/about-us/<?php echo $row1["location_img"] ?>" alt="gps" style="width: 100%" />
            <div class="container" id="editLocation">
            <?php echo $row1["location"] ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    }
}
?>

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
    </div>

    <input type="checkbox" id="check" />
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel2"></i>
    </label>
    <div class="sidebar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about-us.php">About</a></li>
                <li><a href="reviews.php">Review</a></li>
                <li><a href="contact-us.php">Contact Us</a></li>
            </ul>
        </div>
  </body>
</html>
