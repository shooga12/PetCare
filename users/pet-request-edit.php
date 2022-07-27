<?php
session_start();
include '../db.php';


if (isset($_POST['pet'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $updateQuery = "UPDATE reservations SET `pet` = '" . $_POST['pet'] . "', `service` = '" . $_POST['service'] . "',`date` = '" . $_POST['date'] . "', `time` = '" . $_POST['time'] . "',details ='" . $_POST['details'] . "' WHERE `id` = '" . $_GET['id'] . "'";
            

        if (mysqli_query($db, $updateQuery)) {

        
            ?>
            <script>
              alert("Reservation update successfully!")
              window.location.href = "profile.php";

              </script>
                        <?php
        } else {
            echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
        }


        



    }
}

?>
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
  <?php

$sql = "SELECT * from reservations  where id='" . $_GET['id'] . "' ";
$query = mysqli_query($db, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row1 = mysqli_fetch_assoc($query)) {
?>
<form method="post" action="">

<div class="form-field">
<div style="display:none">
<p>pet?</p>
<select name="pet" required>

<option <?php if($row1['pet']=="Cat"){echo "selected"; } ?> >Cat</option>
<option <?php if($row1['pet']=="Dog"){echo "selected"; } ?> >Dog</option>
<option <?php if($row1['pet']=="Rabbit"){echo "selected"; } ?> >Rabbit</option>
<option <?php if($row1['pet']=="Bird"){echo "selected"; } ?> >Bird</option>
<option <?php if($row1['pet']=="Horse"){echo "selected"; } ?> >Horse</option>
<option <?php if($row1['pet']=="Fish"){echo "selected"; } ?> >Fish</option>
</select>
    </div>
<p>Service?</p>
<select name="service" required>
<?php
$sql2 = "SELECT * from services";

$run_query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {
?>
<option <?php if($row1['service']==$row2['id']){
                                    echo "selected";
                                } ?> value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
<?php
    }
}
                  ?>

</select>



<p>Date</p>
<input name="date" type="date" required value="<?php echo $row1['date'] ?>">



<p>Time</p>
<input name="time" type="time" required value="<?php echo $row1['time'] ?>" >



<p>Note:</p>
<textarea rows="10" name="details" placeholder="your note" required> <?php echo $row1['details'] ?></textarea>
<button class="bUtton">Submit</button>

</form>
<?php
    }
}
                ?>
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