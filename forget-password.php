<?php
session_start();
include "db.php";
?>
<?php


//sign in
if (isset($_POST['inputEmailAddress'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($db, $_POST['inputEmailAddress']);
        $password = mysqli_real_escape_string($db, $_POST['inputPassword']);
        
      $sql = "SELECT * FROM users WHERE status='Active' AND email = '$email' /*AND password = '$password'*/";
        
        $result = mysqli_query($db, $sql);
       
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            
                $userrole =  $row['role'];
                $_SESSION['loggedinusername']= $row['first_name']." ".$row['last_name'];
                $_SESSION['loggedinuseremail'] = $email;
                $_SESSION['loggedinuserid'] = $row['id'];
                $_SESSION['loggedinuserrole'] = $userrole;
             
               if($userrole=='0'){
                    header("location: users/update-password.php");
                }else{
                  header("location: managers/update-password.php");

                }
                //unset($_SESSION['error_accour']);
            }else{
              ?>
  <script>
    alert("Email or Password incorrect")
    </script>
              <?php
            }
        }
    } 

?>
<!DOCTYPE html>
<html>

  <head>
<link rel="stylesheet" href="css/style-register.css">
<script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>
 </head>

 <body>
  <!-- background-->
  
  <div class="container"> 

<img class="logo" src="images/logo2.png" alt="logo" >




    <div class="card">

    <div class="inner-box" id="card" >  
    <div class="card-front"> 

        <h3>Forget Password</h3>

        <form method="post">
        
          <input type="email"    class="input-box"  name="inputEmailAddress"   placeholder="enter Your email here" required >

          <!-- <input type="password" name="inputPassword"  class="input-box" placeholder="enter Your password here" required > -->

          <button type="submit"  class = "submit-button" >Submit</button>

        </form>


        </div>

</div>
</div>
</div>
</div>
</div>

<?php
include 'partials/footer.php';
?>

<input type="checkbox" id="check">
<label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel2"></i>
</label>
<?php
include 'partials/header-right.php';
?>
   <script>


</body>

</html>
