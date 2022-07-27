<?php
session_start();
include '../db.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="../css/style-profile.css" />
    <script
      src="https://kit.fontawesome.com/dcebed6e8d.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <img class="logo" src="../images/logo3.png" alt="logo" width="500" />
    <div class="wrapper">
      <div class="up">
        <img src="../images/Profile Page_files/<?php echo $_SESSION['loggedinuserimage']; ?>" alt="Profile Photo" width="100" />
        <div class="detail">
          <p class="name"><?php echo $_SESSION['loggedinusername']; ?></p>
          <!-- <p class="name_info">
            <i class="fa-solid fa-location-dot"></i> Riyadh, Saudi Arabia
          </p> -->
          <div class="more-detail">
            <p>Email: <?php echo $_SESSION['loggedinuseremail']; ?></p>
            <p>Phone: <?php echo $_SESSION['loggedinuserphone']; ?></p>
          </div>
        </div>
        <div class="edit">
          <p><a href="edit-profile.php">Edit Profile</a></p>
        </div>
      </div>
    </div>

    <?php
$pets="";
$i = 0;

$sql = "SELECT * from pets where  userId = '{$_SESSION['loggedinuserid']}'";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {

        $i++;


$pets = $pets.' <div class="pets'.$i.'">
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
      <div class="button">
        <p class="icon">
          <a href="pet-request.php?id='. $row1['id']  .'"><i class="fa-solid fa-calendar-days"></i></a>
        </p>
        <p class="icon2">
          <a href="edit-pet.php?id='. $row1['id']  .'"><i class="far fa-edit"></i></a>
        </p>
      </div>
    </div> ';



    }
  }
echo $pets;
  ?>
   

    <div class="appoint">
      <div class="headline">
        <h3>Appointment Requests:</h3>
      </div>
      <div class="inside">


      <?php
$reservations="";
$i = 0;

$sql = "SELECT * from reservations where  userId = '{$_SESSION['loggedinuserid']}' AND `status`='0'";
 
$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {


      $sql2 = "SELECT * from pets where  id = '{$row1['petId']}'";

$run_query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {

        

      $sql3 = "SELECT * from services where  id = '{$row1['service']}'";

$run_query3 = mysqli_query($db, $sql3);

if (mysqli_num_rows($run_query3) > 0) {
    while ($row3 = mysqli_fetch_assoc($run_query3)) {

$reservations = $reservations.'<div class="info">
<div class="appoint-name">
  <p class="appoint-subject">Pet:</p>
  <p class="appoint-details">'. $row2['petName']  .'</p>
</div>
<div class="appoint-service">
  <p class="appoint-subject">Service:</p>
  <p class="appoint-details">'. $row3['name']  .'</p>
</div>
<div class="appoint-date">
  <p class="appoint-subject">Date:</p>
  <p class="appoint-details">'. $row1['date']  .'</p>
</div>
<div class="appoint-time">
  <p class="appoint-subject">Time:</p>
  <p class="appoint-details">'. $row1['time']  .'</p>
</div>
<div class="notes">
  <p class="appoint-subject">Notes:</p>
  <div class="act-note">
    <p class="actualNote">'. $row1['details']  .'</p>
  </div>
</div>
<div class="button">
  <p class="icon3">
    <a href="pet-request-edit.php?id='. $row1['id']  .'"><i class="far fa-edit"></i></a>
  </p>
  <p class="icon4">
    <a href="profile.php?AppointmentDell=true&&id='. $row1['id']  .'"><i class="fa-solid fa-trash-can"></i></a>
  </p>
</div>
<hr />
</div>';



    }
  }

}
}
}
}
echo $reservations;
  ?>
        
        
      </div>
      <div class="arrow">
        <p><i class="fa-solid fa-arrow-down-wide-short"></i></p>
      </div>
    </div>
    <div class="upcoming-appoint">
      <div class="headline">
        <h3>Upcoming Appointments:</h3>
      </div>
      <div class="inside">

     
     
     <?php

$reservations="";
$i = 0;

$sql = "SELECT * from reservations where  userId = '{$_SESSION['loggedinuserid']}' AND `status`='1'";
 $run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {


      $sql2 = "SELECT * from pets where  id = '{$row1['petId']}'";

$run_query2 = mysqli_query($db, $sql2);

$date_now = date("Y-m-d");
      
     
     if ($date_now < $row1['date']) {
        // echo 'greater than';
   
if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {

        
      $sql3 = "SELECT * from services where  id = '{$row1['service']}'";

$run_query3 = mysqli_query($db, $sql3);

if (mysqli_num_rows($run_query3) > 0) {
    while ($row3 = mysqli_fetch_assoc($run_query3)) {


$reservations = $reservations.'<div class="info">
<div class="appoint-name">
  <p class="appoint-subject">Pet:</p>
  <p class="appoint-details">'. $row2['petName']  .'</p>
</div>
<div class="appoint-service">
  <p class="appoint-subject">Service:</p>
  <p class="appoint-details">'. $row3['name']  .'</p>
</div>
<div class="appoint-date">
  <p class="appoint-subject">Date:</p>
  <p class="appoint-details">'. $row1['date']  .'</p>
</div>
<div class="appoint-time">
  <p class="appoint-subject">Time:</p>
  <p class="appoint-details">'. $row1['time']  .'</p>
</div>
<div class="notes">
  <p class="appoint-subject">Notes:</p>
  <div class="act-note">
    <p class="actualNote">'. $row1['details']  .'</p>
  </div>
</div>

</div>';
}
}


    }
  }
}

}
}
echo $reservations;
  ?>
        
 
      </div>
      <div class="arrow">
        <p><i class="fa-solid fa-arrow-down-wide-short"></i></p>
      </div>
    </div>
    <div class="prev-appoint">
      <div class="headline">
        <h3>Previous Appointments:</h3>
      </div>
      <div class="inside">
      <?php
$reservations="";
$i = 0;

$sql = "SELECT * from reservations where  userId = '{$_SESSION['loggedinuserid']}' And status='1'";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {


      $sql2 = "SELECT * from pets where  id = '{$row1['petId']}'";

$run_query2 = mysqli_query($db, $sql2);

$date_now = date("Y-m-d");
      
     
     if ($date_now > $row1['date']) {
        //  echo 'greater than';
   
if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {

             
      $sql3 = "SELECT * from services where  id = '{$row1['service']}'";

$run_query3 = mysqli_query($db, $sql3);

if (mysqli_num_rows($run_query3) > 0) {
    while ($row3 = mysqli_fetch_assoc($run_query3)) {

   


$reservations = $reservations.'<div class="info">
<div class="appoint-name">
  <p class="appoint-subject">Pet:</p>
  <p class="appoint-details">'. $row2['petName']  .'</p>
</div>
<div class="appoint-service">
  <p class="appoint-subject">Service:</p>
  <p class="appoint-details">'. $row3['name']  .'</p>
</div>
<div class="appoint-date">
  <p class="appoint-subject">Date:</p>
  <p class="appoint-details">'. $row1['date']  .'</p>
</div>
<div class="appoint-time">
  <p class="appoint-subject">Time:</p>
  <p class="appoint-details">'. $row1['time']  .'</p>
</div>
<div class="notes">
  <p class="appoint-subject">Notes:</p>
  <div class="act-note">
    <p class="actualNote">'. $row1['details']  .'</p>
  </div>
</div>
<a href="user-review.php?id='.$row1['id'].'"
            ><div class="button">
              <p>Review</p>
            </div></a>
          <hr />
</div>';


}
}

    }
  }
}

}
}
echo $reservations;
  ?>
        
      
      </div>
      <div class="arrow">
        <p><i class="fa-solid fa-arrow-down-wide-short"></i></p>
      </div>
    </div>
    <div class="addpet">
      <a href="add-pet.php">
        <div class="ins">
          <p class="ice"><i class="fa-solid fa-arrow-right-to-bracket"></i></p>
          <h4>ADD A PET</h4>
        </div>
      </a>
    </div>
    <?php
include '../partials/footer.php';
?>


    <input type="checkbox" id="check" />
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel2"></i>
    </label>
     <?php
include '../partials/header-right.php';
?>

    
  </body>
</html>
<?php
if(isset($_GET['addPet'])){
  ?>
<script>
  alert("Pet Add Successfully!");
</script>

  <?php
}



if (isset($_GET['AppointmentDell'])) {
	$query = "DELETE FROM `reservations` WHERE `id` = ".$_GET['id']."";
				if ($db->query($query)) {
                  
					?>

<script>
	alert("Reservation Successfully Deleted");

    window.location.href = "profile.php";


</script>

<?php
	
			}
}

?>