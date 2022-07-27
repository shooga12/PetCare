<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>review Page</title>
    <link rel="stylesheet" href="css/reviewStyle.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <script
      src="https://kit.fontawesome.com/dcebed6e8d.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <img class="logo" src="images/logo3.png" alt="logo" />

    <div class="page">
      <div class="REVIEWSlabel">
        <h1>REVIEWS</h1>
      </div>

      <div class="content">
      <?php
$reviews="";
$i = 0;

$sql = "SELECT * from reviews";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {


      $sql2 = "SELECT * from users where  id = '{$row1['userId']}'";

$run_query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {

        


$reviews = $reviews.'
<div class="review1">
<p class="ownerReview">'. $row1['review']  .'</p>
<p class="ownerInfo">'. $row2['first_name']  ." ".$row2['last_name'] .' ( '.$row1['created_at'].' )</p>
</div>
';



    }
  }

}
}
echo $reviews;
  ?>
        
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
