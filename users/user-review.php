<?php
session_start();
include '../db.php';


if (isset($_POST['rating'])) {

    

$rating = mysqli_real_escape_string($db, $_POST['rating']);
$review = mysqli_real_escape_string($db, $_POST['review']);

 $sql = "INSERT INTO reviews (userId,reservationId,rating,review)
            VALUES ('{$_SESSION['loggedinuserid']}','{$_GET['id']}','{$rating}','{$review}')";
if (mysqli_query($db, $sql)) {
    ?>
    <script>
      alert("Review Add successfully!")
      window.location.href = "profile.php";

      </script>
                <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert.</p>";
}
}?>
<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<title>Review</title>
<link rel="stylesheet" href="../css/reviewstyle2.css">
<script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>


</head>

<body>
<img src="../images/logo2.png" alt="logo" class="logo">

<div class="container">

<div class="container-left">

</div>

<div class="container-form">

<h2 align="left" class="heading-"> Rating Our Service</h2>

<form method="post" action="">

<div class="form-field">


<p>Service?</p>
<select name="rating">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="5+">--</option>
</select>



<p>Comment:</p>
<textarea rows="10" placeholder="your message" name="review"></textarea>


<button class="bUtton">Submit</button>

</form>

</div>
</div>
</div>
<div class="back">
            <a href="profile.php">
                <p> <i class="fa-solid fa-arrow-left-long"></i> </p>
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
include '../partials/header-right.php';
?>



</body>
</html>