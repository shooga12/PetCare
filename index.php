<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/style-Home.css" />
    <script
      src="https://kit.fontawesome.com/dcebed6e8d.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
    <?php
include 'partials/header-top.php';
?>

      <div class="welcome-text">
        <p>Riyadh's Most</p>
        <h1>
          Established & <br />
          Trusted Pet <br />
          Care Service
        </h1>
        <a href="about-us.php">Learn more</a>
      </div>

      <input type="checkbox" id="check" />
      <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel2"></i>
      </label>

      <?php
include 'partials/header-right.php';
include 'partials/footer.php';
?>
    
    </header>
  </body>
</html>
