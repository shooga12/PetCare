<?php
session_start();
include '../db.php';


if (isset($_POST['pet'])) {

   

$pet = mysqli_real_escape_string($db, $_POST['pet']);
$service = mysqli_real_escape_string($db, $_POST['service']);
$date = mysqli_real_escape_string($db, $_POST['date']);
$time = mysqli_real_escape_string($db, $_POST['time']);
$details = mysqli_real_escape_string($db, $_POST['details']);
$sql = "INSERT INTO reservations (petId,userId,pet,service,date,time,details,status)
            VALUES ('{$_GET['id']}','{$_SESSION['loggedinuserid']}','{$pet}','{$service}','{$date}','{$time}','{$details}','0')";
if (mysqli_query($db, $sql)) {
    header("Location: profile.php?petRequest=true");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert.</p>";
}
}?>
<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">
<title>Booking</title>
<link rel="stylesheet" href="../css/request.css">
<script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>

</head>

<body>

<img src="../images/logo2.png" alt="logo" class="logo">



<div class="container">

<div class="container-time">

<h2 class="heading">Time Open</h2>

<h3 class="-days">SUNDAY-THURSDAY</h3>

<p>7am - 11pm</p>


<h3 class="-days">SATURDAY AND FRIDAY</h3>

<p>12Pm - 11Pm</p>



<hr>

<h4 class="-phone">Call Us: (123) 45-45-456</h4>

</div>

<div class="container-form">

<h2 align="left" class="heading-booking">Reservation Online</h2>

<form method="post" action="">

<div class="form-field">
<div style="display:none">
<p>pet?</p>
<select name="pet" required>

<option >Cat</option>
<option >Dog</option>
<option>Rabbit</option>
<option>Bird</option>
<option>Horse</option>
<option >Fish</option>
</select>
</div>
<p>Service?</p>
<select name="service" required>
<?php
$sql = "SELECT * from services";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
?>
<option value="<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></option>
<?php
    }
}
                  ?>

</select>



<p>Date</p>
<input name="date" type="date" required>



<p>Time</p>
<input name="time" type="time" required>



<p>Note:</p>
<textarea rows="10" name="details" placeholder="your note" required></textarea>
<button class="bUtton">Submit</button>

</form>

</div>
</div>
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


</body>

</html>