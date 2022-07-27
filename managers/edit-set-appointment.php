<?php
session_start();
include '../db.php';


if (isset($_POST['name'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $updateQuery = "UPDATE services_appointment SET `service_id` = '" . $_POST['name'] . "', `date` = '" . $_POST['date'] . "',`time` = '" . $_POST['time'] . "' WHERE `id` = '" . $_GET['id'] . "'";
            

        if (mysqli_query($db, $updateQuery)) {

        
            ?>
            <script>
              alert("Appointment update successfully!")
              window.location.href = "manage.php";

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
<html>
    <head>
       
        <script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
        <title>Edit Service</title>
        <style>

.footer{
    width: 1462px;
    height: 154px;
    position: absolute;
    margin-top: -7px;
    margin-left: -60px;
    box-shadow: antiquewhite;
    box-shadow: inset 0px -2px 18px 0px rgb(98 126 112);
    background-color: rgb(142 180 161);
    opacity: 0.8;
    text-shadow: 0px 1px 3px #575757;
}
.footer .social{
    margin-left: 1173px;
    font-size: 35px;
    margin-top: 72px;
    letter-spacing: 12px;
    color: aliceblue;
    
}
.footer p{
    font-size: 18px;
    color: aliceblue;
    margin-left: 84px;
    margin-top: -26px;
    /*opacity: 0.9;*/
}
.footer a{
    color: aliceblue;
}

.logo {
    position: absolute;
    width:289px ; 
    margin-top: -350px;
    margin-left: -107px;
    z-index: 1;
}

            body {background-color: rgb(200, 240, 219);
                  box-shadow:-1px 9px 16px 0px#b3b3b3; margin: 250px 50px 50px 50px;}
            .serviceee {font-family: Arial, Helvetica, sans-serif;
      background-color: rgb(244,248,250)}

      .button1 {
  background-color: rgb(115 162 137);
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

        </style>
    </head>
    <body>
        <img class="logo" src="../images/logo2.png" alt="petcare">
        <div class="serviceee" style="box-shadow:-1px 9px 16px 0px#b3b3b3; margin: 250px 0px; padding: 25px"> <h2>Edit Service</h2>
            <div class="container">
            <?php

$sql2 = "SELECT * from services_appointment  where id='" . $_GET['id'] . "' ";
$query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($query2)) {
?>
            <form method="post" action="">

              <label for="name"><b>service name</b></label>
              <select name="name" id="name">
                  <?php
$sql = "SELECT * from services";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
?>
<option <?php if($row1['id']==$row2['service_id']){
                                    echo "selected";
                                } ?> value="<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></option>
<?php
    }
}
                  ?>
                  
              </select>
              <br> <br>
              <label for="date">date</label>
              <input type="date" id="date" name="date" value="<?php echo $row2['date'] ?>"></p>
              <br>
              <label for="time">time</label>
              <input type="time" id="time" name="time" value="<?php echo $row2['time'] ?>"></p>
                <button type="submit" class="button1">submit</button> 
</form>

<?php
    }
}
?>

              </div>
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