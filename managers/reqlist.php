<?php
session_start();
include '../db.php';



if (isset($_GET['accept'])) {
   

        $updateQuery = "UPDATE reservations SET `status` = '1' WHERE `id` = '" . $_GET['accept'] . "'";
            

        if (mysqli_query($db, $updateQuery)) {

        
            ?>
            <script>
              alert("Appointment update successfully!")
              window.location.href = "reqlist.php";

              </script>
                        <?php
        } else {
            echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
        }



        



    
}

if (isset($_GET['deny'])) {
   

        $updateQuery = "UPDATE reservations SET `status` = '0' WHERE `id` = '" . $_GET['deny'] . "'";
            

        if (mysqli_query($db, $updateQuery)) {

        
            ?>
            <script>
              alert("Appointment update successfully!")
              window.location.href = "reqlist.php";

              </script>
                        <?php
        } else {
            echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
        }



        



    
}

?>
<!DOCTYPE html>
<html>
    <head>
        
        <script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
        <style>

.footer{
    width: 1462px;
    height: 154px;
    position: absolute;
    margin-top: 700px;
    margin-left: -30px;
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


        * {
            font-family: sans-serif; /* Change your font family */
          }
          
          .content-table {
            border-collapse: collapse;
            margin: 200px 110px;
            font-size: 0.9em;
            width: 1000px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
          
          }
          .page{
            position: absolute;
          }

          .logo {
  position: absolute;
  width:289px ; 
  margin-top: -105px ;
  margin-left: -60px ;
  z-index: 1;
}
          .content-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
          }
          
          .content-table th,
          .content-table td {
            padding: 12px 15px;
          }
          
          .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
          }
          
          .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
          }
          
          .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
          }
          
          .content-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
          }
          
          
          .button2 {
            background-color: rgb(115 162 137);
            color: white;
            padding: 14px 20px;
            margin: 0px 120px 80px;
            border: none;
            cursor: pointer;
            width: 20%;
            height: 20%;
          }
          
                      </style>
              </head>
              <body>

        <img class="logo" src="../images/logo2.png" alt="petcare">
                  <div class="page">
                    <table class="content-table">
                      <thead>
                        <tr>
                          <th>service</th>
                          <th>pet owner</th>
                          <th>pet name</th>
                          <th>date</th>
                          <th>Time</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                <?php
$sql1 = "SELECT * from reservations where status='0'";

$run_query1 = mysqli_query($db, $sql1);

if (mysqli_num_rows($run_query1) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query1)) {

      
?>


                  
              
                <td><?php          
      $sql3 = "SELECT * from services where  id = '{$row1['service']}'";

$run_query3 = mysqli_query($db, $sql3);

if (mysqli_num_rows($run_query3) > 0) {
    while ($row3 = mysqli_fetch_assoc($run_query3)) { echo $row3['name']; } } ?></td>
                <td><?php  $sql2 = "SELECT * from users where id='{$row1['userId']}'";

$run_query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {
        echo $row2['first_name']." ".$row2['last_name'];
    }
    }    
  ?>
  </td>
                <td><?php  $sql2 = "SELECT * from pets where id='{$row1['petId']}'";

$run_query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {
        echo $row2['petName'];
    }
    }    
  ?></td>
                <td><?php echo $row1['date'] ?></td>
                <td><?php echo $row1['time'] ?></td>
                <td><a href="appointment-detailts.php?id=<?php echo $row1['petId'] ?>">view details</a></td>
                          <td><a href="reqlist.php?accept=<?php echo $row1['id'] ?>"><img src="../images/accept.png" alt="accept" width="30" height="30"></a></td>
                          <td><a href="reqlist.php?deny=<?php echo $row1['id'] ?>"><img src="../images/deny.png" alt="deny" width="30" height="30"></a></td>
                          <td><a href="mailto:<?php  $sql2 = "SELECT * from users where id='{$row1['userId']}'";

$run_query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {
        echo $row2['email'];
    }
    }    
  ?>"><img src="../images/email2.png" alt="email" width="30" height="30"></a></td>
              </tr>
              <?php
    }
}

?>   
                     
                     
                    
                      </tbody>
                    </table>

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