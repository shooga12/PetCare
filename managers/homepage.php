<?php
session_start();
include '../db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/myformat.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
        <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
        <style>
        h1 {
            color: white;
            margin-top: 200px;
            margin-left: 60px;
            font-family: 'Trebuchet MS', sans-serif;
        }
        .add-service {
            position: absolute;
            display: flex;
            flex-direction: column;
            background-color: rgb(142 180 161);
            border-radius: 10px;
            margin-top: 375px;
            margin-left: 60px;
            width: 600px;
            box-shadow: -1px 9px 16px 0px #b3b3b3;
            padding-top: 26px;
            padding-left: 65px;
            padding-bottom: 31px;
            padding-right: 39px;
            height: 100px;
        }

        .setapp {
            position: absolute;
            display: flex;
            flex-direction: column;
            background-color: rgb(142 180 161);
            border-radius: 10px;
            margin-top: 550px;
            margin-left: 60px;
            width: 600px;
            box-shadow: -1px 9px 16px 0px #b3b3b3;
            padding-top: 26px;
            padding-left: 65px;
            padding-bottom: 31px;
            padding-right: 39px;
            height: 100px;
        }

        .reqlist {
            position: absolute;
            display: flex;
            flex-direction: column;
            background-color: rgb(142 180 161);
            border-radius: 10px;
            margin-top: 725px;
            margin-left: 60px;
            width: 600px;
            box-shadow: -1px 9px 16px 0px #b3b3b3;
            padding-top: 26px;
            padding-left: 65px;
            padding-bottom: 31px;
            padding-right: 39px;
            height: 100px;
        } 
    </style>
    </head>


<body>
    <section>
    <div class="wrapper">
    <img src="../images/logo3.png" alt="petcare" style="position: absolute;
    width: 289px;
    margin-top: -105px;
    margin-left: -60px;">
  <h1> Welcome back, manager!</h1>
</div>
    <div class="appoint">
        <div class="headline">
            <h3>Upcoming Appointments:</h3>
        </div>
        <div class="inside">
        <?php
$reservations="";
$i = 0;

$sql = "SELECT * from reservations where `status`= 1 "; 
$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {


      $sql2 = "SELECT * from pets where  id = '{$row1['petId']}'";

$run_query2 = mysqli_query($db, $sql2);

$date_now = date("Y-m-d");
      
     
     if ($date_now < $row1['date']) {
         //echo 'greater than';
   
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

$sql = "SELECT * from reservations where status='1'";

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
<div class="add-service"> 
    <a href="add-services.php"><img src="../images/addser.png" alt="add a service" width="300"></a>
</div>
<div class="setapp"> 
    <a href="manage.php"><img src="../images/manageapp.png" alt="manage appointments" width="350"></a>
</div>
<div class="reqlist"> 
    <a href="reqlist.php"><img src="../images/appreq.png" alt="appointment requests" width="350"></a>
</div>

    <div class="footer" style="margin-top: 1400px;">
        <div class="social">
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>
        <div class="rights">
            <p>Copyright &copy 2022 SelfipediA All right reserved.</p>
        </div>
    </div> 
</section>
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